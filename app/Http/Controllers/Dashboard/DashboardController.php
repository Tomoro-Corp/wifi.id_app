<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\APExport;
use App\Models\Dashboard;
use App\Models\Status;
use App\Models\AppStatus;
use App\Models\AppDetail;
use Illuminate\Support\Facades\DB;
use App\Charts\DashboardChart;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $app_on = Dashboard::where('last_login_at', '!=', null)->count();
        // $app_off = Dashboard::where('last_login_at', '=', null)->count();
        // return  AppDetail::where('regional',"1")->get();
        // return  AppStatus::where('apmac','00:06:F6:16:C2:D2')->get();
        $on = 0;
        $off = 0;
        $app = AppStatus::all();
        // return $app;
        foreach ($app as $data) {
            $off += ($data->h00) + ($data->h01) + ($data->h02)+ ($data->h03)+ ($data->h04)+ ($data->h05)+ ($data->h06)+ ($data->h07)+ ($data->h08)+ ($data->h09)+ ($data->h10)+ ($data->h11)+ ($data->h12)+ ($data->h13)+ ($data->h14)+ ($data->h15)+ ($data->h16)+ ($data->h17)+ ($data->h18)+ ($data->h19)+ ($data->h20) + ($data->h21) + ($data->h22 + ($data->h23));
            // return ($data->h00)  .' '. ($data->h01)  .' '. ($data->h02) .' '. ($data->h03) .' '. ($data->h04) .' '. ($data->h05) .' '. ($data->h06) .' '. ($data->h07) .' '. ($data->h08) .' '. ($data->h09) .' '. ($data->h10) .' '. ($data->h11) .' '. ($data->h12) .' '. ($data->h13) .' '. ($data->h14) .' '. ($data->h15) .' '. ($data->h16) .' '. ($data->h17) .' '. ($data->h18) .' '. ($data->h19) .' '. ($data->h20)  .' '. ($data->h21)  .' '. ($data->h22  .' '. ($data->h23));
            // return $off;
            // $on = $on + (24 - $off);
            // return $on;
        }
        
        // return $off;
        $on = ($app->count() * 24) - $off;

        // ->where('time','>=', Carbon::now())
        // ->where('time','>=', Carbon::now())

        // return "off :".$off.'- on :'.$on;

        // $app_on = Dashboard::count();
        // $app_off = Dashboard::count();
        $chart = new DashboardChart();
        $chart->labels(['App On', 'App Off']);
        $chart->dataset('Dataset', 'pie', [$on, $off]);

        $dashboard = AppDetail::leftjoin('apstatus', 'apdetail.apmac', '=', 'apstatus.apmac')
            ->select('apdetail.*', 'apstatus.bssid', 'apstatus.wac', 'apstatus.time', 'apstatus.h00', 'apstatus.h01', 'apstatus.h02', 'apstatus.h03', 'apstatus.h04', 'apstatus.h05', 'apstatus.h06', 'apstatus.h07', 'apstatus.h08', 'apstatus.h09', 'apstatus.h10', 'apstatus.h11', 'apstatus.h12', 'apstatus.h13', 'apstatus.h14', 'apstatus.h15', 'apstatus.h16', 'apstatus.h17', 'apstatus.h18', 'apstatus.h19', 'apstatus.h20', 'apstatus.h21', 'apstatus.h22', 'apstatus.h23')
            ->get();

        if (request()->ajax()) {
            $ap = DB::table('apdetail')->whereBetween('last_login_at', [Carbon::now()->subHours(8), Carbon::now()])
                  ->orderBy('last_login_at', 'DESC')
                  ->select('*')
                  ->get();
            return DataTables::of($ap)
            ->addColumn('last', function($row) {
                $last = date('d-m-Y H:i:s', strtotime($row->last_login_at));
                return $last;
            })
            ->addColumn('apsn', function($row) {
                $apsn = $row->apsn;
                return $apsn;
            })
            ->rawColumns(['apsn', 'last'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('dashboard')->with(['dashboard' => $dashboard, 'chart' => $chart]);
    }

    public function detail()
    {  
        // $app_on = Dashboard::where('last_login_at', '!=', null)->count();
        // $app_off = Dashboard::where('last_login_at', '=', null)->count();
        // return  AppDetail::where('regional',"1")->get();
        // return  AppStatus::where('apmac','00:06:F6:16:C2:D2')->get();
        $on = 0;
        $off = 0;
        $app = AppStatus::all();
        // return $app;
        foreach ($app as $data) {
            $off += ($data->h00) + ($data->h01) + ($data->h02)+ ($data->h03)+ ($data->h04)+ ($data->h05)+ ($data->h06)+ ($data->h07)+ ($data->h08)+ ($data->h09)+ ($data->h10)+ ($data->h11)+ ($data->h12)+ ($data->h13)+ ($data->h14)+ ($data->h15)+ ($data->h16)+ ($data->h17)+ ($data->h18)+ ($data->h19)+ ($data->h20) + ($data->h21) + ($data->h22 + ($data->h23));
            // return ($data->h00)  .' '. ($data->h01)  .' '. ($data->h02) .' '. ($data->h03) .' '. ($data->h04) .' '. ($data->h05) .' '. ($data->h06) .' '. ($data->h07) .' '. ($data->h08) .' '. ($data->h09) .' '. ($data->h10) .' '. ($data->h11) .' '. ($data->h12) .' '. ($data->h13) .' '. ($data->h14) .' '. ($data->h15) .' '. ($data->h16) .' '. ($data->h17) .' '. ($data->h18) .' '. ($data->h19) .' '. ($data->h20)  .' '. ($data->h21)  .' '. ($data->h22  .' '. ($data->h23));
            // return $off;
            // $on = $on + (24 - $off);
            // return $on;
        }
        
        // return $off;
        $on = ($app->count() * 24) - $off;

        // ->where('time','>=', Carbon::now())
        // ->where('time','>=', Carbon::now())

        // return "off :".$off.'- on :'.$on;

        // $app_on = Dashboard::count();
        // $app_off = Dashboard::count();
        $chart = new DashboardChart();
        $chart->labels(['App On', 'App Off']);
        $chart->dataset('Dataset', 'pie', [$on, $off]);

        $dashboard = AppDetail::leftjoin('apstatus', 'apdetail.apmac', '=', 'apstatus.apmac')
            ->select('apdetail.*', 'apstatus.bssid', 'apstatus.wac', 'apstatus.time', 'apstatus.h00', 'apstatus.h01', 'apstatus.h02', 'apstatus.h03', 'apstatus.h04', 'apstatus.h05', 'apstatus.h06', 'apstatus.h07', 'apstatus.h08', 'apstatus.h09', 'apstatus.h10', 'apstatus.h11', 'apstatus.h12', 'apstatus.h13', 'apstatus.h14', 'apstatus.h15', 'apstatus.h16', 'apstatus.h17', 'apstatus.h18', 'apstatus.h19', 'apstatus.h20', 'apstatus.h21', 'apstatus.h22', 'apstatus.h23')
            ->get();

        if (request()->ajax()) {
            $ap = DB::table('apdetail')->whereBetween('last_login_at', [Carbon::now()->subHours(8), Carbon::now()])
                  ->orderBy('last_login_at', 'DESC')
                  ->select('*')
                  ->get();
            return DataTables::of($ap)
            ->addColumn('last', function($row) {
                $last = date('d-m-Y H:i:s', strtotime($row->last_login_at));
                return $last;
            })
            ->addColumn('apsn', function($row) {
                $apsn = $row->apsn;
                return $apsn;
            })
            ->rawColumns(['apsn', 'last'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('detail')->with(['dashboard' => $dashboard, 'chart' => $chart]);
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
