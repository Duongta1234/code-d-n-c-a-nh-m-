
@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Yêu cầu nghi phép</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm nghỉ phép</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('leave_requests.index') }}" class="btn btn-success btn-add-emp" >Danh sách</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Thêm nghỉ phép </h2>
            </div>

            <h4 style="color: blue">(1 đơn xin nghỉ phép chỉ trong khoảng 7 ngày)</h4>
            <div class="modal-body">
                <form method="POST" action="{{ route('leave_requests.store') }}">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Từ ngày <span class="text-danger">*</span></label>
                        <input class="form-control" id="start_date" type="date" name="start_date" placeholder="Ngày bắt đầu" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" required>
                        @error('start_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Đến ngày (nếu nghỉ 1 ngày thì nhập trùng ngày bắt đầu) <span class="text-danger">*</span></label>
                        <input class="form-control" id="end_date" type="date" name="end_date" placeholder="Ngày kết thúc" min="{{ \Carbon\Carbon::tomorrow()->toDateString() }}" required>
                        @error('end_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lý do <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="reason"  name="reason" placeholder="Lý do"></textarea>
                        @error('reason')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
