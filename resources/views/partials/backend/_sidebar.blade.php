{{-- Sidebar --}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand">
        <a href="{{ route('dashboard.admin.index') }}" class="app-brand-link">
            <span class="app-brand-text menu-text fw-bolder ms-2">OpenCourse</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <hr class="sidebar-divider d-none d-md-block mt-0"/>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @php
            $role = Auth::user()->roles()->first();
        @endphp

        @if($role->role_name === 'admin')
            {{-- Admin Dashboard Home --}}
            <li class="menu-item {{ Route::is('dashboard.admin.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.admin.index') }}" class="menu-link">
                    <i class=" menu-icon fa-solid fa-house"></i>
                    <div data-i18n="Analytics">Home</div>
                </a>
            </li>
            {{-- Users --}}
            <li class="menu-item mt-3 {{ Route::is('users.*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon fa-sharp fa-solid fa-users"></i>
                    <div>{{ __('Users') }}</div>
                </a>
            </li>
            {{-- Institutions --}}
            <li class="menu-item mt-3 {{ Route::is('institutions.*') ? 'active' : '' }}">
                <a href="{{ route('institutions.index') }}" class="menu-link">
                    <i class="menu-icon fa-solid fa-building"></i>
                    <div>{{ __('Institutions') }}</div>
                </a>
            </li>
            {{-- Reports Generation --}}
            <li class="menu-item mt-3 {{ Route::is('reports.index') ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}" class="menu-link">
                    <i class="menu-icon fa-solid fa-file"></i>
                    <div>{{ __('Reports') }}</div>
                </a>
            </li>
        @elseif($role->role_name === 'org_admin')
            {{-- Organization Admin Dashboard Home --}}
            <li class="menu-item {{ Route::is('dashboard.org_admin.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.org_admin.index') }}" class="menu-link">
                    <i class=" menu-icon fa-solid fa-house"></i>
                    <div data-i18n="Analytics">Home</div>
                </a>
            </li>
            {{-- Instructors --}}
            <li class="menu-item mt-3 {{ Route::is('instructors.*') ? 'active' : '' }}">
                <a href="{{ route('instructors.index') }}" class="menu-link">
                    <i class="menu-icon fa-solid fa-person-chalkboard"></i>
                    <div>{{ __('Instructors') }}</div>
                </a>
            </li>
            {{-- Courses --}}
            <li class="menu-item mt-3 {{ Route::is('courses.*') ? 'active' : '' }}">
                <a href="{{ route('courses.index') }}" class="menu-link">
                    <i class="menu-icon fa-solid fa-book"></i>
                    <div>{{ __('Courses') }}</div>
                </a>
            </li>
        @elseif($role->role_name === 'instructor')
            {{-- Courses --}}
            <li class="menu-item mt-3">
                <a href="" class="menu-link">
                    <i class="menu-icon fa-solid fa-book"></i>
                    <div>{{ __('Courses') }}</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
{{-- End of Sidebar --}}
