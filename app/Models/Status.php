<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'apstatus';
    protected $guarded = [];

    public function apdetail()
    {
        return $this->hasMany(Dashboard::class, 'apmac', 'apmac');
    }
}
