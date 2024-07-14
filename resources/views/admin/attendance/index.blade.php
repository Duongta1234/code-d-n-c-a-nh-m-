@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Chấm công</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chấm công</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="attendance-index row justify-content-center">
            <div class="col-md-4 d-flex ">
                <div class="card punch-status flex-fill">
                    <div class="card-body">
                        <h5 class="card-title">Thời gian</h5>
                        <div class="punch-finger">
                            <i class="fas fa-fingerprint"></i>
                            @if (!empty($timesheet))
                            @if ($timesheet->time_in != null && $timesheet->time_out == null)
                            <div class="punch-det">
                                <h6>Punch In at</h6>
                                <p>{{$timesheet->log_date}} {{$timesheet->time_in}}</p>
                            </div>
                            @else
                            <div class="punch-det">
                                <h6>Punch out at</h6>
                                <p>{{$timesheet->log_date}} {{$timesheet->time_out}}</p>
                            </div>
                            @endif
                            @endif
                        </div>
                        <div class="punch-info">
                            <div class="punch-hours">
                                <span></span>
                                {{-- <span id="attendance-hours"></span>:<span id="attendance-minute"></span>:<span
                                    id="attendance-second"></span> --}}
                            </div>
                        </div>
                        <form action="{{route('attendance.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{!empty($timesheet) ? $timesheet->id : false}}">
                            <div class="punch-btn-section">
                                <span>Punch in</span>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                        id="switch_annual" {{!empty($timesheet) && $timesheet->time_in != null &&
                                    $timesheet->time_out == null
                                    ? 'checked':false }}
                                    {{$ip != 0 || $sunday == 1 || !empty($timesheet) && $timesheet->time_in != null &&
                                    $timesheet->time_out != null
                                    ? 'disabled':false }}
                                    >
                                    <label class="onoffswitch-label" for="switch_annual">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch onoffswitch-innerone"></span>
                                    </label>
                                </div>
                                <span>Giờ ra</span>
                            </div>
                        </form>
                        {{-- <div class="statistics">
                            <ul>
                                <li>
                                    <div class="stats-box">
                                        <p>Break</p>
                                        <h6>1.21 hrs</h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="stats-box">
                                        <p>Overtime</p>
                                        <h6>3 hrs</h6>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h5 class="card-sub-title">Số liệu thống kê</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card st-card st-c1">
                                    <div class="stats-info">
                                        <div>
                                            <p>Hôm nay</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c2">
                                    <div class="stats-info">
                                        <div>
                                            <p>Tuần này</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 47%"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c3">
                                    <div class="stats-info">
                                        <div>
                                            <p>Tháng này</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 87%"
                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card st-card st-c4">
                                    <div class="stats-info">
                                        <div>
                                            <p>Còn lại</p>
                                            <h5>3.45 / 8 hrs</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 87%"
                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card st-card st-c5">
                                    <div class="stats-info">
                                        <div>
                                            <p>Tăng ca</p>
                                            <h5>4</h5>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 57%"
                                                aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-4 d-flex">
                <div class="card recent-activity flex-fill">
                    <div class="card-body">
                        <h5 class="card-title">Hoặt động hôm nay</h5>
                        <ul class="res-activity-list">
                            @if (!empty($timesheet))
                            @if ($timesheet->time_in != null && $timesheet->time_out == null)
                            <li>
                                <p class="mb-0">Giờ vào</p>
                                <p class="res-activity-time">
                                    <i class="far fa-clock"></i>
                                    {{$timesheet->time_in}}
                                </p>
                            </li>
                            @else
                            <li>
                                <p class="mb-0">Giờ ra</p>
                                <p class="res-activity-time">
                                    <i class="far fa-clock"></i>
                                    {{$timesheet->time_out}}
                                </p>
                            </li>
                            <li>
                                <p class="mb-0">Giờ vào</p>
                                <p class="res-activity-time">
                                    <i class="far fa-clock"></i>
                                    {{$timesheet->time_in}}
                                </p>
                            </li>
                            @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{route('attendance.client-search')}}" method="get">
            <div class="row filter-row">
                <div class="col-sm-3">
                    <div class="input-block mb-3 form-focus mb-0">
                        <div class="cal-icon">
                            <input type="text" class="form-control floating datetimepicker" name="date">
                        </div>
                        <label class="focus-label">Ngày</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-block mb-3 form-focus select-focus mb-0">
                        <select class="select floating" name="month">
                            <option value="">-</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="4">Apr</option>
                            <option value="5">May</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Aug</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        <label class="focus-label">Chọn tháng</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-block mb-3 form-focus select-focus mb-0">
                        <select class="select floating" name="year">
                            <option value="">-</option>
                            @if ($years)
                            @foreach ($years->keys()->all() as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                            @endif
                        </select>
                        <label class="focus-label">Chọn năm</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success btn-search"><i class="fas fa-search me-2"></i>Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable att-emp-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ngày </th>
                                <th>Giờ vào</th>
                                <th>Giờ ra</th>
                                <th>Trạng thái</th>
                                <th>Lý do</th>
                                {{-- <th>Tăng ca</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timesheets as $index => $timesheet)
                            <tr>
                                <td>{{$timesheet->id}}</td>
                                <td>{{$timesheet->log_date}}</td>
                                <td>{{$timesheet->time_in}}</td>
                                <td>{{$timesheet->time_out}}</td>
                                <td>{{$timesheet->status == 0 ? 'Chưa hoàn thành': 'Đã hoàn thành'}}</td>
                                <td>{{$timesheet->reason}}</td>
                                {{-- <td></td> --}}
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script src="{{asset('assets/js/admin/attendance.js')}}"></script>
@endsection