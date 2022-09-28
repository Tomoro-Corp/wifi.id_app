<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PraBAC-2022</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <link rel="shortcut icon" href="/images/telkom-logo-small.png" />
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->

    <!-- {{asset('style/')}} -->

    <link rel="stylesheet" href="{{asset('style/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('style/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- link css datatables -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->
</head>
<style type="text/css">
    /* default styles here for older browsers. 
       I tend to go for a 600px - 960px width max but using percentages
    */
    @media only screen and (min-width: 960px) {
        /* styles for browsers larger than 960px; */
    }

    @media only screen and (min-width: 1440px) {
        /* styles for browsers larger than 1440px; */
    }

    @media only screen and (min-width: 2000px) {
        /* for sumo sized (mac) screens */
    }

    @media only screen and (max-device-width: 480px) {
        /* styles for mobile browsers smaller than 480px; (iPhone) */
    }

    @media only screen and (device-width: 768px) {
        /* default iPad screens */
    }

    /* different techniques for iPad screening */
    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
        /* For portrait layouts only */
    }

    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
        /* For landscape layouts only */
    }
</style>

<body>
    <nav>
        <div class="logo">
            <h2><img src=" /images/telkom.png" style="margin-left: 5px;margin-top: 0px;" width="80"><b>Wifi.id Monitor</b></h2>
        </div>
        <h4 font-style: italic;>
            Hai, User!!!
        </h4>
        <ul>
            <li>
                <div id="clock" style="margin-left: 20px;margin-top: 0px;" width="80"></div>
                <script type="text/javascript">
                    <!--
                    function showTime() {
                        var a_p = "";
                        var today = new Date();
                        var curr_hour = today.getHours();
                        var curr_minute = today.getMinutes();
                        var curr_second = today.getSeconds();
                        if (curr_hour < 12) {
                            a_p = "AM";
                        } else {
                            a_p = "PM";
                        }
                        if (curr_hour == 0) {
                            curr_hour = 12;
                        }
                        if (curr_hour > 12) {
                            curr_hour = curr_hour - 12;
                        }
                        curr_hour = checkTime(curr_hour);
                        curr_minute = checkTime(curr_minute);
                        curr_second = checkTime(curr_second);
                        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                    }

                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i;
                        }
                        return i;
                    }
                    setInterval(showTime, 500);
                    //
                    -->
                </script>
                <script type='text/javascript'>
                    <!--
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                    -->
                </script>
            </li>
            <li>
                <div class="btn">
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>


    <div class="card-body">
        <div class="card mb-0 w-100 h-0">
            <div class="form-group">
                <div class="content mt-3">
                    <div class="col-md-3">
                        <div class="form-body">

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="dropdown">
                                        <label>Periode</label>
                                        <div class="input-group input-medium date-picker input-daterange" data-date="20180408" data-date-format="yyyymmdd">
                                            <input type="date" class="form-control" id="periode" name="periode" value="20220601" onchange="getTable();">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="float-group">
                                        <label>Treg</label>
                                        <select class="form-control" name="reg" id="reg">
                                            <option value="1">Regional 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Unduh</label>
                                    <div class="float-group">
                                        <a class="btn btn-default" href="{{ route('export') }}" target="_blank"><i class="fa fa-print"></i> Cetak Laporan</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="card-body" style="margin-top: 1px">
    <div class="card mb-0 w-100">
        <div class="row">
            <div class="col-md-12">
                @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @elseif($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header" style="background-color:#555555;color:white;">
                        DATATABLES
                    </div>
                    <div class="body">
                        <div class="table table-responsive">
                            <table id="dashboard" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;" width="30px">Idx</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">AP MAC</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">AP SN</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">AP_TYPE</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">AP_NAME</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">LOCATION</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;" width="10%">TREG</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">WITEL</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">Tanggal</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">00</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">01</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">02</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">03</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">04</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">05</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">06</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">07</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">08</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">09</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">10</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">11</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">12</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">13</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">14</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">15</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">16</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">17</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">18</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">19</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">20</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">21</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">22</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">23</th>
                                        <th class="text-center" scope="col" style="background-color:#ED3237;color:white;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php
                                    $date = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
                                    $currentTime = $date->format('Y-m-d h');
                                    ?>
                                    @foreach($dashboard as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->apmac}}</td>
                                        <td>{{ $data->apsn}}</td>
                                        <td>{{ $data->aptype}}</td>
                                        <td>{{ $data->apname}}</td>
                                        <td>{{ $data->location}}</td>
                                        <td>{{ $data->regional}}</td>
                                        <td>{{ $data->witel}}</td>
                                        <td>{{ $data->time}}</td>
                                        <td>{{ $currentTime>$data->time.' 00' ?($data->h00>=2 ?'0': '1'):$data->h00}}</td>
                                        <td>{{ $currentTime>$data->time.' 01' ?($data->h01>=2 ?'0': '1'):$data->h01}}</td>
                                        <td>{{ $currentTime>$data->time.' 02' ?($data->h02>=2 ?'0': '1'):$data->h02}}</td>
                                        <td>{{ $currentTime>$data->time.' 03' ?($data->h03>=2 ?'0': '1'):$data->h03}}</td>
                                        <td>{{ $currentTime>$data->time.' 04' ?($data->h04>=2 ?'0': '1'):$data->h04}}</td>
                                        <td>{{ $currentTime>$data->time.' 05' ?($data->h05>=2 ?'0': '1'):$data->h05}}</td>
                                        <td>{{ $currentTime>$data->time.' 06' ?($data->h06>=2 ?'0': '1'):$data->h06}}</td>
                                        <td>{{ $currentTime>$data->time.' 07' ?($data->h07>=2 ?'0': '1'):$data->h07}}</td>
                                        <td>{{ $currentTime>$data->time.' 08' ?($data->h08>=2 ?'0': '1'):$data->h08}}</td>
                                        <td>{{ $currentTime>$data->time.' 09' ?($data->h09>=2 ?'0': '1'):$data->h09}}</td>
                                        <td>{{ $currentTime>$data->time.' 10' ?($data->h10>=2 ?'0': '1'):$data->h10}}</td>
                                        <td>{{ $currentTime>$data->time.' 11' ?($data->h11>=2 ?'0': '1'):$data->h11}}</td>
                                        <td>{{ $currentTime>$data->time.' 12' ?($data->h12>=2 ?'0': '1'):$data->h12}}</td>
                                        <td>{{ $currentTime>$data->time.' 13' ?($data->h13>=2 ?'0': '1'):$data->h13}}</td>
                                        <td>{{ $currentTime>$data->time.' 14' ?($data->h14>=2 ?'0': '1'):$data->h14}}</td>
                                        <td>{{ $currentTime>$data->time.' 15' ?($data->h15>=2 ?'0': '1'):$data->h15}}</td>
                                        <td>{{ $currentTime>$data->time.' 16' ?($data->h16>=2 ?'0': '1'):$data->h16}}</td>
                                        <td>{{ $currentTime>$data->time.' 17' ?($data->h17>=2 ?'0': '1'):$data->h17}}</td>
                                        <td>{{ $currentTime>$data->time.' 18' ?($data->h18>=2 ?'0': '1'):$data->h18}}</td>
                                        <td>{{ $currentTime>$data->time.' 19' ?($data->h19>=2 ?'0': '1'):$data->h19}}</td>
                                        <td>{{ $currentTime>$data->time.' 20' ?($data->h20>=2 ?'0': '1'):$data->h20}}</td>
                                        <td>{{ $currentTime>$data->time.' 21' ?($data->h21>=2 ?'0': '1'):$data->h21}}</td>
                                        <td>{{ $currentTime>$data->time.' 22' ?($data->h22>=2 ?'0': '1'):$data->h22}}</td>
                                        <td>{{ $currentTime>$data->time.' 23' ?($data->h23>=2 ?'0': '1'):$data->h23}}</td>
                                        <td>{{ ($data->h00) + ($data->h01) + ($data->h02)+ ($data->h03)+ ($data->h04)+ ($data->h05)+ ($data->h06)+ ($data->h07)+ ($data->h08)+ ($data->h09)+ ($data->h10)+ ($data->h11)+ ($data->h12)+ ($data->h13)+ ($data->h14)+ ($data->h15)+ ($data->h16)+ ($data->h17)+ ($data->h18)+ ($data->h19)+ ($data->h20) + ($data->h21) + ($data->h22 + ($data->h23))}}</td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#dashboard').DataTable();
    });
</script>

<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- link datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>
<script>
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById('datePicker').setAttribute('max', today);
    changeTitleDate();

    let select = document.getElementById('datePicker')
    select.onchange = function() {
        this.form.submit();
    };

    function changeTitleDate() {
        let datePicker = document.getElementById('datePicker').value;
        let date = new Date(datePicker);
        let dayName = date.toLocaleString("in-ID", {
            weekday: 'long'
        })
        let dd = String(date.getDate()).padStart(2, '0');
        let monthName = date.toLocaleString("in-ID", {
            month: 'long'
        })
        let yyyy = date.getFullYear();
        let titleDate = dayName.toLocaleUpperCase() + ' / ' + dd + ' ' + monthName.toLocaleUpperCase() + ' ' + yyyy;
        document.getElementById('titleDate').innerHTML = '(' + titleDate + ')';

    }
</script>

</html>