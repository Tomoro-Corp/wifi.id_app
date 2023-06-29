<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Dashboard extends Model
{
    use HasFactory;
    protected $table = 'apdetail';
    protected $guarded = [];

    public function apstatus()
    {
        return $this->belongsTo(Status::class, 'apmac', 'apmac');
    }
    
}
