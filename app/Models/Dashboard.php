<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Dashboard extends Model
{
    use HasFactory;
    // protected $table = 'apdetail';

    public static function getAllAPDown()
    {
        $dashboard = DB::table('apdetail')
            ->select('apdetail.*', 'apstatus.bssid', 'apstatus.wac', 'apstatus.time', 'apstatus.h00', 'apstatus.h01', 'apstatus.h02', 'apstatus.h03', 'apstatus.h04', 'apstatus.h05', 'apstatus.h06', 'apstatus.h07', 'apstatus.h08', 'apstatus.h09', 'apstatus.h10', 'apstatus.h11', 'apstatus.h12', 'apstatus.h13', 'apstatus.h14', 'apstatus.h15', 'apstatus.h16', 'apstatus.h17', 'apstatus.h18', 'apstatus.h19', 'apstatus.h20', 'apstatus.h21', 'apstatus.h22', 'apstatus.h23')
            ->leftjoin('apstatus', 'apdetail.apmac', '=', 'apstatus.apmac')
            ->get();
        return $dashboard;
    }
}
