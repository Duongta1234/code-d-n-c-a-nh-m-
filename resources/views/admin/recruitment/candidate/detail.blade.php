@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Ứng viên</h3>
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
                        <a href="{{ route('route_candidate_index') }}" class="btn btn-success btn-add-emp" > Danh sách ứng viên</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Ứng viên</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
{{--                <form action="{{ route('route_job_posting_add') }}" method="POST" enctype="multipart/form-data">--}}
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Họ và tên <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="name" value="{{$candidate_detail->name}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Email <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="email" value="{{$candidate_detail->email}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Số điện thoại <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="phone" value="{{$candidate_detail->phone}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="address" value="{{$candidate_detail->address}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí ứng tuyển <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" readonly name="job_posting_id" value="{{$candidate_detail->job_posting->title}}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">File CV <span
                                class="text-danger">*</span></label>
                        <embed src="{{ asset($candidate_detail->file_cv) }}" type="application/pdf" width="100%" height="600px" />
{{--                        <iframe src="{{ asset($candidate_detail->file_cv) }}" style="width: 100%; height: 600px;" allowfullscreen></iframe>--}}
                    </div>


                    <div class="submit-section" style="margin-bottom: 20px">
                        <a href="{{ route('route_candidate_send_refuse_email',['id'=>$candidate_detail->id]) }}" >
                            <button class="btn btn-primary submit-btn" onclick="confirmRefuse()">Từ chối</button>
                        </a>
                        <a href="{{ route('route_candidate_send_invite_email',['id'=>$candidate_detail->id]) }}" >
                            <button class="btn btn-success submit-btn" >Gửi Email phỏng vấn</button>
                        </a>
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmRefuse(){
         return confirm('Bạn chắc chắn muốn từ chối ứng viên này') ? 0 : false;
    }
</script>



