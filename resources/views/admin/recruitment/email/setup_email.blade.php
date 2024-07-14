@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Cấu hình email</h3>
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
                        <a href="{{ route('route_candidate_detail',['id'=>$candidate_invite->id]) }}" class="btn btn-success btn-add-emp" > Trở về</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Cấu hình Email</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_candidate_send_invite_email',['id'=>$candidate_invite->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thời gian <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="datetime-local" name="time">
                        @error('title')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="address">
                        {{--                        <input class="form-control" type="text" name="job_position_description">--}}
                        @error('description')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Ghi chú <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="note">
                        {{--                        <input class="form-control" type="text" name="job_position_description">--}}
                        @error('description')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
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
        if (confirm('Xác nhận gửi Email mời phỏng vấn cho ứng viên')===true){
            return 0;
        }
    }
</script>


