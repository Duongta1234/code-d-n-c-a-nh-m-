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
                                <li class="breadcrumb-item active" aria-current="page">National</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>

            </div>
            <div class="modal-header">
                <h2 class="modal-title">Edit National</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('national.edit',$national->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-block mb-3">
                        <label class="col-form-label">National Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nationality_name" value="{{ $national->nationality_name }}">
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
