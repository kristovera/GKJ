<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Jemaat</title>

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
            <h1 href="/Baptis/create">Form Jemaat</h1>
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
              <br/>
              {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            
                            <br/>
              <form id="quickForm" method="POST" action="/jemaat/tambah_jem/simpan"
                enctype="multipart/form-data">
                <div class="card-body">

                @if(\Session::has('success'))
                            <div class="alert alert-success mt-3">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif

                        @csrf


          <div class="card-body">
         <div class="row">

          <div class="col-md-6">

        <div class="form-group">
            <label>No Induk</label>
            <input type="text" name="induk" class="form-control"  id="kode_jem" value="{{$kode}}" readonly />
        </div>
        <div class="form-group">
        <label for="wilayah">wilayah</label>
             <select class="form-control" name="wilayah"  >
               <option>Pilih</option>
               <option  value="Induk Bulu ">Induk</option>
               <option  value="Weru">Weru</option>
               <option  value="Bugel">Bugel</option>
               <option  value="Karangtengah">Karangtengah</option>
               </select>

        </div>
        <div class="form-group">
        <label for="data" class="col-md-5 control-label">Status Jemaat <b style="color:Tomato;">*</b>  </label>
        <label>
          <input type="radio" name="data" value="Permanen" required>
            Permanen
           </label>
</div>
        <label> Status Sidi dan Baptis </label>
        <div class="form-check">
        <label><input type ="checkbox" name="status_sidi" value="Belum"> Belum Sidi</label><br>
        <label><input type ="checkbox" name="status_sidi" value="Sudah"> Sudah Sidi</label> <br>
        <label><input type ="checkbox" name="status_baptis" value="Belum"> Belum Baptis</label><br>
        <label><input type ="checkbox" name="status_baptis" value="Sudah"> Sudah Baptis</label>
</div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap_jem" class="form-control" required />
        </div>
        <div class="form-group">
        <label for="jk" class="col-md-5 control-label">Jenis Kelamin  <b style="color:Tomato;">*</b>  </label>
        <label>
          <input type="radio" name="jk_jem" value="Pria" required>
            Pria
           </label>   &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;
         <label>
          <input type="radio" name="jk_jem" value="Wanita" required>
             Wanita
          </label>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Tanggal Lahir </label>
            <input type="date" name="tanggal_jem" class="form-control"  required />
</div>
<div class="form-group">
        <label for="status_jem">Status</label>
             <select class="form-control" name="status_jem"  >
               <option>Pilih</option>
               <option  value="Belum Menikah ">Belum Menikah</option>
               <option  value="Menikah">Menikah</option>
               <option  value="Janda">Janda</option>
               <option  value="Duda">Duda</option>
               </select>

</div>
<div class="form-group">
            <label>Alamat </label>
            <input type="text" name="alamat_jem" class="form-control"  required />
           </div>
           <div class="form-group">
            <label>Kelurahan</label>
            <input type="text" name="kelurahan_jem" class="form-control" required />
        </div>



<div class="form-group">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan_jem" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="kota_jem" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" name="provinsi_jem" class="form-control" required />
        </div>
        </div>

      <!--kanan-->
        <div class="col-md-6">

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="nohp_jem" class="form-control"   />
            </div>

        <div class="form-group">
        <label for="statusgereja">Status Gereja</label>
             <select class="form-control" name="statusgereja"  >
               <option>Pilih</option>
               <option  value="jemaat">Jemaat</option>
               <option  value="simpatisan">Simpatisan</option>
               </select>

      </div>


        <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
             <select class="form-control" name="pendidikan"  >
               <option>Pilih</option>
               <option  value="TK">TK</option>
               <option  value="SD">SD</option>
               <option  value="SMP">SMP</option>
               <option  value="SMA">SMA</option>
               <option  value="SMK">SMK</option>
               <option  value="D1">D1</option>
               <option  value="D3">D3</option>
               <option  value="D4">D4</option>
               <option  value="S1">S1</option>
               <option  value="S2">S2</option>
               </select>
      </div>

        <div class="form-group">
        <label for="ilmu">Bidang Ilmu</label>
             <select class="form-control" name="ilmu"  >
               <option>Pilih</option>
               <option  value="Hukum">Hukum</option>
               <option  value="Ekonomi">Ekonomi</option>
               <option  value="Sastra">Sastra</option>
               <option  value="Pendidikan">Pendidikan</option>
               <option  value="Teknologi">Teknologi</option>
               <option  value="Kesehatan">Kesehatan</option>
               <option  value="Sosial">Sosial</option>
               <option  value="Teknik">Teknik</option>
               <option  value="Lainnya">Lainnya</option>
               </select>
      </div>



      <div class="form-group">
            <label>Nama Ayah</label>
            <input type="text" name="ayah" class="form-control"   />
            </div>
            <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="ibu" class="form-control"   />
            </div>
            <div class="form-group">
        <label for="pendapatan">Pendapatan</label>
             <select class="form-control" name="pendapatan"  >
               <option>Pilih</option>
               <option  value="0-500">0-500 rb</option>
               <option  value="500-1">500-1 jt</option>
               <option  value="1-2">1-2 jt</option>
               <option  value="2-3">2-3 jt</option>
               <option  value="lebih dari 3">>3 jt</option>
               </select>
      </div>

            <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="kerja" class="form-control"   />
            </div>

            <div class="row">

              <div class="col-md-12">
                  <div class="form-group">
                  <label>Surat Tanda Sudah Baptis/Sidi</label> <br>
                  <i>*File disatukan dalam pdf</i>
                  <br>
                      <input type="file" name="file" placeholder="Choose file" id="file" accept="application/pdf" required>
                        @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
              </div>



            <button type="submit" class="btn btn-primary">Submit</button>
</form>

                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

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
