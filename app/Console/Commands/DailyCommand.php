<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apeh:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info('prepare record for next day');
        $this->daily();
        info('prepare record done');
        return 0;
    }

    public function daily()
    {
        $date = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
        // $date->modify('+1 day');
        $apdetails = DB::table('apdetail')->select('apmac')->get();
        foreach ($apdetails as $ap) {
            DB::table('apstatus')
                ->insertOrIgnore(
                    [
                        'apmac' => $ap->apmac,
                        'time' => $date->format('Y-m-d'),
                        'bssid' => null,
                        'wac' => null,
                        'h00' => 0,
                        'h01' => 0,
                        'h02' => 0,
                        'h03' => 0,
                        'h04' => 0,
                        'h05' => 0,
                        'h06' => 0,
                        'h07' => 0,
                        'h08' => 0,
                        'h09' => 0,
                        'h10' => 0,
                        'h11' => 0,
                        'h12' => 0,
                        'h13' => 0,
                        'h14' => 0,
                        'h15' => 0,
                        'h16' => 0,
                        'h17' => 0,
                        'h18' => 0,
                        'h19' => 0,
                        'h20' => 0,
                        'h21' => 0,
                        'h22' => 0,
                        'h23' => 0,
                    ]
                );
        }
    }
}
