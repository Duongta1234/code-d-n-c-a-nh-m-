@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Trạng thái nhân viên</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trạng thái nhân viên</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_status_employee_add') }}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Thêm trạng thái nhân </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nhân viên</th>
                                <th>Ngày bắt đầu làm</th>
                                <th>Ngày kết thúc làm</th>
                                <th>Trạng thái</th>
                                <th class="text-end">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($status_employees as $stem)
                                <tr class="holiday-completed">
                                    <td>{{ $stem->id }}</td>
                                    <td>{{ $stem->employee->first_name }} {{ $stem->employee->last_name }} - {{ $stem->employee->id }}</td>
                                    <td>{{ $stem->start_date }}</td>
                                    <td>{{ $stem->end_date }}</td>
                                    <td>
                                        @if ($stem->status == 0)
                                            chưa là nhân viên
                                        @else @if ($stem->status == 1)
                                            Đang làm
                                        @endif
                                            Đã nghỉ
                                        @endif
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="{{ route('route_status_employee_edit',['id'=>$stem->id]) }}" >
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        {{-- <a href="{{ route('route_status_employee_delete',['id'=>$stem->id]) }}" >
                                            <i class="far fa-trash-alt"></i>
                                        </a> --}}
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

