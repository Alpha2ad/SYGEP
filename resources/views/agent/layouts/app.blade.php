<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <title> @yield('title') {{config('app.name', 'SYGEP')}} </title>


 <!-- Favicon-->
 <link rel="icon" href="favicon.ico" type="image/x-icon">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

 <!-- Bootstrap Core Css -->
 <link href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

 <!-- Waves Effect Css -->
 <link href="{{ asset('backend/assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

 <!-- Animation Css -->
 <link href="{{ asset('backend/assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

 <!-- Morris Chart Css-->
 <link href="{{ asset('backend/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
 {{-- <link href="{{ asset('backend/assets/plugins/materialize-css/css/materialize.css') }}" rel="stylesheet" /> --}}

 <!-- Custom Css -->
 <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

 <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">

 <!-- agentBSB Themes. You can choose a theme from css/themes instead of get all themes -->
 <link href="{{ asset('backend/assets/css/themes/all-themes.css') }}" rel="stylesheet" />
 <link href="{{ asset('mdwf/css/materialdesignicons.css') }}" rel="stylesheet" />
 <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />

 @stack('css')
</head>

<body class="theme-teal">

 <!-- Page Loader -->
 <div class="page-loader-wrapper">
     <div class="loader">
         <div class="preloader">
             <div class="spinner-layer pl-red">
                 <div class="circle-clipper left">
                     <div class="circle"></div>
                 </div>
                 <div class="circle-clipper right">
                     <div class="circle"></div>
                 </div>
             </div>
         </div>
         <p>Patientez Svp...</p>
     </div>
 </div>
 <!-- #END# Page Loader -->
 <!-- Overlay For Sidebars -->
 <div class="overlay"></div>
 <!-- #END# Overlay For Sidebars -->

 <!-- Search Bar -->
 {{-- <div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div> --}}
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand title" href="index.html">{SYGEP} SYSTEME DE GESTION DU PELERINAGE</a>
        </div>
        {{-- <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">7</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">delete_forever</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> Yesterday
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Make new buttons
                                            <small>45%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Create new dashboard
                                            <small>54%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Solve transition issue
                                            <small>65%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Answer GitHub questions
                                            <small>92%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div> --}}
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="images/user.png" width="48" height="48" alt="User" style="color:white" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ auth('agent')->user()->name }} </div>
                <div class="email">{{ auth('agent')->user()->email }} </div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right ">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        {{-- <li role="separator" class="divider"></li> --}}
                        <li class=" white-text "><a class="dropdown-item font-italic font-bold" href="/agent/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
                        <i class="material-icons">input</i>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MENU DE NAVIGATION</li>
            <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <li class="{{ Request::is('agent/dashboard*') ? 'active': '' }}">
                <a href="{{ route('agent.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Tableau de bord</span>
                </a>
             </li>
             <li class="{{ Request::is('agent/agentTuteurs*') ? 'active': '' }}">
                <a href="{{ route('agentTuteurs.index') }}">
                    <i class="material-icons">person_add</i>
                    <span>Tuteurs </span>
                </a>
            </li>
            <li class="{{ Request::is('agent/agentPelerins*') ? 'active': '' }}">
                 <a href="{{ route('agentPelerins.index') }}">
                    <i class="material-icons">flag</i>
                    <span>Pelerin</span>
                </a>
            </li>
            {{-- <li class="{{ Request::is('agent/convoits*') ? 'active': '' }}">
                <a href="{{ route('convoits.index') }}">
                   <i class="material-icons">flight_takeoff</i>
                   <span>Convoit</span>
               </a>
           </li>
 --}}
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">library_add</i>
                    <span>BLOG</span>
                </a>
                <ul class="ml-menu">

                </ul>
            </li>
            <li class="header">LABELS</li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
    <div class="copyright">
        &copy; {{ date('Y') }} <a href="javascript:void(0);">SYGEP GUINEE</a>.
    </div>
    <div class="version">
        <b>UN SYSTEME POUR UNE GESTION EFFICACE! </b>
    </div>
</div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->

<!-- #END# Right Sidebar -->
</section>



@yield('content')

<!-- Jquery Core Js -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
     {{-- <script src="{{ asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
     --}}
     <!-- Slimscroll Plugin Js -->
     <script src="{{ asset('backend/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

     <!-- Waves Effect Plugin Js -->
     <script src="{{ asset('backend/assets/plugins/node-waves/waves.js') }}"></script>

     <script src="{{ asset('backend/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

     <!-- Custom Js -->
     <script src="{{ asset('backend/assets/js/admin.js') }}"></script>
     <script src="{{ asset('js/toastr.min.js') }}"></script>

     {!! Toastr::message() !!}

     <script>


         @if ($errors->any())

         @foreach ($errors->all() as $error)

         toastr.error('{{ $error }}', 'Erreure',{

             closeButton:true,
             progressBar:true,
         });

         @endforeach
         @endif

     </script>


     @stack('scripts')

 </body>
 </html>
