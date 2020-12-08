<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            // 'name' => ['required', 'string', 'max:400'],
            // 'slug' => ['required', 'string', 'max:400'],
            // 'excerpt' => ['string'],
            // 'description' => ['string'],
            // 'online_description' => ['string'],
            // 'tagline' => ['string'],
            // 'keywords' => ['string'],
            // 'start_date' => ['date'],
            // 'end_date' => ['date'],
            // 'monday' => [''],
            // 'start_time_mon' => [''],
            // 'end_time_mon' => [''],
            // 'tuesday' => [''],
            // 'start_time_tue' => [''],
            // 'end_time_tue' => [''],
            // 'wednesday' => [''],
            // 'start_time_wed' => [''],
            // 'end_time_wed' => [''],
            // 'thursday' => [''],
            // 'start_time_thu' => [''],
            // 'end_time_thu' => [''],
            // 'friday' => [''],
            // 'start_time_fri' => [''],
            // 'end_time_fri' => [''],
            // 'saturday' => [''],
            // 'start_time_sat' => [''],
            // 'end_time_sat' => [''],
            // 'sunday' => [''],
            // 'start_time_sun' => [''],
            // 'end_time_sun' => [''],
            // 'level' => ['string'],
            // 'level_number' => ['string'],
            // 'teaser_video_1' => ['string'],
            // 'teaser_video_2' => ['string'],
            // 'teaser_video_3' => ['string'],
            // 'full_price' => ['numeric'],
            // 'reduced_price' => ['numeric'],
            // 'promo_price' => ['numeric'],
            // 'live_price' => ['numeric'],
            // 'online_price' => ['numeric'],
            // 'thumbnail' => ['string'],
            // 'portrait' => ['string'],
            // 'focus' => ['string'],
            // 'type' => ['string'],
            // 'is_online' => [''],
            // 'status' => ['string'],
            // 'online_link' => ['string'],
            // 'to_waiting' => [''],
        ];
    }
}
