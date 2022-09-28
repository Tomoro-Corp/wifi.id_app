<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class apstatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:apstatus';

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
        info('download apstatus from ftp server');
        $this->downloaddata('apstatus.csv');
        info('download apstatus done');
        return 0;
    }
    public function downloaddata($filename)
    {
        $ftp_server = "10.1.64.130";
        $ftp_user = "apeh";
        $ftp_pass = "1jutaw1f1";

        // set up a connection or die
        $ftp = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");

        // try to login
        if (@ftp_login($ftp, $ftp_user, $ftp_pass)) {
            info("Connected as $ftp_user@$ftp_server");
        } else {
            info("Couldn't connect as $ftp_user");
        }
        ftp_pasv($ftp, true);
        $server_file = $filename;

        // open local file to write to
        $local_file = $filename;
        $fp = fopen($local_file, "w");

        // download server file and save it to open local file
        if (ftp_fget($ftp, $fp, $server_file, FTP_BINARY, 0)) {
            info("Successfully written to $local_file");
        } else {
            info("Error downloading $server_file");
        }
        fclose($fp);
        // close the connection
        ftp_close($ftp);

        // //reading the file
        $row = 1;
        $date = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
        $time = $date->format('Y-m-d');
        $hour = 'h' . $date->format('h');
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                DB::table('apstatus')->where([
                    ['apmac', '=', $data[0]],
                    ['time', '=', $time],
                ])->increment($hour, 1, ['bssid' => $data[1], 'wac' => $data[4]]);
            }
        }
        fclose($handle);
    }
}
