<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="px-5">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('img/site-logo.png') }}" alt="OpenCourse Logo" style="width: 15%;" class="pb-1">
            </a>
        </div>

        <div class="navbar-collapse justify-content-end">
            <div class="d-flex">
                <div class="navbar-nav mx-5 flex-shrink-0">
                    <div class="nav-item px-4 py-2">
                        <a href="{{ route('home') }}"
                           class="nav-link {{ Route::is('home') ? 'current-active-link' : '' }}">Home</a>
                    </div>
                    <div class="nav-item px-4 py-2">
                        <a href="{{ route('public.courses.index') }}"
                           class="nav-link {{ Route::is('public.courses.index') ? 'current-active-link' : '' }}">Courses</a>
                    </div>
                    <div class="nav-item px-4 py-2">
                        <a href="{{ route('about-us') }}"
                           class="nav-link {{ Route::is('about-us') ? 'current-active-link' : '' }}">About Us</a>
                    </div>
                    <div class="nav-item px-4 py-2">
                        <a href="{{ route('contact.show') }}"
                           class="nav-link {{ Route::is('contact.show') ? 'current-active-link' : '' }}">Contact Us</a>
                    </div>
                </div>

                <div style="margin-right: 6rem;">
                    @if (Route::has('login'))
                        @auth
                            <div class="nav-item dropdown mx-5 py-2">
                                <button type="button"
                                        class="btn btn-outline-light dropdown-toggle"
                                        id="signUpLoginDropdownMenu"
                                        role="button"
                                        data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu">
                                    <div class="dropdown-item">
                                        <a href="" class="dropdown-item">
                                            <i class="fa-solid fa-user me-2"></i>
                                            <span>{{ __('Profile') }}</span>
                                        </a>
                                    </div>
                                    @php
                                        $role = Auth::user()->roles()->first();
                                    @endphp
                                    @if ($role->role_name === 'admin')
                                        <div class="dropdown-item">
                                            <a href="{{ route('dashboard.admin.index') }}" class="dropdown-item">
                                                <i class="fa-solid fa-lock me-2"></i>
                                                <span>{{ __('Admin') }}</span>
                                            </a>
                                        </div>
                                    @elseif ($role->role_name === 'org_admin')
                                        <div class="dropdown-item">
                                            <a href="{{ route('dashboard.org_admin.index') }}" class="dropdown-item">
                                                <i class="fa-solid fa-sitemap me-2"></i>
                                                <span>{{ __('Organization Admin') }}</span>
                                            </a>
                                        </div>
                                    @elseif ($role->role_name === 'instructor')
                                        <div class="dropdown-item">
                                            <a href="" class="dropdown-item">
                                                <i class="fa-solid fa-person-chalkboard me-2"></i>
                                                <span>{{ __('Instructor') }}</span>
                                            </a>
                                        </div>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-item">
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                            <span>{{ __('Logout') }}</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="nav-item dropdown mx-5 py-2 ">
                                <button type="button"
                                        class="btn btn-outline-light dropdown-toggle"
                                        id="signUpLoginDropdownMenu"
                                        role="button"
                                        data-bs-toggle="dropdown">
                                    Sign Up / Login
                                </button>

                                <div class="dropdown-menu" aria-labelledby="signUpLoginDropdownMenu">
                                    <div class="dropdown-item">
                                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                    </div>
                                    @if (Route::has('register'))
                                        <div class="dropdown-item">
                                            <a href="{{ route('register') }}" class="dropdown-item">Sign Up</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
