<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kartu Keluarga</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/Admin/plugins/fontawesome-free/css/all.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <a href="/KK/index" class="nav-link">Kartu Keluarga</a>
      </li>
    </ul>


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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-users"></i>Kartu Keluarga</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


    <div class="col-sm-12">
    <div class="form-group mb-0">
   <center> <label class="control-label">No. <b>{{$data->no_kk}}</b></label> </center>

    </div>
   </div>


   </div>








              <!-- /.card-header -->
              <div class="card-body">

              <a href="/KK/tambah_view/{{ $data->id }}" class="btn btn-success my-3" target="_blank">Tambah Anggota Keluarga</a><br>
            <br><br>

          
            <div class="col-sm-12">
          <div class="form-group mb-0">
          <label class="control-label">No Induk                   :  <b> {{$data->jemaat->induk}} </b></label>

            </div>
            </div>


           <div class="col-sm-12">
          <div class="form-group mb-0">
          <label class="control-label">Nama Kepala Keluarga       :  <b> {{$data->jemaat->namalengkap_jem}} </b></label>

            </div>
            </div>


            <div class="col-sm-12">
          <div class="form-group mb-0">
          <label class="control-label"> Wilayah                   :  <b> {{$data->jemaat->wilayah}}</b></label>

            </div>
            </div>
            <div class="col-sm-12">
          <div class="form-group mb-0">
          <label class="control-label"> Alamat                     :  <b> {{$data->jemaat->alamat_jem}},
            {{$data->jemaat->kelurahan_jem}},{{$data->jemaat->kecamatan_jem}},{{$data->jemaat->kota_jem}},
            {{$data->jemaat->provinsi_jem}}</b></label>

            </div>
            </div>




              <table id="viewKK" class="table table-bordered table-hover" >
                  <thead>
                  <tr>

                  <th scope="col" >No</th>
                  <th scope="col" >No Induk </th>
                        <th scope="col" >Nama </th>
                        <th scope="col" >Status Dalam Keluarga </th>
                        <th scope="col" >Pendidikan</th>


              

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($det as $k)

                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td >{{ $k->induk}}</td>
                                <td >{{ $k->namalengkap_jem}}</td>
                                <td >{{ $k->status}}</td>
                              
                                <td >{{ $k->pendidikan}}</td>

                        </td>
                      



                            </tr>
                        @endforeach


                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="{{asset('assets/Admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/Admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/Admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/Admin/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {

    $("#viewKK").DataTable();
  });
</script>
</body>
</html>
