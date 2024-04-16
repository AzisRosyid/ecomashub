<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Models\Cash;
use App\Models\Collaboration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CashController extends Controller
{
    private $route = 'adminCash';
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
        $storeId = Session::get('store_id');

        $collaborationIds = Collaboration::where('name', 'like', $search)->pluck('id');

        $query = Cash::when($storeId, function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('value', 'like', $search)
                    ->orWhere('description', 'like', $search)
                    ->orWhere('interval', 'like', $search)
                    ->orWhere('type', 'like', $search)
                    ->orWhere('date_start', 'like', $search)
                    ->orWhere('date_end', 'like', $search);
            })
            ->where(function ($query) use ($collaborationIds) {
                $query->when($collaborationIds->isNotEmpty(), function ($query) use ($collaborationIds) {
                    $query->whereIn('collaboration_id', $collaborationIds);
                })->orWhereNull('collaboration_id');
            })
            ->orderBy($order, $method);

        $total = $query->count();

        $cashes = $query->paginate($pick, ['*'], 'page', $page);
        $cashes->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.financial.cash.index', compact('route', 'acc', 'cashes', 'pick', 'page', 'total', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();
        $collaborations = Collaboration::where('status', 'Aktif')->where('type', 'Mitra')->get();

        return view('admin.financial.cash.create', compact('route', 'acc', 'types', 'collaborations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'collaboration_id' => 'nullable|exists:collaborations,id',
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

        Cash::create([
            'store_id' => $request->store_id,
            'collaboration_id' => $request->collaboration_id,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'interval' => $request->interval,
            'description' => $request->description
        ]);

        return redirect()->route('adminCash')->with('message', 'Kas telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cash $cash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cash $cash)
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();
        $collaborations = Collaboration::where('status', 'Aktif')->where('type', 'Mitra')->get();

        return view('admin.financial.cash.edit', compact('route', 'acc', 'types', 'collaborations', 'cash'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cash $cash)
    {
        $rules = [
            'name' => 'required|string',
            'collaboration_id' => 'nullable|exists:collaborations,id',
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

        $cash->update([
            'store_id' => $request->store_id,
            'collaboration_id' => $request->collaboration_id,
            'name' => $request->name,
            'value' => $request->value,
            'type' => $request->type,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'interval' => $request->interval,
            'description' => $request->description,
            'is_updated' => true,
        ]);

        return redirect()->route('adminCash')->with('message', 'Kas telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cash $cash)
    {
        $cash->delete();

        return redirect()->route('adminCash')->with('message', 'Kas telah berhasil dihapus!');
    }
}
