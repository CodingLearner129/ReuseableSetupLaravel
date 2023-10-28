<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-app-head></x-app-head>
    @isset($css)
        {{ $css }}
    @endisset
</head>

<body
    class="{{ Request::routeIs('*.login') ||
    Request::routeIs('*.login.*') ||
    Request::routeIs('*.signup') ||
    Request::routeIs('*.signup.*') ||
    Request::routeIs('forgot.*') ||
    Request::routeIs('reset.*') ||
    Request::routeIs('password-reset-success')
        ? 'form'
        : '' }}">

    @if (Request::routeIs('*.login') ||
            Request::routeIs('*.login.*') ||
            Request::routeIs('*.signup') ||
            Request::routeIs('*.signup.*') ||
            Request::routeIs('forgot.*') ||
            Request::routeIs('reset.*') ||
            Request::routeIs('password-reset-success'))
        {{ $slot }}
    @else
        <x-app-loader></x-app-loader>

        <x-app-header></x-app-header>
        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Analytics</span></li> --}}
                                    @isset($breadCrumb)
                                        {{ $breadCrumb }}
                                    @endisset
                                </ol>
                            </nav>

                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->


        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <x-app-sidebar></x-app-sidebar>

            <!--  BEGIN CONTENT PART  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    {{ $slot }}
                    <x-app-footer></x-app-footer>
                </div>
            </div>
            <!--  END CONTENT PART  -->

        </div>
        <!-- END MAIN CONTAINER -->
    @endif

    <x-app-footer-script></x-app-footer-script>
    @isset($script)
        {{ $script }}
    @endisset
</body>

</html>
