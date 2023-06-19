<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atestasi Keluar</title>

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
   
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 

 <!-- Sidebar -->

 @include('aside-admin')
 
      <!-- Sidebar user panel (optional) -->
     
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-15">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Atestasi Keluar</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
          
                <table id="keluar" class="table table-bordered table-hover"><br>
                  <thead>
                  <tr>
                       <th> No </th>
                        
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">No Induk</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Alamat</th>
                  
                       
                        <th scope="col">No HP</th>
                        <th scope="col">Alasan</th>
                        <th scope="col">Gereja yang diTuju</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP Gereja</th>
                        <th scope="col" >Pekerjaan</th>
                        <th scope="col" >Berkas</th>
                        <th scope="col" >Status</th>
          
                        <th scope="col" >Aksi</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                                   
                  @foreach($data as $k)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                               
                                <td >{{ $k->tgl_keluar}} </td>
                                <td >{{ $k->induk}}</td>
                                <td >{{ $k->namalengkap_jem}}</td>
                                <td >{{ $k->tempat}},{{ $k->tanggal_jem}}</td>
                             
                                <td >{{ $k->alamat_jem}},{{ $k->kelurahan_jem}},
                                  {{ $k->kecamatan_jem}},
                                  {{ $k->kota_jem}}, {{ $k->provinsi_jem}}</td>
                                  <td >{{ $k->nohp_jem}} </td>
                                  
                                  <td >{{ $k->ket_keluar}}</td>
                                <td >{{ $k->gerejadituju}} </td>
                                <td >{{ $k->alamat_keluar}}</td>
                                <td >{{ $k->notelp_keluar}}</td>
                                <td >{{ $k->kerja}}</td>
                                <td>
                                
                                <a href="{{ route('keluar.showPdf',['tgl_keluar'=>$k->tgl_keluar]) }}" target="_blank">
                                      Berkas
                                     </a>
               
                               </td>
                                <td >{{ $k->verif}}</td>
                             
                                <td>
                                <a  href="/pegawai/Verif_keluar/{{$k->id}}"  class="fas fa-edit" data-toggle="tooltip" ></i></a>
                             
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
 
    $("#keluar").DataTable({
    "lengthMenu": [5,10, 20, 50,100,150],
});
  });
</script>
</body>
</html>
