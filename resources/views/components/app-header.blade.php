<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{ route(Auth::getDefaultDriver() . '.dashboard') }}">
                    <img src="{{ asset('assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{ route(Auth::getDefaultDriver() . '.dashboard') }}" class="nav-link"> {{ config('app.name', 'Laravel') }} </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ asset('assets/img/90x90.jpg') }}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a class="" href="{{ route(Auth::getDefaultDriver() . '.myProfile') }}"><svg
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> {{ __('common.myProfile') }}</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href="{{ route(Auth::getDefaultDriver() . '.changePasswordForm') }}"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="css-i6dzq1">
                                <rect x="3" y="11" width="18" height="11"
                                    rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg> {{ __('common.changePassword') }}</a>
                        </div>
                        <div class="dropdown-item">
                            <a class="" href
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><svg
                                    width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> {{__('auth.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">@csrf
                                <input type="hidden" name="type"
                                    value="{{ Request::route()->getPrefix() == 'admin/' || Request::route()->getPrefix() == 'admin' ? 'admin' : 'user' }}">
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
