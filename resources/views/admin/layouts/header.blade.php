<div class="header">

    <div class="header-left">
        <a href="{{route('route_admin_dashboard_index')}}" class="logo">
            <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
        </a>
    </div>

    <div class="header-center">
        <h1>PHÁT ĐẠT</h1>
    </div>
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <ul class="header-new-menu">
        {{-- <li>--}}
            {{-- <a href="#" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">Clients</a>--}}
            {{-- <div class="dropdown-menu">--}}
                {{-- <a class="dropdown-item" href="clients.html">Clients</a>--}}
                {{-- </div>--}}
            {{-- </li>--}}
        {{-- <li>--}}
            {{-- <a href="#" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">Projects</a>--}}
            {{-- <div class="dropdown-menu">--}}
                {{-- <a class="dropdown-item" href="projects.html">Projects</a>--}}
                {{-- <a class="dropdown-item" href="tasks.html">Tasks</a>--}}
                {{-- <a class="dropdown-item" href="task-board.html">Task Board</a>--}}
                {{-- </div>--}}

            {{-- </li>--}}
        {{-- <li>
            @if(auth()->user()->can('send-leave-request'))
            <a href="{{ route('leave_requests.create') }}" class="btn btn-primary">Yêu cầu nghỉ phép</a>
            @endif

            @if(auth()->user()->can('approve-leave-request'))
            <a href="{{ route('admin.leave_requests') }}" class="btn btn-primary">Xác nhận yêu cầu nghỉ phép</a>
            @endif
        </li>
        <li>
            @if(auth()->user()->can('manage-roles'))
            <a href="{{route('roles.index')}}" class="btn btn-primary">Role</a>
            @endif
        </li>
        <li>
            @if(auth()->user()->can('manage-employees'))
            <a href="{{route('users.index')}}" class="btn btn-primary">User</a>
            @endif
        </li> --}}
        {{-- <li>
            <a href="#" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Leads</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="leads.html">Leads</a>
            </div>
        </li>
        <li>
            <a href="#" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tickets</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="tickets.html">Tickets</a>
            </div>
        </li> --}}
    </ul>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <ul class="nav user-menu">
        {{-- <li>
            <a href="#" class="report-btn">
                <span class="material-icons-outlined">
                    text_snippet
                </span>
            </a>
        </li> --}}
        <li>
{{--
            <div class="page-title-box">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="https://smarthr.dreamguystech.com/html/template2/search.html">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn btn-outline-secondary" type="button">
                                <span class="material-icons-outlined">
                                    search
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div> --}}

        </li>

        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                {{-- <i class="far fa-bell"></i> <span class="badge rounded-pill">{{$notifications->count()}}</span> --}}
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        {{-- @foreach (Auth::user()->notifications as $notification)
                        <li class="notification-message">
                            <a href="">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/profiles/avatar-02.jpg')}}" alt="User Image">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">{{
                                                $notification->data['user_name']}}</span> gửi thống báo
                                            <span class="noti-title">{{ $notification->data['reason']}}</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>

                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/profiles/avatar-03.jpg')}}" alt="User Image">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed
                                            the task name <span class="noti-title">Appointment booking with payment
                                                gateway</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/profiles/avatar-06.jpg')}}" alt="User Image">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span
                                                class="noti-title">Domenic Houston</span> and <span
                                                class="noti-title">Claire Mapes</span>
                                            to project <span class="noti-title">Doctor available module</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/profiles/avatar-17.jpg')}}" alt="User Image">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed
                                            task <span class="noti-title">Patient and Doctor video conferencing</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media d-flex">
                                    <span class="avatar flex-shrink-0">
                                        <img src="{{asset('assets/img/profiles/avatar-13.jpg')}}" alt="User Image">
                                    </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added
                                            new task <span class="noti-title">Private chat module</span></p>
                                        <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{asset('assets/img/profiles/avatar-21.jpg')}}"
                        alt="User Image"></span>

            </a>
            <div class="dropdown-menu">
                @if (Auth::check())
                <a class="dropdown-item" href="{{route('employees.detail',Auth::user()->employee->id)}}">My
                    Profile</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <a class="dropdown-item form-logout" href="">Logout</a>
                </form>
                @else
                <a class="dropdown-item" href="{{route('login')}}">Login</a>
                @endif
            </div>
        </li>
    </ul>

    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <a class="dropdown-item form-logout" href="">Logout</a>
            </form>
        </div>
    </div>

</div>
