@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Thêm Ngày lễ</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">thêm Ngày lễ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('holiday.index') }}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Danh sách ngày lễ
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <form action="{{ route('holiday.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày dương<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="date" placeholder="Ngày dương">
                        @error('date')
                        <span
                            class="text-danger date-error error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lễ/Dịp<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="description" placeholder="Lễ/Dịp">
                        @error('description')
                        <span
                            class="text-danger description-error error">{{ $message }}</span>
                        @enderror
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

