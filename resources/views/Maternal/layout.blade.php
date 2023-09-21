<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternal</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mystyle.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body id="body" class="hold-transition sidebar-mini layout-fixed bg-tertiary">
    <div class="wrapper">
        <!-- Navbar -->
        @guest
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('dashboard') }}" class="nav-link">MaternalWell</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.index') }}">
                            {{ __('LOGIN') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        @else
            <nav class="main-header navbar navbar-expand navbar-white navbar-light mb-1">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('dashboard') }}" class="nav-link" style="font-family: cursive">MaternalWell</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout.user') }}">
                            {{ __('LOGOUT') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4"
                style="background-image: url({{ asset('img/this.jpg') }}); background-position: center; background-size:cover;">
                <!-- Brand Logo -->

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                    <div class="image">
                                        @if (Auth::user()->sex == 'Female')
                                        <img src="{{ asset('img/avatar2.png') }}" class="img-circle elevation-2"
                                            alt="User Image">
                                        @else
                                        <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2"
                                            alt="User Image">
                                        @endif
                                    </div>
                                    <div class="info">
                                        <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                                    </div>
                                </div>
                            </li>
                            @if (Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a href="{{ route('index') }}"
                                        class="nav-link {{ Request::routeIs('index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user-md"></i>
                                        <p>
                                            Users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a class="nav-link" href="#">
                                        <i class="nav-icon fas fa-hospital"></i>
                                        <p>
                                            Patients
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item"><a
                                                class="nav-link {{ Request::routeIs('mothers.index') ? 'active' : '' }}"
                                                href="{{ route('mothers.index') }}"><i
                                                    class="fas fa-female nav-icon"></i>
                                                <p>Mothers</p>
                                            </a></li>
                                        <li class="nav-item"><a
                                                class="nav-link {{ Request::routeIs('childs.index') ? 'active' : '' }}"
                                                href="{{ route('childs.index') }}"><i class="fas fa-child nav-icon"></i>
                                                <p>Children</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('consultations.index') }}"
                                        class="nav-link {{ Request::routeIs('consultations.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-stethoscope"></i>
                                        <p>
                                            Consultations
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-treeview" href="#">
                                        <i class="nav-icon fas fa-medkit"></i>
                                        <p>
                                            Treatments
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li><a class="nav-link {{ Request::routeIs('treatment.index.mothers') ? 'active' : '' }}"
                                                href="{{ route('treatment.index.mothers') }}"><i
                                                    class="fas fa-female nav-icon"></i>
                                                <p>Mothers</p>
                                            </a></li>
                                        <li><a class="nav-link {{ Request::routeIs('treatment.index.childs') ? 'active' : '' }}"
                                                href="{{ route('treatment.index.childs') }}"><i
                                                    class="fas fa-child nav-icon"></i>
                                                <p>Children</p>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.consultation.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.consultation.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-stethoscope"></i>
                                        <p>
                                            My Consultations
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.progress.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.progress.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-medkit"></i></i>
                                        <p>
                                            My Progress
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.medication.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.medication.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-capsules"></i>
                                        <p>
                                            My Medications
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.children.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.children.index') ? 'active' : '' }}">
                                        <i class="fas fa-child nav-icon"></i>
                                        <p>
                                            My Children
                                        </p>
                                    </a>
                                </li>
                            @elseif (Auth::user()->role == 'Nurse')
                                <li class="nav-item has-treeview">
                                    <a class="nav-link" href="#">
                                        <i class="nav-icon fas fa-hospital"></i>
                                        <p>
                                            Patients
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item"><a
                                                class="nav-link {{ Request::routeIs('mothers.index') ? 'active' : '' }}"
                                                href="{{ route('mothers.index') }}"><i
                                                    class="fas fa-female nav-icon"></i>
                                                <p>Mothers</p>
                                            </a></li>
                                        <li class="nav-item"><a
                                                class="nav-link {{ Request::routeIs('childs.index') ? 'active' : '' }}"
                                                href="{{ route('childs.index') }}"><i class="fas fa-child nav-icon"></i>
                                                <p>Children</p>
                                            </a></li>
                                    </ul>
                                </li>
                            @elseif(Auth::user()->role == 'Doctor')
                                <li class="nav-item">
                                    <a href="{{ route('consultations.index') }}"
                                        class="nav-link {{ Request::routeIs('consultations.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-stethoscope"></i>
                                        <p>
                                            Consultations
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-treeview" href="#">
                                        <i class="nav-icon fas fa-medkit"></i>
                                        <p>
                                            Treatments
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li><a class="nav-link {{ Request::routeIs('treatment.index.mothers') ? 'active' : '' }}"
                                                href="{{ route('treatment.index.mothers') }}"><i
                                                    class="fas fa-female nav-icon"></i>
                                                <p>Mothers</p>
                                            </a></li>
                                        <li><a class="nav-link {{ Request::routeIs('treatment.index.childs') ? 'active' : '' }}"
                                                href="{{ route('treatment.index.childs') }}"><i
                                                    class="fas fa-child nav-icon"></i>
                                                <p>Children</p>
                                            </a></li>
                                    </ul>
                                </li>
                            @elseif (Auth::user()->role == 'Patient')
                                <li class="nav-item">
                                    <a href="{{ route('patient.consultation.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.consultation.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-stethoscope"></i>
                                        <p>
                                            My Consultations
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.progress.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.progress.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-medkit"></i></i>
                                        <p>
                                            My Progress
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.medication.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.medication.index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-capsules"></i>
                                        <p>
                                            My Medications
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('patient.children.index') }}"
                                        class="nav-link {{ Request::routeIs('patient.children.index') ? 'active' : '' }}">
                                        <i class="fas fa-child nav-icon"></i>
                                        <p>
                                            My Children
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        @endguest

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        {{-- style="background-image: {{ asset('img/third.jpg') }};
    filter:blur(8px);
    -webkit-filter:blur(8px);
    background-position: center;
    background-size:cover;"--}}
            <!-- Main content -->
            @if (Auth::user())
                @yield('content')
            @else
                <script>
                    document.alert('login to access content');
                </script>
            @endif
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('myjs.js')}}"></script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}">
        < /scrip> <!--Resolve conflict in jQuery UI tooltip with Bootstrap tooltip-- > <
        script >
            $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
</body>

</html>
