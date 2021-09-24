<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="">Manager-Panel</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Session::get('userName')}}
                    <i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('user-sign-out') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit()">
                        <i class="fas fa-sign-out-alt fa-fw"></i>{{ __('  Logout') }}
                    </a>
                </div>
            </li>
            <form method="post"  action="{{ route('user-sign-out') }}" id="logout-form">
                @csrf
            </form>
        </ul>
    </div>

</nav>
