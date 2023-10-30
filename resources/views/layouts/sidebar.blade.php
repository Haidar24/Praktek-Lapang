
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Brand (Logo dan Nama) -->
        <br>
        <div class="sidebar-brand">
          <a href="index.html">
              <img src="{{ asset('dist/assets/img/dishub.jpg') }}" alt="logo" width="40">
          </a>
      </div>
                @if (Auth::user()->level == 'admin')
                <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
               
                  <li class="{{ (request()->segment(1)=='home')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('home.index') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ (request()->segment(1)=='vw_pengguna')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('vw_pengguna.index') }}">
                        <i class="far fa-user"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="{{ (request()->segment(1)=='vw_jabatan')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('vw_jabatan.index') }}">
                        <i class="far fa-user"></i>
                        <span>Jabatan</span>
                    </a>
                </li>
                <li class="{{ (request()->segment(1)=='vw_klasifikasi')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('vw_klasifikasi.index') }}">
                        <i class="fas fa-book"></i>
                        <span>Klasifikasi Surat</span>
                    </a>
                </li>
                  <li class="menu-header">Manajemen</li>
                        <li class="{{ (request()->segment(1)=='vw_sm')? 'active' :'' }}">
                            <a class="nav-link" href="{{ route('vw_sm.index') }}">
                                <i class="fas fa-envelope"></i>
                                <span>Surat Masuk</span>
                            </a>
                        </li>
                        <li class="{{ (request()->segment(1)=='vw_sk')? 'active' :'' }}">
                            <a class="nav-link" href="{{ route('vw_sk.index') }}">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Surat Keluar</span>
                            </a>
                        </li>
                        
                        <li class="{{ (request()->segment(1)=='vw_disposisi')? 'active' :'' }}">
                            <a class="nav-link" href="{{ route('vw_disposisi.index') }}">
                                <i class="fas fa-envelope"></i>
                                <span>Disposisi</span>
                            </a>
                        </li>

                        <li class="menu-header">Cetak Laporan</li>
                        <li class="{{ (request()->segment(1)=='vw_laporan')? 'active' :'' }}">
                            <a class="nav-link" href="{{ route('vw_laporan.index') }}">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Surat Masuk</span>
                            </a>
                        </li>
                        <li class="{{ (request()->segment(1)=='vw_laporan')? 'active' :'' }}">
                            <a class="nav-link" href="{{ route('vw_laporan_sk.index') }}">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Surat Keluar</span>
                            </a>
                        </li>                  
                    </ul>
                    @endif

        @if (Auth::user()->level == 'user')
        <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
       
          <li class="{{ (request()->segment(1)=='home')? 'active' :'' }}">
            <a class="nav-link" href="{{ route('home.index') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
          <li class="menu-header">Manajemen</li>
                <li class="{{ (request()->segment(1)=='vw_sm')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('vw_sm.index') }}">
                        <i class="fas fa-envelope"></i>
                        <span>Surat Masuk</span>
                    </a>
                </li>
                <li class="menu-header">Pesaan</li>
                <li class="{{ (request()->segment(1)=='vw_pesan')? 'active' :'' }}">
                    <a class="nav-link" href="{{ route('vw_pesan.index') }}">
                        <i class="fas fa-envelope"></i>
                        <span>Pesan</span>
                    </a>
                </li>
        
            @endif
    </aside>
</div>
