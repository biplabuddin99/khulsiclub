<?php

namespace App\Models;

use App\Models\Settings\Location\Country;
use App\Models\Settings\Location\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurMember extends Model
{
    use HasApiTokens, Notifiable, HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'given_name',
        'surname',
        'email',
        'password',
    ];

    protected $appends = [
        'full_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function getFullNameAttribute()
    {
        return "{$this->given_name} {$this->surname}";
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    * relation with role
    */
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function country_present(){
        return $this->belongsTo(Country::class,'country','id');
    }

    public function country_permanent(){
        return $this->belongsTo(Country::class,'perCountry','id');
    }

    public function country_professional(){
        return $this->belongsTo(Country::class,'profCountry','id');
    }

    public function district_present(){
        return $this->belongsTo(District::class,'district','id');
    }
    public function district_permanent(){
        return $this->belongsTo(District::class,'perDistrict','id');
    }

    public function district_professional(){
        return $this->belongsTo(District::class,'profDistrict','id');
    }

    public function children(){
        return $this->hasMany(MemberChildren::class,'member_id','id');
    }

    public function otherClub(){
        return $this->hasMany(OtherClubDetails::class,'member_id','id');
    }

    public function membership_type(){
        return $this->belongsTo(MembershipType::class,'membership_applied','id');
    }
}
