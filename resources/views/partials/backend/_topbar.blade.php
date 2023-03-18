{{-- Topbar --}}
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
     id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="fa-solid fa-bars"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="javascript:void(0);"
                   data-bs-toggle="dropdown">
                    <div class="me-3">
                        <span class="fw-semibold d-block text-end">{{ Auth::user()->name }}</span>
                        <small class="text-muted text-end">{{ Auth::user()->email }}</small>
                    </div>
                    <div class="avatar avatar-online d-flex align-items-center">
                        <img src="{{ asset('img/admin/default.png') }}" alt class="w-px-40 h-auto"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-user me-2"></i>
                            <span class="align-middle">{{ __('Profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('home') }}">
                            <i class=" fa-solid fa-house me-2"></i>
                            <span class="align-middle">{{ __('Home') }}</span>
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
{{-- End of Topbar --}}
