<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    private $route = 'adminExpense';
    private $types = ['Sekali', 'Rutin'];
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
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');

        $supplierIds = Supplier::where('name', 'like', $search)->pluck('id');

        $query = Expense::whereNull('store_id')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('value', 'like', $search)
                    ->orWhere('description', 'like', $search)
                    ->orWhere('interval', 'like', $search)
                    ->orWhere('type', 'like', $search)
                    ->orWhere('date_start', 'like', $search)
                    ->orWhere('date_end', 'like', $search);
            })
            ->where(function ($query) use ($supplierIds) {
                $query->when($supplierIds->isNotEmpty(), function ($query) use ($supplierIds) {
                    $query->whereIn('supplier_id', $supplierIds);
                })->orWhereNull('supplier_id');
            })
            ->orderBy($order, $method);

        $total = $query->count();

        $expenses = $query->paginate($pick, ['*'], 'page', $page);
        $expenses->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.financial.expense.index', compact('route', 'acc', 'expenses', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();
        $suppliers = Supplier::where('status', 'Aktif')->get();

        return view('admin.financial.expense.create', compact('route', 'acc', 'types', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'value' => 'required|numeric',
            'type' => 'required|in:Sekali,Rutin',
            'interval' => 'nullable|required_if:type,Rutin|integer',
            'date_start' => 'required|date',
            'date_end' => 'nullable|required_if:type,Rutin|date|after:date_start',
            'description' => 'nullable|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['biaya' => $validator->errors()->first()]);
        }

        Expense::create([
            'store_id' => null,
            'supplier_id' => $request->supplier_id,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect()->route('adminExpense')->with('message', 'Biaya telah berhasil dibuat!');
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
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();
        $suppliers = Supplier::where('status', 'Aktif')->get();

        return view('admin.financial.expense.edit', compact('route', 'acc', 'types', 'suppliers', 'expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $rules = [
            'name' => 'required|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'value' => 'required|numeric',
            'type' => 'required|in:Sekali,Rutin',
            'interval' => 'nullable|required_if:type,Rutin|integer',
            'date_start' => 'required|date',
            'date_end' => 'nullable|required_if:type,Rutin|date|after:date_start',
            'description' => 'nullable|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['biaya' => $validator->errors()->first()]);
        }

        $expense->update([
            'store_id' => null,
            'supplier_id' => $request->supplier_id,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'interval' => $request->interval,
            'description' => $request->description,
            'is_updated' => true,
        ]);

        return redirect()->route('adminExpense')->with('message', 'Biaya telah berhasil diperbarui!');
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
