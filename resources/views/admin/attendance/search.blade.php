@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">
        <div class="content container-fluid">

                <div class="row">
                        <div class="col-md-12">
                                <div class="page-head-box">
                                        <h3>Attendance</h3>
                                        <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a
                                                                        href="admin-dashboard.html">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                                Attendance</li>
                                                </ol>
                                        </nav>
                                </div>
                        </div>
                </div>

                <form action="{{route('attendance.search')}}" method="post">
                        <div class="row filter-row">

                                @csrf
                                <div class="col-sm-6 col-md-3">
                                        <div class="input-block mb-3 form-focus mb-0">
                                                <input type="text" name="id" class="form-control floating">
                                                <label class="focus-label">Employee ID</label>
                                        </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                        <div class="input-block mb-3 form-focus select-focus mb-0">
                                                <select class="select floating" name="month">
                                                        <option value="0">-</option>
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
                                                <label class="focus-label">Select Month</label>
                                        </div>
                                </div>
                                {{-- <div class="col-sm-6 col-md-3">
                                        <div class="input-block mb-3 form-focus select-focus mb-0">
                                                <select class="select floating" name="year">
                                                        <option>-</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                </select>
                                                <label class="focus-label">Select Year</label>
                                        </div>
                                </div> --}}
                                <div class="col-sm-6 col-md-3">
                                        <button class="btn btn-success btn-search"> Search </button>
                                </div>

                        </div>
                </form>

                <div class="admin-attendance row">
                        <div class="col-lg-12">
                                <div class="table-responsive att-table">
                                        <table class="table table-striped custom-table table-nowrap datatable mb-0">
                                                <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Month</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>7</th>
                                                                <th>8</th>
                                                                <th>9</th>
                                                                <th>10</th>
                                                                <th>11</th>
                                                                <th>12</th>
                                                                <th>13</th>
                                                                <th>14</th>
                                                                <th>15</th>
                                                                <th>16</th>
                                                                <th>17</th>
                                                                <th>18</th>
                                                                <th>19</th>
                                                                <th>20</th>
                                                                <th>21</th>
                                                                <th>22</th>
                                                                <th>23</th>
                                                                <th>24</th>
                                                                <th>25</th>
                                                                <th>26</th>
                                                                <th>27</th>
                                                                <th>28</th>
                                                                <th>29</th>
                                                                <th>30</th>
                                                                <th>31</th>
                                                        </tr>
                                                </thead>
                                                <tbody>

                                                        @foreach ($months->keys()->all() as $month)
                                                        <tr>
                                                                <td>{{$employee->id}}</td>
                                                                <td>{{$month}}</td>
                                                                {{-- <td>
                                                                        <h2 class="table-avatar">
                                                                                <a class="avatar"
                                                                                        href="profile.html"><img
                                                                                                src="assets/img/profiles/avatar-09.jpg"
                                                                                                alt="User Image"></a>
                                                                                <a href="profile.html">{{$employee->first_name}}
                                                                                        {{$employee->last_name}}</a>
                                                                        </h2>
                                                                </td> --}}
                                                                @for ($i = 1; $i <= 31; $i++) <td>
                                                                        @foreach ($employee->attendance as $attendance)
                                                                        @if ($attendance->log_date->format('j') == $i && $attendance->log_date->format('m') == $month)
                                                                        @if ($attendance->status == 1)
                                                                        <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#attendance_info"
                                                                                data-attendance="{{$attendance->id}}"
                                                                                class="attendance-check"><i
                                                                                        class="fa fa-check text-success"></i></a>

                                                                        @elseif($attendance->status == 0)
                                                                        <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#attendance_info"
                                                                                data-attendance="{{$attendance->id}}"
                                                                                class="attendance-check"><i
                                                                                        class="fas fa-times text-danger"></i></a>

                                                                        @endif
                                                                        @endif
                                                                        @endforeach
                                                                        </td>
                                                                        @endfor
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>


        <div class="admin-attendance modal custom-modal fade" id="attendance_info" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">Attendance Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fas fa-times"></i>
                                        </button>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="card punch-status">
                                                                <div class="card-body">
                                                                        <h5 class="card-title">Timesheet <small
                                                                                        class="text-muted log-date"></small>
                                                                        </h5>
                                                                        <div class="punch-det">
                                                                                <h6>Punch In at</h6>
                                                                                <p class="time-in"></p>
                                                                        </div>
                                                                        <div class="punch-info">
                                                                                <div class="punch-hours">
                                                                                        <span class="count-time"></span>
                                                                                </div>
                                                                        </div>
                                                                        <div class="punch-det">
                                                                                <h6>Punch Out at</h6>
                                                                                <p class="time-out"></p>
                                                                        </div>
                                                                        {{-- <div class="statistics">
                                                                                <form action="" method="post"
                                                                                        class="form-status">
                                                                                        @csrf
                                                                                        <div class="punch-btn-section">
                                                                                                <span>Punch in</span>
                                                                                                <div
                                                                                                        class="onoffswitch">
                                                                                                        <input type="checkbox"
                                                                                                                name="onoffswitch"
                                                                                                                class="onoffswitch-checkbox"
                                                                                                                id="switch_annual"
                                                                                                                {{!empty($timesheet)
                                                                                                                &&
                                                                                                                $timesheet->time_in
                                                                                                        != null &&
                                                                                                        $timesheet->time_out
                                                                                                        ==
                                                                                                        null
                                                                                                        ?
                                                                                                        'checked':false
                                                                                                        }}
                                                                                                        {{!empty($timesheet)
                                                                                                        &&
                                                                                                        $timesheet->time_in
                                                                                                        !=
                                                                                                        null &&
                                                                                                        $timesheet->time_out
                                                                                                        !=
                                                                                                        null
                                                                                                        ?
                                                                                                        'disabled':false
                                                                                                        }}
                                                                                                        >
                                                                                                        <label class="onoffswitch-label"
                                                                                                                for="switch_annual">
                                                                                                                <span
                                                                                                                        class="onoffswitch-inner"></span>
                                                                                                                <span
                                                                                                                        class="onoffswitch-switch onoffswitch-innerone"></span>
                                                                                                        </label>
                                                                                                </div>
                                                                                                <span>Punch out</span>
                                                                                        </div>
                                                                                </form>
                                                                        </div> --}}
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="card recent-activity">
                                                                <div class="card-body">
                                                                        <h5 class="card-title">Activity</h5>
                                                                        <ul class="res-activity-list"
                                                                                style="height: 105px">
                                                                                <li>
                                                                                        <p class="mb-0">Punch In at</p>
                                                                                        <p
                                                                                                class="res-activity-time punch-in">
                                                                                        </p>
                                                                                </li>
                                                                                <li>
                                                                                        <p class="mb-0">Punch Out at</p>
                                                                                        <p
                                                                                                class="res-activity-time punch-out">


                                                                                        </p>
                                                                                </li>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="card recent-activity">
                                                                <div class="card-body">
                                                                        <h5 class="card-title">Thay đổi trạng thái
                                                                        </h5>
                                                                        <form action="" method="post"
                                                                                class="form-status">
                                                                                @csrf
                                                                                <div class="punch-btn-section">
                                                                                        <span>Punch in</span>
                                                                                        <div class="onoffswitch">
                                                                                                <input type="checkbox"
                                                                                                        name="onoffswitch"
                                                                                                        class="onoffswitch-checkbox"
                                                                                                        id="switch_annual">
                                                                                                <label class="onoffswitch-label"
                                                                                                        for="switch_annual">
                                                                                                        <span
                                                                                                                class="onoffswitch-inner"></span>
                                                                                                        <span
                                                                                                                class="onoffswitch-switch onoffswitch-innerone"></span>
                                                                                                </label>
                                                                                        </div>
                                                                                        <span>Punch out</span>
                                                                                </div>
                                                                                <input type="text" name="reason"
                                                                                        class="form-control input-reason"
                                                                                        placeholder="Lý do..."
                                                                                        style="border-radius: 50px"
                                                                                        hidden value="">
                                                                                <a href=""
                                                                                        class="btn btn-success btn-add-emp bg-primary mt-3 d-none mx-auto submit-status">Xác
                                                                                        nhận</a>
                                                                        </form>


                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/js/admin/attendance.js')}}"></script>
@endsection