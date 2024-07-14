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
                <div class="col-md-8">
                    <form class="d-flex" action="{{ route('route_search_position') }}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 70%" type="search" placeholder="Search"
                            name="search_position">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('interviewschedule.create') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i> Thêm Lịch phỏng vấn</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Id </th>
                                    <th>Profile screen</th>
                                    <th>Ngày Phỏng vấn</th>
                                    <th>Giờ Phỏng Vấn</th>
                                    <th>Địa Điểm Phỏng Vấn</th>
                                    <th>Nội Dung Phỏng Vấn</th>
                                    <th>Trạng Thái</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($InterviewSchedule as $inter)
                                    <tr class="holiday-completed">
                                        <td>{{ $inter->id }}</td>
                                        <td>{{ $inter->user_id }}</td>
                                        <td>{{ $inter->profile_screening_id }}</td>
                                        <td>{{ $inter->interview_day }}</td>
                                        <td>{{ $inter->interview_time }}</td>
                                        <td>{{ $inter->interview_location }}</td>
                                        <td>{{ $inter->interview_content }}</td>
                                        <td>{{ $inter->status }}</td>
                                        <td>
                                            <a href="{{ route('interviewschedule.edit',$inter->id)}}">
                                                <i class="fas fa-pen" style="margin-right: 5%"></i>
                                            </a>
                                            <form method="POST" action="{{ route('interviewschedule.destroy', $inter->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background:none;border:none;color:#007BFF;"><i class="far fa-trash-alt"></i></button>
                                            </form>
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
