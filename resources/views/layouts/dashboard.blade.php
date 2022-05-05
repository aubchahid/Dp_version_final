<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>DabaPermis - {{ $title }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skin_color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">

    @livewireStyles
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed {{ __('lang.dir') }}">

    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#"
                    class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent text-white"
                    data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></span>
                </a>
                <a href="index.html" class="logo">
                    <div class="logo-lg">
                        <span class="light-logo font-weight-bold font-size-22 text-white">DabaPermis</span>
                    </div>
                </a>
            </div>
            <nav class="navbar navbar-static-top">
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item d-md-none">
                            <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu"
                                role="button">
                                <span class="icon-Align-left"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></span>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-none d-xl-inline-block">
                            <a href="contact_app_chat.html" class="waves-effect waves-light nav-link svg-bt-icon"
                                title="{{ __('lang.Inbox') }}">
                                <i class="iconly-Message"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </a>
                        </li>
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen"
                                title="Full Screen">
                                <i class="icon-Expand-arrows"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown"
                                title="User">
                                <i class="iconly-Profile" style="margin-right:0px"><span
                                        class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <a class="dropdown-item" href="#"><i class="iconly-Profile text-muted mr-2"></i>
                                        {{ __('lang.Profile') }}</a>
                                    <a class="dropdown-item" href="#"><i class="iconly-Setting text-muted mr-2"></i>
                                        {{ __('lang.Settings') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout"><i
                                            class="iconly-Logout text-muted mr-2"></i>
                                        {{ __('lang.logout') }}</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header" style="color: white">
                                <h6 class="text-white">{{ __('lang.Management') }}</h6>
                            </li>
                            <li>
                                <a href="/"><i class="iconly-Category"><span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Dashboard') }}</span></a>
                            </li>
                            <li>
                                <a href="/demandes"><i class="iconly-Send">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.DemandesMenu') }}</span></a>
                            </li>
                            <li>
                                <a href="/schools"><i class="iconly-Bookmark">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Schools') }}</span></a>
                            </li>
                            <li>
                                <a href="/users"><i class="iconly-User3">
                                        <span class="path1"></span><span
                                            class="path2"></span></i>{{ __('lang.Users') }}</a></li>
                            <li><a href="/facturations"><i class="iconly-Graph">

                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Stats') }}</span></a>
                            </li>
                            <li>
                                <a href="/users"><i class="iconly-Info-Square">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Courses') }}</span></a>
                            </li>
                            <li>
                                <a href="/users"><i class="iconly-Folder">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Test&Exams') }}</span></a>
                            </li>
                            <li class="header" style="color: white">
                                <h6 class="text-white">{{ __('lang.SchoolManagement') }}</h6>
                            </li>
                            <li>
                                <a href="/seances"><i class="iconly-Calendar">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Seances') }}</span></a>
                            </li>
                            <li>
                                <a href="/candidats"><i class="iconly-User2">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Candidates') }}</span></a>
                            </li>
                            <li>
                                <a href="/moniteurs"><i class="iconly-Profile">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Moniteurs') }}</span></a>
                            </li>
                            <li>
                                <a href="/parkings"><i class="iconly-Ticket">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Cars') }}</span></a>
                            </li>
                            <li class="header" style="color: white">
                                <h6 class="text-white">{{ __('lang.Tools') }}</h6>
                            </li>
                            <li>
                                <a href="/users"><i class="iconly-Message">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Inbox') }}</span></a>
                            </li>
                            <li>
                                <a href="/users"><i class="iconly-Danger">
                                        <span class="path1"></span><span
                                            class="path2"></span></i><span>{{ __('lang.Help') }}</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </aside>
        <div class="content-wrapper">
            <div class="container-full">
                {{ $slot }}
            </div>
        </div>
        <div class="control-sidebar-bg"></div>
    </div>


    @livewireScripts
    @stack('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.livewire.on('success', () => {
            $('#detailsRequest').modal('hide');
            $('#addSchool').modal('hide');
            $('#editSchool').modal('hide');
            $('#edituser').modal('hide');
            $('#addUser').modal('hide');
            $('#addfacturation').modal('hide');
            $('#editfacturation').modal('hide');

        });
        window.addEventListener('contentChanged', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-start',
                showConfirmButton: false,
                timer: 15000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: event.detail.item,
            })
        })
    </script>
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/etc/icons/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('assets/etc/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

    <!-- EduAdmin App -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard2.js') }}"></script>

</body>

</html>
