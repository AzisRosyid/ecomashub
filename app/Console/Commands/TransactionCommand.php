<?php

namespace App\Console\Commands;

use App\Models\Debt;
use App\Models\Event;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    // Kegiatan, Pesanan, Biaya, Hutang
    public function handle()
    {
        $current = now();

        $this->eventTransaction($current);
        $this->orderTransaction($current);
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
            $transaction = Transaction::where('category_id', $event->id)->first();

            if (!$transaction && $current >= $event->date_end) {
                Transaction::create([
                    'store_id' => $event->store_id,
                    'category_id' => $event->id,
                    'category' => 'Kegiatan',
                    'value' => $event->fund ?? 0,
                    'value_type' => 'Rugi',
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
            $transaction = Transaction::where('category_id', $order->id)->first();

            if (!$transaction) {
                if ($order->down_payment > 0 && $current >= $order->date_start) {
                    Transaction::create([
                        'store_id' => $order->store_id,
                        'category_id' => $order->id,
                        'category' => 'Pesanan',
                        'value' => $order->down_payment,
                        'value_type' => 'Untung',
                        'date' => $order->date_start,
                    ]);
                }

                if ($order->status == 'Selesai') {
                    $orderValue = $order->details->sum(function ($detail) {
                        return $detail->product->price * $detail->quantity;
                    });

                    Transaction::create([
                        'store_id' => $order->store_id,
                        'category_id' => $order->id,
                        'category' => 'Pesanan',
                        'value' => $orderValue,
                        'value_type' => 'Untung',
                        'date' => $order->date_end,
                    ]);
                }
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
            $transaction = Transaction::where('category_id', $expense->id)->first();

            if (!$transaction && $current >= $expense->date) {
                $loop = 1;

                if ($expense->type == 'Rutin') {
                    $loop = floor(($current->diffInMonths($expense->date)) / $expense->interval);
                }

                for ($i = 0; $i < $loop; $i++) {
                    $date = $expense->date->addMonths($expense->interval * $i);

                    Transaction::create([
                        'store_id' => $expense->store_id,
                        'category_id' => $expense->id,
                        'category' => 'Biaya',
                        'value' => $expense->value,
                        'value_type' => 'Rugi',
                        'date' => $date,
                    ]);
                }
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
            $transaction = Transaction::where('category_id', $debt->id)->first();

            if (!$transaction && $current >= $debt->date_start) {
                $loop = $current->diffInMonths($debt->date_end);

                for ($i = 0; $i < $loop; $i++) {
                    $date = $debt->date_start->addMonths($i);

                    Transaction::create([
                        'store_id' => $debt->store_id,
                        'category_id' => $debt->id,
                        'category' => 'Hutang',
                        'value' => $debt->value * (1 + $debt->interest),
                        'value_type' => 'Rugi',
                        'date' => $date,
                    ]);
                }
            }
        }
    }

    // private function orderTransaction($current)
    // {
    //     $orderIds = Order::pluck('id')->toArray();

    //     Transaction::where('category', 'Pesanan')
    //         ->whereNotIn('category_id', $orderIds)
    //         ->delete();

    //     $orders = Order::whereIn('id', $orderIds)->get();

    //     foreach ($orders as $order) {
    //         $transaction = Transaction::where('category_id', $order->id)->first();
    //         $value = $order->down_payment;
    //         if ($order->status == 'Selesai') {
    //             $details = OrderDetail::where('order_id', $order->id)->get();
    //             foreach ($details as $detail) {
    //                 $product = Product::find($detail->product_id)->first();
    //                 $value += $product->price * $detail->quantity;
    //             }
    //         }

    //         if (!$transaction) {
    //             Transaction::create([
    //                 'store_id' => $order->store_id,
    //                 'category_id' => $order->id,
    //                 'category' => 'Pesanan',
    //                 'value' => $value,
    //                 'value_type' => 'Untung',
    //                 'date' => $current,
    //             ]);
    //         }
    //     }
    // }
}
