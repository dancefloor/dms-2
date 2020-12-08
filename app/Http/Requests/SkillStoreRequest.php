<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillStoreRequest extends FormRequest
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
            'slug' => ['required', 'string'],
            'icon' => ['string'],
            'difficulty' => ['string'],
            'description' => ['string'],
            'image' => ['string'],
            'portrait' => ['string'],
            'video' => ['string'],
        ];
    }
}
