<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Method;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    private $route = 'userEvent';
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

        $query = Event::where('organization_id', User::find($acc->id)->organization()->id)->where(function ($query) use ($search) {
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

        return view('user.event.index', compact('route', 'acc', 'types', 'events', 'pick', 'page', 'total', 'pages'));
    }
}
