<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="bx bxs-home-alt-2 bx-xs"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item {{ Request::routeIs('user.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_user"
            aria-expanded="false" aria-controls="collapse_user">
            <i class="bx bxs-user-account bx-xs"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapse_user" class="collapse {{ Request::routeIs('user.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item {{ Request::routeIs('user.add') ? 'active' : '' }}"
                    href="{{ route('user.add') }}">
                    Tambah Pengguna
                </a>
                <a class="collapse-item {{ Request::routeIs('user.show') ? 'active' : '' }}"
                    href="{{ route('user.show') }}">
                    Daftar Pengguna
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::routeIs('data.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_data"
            aria-expanded="false" aria-controls="collapse_data">
            <i class="bx bxs-data bx-xs"></i>
            <span>Data Master</span>
        </a>
        <div id="collapse_data" class="collapse {{ Request::routeIs('data.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item {{ Request::routeIs('data.barang.*') ? 'active' : '' }}"
                    href="{{ route('data.barang.list') }}">
                    Data Barang
                </a>
                <a class="collapse-item {{ Request::routeIs('data.supplier.*') ? 'active' : '' }}"
                    href="{{ route('data.supplier.list') }}">
                    Data Supplier
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::routeIs('transaction.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_trx"
            aria-expanded="false" aria-controls="collapse_trx">
            <i class="bx bxs-receipt bx-xs"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapse_trx" class="collapse {{ Request::routeIs('transaction.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a class="collapse-item {{ Request::routeIs('transaction.in.*') ? 'active' : '' }}" href="{{ route('transaction.in.list') }}">
                    Masuk
                </a>
                <a class="collapse-item {{ Request::routeIs('transaction.out.*') ? 'active' : '' }}" href="{{ route('transaction.out.list') }}">
                    Keluar
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item {{ Request::routeIs('report.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('report.index') }}">
            <i class="bx bxs-report bx-xs"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
