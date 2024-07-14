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
                            {{-- <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>--}}
                            {{-- <li class="breadcrumb-item active" aria-current="page">Ứng viên</li>--}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="add-emp-section">
                    <a href="{{ route('route_interview_result_index') }}" class="btn btn-success btn-add-emp"> Danh sách
                        ứng viên</a>
                </div>
            </div>
        </div>
        <div class="modal-header">
            <h2 class="modal-title">Ứng viên</h2>
        </div>
        <div class="modal-body">
            @include('admin.layouts.error')
            <form action="{{ route('route_interview_result_detail',['id'=>$interviewResult_detail->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-block mb-3">
                    <label class="col-form-label">Họ và tên ứng viên <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="name"
                        value="{{$interviewResult_detail->candidate->name}}">
                </div>
                <div class="input-block mb-3">
                    <label class="col-form-label">Email<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="email"
                        value="{{$interviewResult_detail->candidate->email}}">
                </div>
                <div class="input-block mb-3">
                    <label class="col-form-label">Vị trí phỏng vấn <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="job_position"
                        value="{{$interviewResult_detail->interviewSchedule->job_position}}">
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Thời gian phỏng vấn <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="interview_time"
                        value="{{$interviewResult_detail->interviewSchedule->interview_time}}">
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Địa chỉ phỏng vấn <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="interview_location"
                        value="{{$interviewResult_detail->interviewSchedule->interview_location}}">
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Người phỏng vấn <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" readonly name="interview_location"
                        value="{{$interviewResult_detail->interviewSchedule->user->employee->first_name}} {{$interviewResult_detail->interviewSchedule->user->employee->last_name}}">

                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Kết quả<span class="text-danger">*</span></label>
                    <select class="form-control" name="result_interview">
                        <option value="" selected> Kết quả buổi phỏng vấn </option>
                        <option value="1" style="color: green" {{$interviewResult_detail->result_interview == 1?
                            'selected': ''}}><strong>Pass</strong></option>
                        <option value="2" style="color: red" {{$interviewResult_detail->result_interview == 2?
                            'selected': ''}}><strong>Not pass</strong></option>
                        <option value="3" {{$interviewResult_detail->result_interview == 3? 'selected': ''}}><strong>Ứng
                                viên không tới</strong> </option>
                    </select>
                </div>

                {{-- <div class="input-block mb-3">
                    <label class="col-form-label">Ghi chú <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="note">

                </div> --}}
                @if($interviewResult_detail->result_interview == 0)
                <div class="submit-section" style="margin-bottom: 20px">
                    <button class="btn btn-primary submit-btn">Lưu </button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
<script>

</script>