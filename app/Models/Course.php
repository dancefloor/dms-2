<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        'live_price',
        'promo_price_expiry_date',
        'online_price',
        'thumbnail',
        'portrait',
        'focus',
        'type',
        'is_online',
        'status',
        'online_link',
        'standby',
        'user_id',
        'duration'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [        
        'id'            => 'integer',
        // 'start_date'    => 'date:Y-m-d',
        // 'end_date'      => 'date:Y-m-d',
        // 'start_time_mon'=> 'datetime:H:i',
        // 'start_time_tue'=> 'datetime:H:i',
        // 'start_time_wed'=> 'datetime:H:i',
        // 'start_time_thu'=> 'datetime:H:i',
        // 'start_time_fri'=> 'datetime:H:i',
        // 'start_time_sat'=> 'datetime:H:i',
        // 'start_time_sun'=> 'datetime:H:i',
        // 'end_time_mon'  => 'datetime:H:i',
        // 'end_time_tue'  => 'datetime:H:i',
        // 'end_time_wed'  => 'datetime:H:i',
        // 'end_time_thu'  => 'datetime:H:i',
        // 'end_time_fri'  => 'datetime:H:i',
        // 'end_time_sat'  => 'datetime:H:i',
        // 'end_time_sun'  => 'datetime:H:i',
        'monday'        => 'boolean',
        'tuesday'       => 'boolean',
        'wednesday'     => 'boolean',
        'thursday'      => 'boolean',
        'friday'        => 'boolean',
        'saturday'      => 'boolean',
        'sunday'        => 'boolean',
        'full_price'    => 'float',
        'reduced_price' => 'float',
        'promo_price'   => 'float',
        'live_price'    => 'float',
        'online_price'  => 'float',
        'is_online'     => 'boolean',
        // 'to_waiting'    => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = [
    //     // 'start_date',
    //     // 'end_date',
    //     // 'promo_price_expiry_date',
    // ];

    public function getformattedPriceAttribute()
    {
        $format = new \NumberFormatter('fr_CH', \NumberFormatter::CURRENCY);
        return $format->formatCurrency($this->full_price, 'CHF');
    }

    public function styles()
    {
        return $this->belongsToMany(Style::class)->withTimestamps();
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'registrations', 'course_id', 'user_id')
            ->using(Registration::class)
            ->withPivot('role', 'status')
            ->wherePivot('role', 'student')
            ->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'registrations', 'course_id', 'user_id')->using(Registration::class)->wherePivot('role', 'instructor')->withTimestamps();
    }

    public function assistants()
    {
        return $this->belongsToMany(User::class, 'registrations', 'course_id', 'user_id')->using(Registration::class)->wherePivot('role', 'assistant')->withTimestamps();
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function hasStyle($id)
    {
        return in_array($id, $this->styles()->pluck('style_id')->toArray());
    }

    public function hasTeacher($id)
    {
        return in_array($id, $this->teachers()->pluck('user_id')->toArray());
    }

    public function hasStudent($id)
    {
        return in_array($id, $this->students()->pluck('user_id')->toArray());
    }

    public function confirmedStudents(int $id)
    {
        // return $this->belongsToMany(User::class, 'registrations', 'course_id', 'user_id')
        //     ->using(Registration::class)
        //     ->withPivot('role', 'status')            
        //     ->wherePivot('status','open')
        //     ->orWherePivot('status','registered')
        //     ->orWherePivot('role','student');

            return Registration::where('course_id', $id)->where('role','student')->whereIn('status',['registered','open'])->get();
    }

    public function scopeLiveCourses($query)
    {
        return $query->where('is_online', '1')->where('end_date', '>=', now());
    }

    public function scopeOnlineCourses($query)
    {
        return $query->where('is_online', '=', '1');
    }

    public function scopeActiveCourses($query)
    {
        return $query->whereStatus('active');
    }

    public function scopeShouldExpire($query)
    {        
        return $query->where('status', 'active')
                    //  ->whereNotIn('status',['finished', 'draft'])
                     ->where('end_date','<=', Carbon::now());
    }
  
    public function expire()
    {
        return $this->update([ 'status' => 'finished' ]);
    }

    public function scopeRegularCourses($query)
    {
        return $query->where('is_online', '0');
    }

    public function scopeExcluding($query, $ids)
    {        
        if (!empty($ids)) {            
            return $query->whereNotIn('id', $ids);            
        }
        return $query;
    }


    public function scopeLevel($query, $level)
    {        
        if (!empty($level)) {                
            return $query->where('level', $level);
        }        
        return $query;
    }

    public function scopeFocus($query, $focus)
    {
        if (!empty($focus)) {
            return $query->where('focus', $focus);
        }
        return $query;
    }

    public function scopeStyle($query, $style)
    {
        if (!empty($style)) {
            return $query->whereHas('styles', function (Builder $query_style) use ($style) {
                $query_style->where('style_id', $style);
            });
        }
        return $query;
    }

    public function scopeClassroom($query, $classroom)
    {
        if (!empty($classroom)) {
            return $query->where('classroom_id', $classroom);
        }
        return $query;
    }

    public function scopeDaysOfWeek($query, $day)
    {
        if (!empty($day)) {
            return $query->where($day, '1');
        }
        return $query;
    }

    public function scopeCity($query, $city)
    {    
        if (!empty($city)) {            
            return $query->whereHas('classroom.location', function (Builder $qCity) use ($city) {
                $qCity->where('city', $city);
            });
        }
        return $query;
    }

    public function getNeighbourhoodAttribute()
    {
        return $this->classroom->location->neighborhood ?? '';
    }


    public function getDaysAttribute()
    {
        $days = [];
        if ($this->monday == 1) {
            array_push($days, 'monday');
        }
        if ($this->tuesday == 1) {
            array_push($days, 'tuesday');
        }
        if ($this->wednesday == 1) {
            array_push($days, 'wednesday');
        }
        if ($this->thursday == 1) {
            array_push($days, 'thursday');
        }
        if ($this->friday == 1) {
            array_push($days, 'friday');
        }
        if ($this->saturday == 1) {
            array_push($days, 'saturday');
        }
        if ($this->sunday == 1) {
            array_push($days, 'sunday');
        }
        return $days;
    }


    public function displayVideo(int $num = 1)
    {
        switch ($num) {
            case 2:
                $video = $this->teaser_video_2;
                break;
            case 3:
                $video = $this->teaser_video_3;
                break;
            default:
                $video = $this->teaser_video_1;
                break;
        }

        $embed = Embed::make($video)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => '100%', 'height' => 450]);
        return $embed->getHtml();
    }

    function youtubeID($url)
    {
        if (strlen($url) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                return $match[1];
            } else
                return false;
        }

        return $url;
    }

    function getHoraireAttribute()
    {
        if ($this->monday) {
            return $this->start_time_mon->format('H:i') . '-' . $this->start_time_mon->format('H:i');
        }
        if ($this->tuesday) {
            return $this->start_time_tue->format('H:i') . '-' . $this->end_time_tue->format('H:i');
        }
        if ($this->wednesday) {
            return $this->start_time_wed->format('H:i') . '-' . $this->end_time_wed->format('H:i');
        }
        if ($this->thursday) {
            return $this->start_time_thu->format('H:i') . '-' . $this->end_time_thu->format('H:i');
        }
        if ($this->friday) {
            return $this->start_time_fri->format('H:i') . '-' . $this->end_time_fri->format('H:i');
        }
        if ($this->saturday) {
            return $this->start_time_sat->format('H:i') . '-' . $this->end_time_sat->format('H:i');
        }
        if ($this->sunday) {
            return $this->start_time_sun->format('H:i') . '-' . $this->end_time_sun->format('H:i');
        }
    }
}