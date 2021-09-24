<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Admin-Panel</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}
                    <i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit()">
                        <i class="fas fa-sign-in-alt fa-fw"></i> {{ __('  Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <form method="post"  action="{{ route('logout') }}" id="logout-form">
        @csrf
    </form>

</nav>
