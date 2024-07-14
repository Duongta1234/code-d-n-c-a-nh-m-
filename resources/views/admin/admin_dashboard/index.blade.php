@extends('admin.layouts.main')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Dashboard </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class="text-center w-100 p-3">
                                <h3 class="bl-text mb-1">{{$countPosition}}</h3>
                                <h2>Chức vụ</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class="text-center w-100 p-3">
                                <h3 class="bl-text mb-1">{{$countEmployee}}</h3>
                                <h2>Nhân viên</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class="text-center w-100 p-3">
                                <h3 class="bl-text mb-1">{{$countUser}}</h3>
                                <h2>Tài khoản</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class="text-center w-100 p-3">
                                <h3 class="bl-text mb-1">{{$countCadidate}}</h3>
                                <h2>Ứng viên</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="row jb-dashboard">--}}
{{--                        <div class="col-md-6 text-center">--}}
{{--                            <div class="card flex-fill">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Total Revenue</h3>--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            Last 6 months--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                            <a class="dropdown-item" href="#">Last 6 months</a>--}}
{{--                                            <a class="dropdown-item" href="#">Last 3 months</a>--}}
{{--                                            <a class="dropdown-item" href="#">Last 1 months</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div id="bar-charts"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 text-center">--}}
{{--                            <div class="card flex-fill">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Sales Overview</h3>--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            Last 6 months--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
{{--                                            <a class="dropdown-item" href="#">Last 6 months</a>--}}
{{--                                            <a class="dropdown-item" href="#">Last 3 months</a>--}}
{{--                                            <a class="dropdown-item" href="#">Last 1 months</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div id="line-charts"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class>
                                <h2>Yêu cầu nghỉ cần xác nhận</h2>
                                <h3 class="bl-text">{{$pendingCount}}</h3>
                            </div>
                        </div>
                        <div class id="newTicketChart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class>
                                <h2>Lịch trình sắp phỏng vấn</h2>
                                <h3 class="org-text">{{$countInterviewSchedule}}</h3>
                            </div>
                        </div>
                        <div id="solvedTicketChart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class>
                                <h2>KQ tuyển dụng cần xác nhận </h2>
                                <h3 class="red-text">{{$countInterviewSesult}}</h3>
                            </div>
                        </div>
                        <div id="openTicketChart"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card flex-fill tickets-card">
                        <div class="card-header">
                            <div class>
                                <h2>Bài tuyển dụng đang hiển thị</h2>
                                <h3 class="red-text">{{$count_job_posting}}</h3>
                            </div>
                        </div>
                        <div class id="pendingTicketChart"></div>
                    </div>
                </div>
            </div>


{{--            <div class="row">--}}
{{--                <div class="col-md-6 d-flex">--}}
{{--                    <div class="card card-table flex-fill">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title mb-0">Invoices</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-nowrap custom-table mb-0">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Invoice ID</th>--}}
{{--                                        <th>Client</th>--}}
{{--                                        <th>Due Date</th>--}}
{{--                                        <th>Total</th>--}}
{{--                                        <th>Status</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0001</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Global Technologies</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>11 Mar 2019</td>--}}
{{--                                        <td>$380</td>--}}
{{--                                        <td>--}}
{{--                                            <span class="badge bg-inverse-warning">Partially Paid</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0002</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Delta Infotech</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>8 Feb 2019</td>--}}
{{--                                        <td>$500</td>--}}
{{--                                        <td>--}}
{{--                                            <span class="badge bg-inverse-success">Paid</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0003</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Cream Inc</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>23 Jan 2019</td>--}}
{{--                                        <td>$60</td>--}}
{{--                                        <td>--}}
{{--                                            <span class="badge bg-inverse-danger">Unpaid</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer">--}}
{{--                            <a href="invoices.html">View all invoices</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 d-flex">--}}
{{--                    <div class="card card-table flex-fill">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title mb-0">Payments</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table custom-table table-nowrap mb-0">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Invoice ID</th>--}}
{{--                                        <th>Client</th>--}}
{{--                                        <th>Payment Type</th>--}}
{{--                                        <th>Paid Date</th>--}}
{{--                                        <th>Paid Amount</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0001</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Global Technologies</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>Paypal</td>--}}
{{--                                        <td>11 Mar 2019</td>--}}
{{--                                        <td>$380</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0002</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Delta Infotech</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>Paypal</td>--}}
{{--                                        <td>8 Feb 2019</td>--}}
{{--                                        <td>$500</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><a href="invoice-view.html">#INV-0003</a></td>--}}
{{--                                        <td>--}}
{{--                                            <h2><a href="#">Cream Inc</a></h2>--}}
{{--                                        </td>--}}
{{--                                        <td>Paypal</td>--}}
{{--                                        <td>23 Jan 2019</td>--}}
{{--                                        <td>$60</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer">--}}
{{--                            <a href="payments.html">View all payments</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Nhân viên</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Role</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($employees as $employee)
                                        <tr data-tr="{{$employee->id}}">
                                            <td>{{$employee->id}}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{route('employees.detail',$employee->id)}}" class="avatar"><img
                                                            class="text-employee-image"
                                                            src="{{asset('storage/images/employee_image/'.$employee->image)}}"
                                                            alt="User Image"></a>
                                                    <a href="{{route('employees.detail',$employee->id)}}"
                                                       class="text-employee-name">{{$employee->first_name}}
                                                        {{$employee->last_name}}{{--<span>Web Designer</span>--}}</a>
                                                </h2>
                                            </td>
                                            <td class="text-employee-position">
                                                @if ($employee->user_id)
                                                    @foreach ($employee->user->getRoleNames() as $role)
                                                        <span class="role-info role-bg-one">{{ $role }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('employees.index')}}">Xem tất cả</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Tài Khoản</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->status}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('users.index')}}">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/js/chart.js"></script>

<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from smarthr.dreamguystech.com/html/template2/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 09:14:05 GMT -->
</html>
@endsection
