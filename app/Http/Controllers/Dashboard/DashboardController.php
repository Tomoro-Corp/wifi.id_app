<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\APExport;
use App\Models\Dashboard;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = DB::table('apdetail')
            ->select('apdetail.*', 'apstatus.bssid', 'apstatus.wac', 'apstatus.time', 'apstatus.h00', 'apstatus.h01', 'apstatus.h02', 'apstatus.h03', 'apstatus.h04', 'apstatus.h05', 'apstatus.h06', 'apstatus.h07', 'apstatus.h08', 'apstatus.h09', 'apstatus.h10', 'apstatus.h11', 'apstatus.h12', 'apstatus.h13', 'apstatus.h14', 'apstatus.h15', 'apstatus.h16', 'apstatus.h17', 'apstatus.h18', 'apstatus.h19', 'apstatus.h20', 'apstatus.h21', 'apstatus.h22', 'apstatus.h23')
            ->leftjoin('apstatus', 'apdetail.apmac', '=', 'apstatus.apmac')
            ->get();
        return view('dashboard')->with('dashboard', $dashboard);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function readCSV($csvFile, $array)
    // {
    //     $file_handle = fopen($csvFile, 'r');
    //     while (!feof($file_handle)) {
    //         $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
    //     }
    //     fclose($file_handle);
    //     return $line_of_text;
    // }
    // $csvFileName = "apdetail.csv";
    // $csvFile = public_path('csv/' . $csvFileName);
    // $this->readCSV($csvFile,array('delimiter' => ','))

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'AP_SN' => 'required',
    //         'AP_MAC' => 'required',
    //     ]);

    //     $data = new Dashboard($request->all());
    //     $data->save();
    //     return view('/dashboard');
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function store()
    // {
    //     if (Dashboard::hasFile('file_dashboard')) {
    //         $path = Dashboard::file('import_file')->getRealPath();
    //         $data = Excel::load($path, function ($reader) {
    //         })->get();
    //         if (!empty($data) && $data->count()) {
    //             $count = 0;
    //             foreach ($data as $key => $d) {
    //                 $insert = array();
    //                 $insert['name'] = $value->name;
    //                 $this->apdetail->create($insert);
    //             }
    //         }
    //     }
    // }

    // public function importView()
    // {
    //     $data = DB::table('dashboard')
    //         ->join('witel', 'witel.nama_witel', '=', 'dashboard.nama_witel')
    //         ->get();

    //     return view('dashboard.import', compact("data"), [
    //         'title' => 'Dashboard'
    //     ]);
    // }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.import');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function export()
    {
        return Excel::download(new APExport, 'apstatus.csv');
    }
}
