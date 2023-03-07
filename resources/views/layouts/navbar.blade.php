<!-- BEGIN PRIMARY NAVIGATION -->
<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off"
                data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="info-card">

        <img src="{{ asset('backend/img/demo/avatars/avatar-admin.png') }}" class="profile-image rounded-circle"
            alt="Admin">
        <div class="info-card-text">
            <a href="#" class="d-flex align-items-center text-white">
                <span class="text-truncate text-truncate-sm d-inline-block">
                    {{ Auth::user()->name }}
                </span>
            </a>

        </div>
        <img src="{{ asset('backend/img/card-backgrounds/cover-2-lg.png') }}" class="cover" alt="cover">
    </div>
    <ul id="js-nav-menu" class="nav-menu">
        <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}" title="Dash Board" data-filter-tags="Dash Board">
                <i class="fal fa-home"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
            </a>
        </li>
        @can('user-module')
            <li class="{{ request()->is('roles*') || request()->is('users*') || request()->is('colleges*') || request()->is('students*') ? 'active open' : '' }}">
                <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                    <i class="fal fa-cog"></i>
                    <span class="nav-link-text" data-i18n="nav.user_management">User Management</span>
                </a>
                <ul>
                    @can('role-module')
                        <li class="{{ request()->is('roles*') ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}"
                                data-filter-tags="theme settings how it works">
                                <span class="nav-link-text" data-i18n="nav.user_management_role">Role</span>
                            </a>
                        </li>
                    @endcan
                    <li class="{{ request()->is('users*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" title="Users" data-filter-tags="users">
                            <span class="nav-link-text" data-i18n="nav.user_management_user">Users</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('colleges*') ? 'active' : '' }}">
                        <a href="{{ route('colleges.index') }}" title="Colleges" data-filter-tags="theme settings Colleges">
                            <span class="nav-link-text" data-i18n="nav.user_management_college">Colleges</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('students*') ? 'active' : '' }}">
                        <a href="{{ route('students.index') }}" title="students" data-filter-tags="theme settings students">
                            <span class="nav-link-text" data-i18n="nav.user_management_students">Students</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan
        @can('master-module')
            <li>
                <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                    <i class="fal fa-cog"></i>
                    <span class="nav-link-text">Masters</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ url('/department') }}"
                            data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Department Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('course.index') }}" title="course" data-filter-tags="theme settings how it works">

                            <span class="nav-link-text">Course Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('course.structure') }}" title="Course Structure"
                            data-filter-tags="Course Structure">
                            <span class="nav-link-text">Course Structure</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('semester.index') }}"
                            data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Semester</span>
                        </a>
                    </li>
                    <li>
                        <a href="" title="paper" data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Paper Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('fees.index')}}" title="paper" data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Fee Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('notice-type.index') }}" title="exam_notice">
                            <span class="nav-link-text">Exam Notice Type</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endcan
        @can('notice-module')
            <li>
                <a href="{{ url('/notices') }}" title="Notices" data-filter-tags="Notice">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span class="nav-link-text" data-i18n="nav.application_notice">Notice</span>
                </a>
            </li>
        @endcan
        @can('college-notice-module')
            <li>
                <a href="{{ url('/exam-notices') }}" title="Notices" data-filter-tags="Notice">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span class="nav-link-text" data-i18n="nav.application_notice">Notices </span>
                    <span
                        class="dl-ref bg-primary-500 hidden-nav-function-minify hidden-nav-function-top">{{ Auth::user()->unreadNotifications->count() > 0 ? Auth::user()->unreadNotifications->count() : '' }}</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/mid-sem-exam') }}" title="Notices" data-filter-tags="Notice">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span class="nav-link-text" data-i18n="nav.application_notice">Mid Sem Exam </span>
                    {{-- <span
                        class="dl-ref bg-primary-500 hidden-nav-function-minify hidden-nav-function-top">{{ Auth::user()->unreadNotifications->count() > 0 ? Auth::user()->unreadNotifications->count() : '' }}</span> --}}
                </a>
            </li>
            <li class="{{ request()->is('semester-form-fill-up*') ? 'active' : '' }}">
                <a href="{{ url('/semester-form-fill-up') }}" title="Notices" data-filter-tags="Notice">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span class="nav-link-text" data-i18n="nav.application_notice">Semester Registration </span>
                    {{-- <span
                        class="dl-ref bg-primary-500 hidden-nav-function-minify hidden-nav-function-top">{{ Auth::user()->unreadNotifications->count() > 0 ? Auth::user()->unreadNotifications->count() : '' }}</span> --}}
                </a>
            </li>
            <li>
                <a href="#" title="Theme Settings" data-filter-tags="theme settings">
                    <i class="fal fa-cog"></i>
                    <span class="nav-link-text">Exam Section</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('regular_exam_notice')}}" data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Regular Exam Notice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('ex_regular_exam_notice')}}" data-filter-tags="theme settings how it works">
                            <span class="nav-link-text">Ex-Regular Exam Notice</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
<!-- END PRIMARY NAVIGATION -->
