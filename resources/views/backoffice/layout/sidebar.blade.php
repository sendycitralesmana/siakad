<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/backoffice/dashboard" class="brand-link">
        <div class="d-flex">
            <div>
                <img src="{{ asset('images/unpar.png') }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8; width: 100%">
            </div>
            <div>
                {{-- <span class="brand-text" style="text-transform: uppercase"> <b>Sistem Akademik</b> </span> --}}

            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 mb-3 text-center">

            <div class="info">
                <p style="text-transform: uppercase">
                    <b>{{ auth()->user()->role->nama }}</b>
                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/backoffice/dashboard"
                        class="nav-link {{ request()->is('backoffice/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <li class="nav-item has-treeview {{ request()->is('backoffice/pengguna/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('backoffice/pengguna/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-user"></i>
                        <p>
                            Akun Pengguna
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/admin"
                                class="nav-link {{ request()->is('backoffice/pengguna/admin', 'backoffice/pengguna/admin/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/dosen"
                                class="nav-link {{ request()->is('backoffice/pengguna/dosen', 'backoffice/pengguna/dosen/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/mahasiswa"
                                class="nav-link {{ request()->is('backoffice/pengguna/mahasiswa', 'backoffice/pengguna/mahasiswa/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <li class="nav-item has-treeview {{ request()->is('backoffice/data-master/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('backoffice/data-master/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/backoffice/data-master/fakultas"
                                class="nav-link {{ request()->is('backoffice/data-master/fakultas', 'backoffice/data-master/fakultas/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Fakultas & Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/data-master/matkul"
                                class="nav-link {{ request()->is('backoffice/data-master/matkul', 'backoffice/data-master/matkul/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Mata Kuliah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/data-master/dosen-matkul"
                                class="nav-link {{ request()->is('backoffice/data-master/dosen-matkul', 'backoffice/data-master/dosen-matkul/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Dosen Mata Kuliah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/data-master/prodi-matkul"
                                class="nav-link {{ request()->is('backoffice/data-master/prodi-matkul', 'backoffice/data-master/prodi-matkul/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Prodi Mata Kuliah</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif

                <li class="nav-item has-treeview {{ request()->is('backoffice/akademik/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('backoffice/akademik/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Akademik
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                        <li class="nav-item">
                            <a href="/backoffice/akademik/tahun-akademik"
                                class="nav-link {{ request()->is('backoffice/akademik/tahun-akademik', 'backoffice/akademik/tahun-akademik/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Tahun Akademik</p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->role_id == 4)
                        <li class="nav-item">
                            <a href="/backoffice/akademik/krs"
                                class="nav-link {{ request()->is('backoffice/akademik/krs', 'backoffice/akademik/krs/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>KRS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/akademik/khs"
                                class="nav-link {{ request()->is('backoffice/akademik/khs', 'backoffice/akademik/khs/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>KHS</p>
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->role_id == 3)
                        <li class="nav-item">
                            <a href="/backoffice/akademik/penilaian"
                                class="nav-link {{ request()->is('backoffice/akademik/penilaian', 'backoffice/akademik/penilaian/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Penilaian</p>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
