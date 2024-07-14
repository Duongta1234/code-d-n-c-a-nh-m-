@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Trạng thái ứng viên</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                {{--                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>--}}
                                {{--                                <li class="breadcrumb-item active" aria-current="page">Lịch trình phỏng vấn</li>--}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md">
                    <form class="d-flex" action="{{route('route_status_candidate_index')}}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 40%" type="search" placeholder="Tên"
                               name="search_candidate_name">
                        <input class="form-control me-2" style="width: 20%" type="date" name="date_apply">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>
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
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListInterviewSchedule as $list)

                                <tr class="holiday-completed">
                                    <td>{{ $list->id }}</td>
                                    {{--                                    <td><a href="{{ route('route_status_candidate_detail',['id'=>$list->id]) }}">{{ $list->candidate->name }}</a></td>--}}
                                    {{--                                    <td><a href="{{ route('route_status_candidate_detail',['id'=>$list->id]) }}">{{ $list->job_position }}</a></td>--}}
                                    {{--                                    <td><a href="{{ route('route_status_candidate_detail',['id'=>$list->id]) }}">{{ $list->interview_time}}</a></td>--}}
                                    {{--                                    <td><a href="{{ route('route_status_candidate_detail',['id'=>$list->id]) }}">{{ $list->status == 1 ? "Đã gửi email phỏng vấn": ($list->status == 2? "Xác nhận tham gia phỏng vấn":"Từ chối/Không phản hồi email") }}</a></td>--}}
                                    <td>
                                        {{ $list->candidate->name }}
                                    </td>
                                    <td>
                                        {{ $list->job_position }}
                                    </td>
                                    <td>
                                        {{ $list->interview_time}}
                                    </td>
                                    <td>
                                        {{ $list->status == 1 ? "Đã gửi email phỏng vấn": ($list->status == 2? "Xác nhận tham gia phỏng vấn":"Từ chối/Không phản hồi email") }}
                                    </td>

                                    <td>
                                        @can('create-status-candidate')
                                        <a href="{{ route('route_status_candidate_detail',['id'=>$list->id]) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
