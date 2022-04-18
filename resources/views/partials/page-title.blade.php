<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@yield('page-title')</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="#">Home</a></li>
                    <li><span>@yield('page-title')</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard/setting">Settings</a>
                    <form action="/logout" method="post">
                    @csrf
                        <button type="submit" class="dropdown-item">Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
