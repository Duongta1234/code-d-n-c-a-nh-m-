@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Religions</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Religion</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('religion.index') }}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i>
                            List Religion</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Edit Religion</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('religion.update',$religion->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Religion Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="religion_name" value="{{ $religion->religion_name }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Religion Another Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="religion_name" value="{{ $religion->religion_another_name }}">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

