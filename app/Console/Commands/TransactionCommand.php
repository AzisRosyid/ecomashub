<?php

namespace App\Console\Commands;

use App\Models\Cash;
use App\Models\Debt;
use App\Models\Event;
use App\Models\Expense;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class TransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:transaction-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transaction Controller';

    /**
     * Execute the console command.
     */

    // Kegiatan, Pesanan, Biaya, Hutang
    public function handle()
    {
        $current = now();

        $this->eventTransaction($current);
        $this->orderTransaction($current);
        $this->cashTransaction($current);
        $this->expenseTransaction($current);
        $this->debtTransaction($current);
    }

    private function eventTransaction($current)
    {
        $eventIds = Event::pluck('id')->toArray();

        Transaction::where('category', 'Kegiatan')
            ->whereNotIn('category_id', $eventIds)
            ->delete();

        $events = Event::whereIn('id', $eventIds)->get();

        foreach ($events as $event) {
            $transaction = Transaction::where('category_id', $event->id)->where('category', 'Kegiatan')->first();

            if ($transaction && ($transaction->value != $event->fund || $transaction->date != $event->date_end) && $current >= $event->date_end) {
                $transaction->update([
                    'value' => $event->fund ?? 0,
                    'date' => $event->date_end,
                ]);
            } else if (!$transaction && $current >= $event->date_end) {
                Transaction::create([
                    'store_id' => $event->store_id,
                    'category_id' => $event->id,
                    'category' => 'Kegiatan',
                    'value' => $event->fund ?? 0,
                    'type' => 'Rugi',
                    'status' => 'Selesai',
                    'date' => $event->date_end,
                ]);
            }
        }
    }

    private function orderTransaction($current)
    {
        $orderIds = Order::pluck('id')->toArray();

        Transaction::where('category', 'Pesanan')
            ->whereNotIn('category_id', $orderIds)
            ->delete();

        $orders = Order::with('details.product')->whereIn('id', $orderIds)->get();

        foreach ($orders as $order) {
            $transaction = Transaction::where('category_id', $order->id)->where('category', 'Pesanan')->orderBy('date')->get();

            if ($transaction) {
                if ($transaction[0]->date != $order->date_start || $transaction[0]->status != 'Selesai') {
                    $transaction[0]->update([
                        'date' => $order->date_start,
                        'status' => 'Selesai'
                    ]);
                } else if ($transaction[1]->date != $order->date_end) {
                    $transaction[1]->update([
                        'date' => $order->date_end
                    ]);
                }

                if ($order->status != 'Selesai' && $transaction[1]->status == 'Selesai') {
                    $transaction[1]->update([
                        'status' => 'Menunggu'
                    ]);
                } else if ($order->status == 'Selesai' && $transaction[1]->status != 'Selesai') {
                    $transaction[1]->update([
                        'status' => 'Selesai'
                    ]);
                }
            }
        }
    }

    private function cashTransaction($current)
    {
        $cashIds = Cash::pluck('id')->toArray();

        Transaction::where('category', 'Kas')
            ->whereNotIn('category_id', $cashIds)
            ->delete();

        $cashes = Expense::whereIn('id', $cashIds)->get();

        foreach ($cashes as $cash) {
            $transaction = Transaction::where('category_id', $cash->id)->where('category', 'Kas')->orderBy('date')->get();

            if ($transaction && $cash->is_updated) {
                foreach ($transaction as $st) {
                    $st->delete();
                }
            }

            if (($transaction->count() <= 0 || ($transaction && $cash->is_updated)) && $current >= $cash->date_start) {
                $loop = 1;

                if ($cash->type === 'Rutin') {
                    $loop = ((Carbon::parse($cash->date_start)->diffInMonths(min($cash->date_end, $current))) / $cash->interval) + 1;
                }

                for ($i = 0; $i < $loop; $i++) {
                    $date = Carbon::parse($cash->date_start)->addMonths($cash->interval * $i);

                    Transaction::create([
                        'store_id' => $cash->store_id,
                        'category_id' => $cash->id,
                        'category' => 'Biaya',
                        'value' => $cash->value,
                        'type' => 'Untung',
                        'date' => $date,
                        'status' => 'Selesai'
                    ]);
                }

                $cash->update(['is_updated' => false]);
            }
        }
    }

    private function expenseTransaction($current)
    {
        $expenseIds = Expense::pluck('id')->toArray();

        Transaction::where('category', 'Biaya')
            ->whereNotIn('category_id', $expenseIds)
            ->delete();

        $expenses = Expense::whereIn('id', $expenseIds)->get();

        foreach ($expenses as $expense) {
            $transaction = Transaction::where('category_id', $expense->id)->where('category', 'Biaya')->orderBy('date')->get();

            if ($transaction && $expense->is_updated) {
                foreach ($transaction as $st) {
                    $st->delete();
                }
            }

            if (($transaction->count() <= 0 || ($transaction && $expense->is_updated)) && $current >= $expense->date_start) {
                $loop = 1;

                if ($expense->type === 'Rutin') {
                    $loop = ((Carbon::parse($expense->date_start)->diffInMonths(min($expense->date_end, $current))) / $expense->interval) + 1;
                }

                for ($i = 0; $i < $loop; $i++) {
                    $date = Carbon::parse($expense->date_start)->addMonths($expense->interval * $i);

                    Transaction::create([
                        'store_id' => $expense->store_id,
                        'category_id' => $expense->id,
                        'category' => 'Biaya',
                        'value' => $expense->value,
                        'type' => 'Rugi',
                        'date' => $date,
                        'status' => 'Selesai'
                    ]);
                }

                $expense->update(['is_updated' => false]);
            }
        }
    }

    private function debtTransaction($current)
    {
        $debtIds = Debt::pluck('id')->toArray();

        Transaction::where('category', 'Hutang')
            ->whereNotIn('category_id', $debtIds)
            ->delete();

        $debts = Expense::whereIn('id', $debtIds)->get();

        foreach ($debts as $debt) {
            $transaction = Transaction::where('category_id', $debt->id)->where('category', 'Hutang')->get();

            if ($transaction && $debt->is_updated) {
                foreach ($transaction as $st) {
                    $st->delete();
                }
            }

            if (($transaction->count() <= 0 || ($transaction && $debt->is_updated)) && $current >= $debt->date_start) {
                $loop = ((Carbon::parse($debt->date_start)->diffInMonths(min($debt->date_end, $current))) / $debt->interval) + 1;

                for ($i = 0; $i < $loop; $i++) {
                    $date = Carbon::parse($debt->date_start)->addMonths($debt->interval * $i);

                    Transaction::create([
                        'store_id' => $debt->store_id,
                        'category_id' => $debt->id,
                        'category' => 'Hutang',
                        'value' => $debt->value * (1 + $debt->interest),
                        'type' => 'Rugi',
                        'date' => $date,
                        'status' => 'Selesai'
                    ]);
                }
            }
        }
    }
}
