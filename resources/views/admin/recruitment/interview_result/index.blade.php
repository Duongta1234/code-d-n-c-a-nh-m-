@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Kết quả phỏng vấn</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">kết quả phỏng vấn</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md">
                    <form class="d-flex" action="{{route('route_search_interview_result')}}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 60%" type="search" placeholder="Search" name="search_candidate_name">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ và tên ứng viên </th>
                                <th>Vị trí phỏng vấn </th>
                                <th>Người phỏng vấn</th>
                                <th>Kết quả</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListInterviewResult as $list)

                                <tr class="holiday-completed">

                                    <td>{{ $list->id }}</td>
                                    <td><a href="{{ route('route_interview_result_detail',['id'=>$list->id]) }}">{{ $list->candidate->name }}</a></td>
                                    <td><a href="{{ route('route_interview_result_detail',['id'=>$list->id]) }}">{{ $list->interviewSchedule->job_position }}</a></td>
                                    <td><a href="{{ route('route_interview_result_detail',['id'=>$list->id]) }}">{{ $list->interviewSchedule->user->employee->first_name }} {{ $list->interviewSchedule->user->employee->last_name }}</a></td>
                                    <td><a href="{{ route('route_interview_result_detail',['id'=>$list->id]) }}">
                                            @if ($list->result_interview == 1)
                                                <span style="color: green;"><strong>Pass</strong></span>
                                            @elseif($list->result_interview == 2)
                                                <span style="color: red;"><strong>Not Pass</strong></span>
                                            @elseif($list->result_interview == 3)
                                                <strong>Ứng viên không tới</strong>
                                            @elseif($list->result_interview == 0)

                                            @endif
                                        </a></td>
                                    <th>
                                            @if ($list->note == 1)
                                                <b>Đã gửi email</b>
                                            @elseif ($list->result_interview == 1)
                                                <a href="{{ route('route_interview_result_pass_email',['id'=>$list->id]) }}"><button class="btn btn-success" >Gửi email</button></a>
                                            @elseif ($list->result_interview == 2 || $list->result_interview == 3)
                                                <a href="{{ route('route_interview_result_failed_email',['id'=>$list->id]) }}"><button class="btn btn-danger" onclick="confirmSend()" >Gửi email </button> </a>
                                            @elseif($list->result_interview == 0)
                                        @endif


                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
        <script>
            function confirmSend(){
                return confirm('Bạn chắc chắn muốn gửi email') ? 0 : false;
            }
        </script>