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
    <li @class(['nav-item', 'active' => Request::routeIs('dashboard')])>
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

    <li @class(['nav-item', 'active' => Request::routeIs('user.*')])>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_user"
            aria-expanded="false" aria-controls="collapse_user">
            <i class="bx bxs-user-account bx-xs"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapse_user" aria-labelledby="headingPages" data-parent="#accordionSidebar"
            @class(['collapse', 'show' => Request::routeIs('user.*')])>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a @class(['collapse-item', 'active' => Request::routeIs('user.create')]) href="{{ route('user.create') }}">
                    Tambah Pengguna
                </a>
                <a @class(['collapse-item', 'active' => Request::routeIs('user.index')]) href="{{ route('user.index') }}">
                    Daftar Pengguna
                </a>
            </div>
        </div>
    </li>
    <li @class([
        'nav-item',
        'active' => Str::contains(Request::url(), 'data'),
    ])>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_data"
            aria-expanded="false" aria-controls="collapse_data">
            <i class="bx bxs-data bx-xs"></i>
            <span>Data Master</span>
        </a>
        <div id="collapse_data" aria-labelledby="headingPages" data-parent="#accordionSidebar"
            @class(['collapse', 'show' => Str::contains(Request::url(), 'data')])>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a @class(['collapse-item', 'active' => Request::routeIs('barang.*')]) href="{{ route('barang.index') }}">
                    Data Barang
                </a>
                <a @class(['collapse-item', 'active' => Request::routeIs('supplier.*')]) href="{{ route('supplier.index') }}">
                    Data Supplier
                </a>
            </div>
        </div>
    </li>
    <li @class([
        'nav-item',
        'active' => Str::contains(Request::url(), 'transaction'),
    ])>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_trx"
            aria-expanded="false" aria-controls="collapse_trx">
            <i class="bx bxs-receipt bx-xs"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapse_trx" aria-labelledby="headingPages" data-parent="#accordionSidebar"
            @class([
                'collapse',
                'show' => Str::contains(Request::url(), 'transaction'),
            ])>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a @class(['collapse-item', 'active' => Request::routeIs('in.*')]) href="{{ route('in.index') }}">
                    Masuk
                </a>
                <a @class(['collapse-item', 'active' => Request::routeIs('out.*')]) href="{{ route('out.index') }}">
                    Keluar
                </a>
            </div>
        </div>
    </li>
    <li @class(['nav-item', 'active' => Request::routeIs('perhitungan.*')])>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_perhitungan"
            aria-expanded="false" aria-controls="collapse_perhitungan">
            <i class="bx bxs-receipt bx-xs"></i>
            <span>Perhitungan</span>
        </a>
        <div id="collapse_perhitungan" aria-labelledby="headingPages" data-parent="#accordionSidebar"
            @class(['collapse', 'show' => Request::routeIs('perhitungan.*')])>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu :</h6>
                <a @class([
                    'collapse-item',
                    'active' => Request::routeIs('perhitungan.eoq'),
                ]) href="{{ route('perhitungan.eoq') }}">
                    EOQ
                </a>
                <a @class([
                    'collapse-item',
                    'active' => Request::routeIs('perhitungan.ss'),
                ]) href="{{ route('perhitungan.ss') }}">
                    SS
                </a>
                <a @class([
                    'collapse-item',
                    'active' => Request::routeIs('perhitungan.rop'),
                ]) href="{{ route('perhitungan.rop') }}">
                    ROP
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Laporan
    </div>

    <li @class(['nav-item', 'active' => Request::routeIs('report.index')])>
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
