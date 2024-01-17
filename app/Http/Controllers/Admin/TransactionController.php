<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';

        $transactions = Transaction::where('user_id', null)->where(function ($query) use ($search) {
            $query->where('category', 'like', $search)
                ->orWhere('value', 'like', $search)
                ->orWhere('value_type', 'like', $search)
                ->orWhere('date', 'like', $search);
        })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.transactions.index', compact('acc', 'transactions'));
    }

    //     /**
    //      * Show the form for creating a new resource.
    //      */
    //     public function create()
    //     {
    //         $acc = Auth::user();

    //         return view('admin.transactions.create', compact('acc'));
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
    //             'value_type' => 'required|in:Untung,Rugi',
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
    //             'value_type' => $request->value_type,
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
    //         $acc = Auth::user();

    //         return view('admin.debt.edit', compact('acc', 'debt'));
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
    //             'store_id' => null,
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
