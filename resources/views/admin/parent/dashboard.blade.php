<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ !empty($header_title ) ? $header_title : ''}} -college</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="{{ asset('img/logo.png')}}" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="{{ asset('img/logo-small.png')}}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
                <li class="nav-item dropdown noti-dropdown language-drop me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="img/icons/header-icon-01.svg" alt="">
                    </a>
                    <div class="dropdown-menu ">
                        <div class="noti-content">
                            <div>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="flag flag-lr me-2"></i>English</a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="flag flag-bl me-2"></i>Francais</a>
                                <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown noti-dropdown me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="img/icons/header-icon-05.svg" alt="">
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                                    approved <span class="noti-title">your estimate</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('img/profiles/avatar-11.jpg')}}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">International Software
                                                        Inc</span> has sent you a invoice in the amount of <span
                                                        class="noti-title">$218</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{ asset('img/profiles/avatar-17.jpg')}}">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                                    a cancellation request <span class="noti-title">Apple iPhone
                                                        XR</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Mercury Software
                                                        Inc</span> added a new product <span class="noti-title">Apple
                                                        MacBook Pro</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ asset('img/icons/header-icon-04.svg')}}" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('img/profiles/avatar-01.jpg')}}" width="31"
                                alt="{{ Auth::user()->name}}">
                            <div class="user-text">
                                <h6>{{ Auth::user()->name}}</h6>
                                <p class="text-muted mb-0">Welcome</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('img/profiles/avatar-01.jpg')}}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ Auth::user()->name}}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    

                     @if(Auth::user()->user_type ==1)
                        <ul>
                        
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class="submenu active">
                            <a href="/admin/dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                        </li>
                        <li class="submenu">
                            <a href="/admin/admin/list"><i class="fas fa-user"></i> <span>Admin</span> <span
                                    class="menu-arrow"></span></a>
                        </li>

                    </li>
                    <li class="submenu">
                        <a href="/logout"><i class="fas fa-user"></i> <span>Logout</span> <span
                                class="menu-arrow"></span></a>
                    </li>
                    </ul>

                     

                     @elseif(Auth::user()->user_type == 2) 
                      <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li class="submenu active">
                            <a href="/admin/dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                        </li>
                          

                        <li class="submenu">
                            <a href="/logout"><i class="fas fa-user"></i> <span>Logout</span> <span
                                    class="menu-arrow"></span></a>
                        </li>
                      </ul>
                     

                     @elseif(Auth::user()->user_type == 3) 
                        <ul>
                          <li class="menu-title">
                              <span>Main Menu</span>
                          </li>
                          <li class="submenu active">
                              <a href="/admin/dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                      class="menu-arrow"></span></a>
                          </li>
                            
  
                          <li class="submenu">
                              <a href="/logout"><i class="fas fa-user"></i> <span>Logout</span> <span
                                      class="menu-arrow"></span></a>
                          </li>
                        </ul>
                       

                       @elseif(Auth::user()->user_type == 4) 
                        <ul>
                          <li class="menu-title">
                              <span>Main Menu</span>
                          </li>
                          <li class="submenu active">
                              <a href="/parent/dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                      class="menu-arrow"></span></a>
                          </li>

                          <li class="submenu active">
                            <a href="/parent/account"><i class="feather-grid"></i> <span> My Account</span> <span
                                    class="menu-arrow"></span></a>
                          </li>

                          <li class="submenu active">
                            <a href="/parent/mystudent"><i class="feather-grid"></i> <span> My Student</span> <span
                                    class="menu-arrow"></span></a>
                          </li>
                            
  
                          <li class="submenu">
                              <a href="/logout"><i class="fas fa-user"></i> <span>Logout</span> <span
                                      class="menu-arrow"></span></a>
                          </li>
                        </ul>
                       @endif
  
  



                </div>
            </div>
        </div>

  {{-- Page Main --}}
        <div class="page-wrapper">
            <div class="content container-fluid">

                @if(session('success'))
                <div class="alert alert-success">
                 {{ session('success') }}
                 </div>
             @endif

           @if(session('error'))
           <div class="alert alert-danger">
             {{ session('error') }}
           </div>
          @endif
          
            {{-- Content input --}}
            <div class="card">
              <div class="card-header">
              <h5 class="card-title">Admin List</h5>
              </div>
              <div class="card-body">
              <div class="table-responsive">
              <table class="table mb-0">
              <thead>
              <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td>Default</td>
              <td>Defaultson</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b3f3e3d1b2834363e363a323775383436">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-primary">
              <td>Primary</td>
              <td>Doe</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="066c696e6846637e676b766a632865696b">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-secondary">
              <td>Secondary</td>
              <td>Moe</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="147975666d54716c75796478713a777b79">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-success">
              <td>Success</td>
              <td>Dooley</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6309160f1a23061b020e130f064d000c0e">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-danger">
              <td>Danger</td>
              <td>Refs</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="54363b14312c35392438317a373b39">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-warning">
              <td>Warning</td>
              <td>Activeson</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ffefcebdffae7fef2eff3fab1fcf0f2">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-info">
              <td>Info</td>
              <td>Activeson</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ceafadba8eabb6afa3bea2abe0ada1a3">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-light">
              <td>Light</td>
              <td>Activeson</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5736342317322f363a273b327934383a">[email&#160;protected]</a></td>
              </tr>
              <tr class="table-dark">
              <td>Dark</td>
              <td>Activeson</td>
              <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4322203703263b222e332f266d202c2e">[email&#160;protected]</a></td>
              </tr>
              </tbody>
              </table>
              </div>
              </div>
              </div>
              </div>
            

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill fb sm-box">
                            <div class="social-likes">
                                <p>Like us on facebook</p>
                                <h6>50,095</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="{{ asset('img/icons/social-icon-01.svg')}}" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill twitter sm-box">
                            <div class="social-likes">
                                <p>Follow us on twitter</p>
                                <h6>48,596</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="{{ asset('img/icons/social-icon-02.svg')}}" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill insta sm-box">
                            <div class="social-likes">
                                <p>Follow us on instagram</p>
                                <h6>52,085</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="{{ asset('img/icons/social-icon-03.svg')}}" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card flex-fill linkedin sm-box">
                            <div class="social-likes">
                                <p>Follow us on linkedin</p>
                                <h6>69,050</h6>
                            </div>
                            <div class="social-boxs">
                                <img src="{{ asset('img/icons/social-icon-04.svg')}}" alt="Social Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p>Copyright © 2022 Dreamguys.</p>
            </footer>
        </div>
    </div>

    <script src="{{url('public/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/js/feather.min.js')}}"></script>
    <script src="{{url('public/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('public/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{url('public/plugins/apexchart/chart-data.js')}}"></script>
    <script src="{{url('public/js/script.js')}}"></script>
</body>

</html>