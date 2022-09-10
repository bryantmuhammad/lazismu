<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Bakpia 716 Annur</a>
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
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Menu</span></a>
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
                <li class="menu-header">Data Master</li>
                <li
                    class="nav-item dropdown {{ Request::is('admin/user*', 'admin/program*', 'admin/kategori*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Penerimaan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/user*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('user.index') }}">Pemasukan &
                                Pengeluaran</a>
                        </li>

                </li>
            @endcan


        </ul>
    </aside>
</div>
