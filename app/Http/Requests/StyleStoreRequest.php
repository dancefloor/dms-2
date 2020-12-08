<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StyleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'slug' => ['string'],
            'icon' => ['string'],
            'color' => ['string'],
            'image' => ['string'],
            'origin' => ['string'],
            'family' => ['string'],
            'music' => ['string'],
            'year' => ['string'],
            'video' => ['string'],
            'portrait' => ['string'],
            'description' => ['string'],
        ];
    }
}
