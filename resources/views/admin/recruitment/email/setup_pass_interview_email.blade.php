@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Cấu hình email pass phỏng vấn</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cấu hình email</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_interview_result_index') }}" class="btn btn-success btn-add-emp" > Danh sách ứng viên</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Cấu hình Email</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_interview_result_pass_email',['id'=>$interviewResultSendMail->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày bắt đầu làm việc <span
                                class="text-danger">*</span></label>
                                <input class="form-control" id="start_date" type="datetime-local" value="{{old('time')}}" name="time" min="{{ date('Y-m-d\TH:i', strtotime('+1 day')) }}" required>
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lương khởi điểm (VND) <span
                                class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="salary" value="{{old('salary')}}" required>
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thời gian thử việc (Ngày)<span
                                class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="time_try" value="{{old('time_try')}}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ làm việc <span
                                class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{old('address')}}" required>
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">File đính kèm <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="file_pdf" value="{{old('file_pdf')}}" required accept=".pdf">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Ghi chú <span
                                class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{old('note')}}" name="note">
                    </div>

                    <div class="submit-section" style="margin-bottom: 20px">
                        <button class="btn btn-success submit-btn" onclick="confirmSend()">Gửi Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmSend(){
        return confirm('Bạn chắc chắn muốn gửi email') ? 0 : false;
    }
</script>