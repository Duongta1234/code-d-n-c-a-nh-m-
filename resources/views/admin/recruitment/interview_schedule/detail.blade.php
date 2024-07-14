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
                        <a href="{{ route('route_status_candidate_index') }}" class="btn btn-success btn-add-emp" > Danh sách ứng viên</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Ứng viên</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_status_candidate_detail',['id'=>$interviewSchedule_detail->id]) }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" type="datetime-local"  name="interview_time" value="{{$interviewSchedule_detail->interview_time}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ phỏng vấn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="interview_location" value="{{$interviewSchedule_detail->interview_location}}">
                    </div>


                    <div class="input-block mb-3">
                        <label class="col-form-label">Trạng thái ứng viên<span
                                class="text-danger">*</span></label>
                        <select class="form-control" name="status">
                            <option value="1" {{$interviewSchedule_detail->status == 1? 'selected': ''}}>Đã gửi email mời phỏng vấn</option>
                            <option value="2" {{$interviewSchedule_detail->status == 2? 'selected': ''}}>Xác nhận tham gia phỏng vấn</option>
                            <option value="3" {{$interviewSchedule_detail->status == 3? 'selected': ''}}>Từ chối/Không phản hồi email</option>
                        </select>
                    </div>

                    <div class="submit-section" style="margin-bottom: 20px">
                            <button class="btn btn-success submit-btn" >Lưu thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>

</script>