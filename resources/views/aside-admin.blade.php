<!-- Sidebar -->
    <div class="sidebar">
    <a href="" class="brand-link">
          <img src="{{asset('assets/Admin/dist/img/logo_gereja.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">GKJ BULU</span>
        </a>

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://icon-library.com/images/admin-user-icon/admin-user-icon-4.jpg" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php
              if(is_null(Auth::user()))
              {
                  return redirect('login');
              }
              else
              {
                  echo Auth::user()->name;
              }
          ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <?php
                if(\Session::get('level') == 0)
                {
                    ?>
                        <li class="nav-item ">
                            <a href="/das" class="nav-link {{ Request::is('das') ?'active' : '';}} ">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                Dashboard
                              </p>
                            </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ url('/jemaat/index')}}" class="nav-link {{ Request::is('jemaat/index') ?'active' : '';}}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                 Mengelola Data Jemaat
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="{{ url('/Baptis/index')}}" class="nav-link {{ Request::is('Baptis/index') ?'active' : '';}}">
                              <i class="nav-icon fas fa-copy"></i>
                                <p>
                                Mengelola Data Baptis

                                </p>
                              </a>

                            </li>

                          <li class="nav-item">
                              <a href="{{ url('/Kematian/index')}}" class="nav-link {{ Request::is('Kematian/index') ?'active' : '';}}">
                              <i class="nav-icon fas fa-copy"></i>
                                <p>
                                Mengelola Data Kematian
                                </p>
                              </a>

                       
                              <li class="nav-item">
                              <a href="{{ url('/KK/index')}}" class="nav-link {{ Request::is('KK/index') ?'active' : '';}}">
                              <i class="nav-icon fas fa-copy"></i>
                                <p>
                                  Mengelola Kartu Keluarga
                                </p>
                              </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ url('/Sidi/index')}}" class="nav-link {{ Request::is('Sidi/index') ?'active' : '';}}">
                                <i class="nav-icon fas fa-copy"></i>
                                  <p>
                                  Mengelola Data Sidi

                                  </p>
                                </a>

                              </li>

                            <li class="nav-item">
                              <a href="{{ url('/Daftar/index')}}" class="nav-link {{ Request::is('Daftar/index') ?'active' : '';}}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                               Mengelola Atestasi Masuk
                                </p>
                              </a>
                            </li>


                            <li class="nav-item">
                              <a href="{{ url('/Keluar/index')}}" class="nav-link {{ Request::is('Keluar/index') ?'active' : '';}}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                               Mengelola Atestasi Keluar
                                </p>
                              </a>
                            </li>
                    <?php
                }
                else
                {
                    ?>
                    <li class="nav-item menu-open">
                            <a href="/das" class="nav-link {{ Request::is('das') ?'active' : '';}}">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                Dashboard
                              </p>
                            </a>
                          </li>

                        <li class="nav-item">
                            <a href="{{ url('/pegawai/cekjem')}}" class="nav-link {{ Request::is('pegawai/cekjem') ?'active' : '';}}">
                              <i class="nav-icon fas fa-eye"></i>
                              <p>
                             Melihat Data Jemaat
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ url('/pegawai/cekbap')}}" class="nav-link {{ Request::is('pegawai/cekbap') ?'active' : '';}}">
                            <i class="nav-icon fas fa-check"></i>
                              <p>
                              Verifikasi Data Baptis

                              </p>
                            </a>

                          </li>
                          
                          <li class="nav-item">
                                <a href="{{ url('/pegawai/ceksidi')}}" class="nav-link  {{ Request::is('pegawai/ceksidi') ?'active' : '';}}">
                                <i class="nav-icon fas fa-check"></i>
                                  <p>
                                  Verifikasi Data Sidi

                                  </p>
                                </a>

                              </li>

                          <li class="nav-item">
                              <a href="{{ url('/pegawai/cekkem')}}" class="nav-link {{ Request::is('pegawai/cekkem') ?'active' : '';}}">
                              <i class="nav-icon fas fa-eye"></i>
                                <p>
                                Melihat Data Kematian
                                </p>
                              </a>


                            <li class="nav-item">
                              <a href="{{ url('/pegawai/cekmasuk')}}" class="nav-link {{ Request::is('pegawai/cekmasuk') ?'active' : '';}}">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                 Melihat Atestasi Masuk
                                </p>
                              </a>
                            </li>


                            <li class="nav-item">
                              <a href="{{ url('/pegawai/cekkeluar')}}" class="nav-link {{ Request::is('pegawai/cekkeluar') ?'active' : '';}}">
                                <i class="nav-icon fas fa-check"></i>
                                
                                <p>
                                Verifikasi Atestasi Keluar
                                </p>
                              </a>
                            </li>
                    <?php
                }
           ?>


          <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link {{ Request::is('logout') ?'active' : '';}}">
            <i class="nav-icon fas "></i>
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
           </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
