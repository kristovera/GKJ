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

    <!-- SEARCH FORM -->
  

    <!-- Right navbar links -->

     
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
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
            <h1 >Edit Data Atestasi</h1>
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
              
              
            
	            <form action="/Daftar/ubah/{{ $data->id }}" method="post">
              {{ csrf_field() }}
                @method('PUT')
           
          <div class="card-body">
         <div class="row">
          <div class="col-md-6">
                
        <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="date" name="tgl_masuk" class="form-control" value="{{ $data->tgl_masuk}}" readonly />
        </div>


           
        <div class="form-group">
            <label>Status Jemaat</label>
            <input type="text" name="data" class="form-control" value="{{ $data->data}}" readonly   />
        </div>
        <div class="form-group">
            <label>Asal Gereja</label>
            <input type="text" name="asal_gereja" class="form-control" value="{{ $data->asal_gereja}}"  />
        </div>
        <div class="form-group">
            <label>Alamat Gereja</label>
            <input type="text" name="alamat_gereja" class="form-control" value="{{ $data->alamat_gereja}}" />
        </div>

        
        <div class="form-group">
            <label>No Induk</label>
            <input type="text" name="induk" class="form-control" value="{{ $data->induk}}"  readonly />
        </div>

        <div class="form-group">
              <label for="wilayah">Wilayah</label>
              <select name="wilayah" id="wilayah" class="form-control">
              <option>Pilih</option>
               <option  value="Induk Bulu "{{ $data->wilayah == 'Induk Bulu'? 'selected': ''}}>Induk</option>
               <option  value="Weru"{{ $data->wilayah == 'Weru'? 'selected': ''}}>Weru</option>
               <option  value="Bugel"{{ $data->wilayah == 'Bugel'? 'selected': ''}}>Bugel</option>
               <option  value="Karangtengah"{{ $data->wilayah == 'Karangtengah'? 'selected': ''}}>Karangtengah</option>
               </select>
            </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap_jem" class="form-control" value="{{ $data->namalengkap_jem}}" required />
        </div>
        <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin </label> <br>
                    <div class="form-check form-check-inline">
                        <label for="jk_jem">
                            <input type="radio" name="jk_jem" value="Wanita" id="jk_jem" {{$data->jk_jem == 'Wanita'? 'checked' : ''}} >Wanita </input>
                            <input type="radio" name="jk_jem" value="Pria" id="jk_jem" {{$data->jk_jem == 'Pria'? 'checked' : ''}} >Pria </input>
                        </label>
                        </div>
                </div>
        <div class="form-group">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $data->tempat}}"required />
        </div>

        <div class="form-group">
            <label>Tanggal </label>
            <input type="date" name="tanggal_jem" class="form-control" value="{{ $data->tanggal_jem}}"  required />
        </div> 
        <div class="form-group">
              <label for="status_jem">Status Prkawinan</label>
              <select name="status_kawin" id="status_kawin" class="form-control">
                <option value="Belum Menikah" {{ $data->status_kawin == 'Belum Menikah'? 'selected': ''}}>Belum Menikah</option>
                <option value="Menikah" {{ $data->status_kawin == 'Menikah'? 'selected': ''}}>Menikah</option>
                <option value="Janda" {{ $data->status_kawin == 'Janda'? 'selected': ''}}>Janda</option>
                <option value="Duda" {{ $data->status_kawin == 'Duda'? 'selected': ''}}>Duda</option>
              </select>
            </div>
     

        <div class="form-group">
            <label>Alamat </label>
            <input type="text" name="alamat_jem" class="form-control"  value="{{ $data->alamat_jem}}"required />
          </div> 

        <div class="form-group">
            <label>Kelurahan </label>
            <input type="text" name="kelurahan_jem" class="form-control"  value="{{ $data->kelurahan_jem}}"required />
        </div> 

        <div class="form-group">
            <label>Kecamatan </label>
            <input type="text" name="kecamatan_jem" class="form-control"  value="{{ $data->kecamatan_jem}}"required />
        </div> 

        <div class="form-group">
            <label>Kota </label>
            <input type="text" name="kota_jem" class="form-control"  value="{{ $data->kota_jem}}"required />
        </div> 

        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" name="provinsi_jem" class="form-control"  value="{{ $data->provinsi_jem}}"required />
        </div> 

        </div>
<div class="col-md-6">

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="nohp_jem" class="form-control" value="{{ $data->nohp_jem }}"  required />
        </div> 
         
        <div class="form-group">
              <label for="statusgereja">Status Jemaat</label>
              <select name="statusgereja" id="status_jem" class="form-control">
                <option value="Jemaat" {{ $data->statusgereja == 'Jemaat'? 'selected': ''}}>Jemaat</option>
                <option value="Simpatisan" {{ $data->statusgereja == 'Simpatisan'? 'selected': ''}}>Simpatisan</option>
              
              </select>
            </div>

         
        <div class="form-group">
              <label for="pendidikan">Pendidikan</label>
              <select name="pendidikan" id="pendidikan" class="form-control">
                <option value="TK" {{ $data->pendidikan == 'TK'? 'selected': ''}}>TK</option>
                <option value="SD" {{ $data->pendidikan == 'SD'? 'selected': ''}}>SD</option>
                <option value="SMP" {{ $data->pendidikan == 'SMP'? 'selected': ''}}>SMP</option>
                <option value="SMA" {{ $data->pendidikan == 'SMA'? 'selected': ''}}>SMA</option>
                <option value="SMK" {{ $data->pendidikan == 'SMK'? 'selected': ''}}>SMK</option>
                <option value="D1" {{ $data->pendidikan == 'D1'? 'selected': ''}}>D1</option>
                <option value="D3" {{ $data->pendidikan == 'D3'? 'selected': ''}}>D3</option>
                <option value="D4" {{ $data->pendidikan == 'D4'? 'selected': ''}}>D4</option>
                <option value="S1" {{ $data->pendidikan == 'S1'? 'selected': ''}}>S1</option>
                <option value="S2" {{ $data->pendidikan == 'S2'? 'selected': ''}}>S2</option>
              </select>
            </div>

                
        <div class="form-group">
        <label for="ilmu">Bidang Ilmu</label>
             <select class="form-control" name="ilmu" id="ilmu"  >
               <option>Pilih</option>
               <option  value="Hukum" {{ $data->ilmu == 'Hukum'? 'selected': ''}}>Hukum</option>
               <option  value="Ekonomi" {{ $data->ilmu == 'Ekonomi'? 'selected': ''}}>Ekonomi</option>
               <option  value="Sastra"{{ $data->ilmu == 'Sastra'? 'selected': ''}}>Sastra</option>
               <option  value="Pendidikan" {{ $data->ilmu == 'Pendidikan'? 'selected': ''}}>Pendidikan</option>
               <option  value="Teknologi" {{ $data->ilmu == 'Teknologi'? 'selected': ''}}>Teknologi</option>
               <option  value="Kesehatan" {{ $data->ilmu == 'Kesehatan'? 'selected': ''}}>Kesehatan</option>
               <option  value="Sosial" {{ $data->ilmu == 'Sosial'? 'selected': ''}}>Sosial</option>
               <option  value="Teknik" {{ $data->ilmu == 'Teknik'? 'selected': ''}}>Teknik</option>
               <option  value="Lainnya" {{ $data->ilmu == 'Lainnya'? 'selected': ''}}>Lainnya</option>
               </select>
      </div>
   
   

      <div class="form-group">
            <label>Nama Ayah</label>
            <input type="text" name="ayah" class="form-control"  value= "{{ $data->ayah }}" />
            </div> 
            <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="ibu" class="form-control" value="{{ $data->ibu }}"  />
            </div>

            <div class="form-group">
        <label for="pendapatan">Pendapatan</label>
             <select class="form-control" name="pendapatan" id="pendapatan" >
               <option>Pilih</option>
               <option  value="0-500" {{ $data->pendapatan == '0-500'? 'selected': ''}}>0-500 rb</option>
               <option  value="500-1"{{ $data->pendapatan == '500-1'? 'selected': ''}}>500-1 jt</option>
               <option  value="1-2"{{ $data->pendapatan == '1-2'? 'selected': ''}}>1-2 jt</option>
               <option  value="2-3"{{ $data->pendapatan == '2-3'? 'selected': ''}}>2-3 jt</option>
               <option  value="lebih dari 3"{{ $data->pendapatan == 'lebih dari 3'? 'selected': ''}}>>3 jt</option>
               </select>
      </div>

            <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="kerja" class="form-control" value="{{ $data->kerja }}" required />
            </div> 
            
          
                            

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