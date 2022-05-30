<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="/dashboard"><img src="{{ asset('assets/images/icon/SIAGAN.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/agenda-harian*') ? 'active' : '' }}">
                        <a href="/dashboard/agenda-harian" aria-expanded="true"><i class="ti-agenda"></i><span>Agenda Harian</span></a>
                    </li>

                    {{-- Admin Menu --}}
                    @can('admin')
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>Administrator</span></h6>
                    <li class="{{ Request::is('dashboard/daftar-skpd*') ? 'active' : '' }}">
                        <a href="/dashboard/daftar-skpd" aria-expanded="true"><i class="ti-home"></i><span>Daftar SKPD</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/manajemen-user*') ? 'active' : '' }}">
                        <a href="/dashboard/manajemen-user" aria-expanded="true"><i class="ti-user"></i><span>Manajemen User</span></a>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </div>
</div>
