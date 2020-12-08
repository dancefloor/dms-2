<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password',
        'gender', 'profession', 'branch', 'birthday', 'biography',
        'aware_of_df', 'work_status', 'price_hour', 'unemployement_proof', 'unemployement_expiry_date',
        'address', 'address_info', 'city', 'state', 'postal_code', 'country',
        'facebook', 'instagram', 'twitter', 'youtube', 'snapchat', 'linkedin', 'tiktok', 'pinterest',
        'mobile', 'phone', 'mobile_verified_at', 'phone_verified_at', 'skype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
        'mobile_verified_at',
        'phone_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {        
        return Carbon::parse($this->birthday)->age;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        $this->roles()->sync($role);
    }

    public function hasRole($id)
    {
        return in_array($id, $this->roles()->pluck('id')->toArray());
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('slug')->unique();
    }

    public function teaches()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'user_id', 'course_id')
            ->using('App\Models\Registration')
            ->withPivot('role')
            ->wherePivot('role', 'instructor')
            ->withTimestamps();
    }

    public function assists()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'user_id', 'course_id')
            ->using('App\Models\Registration')
            ->withPivot('role')
            ->wherePivot('role', 'assistant')
            ->withTimestamps();
    }

    public function learns()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'user_id', 'course_id')
            ->using('App\Models\Registration')
            ->withPivot('role', 'status')
            ->wherePivot('role', 'student')
            ->withTimestamps();
    }

    public function pendingCourses()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'user_id', 'course_id')
            ->using('App\Models\Registration')
            ->withPivot('status')
            ->wherePivot('status', 'pre-registered')
            ->wherePivot('role', 'student')
            ->withTimestamps();
    }

    public function payedCourses()
    {
        return $this->belongsToMany(Course::class, 'registrations', 'user_id', 'course_id')
            ->using('App\Models\Registration')
            ->withPivot('status')
            ->wherePivot('status', 'payed')
            ->wherePivot('role', 'student')
            ->withTimestamps();
    }

    public function getAvatarAttribute()
    {

        if (!$this->picture) {
            return $this->gender === 'male' ? asset('images/avatar-male.png') : asset('images/avatar-female.png');
        }

        return $this->picture;
    }

    public function isAdmin()
    {
        $admin = Role::where('slug', 'admin')->first();
        return in_array($admin->id, $this->roles()->pluck('id')->toArray());
        //return $admin;
    }

    public function scopeWomen()
    {
        return $this->whereGender('female');
    }

    public function scopeMen()
    {
        return $this->whereGender('male');
    }

    public function registrationStatus($id, $uid = null)
    {
        if ($uid === null) {
            $uid = $this->id;
        }
        // Log::notice('course_id: ' . $id);
        
        $result = DB::table('registrations')
            ->where('user_id', $uid)
            ->where('course_id', $id)
            ->where('role', 'student')
            ->get();

        // Log::info($result);
        
        $status = collect($result)->map(function ($item) {
            return $item->status;
        })->first();
        
        // Log::error($status);
        return $status;
    }

    public function scopeTeachers(){     
        return User::whereHas('roles', function($query){
            $query->where('slug', 'instructor');
        })->get();        
        //return Role::with('users')->where('slug', 'instructor')->get();
    }

    public function registrationDate($id)
    {
        $result = DB::table('registrations')
            ->where('user_id', $this->id)
            ->where('course_id', $id)
            ->where('role', 'student')
            ->get();

        $date = collect($result)->map(function ($item, $key) {
            return $item->created_at;
        })->first();
        return $date;
    }

    public function updateRegistrationStatus($id)
    {
        $registration = DB::table('registrations')
            ->where('user_id', $this->id)
            ->where('course_id', $id)
            ->get();
        dd($registration);
        return $registration;
    }

    public function isRegistered($id)
    {
        return in_array($id, $this->learns()->pluck('course_id')->toArray());
    }

    public function useReduced(): bool
    {
        if ($this->work_status != 'working') {
            return true;
        } else {
            return false;
        }
    }
    
}
