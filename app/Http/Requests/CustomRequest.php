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
            'search' => 'string|nullable',
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
        $storeId = Session::get('store_id');

        $user = User::find(Auth::user()->id);
        $organization = $user->organization();

        $userIds = User::whereHas('userRole.organization', function ($query) use ($organization) {
            $query->where('id', $organization->id);
        })->pluck('id');

        $storeValidation = Store::whereIn('user_id', $userIds);

        if ($user->userRole->type == 'Pengurus') {
            if ($storeValidation->get()->count() < 1) {
                abort(404, 'Buat Toko dulu.');
            }
        } else if ($user->userRole->type == 'Anggota') {
            if ($storeValidation->where('user_id', $user->id)->get()->count() < 1) {
                abort(404, 'Buat Toko dulu.');
            }
        }

        if ($storeId) {
            $store = Store::where(function ($query) use ($user) {
                if ($user->role == 'Pengurus') {
                    $query->where('user.organization', $user->organization());
                } else {
                    $query->where('user_id', $user->id);
                }
            });
            $curStore = $store->where('id', $storeId)->first();
            if ($curStore) {
                if ($user->userRole->type == 'Pengurus') {
                    if ($curStore->organization() != $user->organization()) {
                        Session::put('store_id', $store->first());
                        abort(403, 'Unauthorized action.');
                    }
                } elseif ($user->userRole->type == 'Pengguna') {
                    if ($curStore->user != $user) {
                        Session::put('store_id', $store->first());
                        abort(403, 'Unauthorized action.');
                    }
                }
            } else {
                Session::put('store_id', $store->first());
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
