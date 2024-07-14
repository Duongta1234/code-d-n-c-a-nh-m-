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
                                {{--                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>--}}
                                {{--                                <li class="breadcrumb-item active" aria-current="page">Ứng viên</li>--}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_interview_schedule_index') }}" class="btn btn-success btn-add-emp" > Danh sách ứng viên</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Ứng viên</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_interview_schedule_detail',['id'=>$interviewSchedule_detail->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Họ và tên ứng viên <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="name" value="{{$interviewSchedule_detail->candidate->name}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí phỏng vấn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="job_position" value="{{$interviewSchedule_detail->job_position}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Thời gian phỏng vấn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="interview_time" value="{{$interviewSchedule_detail->interview_time}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ phỏng vấn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="interview_location" value="{{$interviewSchedule_detail->interview_location}}">
                    </div>

                    <div class="input-block mb-3" >

                        <label class="col-form-label" >Người phỏng vấn <span class="text-danger">*</span></label>
                        <select class="form-control" name="user_id">
                            <option value="0" selected disabled> Chọn người phỏng vấn </option>
                            @foreach ($user as $users)
                                <option value="{{$users->id}}" {{$interviewSchedule_detail->user_id == $users->id? 'selected': ''}}>{{$users->employee->first_name }} {{ $users->employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">CV ứng viên <span
                                class="text-danger">*</span></label>
                        <embed src="{{ asset('pdf/candidate/'.$interviewSchedule_detail->candidate->file_cv) }}" type="application/pdf" width="100%" height="600px" />
{{--                        <iframe src="{{ asset('pdf/candidate/'.$interviewSchedule_detail->candidate->file_cv) }}" style="width: 100%; height: 600px;" allowfullscreen></iframe>--}}
                    </div>
                    @can('create-status-candidate')
                    <div class="submit-section" style="margin-bottom: 20px">

                        <button class="btn btn-success submit-btn" >Lưu thông tin</button>
                    </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
