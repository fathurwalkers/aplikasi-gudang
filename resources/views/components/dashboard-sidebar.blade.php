<div>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                        <span>
                            Beranda
                        </span>
                    </a>
                </li>

                <li class="menu-header">Menu</li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Barang</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Data Barang</a></li>
                        <li><a class="nav-link" href="#">Kategori Barang</a></li>
                        <li><a class="nav-link" href="#">Jenis Barang</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Pembelian</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Data Pembelian</a></li>
                        <li><a class="nav-link" href="#">Laporan Pembelian</a></li>
                        <li><a class="nav-link" href="{{ route('data-vendor') }}">Data Vendor</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Penjualan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Data Penjualan</a></li>
                        <li><a class="nav-link" href="#">Laporan Penjualan</a></li>
                        <li><a class="nav-link" href="{{ route('data-customer') }}">Data Customer</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Perbaikan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Laporan Data Perbaikan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Manajemen</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('data-pegawai') }}">Data Pegawai</a></li>
                    </ul>
                </li>

                @if ($users->login_level == 'admin')
                    <li class="">
                        <a class="nav-link" href="#"><i class="fas fa-pencil-ruler"></i>
                            <span>
                                Settings
                            </span>
                        </a>
                    </li>
                @endif
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Halaman Utama
                </a>
            </div>
        </aside>
    </div>
</div>
