<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/Admin/dist/css/adminlte.min.css')}}">
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
        <a href="/home" class="nav-link">Home</a>
      </li>

    </ul>
</nav>



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

<div class="col">
    <div class="card shadow my-3">
        <div class="card-header bg-blue text-black">
            <h6> Persentase Jenis Kelamin</h6>
        </div>
        <div class="card-body">
            <div id="jk">
            </div>
        </div>
    </div>
</div>
<div class="col">
    <div class="card shadow my-3">
        <div class="card-header bg-blue text-black">
            <h6> Persentase Status Keanggotaan</h6>
        </div>
        <div class="card-body">
            <div id="status">
            </div>
        </div>
    </div>
  

</div>
</div>



  <!-- Chart -->


<div class="row">
<div class="col-sm-6">

    <div class="card shadow my-3">
                    <div class="card-header bg-blue text-black">
                        <h6> Persentase Status Jemaat</h6>
                    </div>
                    <div class="card-body">
                        <div id="jum_sidi">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card shadow my-3">
                    <div class="card-header bg-blue text-black">
                        <h6> Persentase Status Perkawinan</h6>
                    </div>
                    <div class="card-body">
                        <div id="kawin">
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

<script src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
        var analytics = '{!! $kawin !!}';
        var sidi = '{!! $jum_sidi !!}';
    
        var jk = '{!! $jk !!}';
        var status = '{!! $status !!}';
   
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChartJk);

        function drawChartJk()
        {
             var data = new google.visualization.arrayToDataTable($.parseJSON(jk));

            var options = {
//                 title : 'Persentasi Jenis Kelamin'
                    };
            var chart = new google.visualization.PieChart(document.getElementById('jk'));
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


        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = new google.visualization.arrayToDataTable($.parseJSON(analytics));

            var options = {
//                 title : 'Persentasi Jenis Kelamin'
            };
            var chart = new google.visualization.PieChart(document.getElementById('kawin'));
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChartSidi);
        
        function drawChartSidi()
        {
          var data =  new google.visualization.arrayToDataTable($.parseJSON(sidi));
     

            var options = {

            };
            var chart = new google.visualization.PieChart(document.getElementById('jum_sidi'));
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
