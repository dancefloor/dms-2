<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\Registration;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class CourseStudentsExport implements FromQuery, WithMapping
{ 
    use Exportable;
    
    public int $cid;

    public function map($r): array
    {        
        return [
            $r->user->gender,
            $r->user->lastname,
            $r->user->name,
            $r->user->email,
            $r->user->phone,
            $r->id,
            $r->course->name,                                    
        ];
    }

    public function __construct(int $id)
    {
        $this->cid = $id;
    }

    public function query()
    {
        return Registration::where('course_id', $this->cid);
    }
}

