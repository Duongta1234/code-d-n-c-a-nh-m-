@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>User</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{route('users.index')}}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> List user</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Thêm user</h2>
            </div>

            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="user">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Email <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="email">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Password <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="">Roles</label>
                        <div class="row">
                                <div class="col-5">
                                    <div>
                                        @foreach ($roles as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" name="role_ids[]" type="checkbox"
                                                       value="{{ $item->id }}">
                                                <label class="custom-control-label"
                                                       for="customCheck1">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                        </div>
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
