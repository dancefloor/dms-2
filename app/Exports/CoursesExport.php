<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CoursesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all();
    }

    public function headings(): array
    {
        return [
            'id',        
            'name',
            'slug',
            'excerpt',
            'description',
            'online_description',
            'live_description',
            'tagline',
            'keywords',
            'start_date',
            'end_date',
            'monday',
            'start_time_mon',
            'end_time_mon',
            'tuesday',
            'start_time_tue',
            'end_time_tue',
            'wednesday',
            'start_time_wed',
            'end_time_wed',
            'thursday',
            'start_time_thu',
            'end_time_thu',
            'friday',
            'start_time_fri',
            'end_time_fri',
            'saturday',
            'start_time_sat',
            'end_time_sat',
            'sunday',
            'start_time_sun',
            'end_time_sun',
            'level',
            'level_number',
            'teaser_video_1',
            'teaser_video_2',
            'teaser_video_3',
            'full_price',
            'reduced_price',
            'promo_price',
            'promo_price_expiry_date',
            'live_price',
            'online_price',
            'thumbnail',
            'image_landscape',
            'image_square',
            'image_portrait',
            'focus',
            'type',
            'is_online',
            'status',
            'online_link',
            'online_password',
            'online_embed',
            'to_waiting',
            'user_id',
            'classroom_id',
            'deleted_at',
            'created_at',
            'updated_at',
        ];
    }
}
