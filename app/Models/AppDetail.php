<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDetail extends Model
{
    use HasFactory;
    
    protected $table = 'apdetail';

    protected $guarded = ['id'];

    public function app_status(){
        return $this->belongsTo(AppStatus::class, 'apmac', 'apmac');
    }
}
