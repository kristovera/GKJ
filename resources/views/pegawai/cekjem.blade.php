<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jemaat</title>

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-15">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Jemaat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
       

                <table id="jemaat" class="table table-bordered table-hover">

                  <thead>
                  <tr>
                  <th> No </th>
                        <th scope="col">No Induk</th>

                        <th scope="col">Status</th>
                        <th scope="col">Wilayah</th>

                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">JK</th>
                        <th scope="col">TTL</th>
                        <th scope="col" >Status</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Status dalam Gereja</th>

                        <th scope="col">Pendidikan</th>
                        <th scope="col">Bidang Ilmu</th>

                      
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nama Ibu</th>

                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Pendapatan</th>
                        <th scope="col">Berkas</th>
                        

        

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $data)
                                <tr>
                                <th scope="row">{{ $loop->iteration }}</th>

                                <td >{{ $data->induk}}</td>
                                
                            
                                <td >{{ $data->data}}</td>
                                <td >{{ $data->wilayah}}</td>

                                <td >{{ $data->namalengkap_jem}}</td>
                                <td >{{ $data->jk_jem}}</td>
                                <td >{{ $data->tempat}} , {{ $data->tanggal_jem}}</td>

                                <td >{{ $data->status_jem}}</td>
                                <td >{{ $data->alamat_jem}},{{ $data->kelurahan_jem}},{{ $data->kecamatan_jem}},{{ $data->kota_jem}}, {{ $data->provinsi_jem}}</td>
                                <td >{{ $data->nohp_jem}}</td>

                                <td >{{ $data->statusgereja}}</td>


                                <td >{{ $data->pendidikan}}</td>
                                <td >{{ $data->ilmu}}</td>

                        
                                <td >{{ $data->ayah}}</td>
                                <td >{{ $data->ibu}}</td>
                                <td >{{ $data->kerja}}</td>
                                <td >{{ $data->pendapatan}}</td>
                                <td>
                                
                                <a href="{{ route('jemaat.showPdf',['induk'=>$data->induk]) }}" target="_blank">
                                      Berkas
                                     </a>
               
                               </td>
                            <!--    <td>
                                <button type="button"  href="{{ route('jemaat.showPdf',['induk'=>$data->induk]) }}" class="btn btn-link">View</button>
                                
                          </td>
-->
                                

                                <td>
                              
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

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

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



<!--Button -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/Admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/Admin/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>

  $(document).ready(function() {
    $('#jemaat').DataTable( {
        dom: 'Bfrtip',
        buttons: ['excelHtml5'],
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
      /// lengthMenu: ['5,10, 20, 50,100,150'],
        ],
    } );
} )
</script>
</body>
</html>
