<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';

        $expenses = Expense::where('store_id', null)->where(function ($query) use ($search) {
            $query->where('name', 'like', $search)
                ->orWhere('value', 'like', $search)
                ->orWhere('description', 'like', $search)
                ->orWhere('interval', 'like', $search)
                ->orWhere('type', 'like', $search)
                ->orWhere('date', 'like', $search);
        })
            ->orderBy($request->input('order', 'id'), $request->input('method', 'asc'))
            ->get();

        return view('admin.expense.index', compact('acc', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acc = Auth::user();

        return view('admin.expense.create', compact('acc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'value' => 'required|numeric',
            'type' => 'required|in:Sekali,Rutin',
            'interval' => 'integer',
            'date' => 'required|date',
            'description' => 'string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['biaya' => $validator->errors()->first()]);
        }

        Expense::create([
            'store_id' => null,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date' => $request->date,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect($request->url)->with('message', 'Biaya telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $acc = Auth::user();

        return view('admin.debt.edit', compact('acc', 'debt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $rules = [
            'name' => 'required|string',
            'value' => 'required|numeric',
            'type' => 'required|in:Sekali,Rutin',
            'interval' => 'integer',
            'date' => 'required|date',
            'description' => 'string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['biaya' => $validator->errors()->first()]);
        }

        $expense->update([
            'store_id' => null,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date' => $request->date,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect($request->url)->with('message', 'Biaya telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('adminExpense')->with('message', 'Biaya telah berhasil dihapus!');
    }
}
