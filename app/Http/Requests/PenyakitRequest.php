<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenyakitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' => ['string', 'required', 'unique:rules,kode'],
            'nama' => ['string', 'required'],
            'keterangan' => ['string', 'nullable'],
        ];
    }
}
