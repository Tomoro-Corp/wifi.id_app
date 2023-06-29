<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PraBAC-2022</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" name="viewport">
    {{--
    <link href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" /> --}}
    {{--
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}

    {{--
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> --}}
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="apple-icon.png">
    {{-- <link rel="stylesheet" href="{{asset('style/vendors/font-awesome/css/font-awesome.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--
    <link rel="stylesheet" href="{{asset('style/assets/css/style.css')}}"> --}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Include JSZip library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<!-- Include DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<!-- Include DataTables Select CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">


    <style type="text/css">
        /* default styles here for older browsers. 
       I tend to go for a 600px - 960px width max but using percentages
    */
        body {
            background-color: rgb(244, 244, 244);
        }

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
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;">
        <div class="container">
            <h2><img src="{{asset('images/telkom.png')}}" style="margin-left: 5px;margin-top: 0px;"
                    width="80"><b>Wifi.id Monitor</b></h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-user"></i> {{Auth::user()->email}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="btn text-danger fs-sm">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container bg-white" >
        <div class="p-3">
        <div class="d-flex mb-2">
            <div class="card-header mb-3">
                <h4>Data Apps</h4>
            </div>
            <div class="bg-white ms-auto">
                <div class="d-flex">
                    <i class="text-danger fas fa-clock mt-1"></i>&nbsp; <div id="clock"></div>
                </div>
                <i class="text-danger fas fa-calendar mt-1"></i>
                <script type='text/javascript'>
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
                </div>
        </div>


        {{-- <div class="mt-3 mb-5">
            <div class="row">
                <div class=" mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Chart</h5>
                        </div>
                        <div class="card-body">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="py-2 d-flex">
            <div class="">
                <a class="fw-bold link text-danger" href="/dashboard"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
        <div class="table-responsive">
        <table id="datatable">
            <thead>
                <tr>
                    <th class="text-center" width="30px">Idx</th>
                    <th class="text-center" width="30px">Status</th>
                    <th class="text-center">AP MAC</th>
                    <th class="text-center">AP SN</th>
                    <th class="text-center">AP_TYPE</th>
                    <th class="text-center">AP_NAME</th>
                    <th class="text-center">LOCATION</th>
                    <th class="text-center" width="10%">TREG</th>
                    <th class="text-center">WITEL</th>
                    <th class="text-center">Waktu</th>
                    @for ($i = 0; $i < 24; $i++) 
                        <th class="text-center">
                            {{($i >= 0 ? $i : 24 + $i)}}
                        </th>
                    @endfor
                    <th class="text-center">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php
            $date = new \DateTime("now", new \DateTimeZone('Asia/Jakarta'));
            $currentTime = $date->format('HH:mm:ss');
            ?>
                @foreach($dashboard as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        {{-- {{$data->app_status ? 'active' : 'Down'}} --}}
                        @if ($data->app_status !== NULL)
                        <span class="bg-success text-white rounded-pill px-3"><small>Active</small></span>
                        @else
                        <span class="bg-danger text-white rounded-pill px-3"><small>Down</small></span>
                        @endif
                    </td>
                    <td>{{ $data->apmac}}</td>
                    <td>{{ $data->apsn}}</td>
                    <td>{{ $data->aptype}}</td>
                    <td>{{ $data->apname}}</td>
                    <td>{{ $data->location}}</td>
                    <td>{{ $data->regional}}</td>
                    <td>{{ $data->witel}}</td>
                    <td>{{$data->time}}</td>
                    @php
                    $currentHour = 12;
                    @endphp
                    @for ($i = 0; $i < 24; $i++) @php $field='h' . ($i>= 0 ? $i : 24 + $i)
                        @endphp
                        <td>
                            @if ($data->$field == 0)
                            <span class="badge bg-success p-2 text-white rounded-lg"><i
                                    class="fa fa-arrow-circle-up"></i></span>
                                    <small class="text-success">ON</small>
                            @else
                            <span class="badge bg-danger p-2 text-white rounded-lg"><i
                                    class="fa fa-arrow-circle-down"></i></span>
                                    <small class="text-danger">OFF</small>

                            @endif
                        </td>
                        @endfor
                        <td>{{ ($data->h00) + ($data->h01) + ($data->h02)+ ($data->h03)+ ($data->h04)+ ($data->h05)+
                            ($data->h06)+ ($data->h07)+ ($data->h08)+ ($data->h09)+ ($data->h10)+ ($data->h11)+
                            ($data->h12)+ ($data->h13)+ ($data->h14)+ ($data->h15)+ ($data->h16)+ ($data->h17)+
                            ($data->h18)+ ($data->h19)+ ($data->h20) + ($data->h21) + ($data->h22 + ($data->h23))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<footer class="bg-danger">
    <div class="container text-white py-3">
        <h6 class="text-center">Wifi.id Monitor</h6>
    </div>
</footer>

    <!-- link datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    {!! $chart->script() !!}
    <script>
        //  $(document).ready(function() {
        //      var table = $('#dashboard').DataTable({});
        //      var table = $('#8_hour').DataTable({
        //         serverSide: true,
        //         ajax: '/dashboard',
        //         columns: [
        //             {data: 'DT_RowIndex'},
        //             {data: 'apsn'},
        //             {data: 'last'},
        //         ]
        //      });
        //  });

        $(document).ready(function () {
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excelHtml5',
                    'pdf',
                    'print',
                ],
                select: {
                    style: 'multi'
                }
            });
        });

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
</body>

</html>