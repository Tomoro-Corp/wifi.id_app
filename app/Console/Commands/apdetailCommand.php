<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class apdetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:apdetail';

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
        info('download apdetail from ftp server');
        $this->downloaddata('apdetail.csv');
        info('download apdetail done');
        return 0;
    }

    public function downloaddata($filename)
    {
        /*
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
*/
        // //reading the file
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, null, ",")) !== FALSE) {
                if ($data[5] == '1') {
                    DB::table('apdetail')
                        ->updateOrInsert(
                            ['apmac' => $data[0]],
                            [
                                'apsn' => $data[1],
                                'aptype' => $data[2],
                                'apname' => $data[3],
                                'location' => $data[4],
                                'regional' => $data[5],
                                'witel' => $data[6],
                                'segmen1' => $data[7],
                                'segmen2' => $data[8],
                                'locid' => $data[9],
                                'namasite' => $data[10],
                                'skemabisnis' => $data[11],
                                'latitude' => $data[12],
                                'longitude' => $data[13],
                            ],
                        );
                }
            }
        }
        fclose($handle);
    }
}
