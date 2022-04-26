<!DOCTYPE html>
<?php
use RadioStream\SoftwareManagement;
use Illuminate\Support\Facades\URL;
 ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Multi Streams converter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/red.css') }}" id="theme" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"> -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
<style>
    .dropbtn {
  /* background-color: #4CAF50; */
  color: white;
  /* padding: 16px; */
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
   background-color: #f9f9f9; 
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown:hover .dropbtn {
 /*  background-color: #3e8e41; */
}
</style>
</head>
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar topbarSticky no-print">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header" style="background: none;"
                        <?php   //if(!Auth::user()){echo "style='background: none;'";} 
                        ?> >

                    <a class="navbar-brand" href="{{ url('/') }}"  style="color: #ffffff;"
                    <?php   //if(!Auth::user()){echo "style='color: #ffffff;'";} 
                        ?>
                        >
                        <!-- {{ config('app.name', 'Multi Streams converter') }} -->
                        


                        <?php //dd($data);
                        $sofware_info = SoftwareManagement::where('status','=','1')->first();
                        if($sofware_info['logo'] == ""){
                            $logo = URL::to("/").'/uploads/logo/dummy-logo.png';
                        }else{
                            $logo = $sofware_info['logo'];
                        }
                        if($sofware_info['softwarename'] == ""){
                            $softwarename = "Multi Streams converter";
                        }else{
                            $softwarename = $sofware_info['softwarename'];
                        }
                        
                        
                        echo "<img src=".$logo." alt='Logo' height='30px' width='auto'>";
                        ?>
                        
                    </a>
                    <!-- <a class="navbar-brand" href="#/">
                                                    <span>
                                <span class="dark-logo" ng-show="$root.dashboardData.baseUser.defTheme.indexOf('dark') == -1"></span>
                                <span class="light-logo" ng-show="$root.dashboardData.baseUser.defTheme.indexOf('dark') !== -1"></span>
                            </span>
                                                 </a> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <!-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li> -->
                    </ul>
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <h2 style="color: #fff;"><?php echo $softwarename; ?></h2>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->

                    <ul class="navbar-nav main_menus_ul" style="margin-right: 90px;">
                       

                   
                     @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->
                                <a id="navbarDropdown" class="nav-link dropdown-toggle dropbtn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Overview <span class="caret"></span></a>
                                <div class="dropdown-content" style="min-width: 200px;">
                                    <a href="{{ route('about') }}" style="border-bottom: 1px solid #C1C1C1; min-width: 185px;">About</a>
                                    <a href="{{ route('help') }}" style="border-bottom: 1px solid #C1C1C1; min-width: 185px;">Help</a>
                                    <a href="{{ route('system-requirement') }}" style="border-bottom: 1px solid #C1C1C1; min-width: 185px;">System Requirement</a>
                                     @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('software-management') }}" style="border-bottom: 1px solid #C1C1C1; min-width: 185px;">Software Management</a>
                                     @endif
                                    

                                </div>                    
                            </li>
                            @if(Auth::user()->role == 'admin')
                            <li class="nav-item dropdown main_menus show">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle waves-effect waves-dark  has-arrow" href="{{ route('user-management') }}" >
                                    User Management <span class="caret"></span>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle dropbtn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>
                                <div class="dropdown-content">
                                    <a href='{{url("/viewUser")}}/{{ Auth::user()->userId }}' style="border-bottom: 1px solid #C1C1C1;">My Profile</a>
                                    <a class="" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>

                                <!-- <a class="nav-link dropdown-toggle" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> -->
                            </li>
                        @endguest
                         </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @guest
        @else
        <aside class="left-sidebar enableSlimScroller no-print" style="padding-bottom:60px;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" >
                <!-- User profile -->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="{{route('home')}}"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{route('radioList')}}"><i class="fa fa-list-alt"></i>List Radio Stream</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
               
            </div>
            <!-- End Bottom points-->
        </aside>
        @endguest
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
        <footer class="footer" style="text-align: center;">
            Developed by <a href="https://ucartz.com" target="_blank">Ucartz.com</a> and powered by <a href="https://antbae.com/" target="_blank">Antbae.com</a>.
        </footer>
    </div>

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

 <script>
        /*function setTextBoxes(psMyIp)
        {
          sArr = psMyIp.split(".");
          document.getElementById("text1").value = sArr[0];
          document.getElementById("text2").value = sArr[1];
          document.getElementById("text3").value = sArr[2];
          document.getElementById("text4").value = sArr[3];
          return sArr;
        }*/
function validateForm() {
  var server = document.forms["radio_form"]["server"].value;
  var port = document.forms["radio_form"]["port"].value;
  var mount = document.forms["radio_form"]["mount"].value;
  if (server == "") {
    alert("Server must be filled out");
    return false;
  }
  else{
    sArr = server.split(".");
    for(i=0;i<4;i++)
    {
        if(sArr[i] >= 0 && sArr[i] <= 255)
        {
            //return true;
        }else{
            alert("Server not valid");
            return false;
        }
    }
    
  }
   if (port == "") {
    alert("Port must be filled out");
    return false;
  }else{
    if(isNaN(port)){
        alert("Please enter a valid port number");
        return false;
    }
  }
   if (mount == "") {
    alert("Mount must be filled out");
    return false;
  }
}
</script>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <input type="hidden" id="rooturl" value="http://praveshan.com/praveshan/"/>
    <input type="hidden" id="utilsScript" value="http://praveshan.com/praveshan/assets/js/utils.js"/> -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
   <!--  <script src="http://praveshan.com/praveshan/assets/js/waves.js"></script> -->
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('js/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/echarts-all.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>       

    

</body>
</html>
