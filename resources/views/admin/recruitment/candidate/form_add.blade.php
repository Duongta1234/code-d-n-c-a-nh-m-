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
                <form action="{{ route('route_candidate_add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-block mb-3">
                    <label class="col-form-label">Họ và tên <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" >
                    @error('name')
                    <span class="text-danger "><b>{{$message}}</b></span>
                    @enderror
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Email <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" >
                    @error('email')
                    <span class="text-danger "><b>{{$message}}</b></span>
                    @enderror
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Số điện thoại <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text"  name="phone" >
                    @error('phone')
                    <span class="text-danger "><b>{{$message}}</b></span>
                    @enderror
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">Địa chỉ <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="address" >
                    @error('address')
                    <span class="text-danger "><b>{{$message}}</b></span>
                    @enderror
                </div>

                <div class="input-block mb-3" >
                    <label class="col-form-label">Vị trí ứng tuyển <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text"  name="job_posting_id" >
                </div>

                <div class="input-block mb-3">
                    <label class="col-form-label">File CV <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="file_cv" accept=".pdf" >
                    @error('file_cv')
                    <span class="text-danger "><b>{{$message}}</b></span>
                    @enderror
                </div>


                <div class="submit-section" style="margin-bottom: 20px">
                        <button class="btn btn-success submit-btn" >Thêm ứng viên</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection




