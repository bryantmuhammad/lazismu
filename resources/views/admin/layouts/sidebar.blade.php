<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Lazismu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">PSB</a>
        </div>
        <ul class="sidebar-menu ">
            <li class="menu-header">Dashboard</li>
            <li class="index {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="far fa-square"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can('crud data master')
            <li class="menu-header">Data Master</li>
            <li
                class="nav-item dropdown {{ Request::is('admin/user*', 'admin/program*', 'admin/kategori*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i> <span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/user*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('user.index') }}">Admin</a>
                    </li>
                    <li class="{{ Request::is('admin/kategori*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('kategori.index') }}">Kategori</a>
                    </li>
                    <li class="{{ Request::is('admin/program*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('program.index') }}">Program</a>
                    </li>
                </ul>
            </li>
            @endcan

            @can('crud data master')

            <li class="menu-header">Tambah Pemasukan</li>
            <li class="nav-item dropdown {{ Request::is('admin/pemasukan/tambah') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-coins"></i> <span>Tambah
                        Penerimaan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pemasukan/tambah') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.tambah.pemasukan') }}">Tambah Penerimaan</a>
                    </li>

                </ul>
            </li>


            <li class="menu-header">Penerimaan Dan Pengeluaran</li>
            <li class="nav-item dropdown {{ Request::is('admin/donasi*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-donate"></i> <span>Donasi
                        Masuk</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/donasi*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.donasi') }}">Donasi Masuk</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/pemasukan') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i>
                    <span>Penerimaan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pemasukan') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.pemasukan') }}">Penerimaan </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/pengeluaran*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i>
                    <span>Pengeluaran</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pengeluaran*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.pengeluaran') }}">Pengeluaran </a>
                    </li>
                </ul>
            </li>
            @endcan


        </ul>
    </aside>
</div>