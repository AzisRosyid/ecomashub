<?php

namespace App\Http\Requests;

use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'string',
            'pick' => 'integer',
            'page' => 'integer',
            'order' => 'string',
            'method' => 'in:asc,desc',
            'store_id' => 'exists:stores,id'
        ];
    }

    /**
     * Perform additional authorization logic.
     */
    public function authorizeRequest()
    {
        $acc = Auth::user();
        $storeId = Session::get('store_id');

        if ($storeId) {
            $store = Store::where(function ($query) use ($acc) {
                if ($acc->role == 'Pengurus') {
                    $query->where('user.organization', $acc->organization);
                } else {
                    $query->where('user_id', $acc->id);
                }
            })->where('id', $storeId)->get()->first();
            if ($store) {
                $user = User::find(Auth::user()->id);

                if ($user->userRole->type == 'Pengurus') {
                    if ($store->organization() != $user->organization()) {
                        Session::forget('store_id');
                        abort(403, 'Unauthorized action.');
                    }
                } elseif ($user->userRole->type == 'Pengguna') {
                    if ($store->user != $user) {

                        Session::forget('store_id');
                        abort(403, 'Unauthorized action.');
                    }
                }
            }
        }

        return true;
    }

    /**
     * Validate the incoming request.
     *
     * @return void
     */
    public function validateResolved()
    {
        $this->authorizeRequest();
        parent::validateResolved();
    }
}
