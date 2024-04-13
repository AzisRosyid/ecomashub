<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class IndexRequest extends FormRequest
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
        $storeId = session('store_id');

        if ($storeId) {
            $store = Store::find($storeId);
            if ($store) {
                $user = Auth::user();

                if ($user->userRole->type == 'Pengurus') {
                    if ($store->organization != $user->organization) {
                        session()->forget('store_id');
                        abort(403, 'Unauthorized action.');
                    }
                } elseif ($user->userRole->type == 'Pengguna') {
                    if ($store->user != $user) {
                        session()->forget('store_id');
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
