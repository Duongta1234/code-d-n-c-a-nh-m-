@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Sửa yêu cầu nghỉ phép</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa yêu cầu nghỉ phép</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('leave_requests.index') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i>
                            Danh sách yêu cầu</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Sửa yêu cầu nghỉ phép</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('leave_requests.update',$leaveRequest->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-block mb-3">
                        <label class="col-form-label"> Từ ngày: <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="start_date" id="start_date"
                               value="{{ $leaveRequest->start_date }}" min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                        @error('start_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Đến ngày: <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="end_date" id="end_date"
                               value="{{ $leaveRequest->end_date }}" min="{{ \Carbon\Carbon::now()->toDateString() }}" required>
                        @error('end_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label"> Lý do: <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="reason" name="reason"
                                  required>{{ $leaveRequest->reason }}</textarea>
                        @error('reason')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel
                        </button>
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
