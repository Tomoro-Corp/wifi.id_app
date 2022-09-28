<?php

namespace App\Http\Controllers;

use App\Exports\APExport;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('download.download');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportAP(Request $request)
    {
        $fileName = 'apdetail.csv';
        $tasks = Download::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Idx', 'AP_SN', 'AP_MAC', 'AP_NAME', 'AP_LOCATION', '00', '01', '02', '03', '04', '04', '05', '06', '06', '07', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', 'Total');
        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Idx']  = $task->id;
                $row['AP_SN']    = $task->AP_SN;
                $row['AP_MAC']    = $task->AP_MAC;
                $row['AP_NAME']  = $task->AP_NAME;
                $row['AP_LOCATION']  = $task->AP_LOACTION;
                $row['00']  = $task->j00;
                $row['01']  = $task->j01;
                $row['02']  = $task->j02;
                $row['03']  = $task->j03;
                $row['04']  = $task->j04;
                $row['05']  = $task->j05;
                $row['06']  = $task->j06;
                $row['07']  = $task->j07;
                $row['08']  = $task->j08;
                $row['09']  = $task->j09;
                $row['10']  = $task->j10;
                $row['11']  = $task->j11;
                $row['12']  = $task->j12;
                $row['13']  = $task->j13;
                $row['14']  = $task->j14;
                $row['15']  = $task->j15;
                $row['16']  = $task->j16;
                $row['17']  = $task->j17;
                $row['18']  = $task->j18;
                $row['19']  = $task->j19;
                $row['20']  = $task->j20;
                $row['21']  = $task->j21;
                $row['22']  = $task->j22;
                $row['23']  = $task->j23;

                fputcsv($file, array($row['Idx'], $row['AP_SN'], $row['AP_MAC'], $row['AP_NAME'], $row['AP_LOCATION'], $row['j00'], $row['j01'], $row['j02'], $row['j03'], $row['j04'], $row['j05'], $row['j06'], $row['j07'], $row['j08'], $row['j09'], $row['j10'], $row['j11'], $row['j12'], $row['j13'], $row['j14'], $row['j15'], $row['j16'], $row['j17'], $row['j18'], $row['j19'], $row['j20'], $row['j21'], $row['j22'], $row['j23']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function export()
    {

        return Excel::download(new APExport, 'apstatus.xlsx');
    }
}
