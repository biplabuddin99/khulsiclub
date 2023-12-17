<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OurMember;

class MemberInvoice extends Model
{
    use HasFactory;
    public function member(){
        return $this->belongsTo(OurMember::class,'member_id','id');
    }
    
}
