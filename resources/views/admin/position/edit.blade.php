@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Chức vụ</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chức vụ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_position_index') }}" class="btn btn-success btn-add-emp" > Danh sách chức vụ</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Sửa chức vụ</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('route_position_edit',['id'=>$position->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tên chức vụ <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="position_name" value="{{ $position->position_name }}">
                        @error('position_name')
                        <span class="text-danger"><b>{{$message}}</b></span>
                        @enderror
                        @include('admin.layouts.error')
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

