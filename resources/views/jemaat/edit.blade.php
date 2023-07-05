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
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data Jemaat</h3>
              </div>



	            <form action="/jemaat/ubah/{{ $je->id }}"  enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
                @method('PUT')

          <div class="card-body">
         <div class="row">
          <div class="col-md-6">


        <div class="form-group">
            <label>No Induk</label>
            <input type="text" name="induk" class="form-control" value="{{ $je->induk}}"  readonly />
        </div>

        <div class="form-group">
              <label for="wilayah">Wilayah</label>
              <select name="wilayah" id="wilayah" class="form-control">
              <option>Pilih</option>
               <option  value="Induk Bulu "{{ $je->wilayah == 'Induk Bulu'? 'selected': ''}}>Induk</option>
               <option  value="Weru"{{ $je->wilayah == 'Weru'? 'selected': ''}}>Weru</option>
               <option  value="Bugel"{{ $je->wilayah == 'Bugel'? 'selected': ''}}>Bugel</option>
               <option  value="Karangtengah"{{ $je->wilayah == 'Karangtengah'? 'selected': ''}}>Karangtengah</option>
               </select>
            </div>
         

            <label> Status Sidi dan Baptis </label>
        <div class="form-check">
        <label><input  type ="checkbox" name="status_sidi" id="status_sidi"  value="Belum" {{ str_contains($jemaat->status_sidi, 'Belum')  ? 'checked' : '' }}> Belum Sidi</label><br>
        <label><input type ="checkbox" name="status_sidi"  id="status_sidi"  value="Sudah"{{ str_contains($jemaat->status_sidi, 'Sudah')  ? 'checked' : '' }}> Sudah Sidi</label> <br>
        <label><input type ="checkbox" name="status_baptis"   id="status_baptis" value="Belum"{{ str_contains($jemaat->status_baptis, 'Belum')  ? 'checked' : '' }}> Belum Baptis</label><br>
        <label><input  type ="checkbox" name="status_baptis"  id="status_baptis"   value="Sudah"{{ str_contains($jemaat->status_baptis, 'Sudah')? 'checked' : '' }}>Sudah Baptis</label>
</div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap_jem" class="form-control" value="{{ $je->namalengkap_jem}}" required />
        </div>
        <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin </label> <br>
                    <div class="form-check form-check-inline">
                        <label for="jk_jem">
                            <input type="radio" name="jk_jem" value="Wanita" id="jk_jem" {{$je->jk_jem == 'Wanita'? 'checked' : ''}} >Wanita
                            <input type="radio" name="jk_jem" value="Pria" id="jk_jem" {{$je->jk_jem == 'Pria'? 'checked' : ''}} >Pria
                        </label>
                        </div>
                </div>
        <div class="form-group">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $je->tempat}}"required />
        </div>

        <div class="form-group">
            <label>Tanggal </label>
            <input type="date" name="tanggal_jem" class="form-control" value="{{ $je->tanggal_jem}}"  required />
        </div>
        <div class="form-group">
              <label for="status_jem">Status</label>
              <select name="status_jem" id="status_jem" class="form-control">
                <option value="Belum Menikah" {{ $je->status_jem == 'Belum Menikah'? 'selected': ''}}>Belum Menikah</option>
                <option value="Menikah" {{ $je->status_jem == 'Menikah'? 'selected': ''}}>Menikah</option>
                <option value="Janda" {{ $je->status_jem == 'Janda'? 'selected': ''}}>Janda</option>
                <option value="Duda" {{ $je->status_jem == 'Duda'? 'selected': ''}}>Duda</option>
              </select>
            </div>


        <div class="form-group">
            <label>Alamat </label>
            <input type="text" name="alamat_jem" class="form-control"  value="{{ $je->alamat_jem}}"required />
          </div>

        <div class="form-group">
            <label>Kelurahan </label>
            <input type="text" name="kelurahan_jem" class="form-control"  value="{{ $je->kelurahan_jem}}"required />
        </div>

        <div class="form-group">
            <label>Kecamatan </label>
            <input type="text" name="kecamatan_jem" class="form-control"  value="{{ $je->kecamatan_jem}}"required />
        </div>

        <div class="form-group">
            <label>Kota </label>
            <input type="text" name="kota_jem" class="form-control"  value="{{ $je->kota_jem}}"required />
        </div>

        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" name="provinsi_jem" class="form-control"  value="{{ $je->provinsi_jem}}"required />
        </div>

        </div>
<div class="col-md-6">

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="nohp_jem" class="form-control" value="{{ $je->nohp_jem }}"  required />
        </div>

        <div class="form-group">
              <label for="statusgereja">Status Gereja</label>
              <select name="statusgereja" id="statusgereja" class="form-control">
                <option value="Jemaat" {{ $je->statusgereja == 'Jemaat'? 'selected': ''}}>Jemaat</option>
                <option value="Simpatisan" {{ $je->statusgereja == 'Simpatisan'? 'selected': ''}}>Simpatisan</option>

              </select>
            </div>


        <div class="form-group">
              <label for="pendidikan">Pendidikan</label>
              <select name="pendidikan" id="pendidikan" class="form-control">
              <option value="Belum" {{ $je->pendidikan == 'Belum'? 'selected': ''}}>Belum</option>
                <option value="TK" {{ $je->pendidikan == 'TK'? 'selected': ''}}>TK</option>
                <option value="SD" {{ $je->pendidikan == 'SD'? 'selected': ''}}>SD</option>
                <option value="SMP" {{ $je->pendidikan == 'SMP'? 'selected': ''}}>SMP</option>
                <option value="SMA" {{ $je->pendidikan == 'SMA'? 'selected': ''}}>SMA</option>
                <option value="SMK" {{ $je->pendidikan == 'SMK'? 'selected': ''}}>SMK</option>
                <option value="D1" {{ $je->pendidikan == 'D1'? 'selected': ''}}>D1</option>
                <option value="D3" {{ $je->pendidikan == 'D3'? 'selected': ''}}>D3</option>
                <option value="D4" {{ $je->pendidikan == 'D4'? 'selected': ''}}>D4</option>
                <option value="S1" {{ $je->pendidikan == 'S1'? 'selected': ''}}>S1</option>
                <option value="S2" {{ $je->pendidikan == 'S2'? 'selected': ''}}>S2</option>
              </select>
            </div>


        <div class="form-group">
        <label for="ilmu">Bidang Ilmu</label>
             <select class="form-control" name="ilmu" id="ilmu"  >
               <option>Pilih</option>
               <option  value="Hukum" {{ $je->ilmu == 'Hukum'? 'selected': ''}}>Hukum</option>
               <option  value="Ekonomi" {{ $je->ilmu == 'Ekonomi'? 'selected': ''}}>Ekonomi</option>
               <option  value="Sastra"{{ $je->ilmu == 'Sastra'? 'selected': ''}}>Sastra</option>
               <option  value="Pendidikan" {{ $je->ilmu == 'Pendidikan'? 'selected': ''}}>Pendidikan</option>
               <option  value="Teknologi" {{ $je->ilmu == 'Teknologi'? 'selected': ''}}>Teknologi</option>
               <option  value="Kesehatan" {{ $je->ilmu == 'Kesehatan'? 'selected': ''}}>Kesehatan</option>
               <option  value="Sosial" {{ $je->ilmu == 'Sosial'? 'selected': ''}}>Sosial</option>
               <option  value="Teknik" {{ $je->ilmu == 'Teknik'? 'selected': ''}}>Teknik</option>
               <option  value="Lainnya" {{ $je->ilmu == 'Lainnya'? 'selected': ''}}>Lainnya</option>
               </select>
      </div>
    


      <div class="form-group">
            <label>Nama Ayah</label>
            <input type="text" name="ayah" class="form-control"  value= "{{ $je->ayah }}" />
            </div>
            <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="ibu" class="form-control" value="{{ $je->ibu }}"  />
            </div>

            <div class="form-group">
        <label for="pendapatan">Pendapatan</label>
             <select class="form-control" name="pendapatan" id="pendapatan" >
               <option>Pilih</option>
               <option  value="0-500" {{ $je->pendapatan == '0-500'? 'selected': ''}}>0-500 rb</option>
               <option  value="500-1"{{ $je->pendapatan == '500-1'? 'selected': ''}}>500-1 jt</option>
               <option  value="1-2"{{ $je->pendapatan == '1-2'? 'selected': ''}}>1-2 jt</option>
               <option  value="2-3"{{ $je->pendapatan == '2-3'? 'selected': ''}}>2-3 jt</option>
               <option  value="lebih dari 3"{{ $je->pendapatan == 'lebih dari 3'? 'selected': ''}}>>3 jt</option>
               </select>
      </div>

            <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="kerja" class="form-control" value="{{ $je->kerja }}" required />
            </div>

            <div class="row">



            <button type="submit" class="btn btn-primary">Submit</button>
</form>

                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

            <!-- /.card -->
          <!--/.col (left) -->
          <!-- right column -->

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
