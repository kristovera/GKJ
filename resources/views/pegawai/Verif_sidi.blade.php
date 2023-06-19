<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Baptis</title>

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
    
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
          
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">


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
            <h1>Verifikasi </h1>
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
                <h3 class="card-title">Verifikasi Data Sidi</h3>
              </div>
              
              
            
	            <form action="/pegawai/ubah/{{ $s->id }}" method="post">
              {{ csrf_field() }}
                @method('PUT')
           
          <div class="card-body">
         <div class="row">
          <div class="col-md-6">

          <div class="col-md-6">
         <input type="hidden" required="required" name="jemaat_id" value="{{ $s->id }}" readonly>
         </div>

         <div class="form-group">
                <label for="jemaat_id">Nama Lengkap</label>
                <input type="text"  class="form-control" value= "{{$s->jemaat->namalengkap_jem}}" readonly />
        </div>

 <div class="form-group">
            <label>Tanggal Sidi</label>
            <input type="date" name="tglsidi" class="form-control" id="tglsidi"    value="{{ $s->tglsidi}}" />
        </div>

            <div class="form-group">
            <label>Waktu</label>
            <input type="text" name="waktu_sidi" class="form-control"  id="waktu_sidi"  value="{{ $s->waktu_sidi}}"/>
        </div>

        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari_sidi" class="form-control"  id="hari_sidi"  value="{{ $s->hari_sidi}}" readonly />
</div>
        
      
        <div class="form-group">
            <label>Tempat</label>
            <input type="text" name="tempat_sidi" class="form-control" id="tempat_sidi"   value="{{ $s->tempat_sidi}}" />
</div>
        <div class="form-group">
            <label>Pendeta</label>
            <input type="text" name="pendeta_sidi" class="form-control" id="pendeta_sidi"    value="{{ $s->pendeta_sidi}}" readonly/>
        </div>
        
   
        <div class="form-group">
                            <label for="verif_sidi" class="font-weight-bold">Verifikasi</label>
                            <select class="form-control" name="verif_sidi" id="verif_sidi" >
                            <option >--Pilihan--</option>
                            <option  value="Pending" {{ $s->verif_sidi == 'Pending'? 'selected': ''}}>Pending</option>
                            
                            <option  value="Terima" {{ $s->verif_sidi == 'Terima'? 'selected': ''}}>Terima</option>
                            <option  value="Tolak" {{ $s->verif_sidi == 'Tolak'? 'selected': ''}}>Tolak</option>
                            

                         
                            
                            </select>
                        </div>


        
                <!-- /.card-body -->
                <div class="col-md-6">
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