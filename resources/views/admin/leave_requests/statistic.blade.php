@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Thống kê nghỉ phép</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thống kê nghỉ phép</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{ route('leave_requests.statistics') }}" method="GET" class="row">
                        <div class="col-sm-6 col-md-5">
                            <div class="input-block mb-3">
                                <label class="focus-label">Tù ngày</label>
                                <input type="date" name="from_date" class="form-control floating">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-5">
                            <div class="input-block mb-3">
                                <label class="focus-label">Đến ngày</label>
                                <input type="date" name="to_date" class="form-control floating">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-2">
                            <div class="input-block mb-3">
                                <label class="focus-label" style="visibility: hidden;">Search</label>
                                <button type="submit" class="btn btn-success btn-search" style="width: 100%;"><i
                                        class="fas fa-search me-2"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(isset($statistics))
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped datatable">
                            <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Họ tên</th>
                                <th>Tổng số buổi nghỉ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statistics as $statistic)
                                <tr>
                                    <td>{{$statistic['employee_id']}}</td>
                                    <td>{{$statistic['first_name']}} {{$statistic['last_name']}}</td>
                                    <td>{{$statistic['total_days']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection



