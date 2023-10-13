<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('dashboard') }}">
        <img class="navbar-brand-full" src="{{ $sitedetail->logo }}" width="89" alt="{{ $sitedetail->title }}">
        <img class="navbar-brand-minimized" src="{{ $sitedetail->logo }}" width="30" alt="{{ $sitedetail->title }}">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">@yield('content-header')</li>
        <li class="nav-item px-3 text-success">
            <a class="nav-link" href="{{ route('index') }}" target="_blank"><b class="text-primary">VIEW WEBSITE</b></a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ asset('admin/img/avatars/user.png') }}" alt="{{ Session::get('admin')['username'] }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="{{ route('userprofile.editprofile', encrypt(Session::get('admin')['userid'])) }}">
                    <i class="fa fa-user"></i> {{ Session::get('admin')['username'] }}
                </a>
                <a class="dropdown-item" href="{{ route('userprofile.editprofile', encrypt(Session::get('admin')['userid'])) }}">
                <i class="fa fa-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
</header>