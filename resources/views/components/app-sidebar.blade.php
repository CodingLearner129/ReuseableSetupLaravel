<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="{{ route(Auth::getDefaultDriver() . '.dashboard') }}" data-active="{{ Request::routeIs(Auth::getDefaultDriver() . '.dashboard') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('common.Dashboard') }}</span>
                    </div>
                </a>
            </li>
            @if (Request::route()->getPrefix() == 'admin/' || Request::route()->getPrefix() == 'admin')
            <li class="menu">
                <a href="{{ route('admin.users.index') }}" data-active="{{ Request::routeIs('admin.users.*') ? 'true' : 'false' }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>{{ __('common.Users') }}</span>
                    </div>
                </a>
            </li>
            @endif

        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
