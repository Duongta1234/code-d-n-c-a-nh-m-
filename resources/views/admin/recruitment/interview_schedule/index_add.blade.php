@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Lịch trình phỏng vấn</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lịch trình phỏng vấn</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md">
                    <form class="d-flex" action="{{route('route_interview_schedule_index')}}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 40%" type="search" placeholder="Tên"
                               name="search_candidate_name">
                        <input class="form-control me-2" style="width: 20%" type="date" name="date_apply">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>
                {{--                <div class="col-md-4">--}}
                {{--                    <div class="add-emp-section">--}}
                {{--                        <a href="{{route('route_candidate_add')}}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Thêm ứng viên</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên ứng viên</th>
                                <th>Vị trí phỏng vấn</th>
                                <th>Thời gian phỏng vấn</th>
                                <th>Người phỏng vấn</th>
                                @can('create-interview-schedule')
                                    <th>Chi tiết</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListInterviewSchedule as $list)
                                <tr class="holiday-completed">
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->candidate->name }}</td>
                                    <td>{{ $list->job_position }}</td>
                                    <td>{{ $list->interview_time}}</td>
                                    <td>
                                        @if($list->user_id != 0 && auth()->user()->can('show-employees'))
                                            {{ $list->user->employee->first_name }}
                                            {{ $list->user->employee->last_name }}
                                        @elseif($list->user_id != 0 && $list->user->id == auth()->user()->id)
                                            {{ $list->user->employee->first_name }}
                                            {{ $list->user->employee->last_name }}
                                        @endif
                                    </td>
{{--                                    @can('create-interview-schedule')--}}
                                        <td>
                                            <a href="{{ route('route_interview_schedule_detail',['id'=>$list->id]) }}"><i
                                                    class="fa-solid fa-eye"></i></a>
                                        </td>
{{--                                    @endcan--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
