<div class="sidebar" id="sidebar">
    <div class="sidebar-left slimscroll">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @if (Auth::check())
                @can('show-employees')
                    <a class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                       href="#v-pills-dashboard"
                       role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                <span class="material-icons-outlined">
                    home
                </span>
                    </a>
                @endcan
                @can('show-employees')
                    <a class="nav-link" id="v-pills-clients-tab" title="Clients" data-bs-toggle="pill"
                       href="#v-pills-clients"
                       role="tab" aria-controls="v-pills-clients" aria-selected="false">
                <span class="material-icons-outlined">
                    person
                </span>

                    </a>
                @endcan
                <a class="nav-link " id="v-pills-employees-tab" title="Employees" data-bs-toggle="pill"
                   href="#v-pills-employees" role="tab" aria-controls="v-pills-employees" aria-selected="false">
                <span class="material-icons-outlined">
                    people
                </span>
                </a>
                <a class="nav-link" id="v-pills-payroll-tab" title="Salary" data-bs-toggle="pill"
                   href="#v-pills-payroll" role="tab" aria-controls="v-pills-payroll" aria-selected="false">
                <span class="material-icons-outlined">
                    request_quote
                </span>
                </a>
            @endif

            <a class="nav-link" id="v-pills-projects-tab" title="Projects" data-bs-toggle="pill"
               href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">
                <span class="material-icons-outlined">
                    topic
                </span>
            </a>

            @if (Auth::check())
                <a class="nav-link" id="v-pills-leads-tab" title="Leads" data-bs-toggle="pill"
                   href="#v-pills-leads"
                   role="tab" aria-controls="v-pills-leads" aria-selected="false">
                <span class="material-icons-outlined">
                    leaderboard
                </span>
                </a>
            @endif


        </div>
    </div>
    <div class="sidebar-right">
        <div class="tab-content" id="v-pills-tabContent">
            @if(Auth::check())
                @can('show-employees')
                    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                         aria-labelledby="v-pills-dashboard-tab">
                        <p>Dashboard</p>
                        <ul>
                            <li>
                                <a href="{{route('route_admin_dashboard_index')}}">Admin Dashboard</a>
                            </li>
                            {{-- <li>
                                <a href="employee-dashboard.html">Employee Dashboard</a>
                            </li> --}}
                        </ul>
                    </div>
                @endcan
                <div class="tab-pane fade" id="v-pills-employees" role="tabpanel"
                     aria-labelledby="v-pills-employees-tab">
                    <p>Thông tin nhân sự</p>
                    <ul>

                        <li>
                            <a href="{{route('employees.index')}}">Nhân viên</a>
                        </li>
                        @can('show-employees')
                            <li><a href="{{ route('route_status_employee_index') }}">Trạng thái nhân viên</a></li>
                        @endcan
                        {{-- <li><a href="{{ route('level.index') }}">Trình độ</a></li>
                        <li><a href="{{ route('national.index') }}">Quốc tịch</a></li>
                        <li><a href="{{ route('religion.index') }}">Tôn giáo</a></li> --}}
                        @can('show-employees')
                            <li><a href="{{ route('route_position_index')}}">Chức vụ</a></li>
                            {{-- <li><a href="{{ route('leave_requests.index') }}">Lý do nghỉ phép</a></li> --}}
                        @endcan

                        <li><a href="{{ route('route_contract_index') }}">Hợp đồng</a></li>


                        {{-- <li><a href="shift-scheduling.html">Shi ft & Schedule</a></li>--}}
                        {{-- <li><a href="overtime.html">Overtime</a></li>--}}
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-clients" role="tabpanel" aria-labelledby="v-pills-clients-tab">
                    <p>User</p>
                    <ul>
                        @can('show-user')
                            <li>
                                <a href="{{route('users.index')}}">User</a>
                            </li>
                        @endcan
                        @can('show-role')
                            <li>
                                <a href="{{route('roles.index')}}">Role</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            @endif
            @if (Auth::check())
                <div class="tab-pane fade" id="v-pills-payroll" role="tabpanel"
                     aria-labelledby="v-pills-payroll-tab">
                    <p>Chấm công- Nghỉ phép- Lương</p>
                    <ul>
                        <li><a href="{{route('attendance.index')}}">Chấm công</a></li>
                        @can('approve-leave-request')
                            <li>
                                <a href="{{ route('leave_requests.approveRequests') }}">Xác nhận nghỉ phép</a>
                            </li>
                        @endcan
                        @can('show-send-request-leave')
                            <li>
                                <a href="{{ route('leave_requests.index') }}">Yêu cầu nghỉ phép</a>
                            </li>
                        @endcan
                        <li><a href="{{route('basicSalary.index') }}"> Lương cơ bản</a></li>
                        <li><a href="{{route('salary.index') }}"> Chi tiết lương </a></li>
                        @can('show-employees')
                            <li><a href="{{route('holiday.index') }}"> Dịp/Lễ </a></li>
                        @endcan
                    </ul>
                </div>
            @endif
            <div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">
                <p>Tuyển dụng</p>
                <ul>
                    <li><a href="{{route('route_procedure') }}">Tuyển dụng</a></li>
                    @if (Auth::check())
                        @can('show-job-position')
                            <li><a href="{{route('route_job_position_index') }}">Vị trí tuyển dụng</a></li>
                        @endcan
                        @can('show-job-posting')
                            <li><a href="{{route('route_job_posting_index') }}">Bài đăng tuyển dụng</a></li>
                        @endcan
                        @can('show-candidate')
                            <li><a href="{{route('route_candidate_index') }}">Danh sách ứng viên</a></li>
                        @endcan
                        @can('show-status-candidate')
                            <li><a href="{{route('route_status_candidate_index') }}">Trạng thái ứng viên</a></li>
                        @endcan
                        @can('show-interview-schedule')
                            <li><a href="{{route('route_interview_schedule_index') }}">Lịch trình phỏng vấn</a></li>
                        @endcan
                        @can('show-interview-result')
                            <li><a href="{{route('route_interview_result_index') }}">Kết quả phỏng vấn</a></li>
                        @endcan
                    @endif
                </ul>
            </div>
            @if (Auth::check())
                <div class="tab-pane fade" id="v-pills-leads" role="tabpanel" aria-labelledby="v-pills-leads-tab">
                    <p>Leads</p>
                    <ul>
                        <li><a href="{{route('attendance.indexAdmin')}}">Thống kê chấm công</a></li>
                        <li>
                            @if(auth()->user()->can('approve-leave-request'))
                                <a href="{{ route('leave_requests.statistics') }}">Thống kê nghỉ phép</a>
                            @endif
                        </li>
                    </ul>

                </div>
            @endif
        </div>
    </div>
</div>
