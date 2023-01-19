<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurMember extends Model
{
    use HasFactory,SoftDeletes;

    public function children(){
        return $this->hasMany(MemberChildren::class,'member_id','id');
    }
}
