<?php

namespace App\Http\Controllers\Admin\EcoFriendly\Unit;

use App\Http\Controllers\Controller;
use App\Models\WasteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WasteTypeController extends Controller
{
    private $route = 'adminWasteType';
    private $categories = ['Organik', 'Anorganik'];
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $route = $this->route;
    //     $acc = Auth::user();

    //     $pickUnit = 5;
    //     $pageUnit = $request->input('pageUnit', 1);

    //     $query = WasteType::all();

    //     $totalUnit = $query->count();

    //     $units = $query->paginate($pickUnit, ['*'], 'pageUnit', $pageUnit);
    //     $units->appends(['pick2' => $pickUnit]);

    //     $pageUnits = ceil($totalUnit / $pickUnit);

    //     return view('admin.product.index', compact('route', 'acc', 'units', 'pickUnit', 'pageUnit', 'totalUnit', 'pageUnits'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $categories = $this->categories;
        $acc = Auth::user();

        return view('admin.eco-friendly.waste.unit.create', compact('route', 'acc', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:waste_types',
            'category' => 'required|in:Organik,Anorganik'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['waste' => $validator->errors()->first()]);
        }

        WasteType::create($request->all());

        return redirect()->route('adminWaste')->with('message', 'Jenis Sampah telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteType $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WasteType $type)
    {
        $route = $this->route;
        $categories = $this->categories;
        $acc = Auth::user();

        return view('admin.eco-friendly.waste.unit.edit', compact('route', 'acc', 'categories', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WasteType $type)
    {
        $rules = [
            'name' => [
                'required',
                'string',
                Rule::unique('waste_types')->ignore($type->id),
            ],
            'category' => 'required|in:Organik,Anorganik'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['waste' => $validator->errors()->first()]);
        }

        $type->update($request->all());

        return redirect()->route('adminWaste')->with('message', 'Jenis Sampah telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WasteType $type)
    {
        $type->delete();

        return redirect()->route('adminWaste')->with('message', 'Jenis Sampah telah berhasil dihapus!');
    }
}
