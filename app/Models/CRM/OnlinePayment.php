<?php

namespace App\Models\CRM;

use App\Models\OurMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    use HasFactory;
    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
}
