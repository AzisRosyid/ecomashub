<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    private $route = 'adminTransaction';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'date');
        $method = $request->input('method', 'desc');
        $storeId = Session::get('store_id');

        $query = Transaction::when($storeId, function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })->where('status', 'Selesai')->where(function ($query) use ($search) {
            $query->where('category', 'like', $search)
                ->orWhere('value', 'like', $search)
                ->orWhere('type', 'like', $search)
                ->orWhere('status', 'like', $search)
                ->orWhere('date', 'like', $search);
        })
            ->orderBy($order, $method);

        $total = $query->count();

        $transactions = $query->paginate($pick, ['*'], 'page', $page);
        $transactions->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.financial.transaction.index', compact('route', 'acc', 'transactions', 'pick', 'page', 'total', 'pages'));
    }

    //     /**
    //      * Show the form for creating a new resource.
    //      */
    //     public function create()
    //     {
    //         $route = $this->route;

    //         return view('admin.financial.transactions.create', compact('route', 'acc'));
    //     }

    //     /**
    //      * Store a newly created resource in storage.
    //      */
    //     public function store(Request $request)
    //     {
    //         $rules = [
    //             'category_id' => 'required|integer',
    //             'category' => 'required|in:Kegiatan,Pesanan,Biaya,Hutang',
    //             'value' => 'required|numeric',
    //             'type' => 'required|in:Untung,Rugi',
    //             'date' => 'required|date',
    //         ];

    //         $validator = Validator::make($request->all(), $rules);

    //         if ($validator->fails()) {
    //             return back()->withInput($request->all())->withErrors(['transaksi' => $validator->errors()->first()]);
    //         }

    //         Transaction::create([
    //             'user_id' => null,
    //             'category_id' => $request->category_id,
    //             'category' => $request->category,
    //             'value' => $request->value,
    //             'type' => $request->type,
    //             'date' => $request->date
    //         ]);

    //         return redirect($request->url)->with('message', 'Transaksi telah berhasil dibuat!');
    //     }

    //     /**
    //      * Display the specified resource.
    //      */
    //     public function show(Transaction $transaction)
    //     {
    //         //
    //     }

    //     /**
    //      * Show the form for editing the specified resource.
    //      */
    //     public function edit(Transaction $transaction)
    //     {
    //         $route = $this->route;

    //         return view('admin.financial.debt.edit', compact('route', 'acc', 'debt'));
    //     }

    //     /**
    //      * Update the specified resource in storage.
    //      */
    //     public function update(Request $request, Transaction $transaction)
    //     {
    //         $rules = [
    //             'name' => 'required|string',
    //             'value' => 'required|numeric',
    //             'type' => 'required|in:Sekali,Rutin',
    //             'interval' => 'integer',
    //             'date' => 'required|date',
    //             'description' => 'string'
    //         ];

    //         $validator = Validator::make($request->all(), $rules);

    //         if ($validator->fails()) {
    //             return back()->withInput($request->all())->withErrors(['transaksi' => $validator->errors()->first()]);
    //         }

    //         $transaction->update([
    //             'store_id' => $request->store_id,
    //             'name' => $request->name,
    //             'value' => $request->value,
    //             'type' => $request->type,
    //             'date' => $request->date,
    //             'interval' => $request->interval,
    //             'description' => $request->description
    //         ]);

    //         return redirect($request->url)->with('message', 'Biaya telah berhasil diperbarui!');
    //     }

    //     /**
    //      * Remove the specified resource from storage.
    //      */
    //     public function destroy(Transaction $transaction)
    //     {
    //         $transaction->delete();

    //         return redirect()->route('adminTransaksi')->with('message', 'Transaction telah berhasil dihapus!');
    //     }
}
