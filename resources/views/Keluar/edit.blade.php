<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Atestasi Keluar</title>

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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
 

      <!-- SidebarSearch Form -->
    
      <!-- Sidebar Menu -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    @include('aside-admin')
  </aside>
  
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Atestasi Keluar</h1>
          </div>
       

        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- Main content -->
   <!-- Main content -->

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              
              </div>
              
              
            
	            <form action="/Keluar/ubah/ {{$k->id}}" method="post">
              {{ csrf_field() }}
                @method('PUT')
           
          <div class="card-body">
         <div class="row">
          <div class="col-md-6">
             
          <div class="form-group">
         <input type="hidden" required="required" name="jemaat_id" value="{{ $k->id }}" readonly>
         </div>

         <div class="form-group">
                <label for="jemaat_id">Nama Lengkap</label>
                <input type="text"  class="form-control" value= " {{$k->jemaat->namalengkap_jem}} "
 readonly />

        </div>
        
        <div class="form-group">
            <label>Tanggal Keluar</label>
            <input type="date" name="tgl_keluar" class="form-control" id="tgl_keluar"  
              value="{{ $k->tgl_keluar}}"/>
        </div>
        
        <div class="form-group">
            <label>Alasan</label>
            <input type="text" name="ket_keluar" class="form-control" id="ket_keluar"  
             value="{{ $k->ket_keluar}}"/>
        </div>
        
        <div class="form-group">
            <label>Gereja Yang Di Tuju</label>
            <input type="text" name="gerejadituju" class="form-control" id="gerejadituju" 
              value="{{ $k->gerejadituju}}"/>
        </div>

           
        <div class="form-group">
            <label>No Hp Gereja</label>
            <input type="text" name="notelp_keluar" class="form-control" id="notelp_keluar"  
             value="{{ $k->notelp_keluar}}"/>
        </div>
        


        
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
       
            </div>
            <!-- /.card -->
            </div>
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