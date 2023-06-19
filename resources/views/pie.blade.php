<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/Admin/dist/css/adminlte.min.css')}}">

<!-- autofill -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:900px;
    margin: 5px;
   }
  </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Sidi/index" class="nav-link">Home</a>
      </li>

    </ul>



    <!-- Right navbar links -->


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    @include('aside-admin')
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">



        </div>
      </div><!-- /.container-fluid -->
    </section>

    <body id="body">

    <div class="container">

        <!-- Chart -->
        <div class="row">

            <select name="tahun_id" id="tahun_id" class="custom-select" onchange="getYear();" style="margin:5px; width:10%;">
                <option>Pilih tahun</option>
                <?php for($i=0;$i< sizeOf($tahun);$i++)
                {
                ?>
                    <option value="{{$i+1}}">{{$tahun[$i]}}</option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="row">

            <div class="col">
                <div class="card shadow my-3">
                    <div class="card-header bg-blue text-black">
                        <h6>Presentasi Jenis Kelamin</h6>
                    </div>
                    <div class="card-body">
                        <div id="pie_chart">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow my-3">
                    <div class="card-header bg-blue text-black">
                        <h6>Presentasi Status Gereja</h6>
                    </div>
                    <div class="card-body">
                        <div id="status">
                        </div>
                    </div>
                </div>
              

            </div>
        </div>
     
        

       

<!-- jQuery -->
<script src="{{asset('assets/Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('assets/Admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/Admin/dist/js/adminlte.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('assets/Admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>




<script type="text/javascript">
        var analytics = '{!! $jk !!}';
        var status = '{!! $stat !!}';

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = new google.visualization.arrayToDataTable($.parseJSON(analytics));

            var options = {
//                 title : 'Persentasi Jenis Kelamin'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChartStatusGereja);

        function drawChartStatusGereja()
        {
            var data = new google.visualization.arrayToDataTable($.parseJSON(status));

            var options = {
//                 title : 'Presentasi Status Gereja'
            };
            var chart = new google.visualization.PieChart(document.getElementById('status'));
            chart.draw(data, options);
        }


        function getYear()
        {

            var year = $("#tahun_id").find(":selected").text();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "/pie/"+year,
                data: {

                },

                success: function(response) {
                    if(response){
                        analytics = response[0];
                        status = response[1];
                        console.log(year);
                        new google.charts.setOnLoadCallback(drawChart);
                        new google.charts.setOnLoadCallback(drawChartStatusGereja);
                    }
                }
            })
        }

 </script>





</body>




</html>
