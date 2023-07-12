<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payments extends Model
{
    use HasFactory,SoftDeletes;
    public function ppurpose(){
        return $this->belongsTo(Payment_purpose::class,'purpose_id','id');
    }

    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
}
