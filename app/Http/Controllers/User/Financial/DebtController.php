<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DebtController extends Controller
{
    private $route = 'adminDebt';
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

        $query = Debt::where('store_id', null)->where(function ($query) use ($search) {
            $query->where('name', 'like', $search)
                ->orWhere('value', 'like', $search)
                ->orWhere('interest', 'like', $search)
                ->orWhere('description', 'like', $search)
                ->orWhere('date_start', 'like', $search)
                ->orWhere('date_end', 'like', $search);
        })
            ->orderBy($order, $method);

        $total = $query->count();

        $debts = $query->paginate($pick, ['*'], 'page', $page);
        $debts->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.financial.debt.index', compact('route', 'acc', 'debts', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.financial.debt.create', compact('route', 'acc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'value' => 'required|numeric',
            'interest' => 'required|numeric',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'description' => 'nullable|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['debt' => $validator->errors()->first()]);
        }

        Debt::create([
            'store_id' => $request->store_id,
            'name' => $request->name,
            'value' => $request->value,
            'interest' => $request->interest / 100,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'description' => $request->description
        ]);

        return redirect()->route('adminDebt')->with('message', 'Hutang telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debt $debt)
    {
        $route = $this->route;
        $acc = Auth::user();

        return view('admin.financial.debt.edit', compact('route', 'acc', 'debt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Debt $debt)
    {
        $rules = [
            'name' => 'required|string',
            'value' => 'required|numeric',
            'interest' => 'required|numeric',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'description' => 'nullable|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['debt' => $validator->errors()->first()]);
        }

        $debt->update([
            'store_id' => $request->store_id,
            'name' => $request->name,
            'value' => $request->value,
            'interest' => $request->interest / 100,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'description' => $request->description,
            'is_updated' => true,
        ]);

        return redirect()->route('adminDebt')->with('message', 'Hutang telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        $debt->delete();

        return redirect()->route('adminDebt')->with('message', 'Hutang telah berhasil dihapus!');
    }
}