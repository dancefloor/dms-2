<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Registration;


class OrderService {
    
    public static function getCourseIds(int $oid)
    {        
        $courses = Registration::where('order_id', $oid)->get();              
        return $courses->pluck('course_id')->toArray();
    }

    public static function getOrderAmount($cids)
    {
        $amount = 0;           
        foreach ($cids as $c) {
            $course = Course::findOrFail($c);
            $amount += $course->full_price;
        }        
        return $amount;
    }

}