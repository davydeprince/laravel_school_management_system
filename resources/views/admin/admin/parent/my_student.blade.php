<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ !empty($header_title ) ? $header_title : ''  }} - {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <style>
        .alert-success {
            color: #fff;
            font-weight: bold;
            background: rgb(103, 244, 218);
        }

        .alert-error {
            color: #fff;
            font-weight: bold;
            background: rgb(230, 84, 81);
        }
    </style>
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

                        <li class="submenu">
                            <a href="/admin/class/list"><i class="fas fa-user"></i> <span>class</span> <span
                                    class="menu-arrow"></span></a>
                        </li>

                        <li class="submenu">
                            <a href="/admin/course/list"><i class="fas fa-laptop"></i> <span>course</span> <span
                                    class="menu-arrow"></span></a>
                            </li>

                            
                        <li class="submenu">
                            <a href="/admin/assign_subject/list"><i class="fas fa-pen"></i> <span>assign_subject</span> <span
                                    class="menu-arrow"></span></a>
                            </li>

                                
                        <li class="submenu">
                            <a href="/admin/Exams/list"><i class="fas fa-chair"></i> <span>Exams</span> <span
                                    class="menu-arrow"></span></a>
                            </li>

                            <li class="submenu">
                                <a href="/admin/change_password"><i class="fas fa-mobile"></i> <span>change password</span> <span
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
                            <a href="admin/class/list"><i class="fas fa-user"></i> <span>class</span> <span
                                    class="menu-arrow"></span></a>
                        </li>

                        <li class="submenu">
                            <a href="/admin/change_password"><i class="fas fa-chair"></i> <span>change password</span> <span
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
                            <a href="/admin/class/list"><i class="fas fa-user"></i> <span>class</span> <span
                                    class="menu-arrow"></span></a>
                        </li>

                        <li class="submenu">
                            <a href="/admin/change_password"><i class="fas fa-chair"></i> <span>change password</span> <span
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
                              <a href="/admin/dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                      class="menu-arrow"></span></a>
                          </li>
                             
                          <li class="submenu">
                            <a href="admin/class/list"><i class="fas fa-user"></i> <span>class</span> <span
                                    class="menu-arrow"></span></a>
                        </li>
                        <li class="submenu">
                            <a href="/admin/change_password"><i class="fas fa-phone"></i> <span>change password</span> <span
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

  
        <div class="page-wrapper"> 
            <div class="content container-fluid">
               
             <h5 class="fw-bold" style="font-size: 20px"><u>Parent Student List <span class="bg-success">({{ $getParent->name }} {{ $getParent->last_name }}</span>)</u></h5>
                <form action="#" method="get">
                    <div class="card">
                        <div class="card-header">
                            <h4>Search Student</h4>
                        </div>
                        <div class="card-body">
               <div class="row">
               <div class="form-group col-sm-3">
               <input type="text" class="form-control" name="admission_number" placeholder="ADM No." value="{{ Request::get('admission_number') }}">
               </div>

                <div class="form-group col-sm-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::get('name') }}">
                </div>

               <div class="form-group col-sm-3">
               <input type="text" class="form-control" name="email" placeholder="Email" value="{{ Request::get('email') }}">
               </div>   
               <div class="form-group col-sm-3">
                 <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 7px">Search</button>
                 <a href="{{ url('admin/admin/parent/my_student' .$parent_id) }}"  class="btn btn-success btn-lg" style="margin-top: 7px">Reset</a>
                </div> 
               </div>
            </div>
        </div>
       
    </form>
    
            @if(!empty($getSearchStudent))

                <div class="row">
                    <div class="col-lg-12">
                    <div class="card" style="font-size: 12px">
                    <div class="card-header bg-info">
                    <h5 class="card-title text-light" style="font-size: 12px">Student List </h5>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table class="table mb-0">
                        <div class="col-sm-12" style="text-align: right">
                       
                          @if(session('success'))
                            <div class="alert alert-success">{{ session('success')}}
                            </div>
                            @endif
    
                            @if(session('error'))
                            <div class="alert alert-error">
                            {{ session('error')}}
                            </div>
                            @endif
                   
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Student Name</th>               
                    <th>Email</th>                   
                    <th>Parent Name</th>                   
                    <th>Phone</th>
                    <th>Created_at</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($getSearchStudent as $value)
                       
                        <tr>
                         <td>{{ $value->id}}</td>
                         <td> 
                             @if(!empty($value->getProfile()))
                             <img src="{{ $value->getProfile() }}" alt="profile" style="height: 50px; width: 50px; border-radius: 50px">
                             @endif
                         </td>                   
                         <td>{{ $value->name}}</td>
                         <td>{{ $value->email}}</td>
                         <td>{{ $value->parent_name}}</td>
                         <td>{{ $value->mobile_number}}</td>
                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                         <td>
                         <a href=" {{ url('admin/admin/parent/assign_parent_student') . $value->id. '/' .$parent_id}} " class="btn btn-info">Add Student To Parent</a>
                            
                             </td>
                        </tr>
                            
                        @endforeach
                     </tbody>

                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card" style="font-size: 12px">
                        <div class="card-header bg-info">
                        <h5 class="card-title text-light" style="font-size: 12px">Parent List   </h5>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table mb-0">
                            <div class="col-sm-12" style="text-align: right">
                           
                              @if(session('success'))
                                <div class="alert alert-success">{{ session('success')}}
                                </div>
                                @endif
        
                                @if(session('error'))
                                <div class="alert alert-error">
                                {{ session('error')}}
                                </div>
                                @endif
                       
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Profile</th>
                                    <th>Student Name</th>               
                                    <th>Email</th>                   
                                    <th>Parent Name</th>                   
                                    <th>Phone</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                       
                                        <tr>
                                         <td>{{ $value->id}}</td>
                                         <td> 
                                             @if(!empty($value->getProfile()))
                                             <img src="{{ $value->getProfile() }}" alt="profile" style="height: 50px; width: 50px; border-radius: 50px">
                                             @endif
                                         </td>                   
                                         <td>{{ $value->name}}</td>
                                         <td>{{ $value->email}}</td>
                                         <td>{{ $value->parent_name}}</td>
                                         <td>{{ $value->mobile_number}}</td>
                                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                         <td>
                                         <a href=" {{ url('admin/admin/parent/assign_parent_student_delete') . $value->id}} " class="btn btn-sm btn-danger">Delete</a>
                                            
                                             </td>
                                        </tr>
                                            
                                        @endforeach
                                     </tbody>
                
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

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