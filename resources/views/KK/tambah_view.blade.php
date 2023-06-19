<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tambah Anggota Keluarga</title>

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

<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

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
        <a href="/KK/index" class="nav-link">Home</a>
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
          <div class="col-sm-6">
            <h1>Form Tambah Anggota Keluarga</h1>
          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">

              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="/KK/index">
                <div class="card-body">

                        @csrf

                <div class="row">
               <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-body">
                <!-- Date dd/mm/yyyy -->


                <!-- AREA FORM -->

          <h4 class="card-title">Tambah Anggota Keluarga <b>{{ $data->jemaat->namalengkap_jem }}</b></h4>

        <br><br>
                    <div class="container  col-md-12">
                                              <input type="hidden" required="required" name="kartukeluarga_id" value="{{ $data->id }}" readonly>
                                            </div>

                                            <div class="container  col-md-12">
                                              <label>Anggota Keluarga <b style="color:Tomato;">*</b></label>
                                              <select id="jemaat_id"  name="jemaat_id" class="custom-select mb-3" >
                                                <option value="">Pilih Anggota Keluarga</option>
                                        
                                                @foreach($jemaat as $a)
                                                <option value="{{ $a->id }}">{{ $a->induk }}-{{ $a->namalengkap_jem }}</option>
                                                
                                                @endforeach
                                              </select>
                                            </div>

                                            <div class="form-group">
        <label for="status">Status Dalam Keluarga</label>
             <select class="form-control" name="status"  >
               <option>Pilih</option>
               <option  value="Istri">Istri</option>
               <option  value="Anak">Anak</option>
              
             
             
               </select>
      </div>
&nbsp;





                      <div class="col-md-12">
                     <button type="submit" class="btn btn-primary col-md-5" id="submit">
                                  Simpan
                      </button>

                      </div>
                      &nbsp;

        <!-- TUTUP AREA FORM -->

      </form>
                  <!-- /.input group -->
                </div>


            <!-- /.card -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- bs-custom-file-input -->
<script src="{{asset('assets/Admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/Admin/dist/js/adminlte.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('assets/Admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


</body>
</html>
