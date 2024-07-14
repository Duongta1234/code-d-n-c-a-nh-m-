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
                        <a href="{{ route('route_status_employee_index') }}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i>
                            Danh sách</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Sửa trạng thái nhân viên</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('route_status_employee_edit',['id'=>$status_employee->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày bắt đầu<span
                                class="text-danger">*</span></label>
                        <input class="form-control " type="date" name="start_date" value="{{ $status_employee->start_date }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày kết thúc <span
                                class="text-danger">*</span></label>
                        <input class="form-control " type="date" name="end_date" value="{{ $status_employee->end_date }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Trạng thái <span
                                class="text-danger">*</span></label>
                        <select class="select form-control" name="status" >
                            <option name="0">Đã nghỉ</option>
                            <option name="1">Đang làm</option>
                        </select>
                    </div>
                    <div class="submit-section">
{{--                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"--}}
{{--                                aria-label="Close">Cancel</button>--}}
                        <button class="btn btn-primary submit-btn">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


