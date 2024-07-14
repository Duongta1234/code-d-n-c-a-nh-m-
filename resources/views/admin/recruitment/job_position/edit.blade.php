@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Vị trí tuyển dụng</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vị trí tuyển dụng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_job_position_index') }}" class="btn btn-success btn-add-emp" > Danh sách vị trí tuyển dụng</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Sửa vị trí tuyển dụng</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_job_position_edit',['id'=>$job_position->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" value="{{$job_position->title}}">
                        @error('title')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Mô tả <span
                                class="text-danger">*</span></label>
                        <textarea name="description" class="form-control">{{$job_position->description}}</textarea>
                        {{--                        <input class="form-control" type="text" name="job_position_description">--}}
                        @error('description')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Số lượng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="quantity" value="{{$job_position->quantity}}">
                        @error('quantity')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="submit-section" style="margin-bottom: 20px">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


