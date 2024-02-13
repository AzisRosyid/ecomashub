<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    private $route = 'adminEvent';
    private $types = ['Luring', 'Daring'];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();
        $search = '%' . $request->input('search', '') . '%';
        $pick = $request->input('pick', 10);
        $page = $request->input('page', 1);
        $order = $request->input('order', 'id');
        $method = $request->input('method', 'desc');

        $query = Event::where('store_id', null)->where(function ($query) use ($search) {
            $query->where('title', 'like', $search)
                ->orWhere('organizer', 'like', $search)
                ->orWhere('description', 'like', $search)
                ->orWhere('fund', 'like', $search)
                ->orWhere('location', 'like', $search)
                ->orWhere('type', 'like', $search)
                ->orWhere('date_start', 'like', $search)
                ->orWhere('date_end', 'like', $search);
        })->orderBy($order, $method);

        $total = $query->count();

        $events = $query->paginate($pick, ['*'], 'page', $page);
        $events->appends(['search' => $request->input('search', ''), 'pick' => $pick]);

        $pages = ceil($total / $pick);

        return view('admin.event.index', compact('route', 'acc', 'types', 'events', 'pick', 'page', 'total', 'pages'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();

        return view('admin.event.create', compact('route', 'acc', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'organizer' => 'required|string',
            'description' => 'nullable|string',
            'fund' => 'nullable|numeric',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'file' => 'nullable|mimes:pdf',
            'location' => 'required|string',
            'type' => 'required|in:Luring,Daring',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['event' => $validator->errors()->first()]);
        }

        Event::create([
            'store_id' => null,
            'title' => $request->title,
            'organizer' => $request->organizer,
            'description' => $request->description,
            'fund' => $request->fund,
            // 'image' => $request->image,
            // 'link' => $request->link,
            'location' => $request->location,
            'type' => $request->type,
            'theme' => 1,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end
        ]);

        return redirect()->route('adminEvent')->with('message', 'Kegiatan telah berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $route = $this->route;
        $types = $this->types;
        $acc = Auth::user();

        return view('admin.event.edit', compact('route', 'acc', 'types', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|string',
            'organizer' => 'required|string',
            'description' => 'nullable|string',
            'fund' => 'nullable|numeric',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'file' => 'nullable|mimes:pdf',
            'location' => 'required|string',
            'type' => 'required|in:Luring,Daring',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors(['event' => $validator->errors()->first()]);
        }

        $event->update([
            'user_id' => null,
            'title' => $request->title,
            'organizer' => $request->organizer,
            'description' => $request->description,
            'fund' => $request->fund,
            'image' => $request->image,
            'link' => $request->link,
            'location' => $request->location,
            'type' => $request->type,
            'theme' => 1,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end
        ]);

        return redirect()->route('adminEvent')->with('message', 'Kegiatan telah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('adminEvent')->with('message', 'Kegiatan telah berhasil dihapus!');
    }
}
