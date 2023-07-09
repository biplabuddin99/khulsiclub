<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_contact extends Model
{
    use HasFactory;

    public function contact_reason(){
        return $this->belongsTo(member_contact_reason::class,'reason_id','id');
    }
    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
}
