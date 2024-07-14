@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Sửa User</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">user</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('users.index') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i>
                            List Role</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Sửa User</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-block mb-3">
                        <label class="col-form-label"> Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name"
                               value="{{ old('name') ?? $user->name }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label"> Email <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email"
                               value="{{ old('email') ?? $user->email }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label"> Password <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" value="{{ old('password') ?? $user->password }}">
                    </div>
                    <div class="form-group">
                        <label for="">Roles</label>
                        <div class="row">
                            <div class="col-5">
                                <div>
                                    @foreach ($roles as $groupName => $role)
                                        <div class="col-5">
                                            <h4>{{ $groupName }}</h4>

                                            <div>
                                                @foreach ($role as $item)
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="role_ids[]"
                                                               {{ $user->roles->contains('id', $item->id) ? 'checked' : '' }}
                                                               type="checkbox" value="{{ $item->id }}">
                                                        <label class="custom-control-label"
                                                               for="customCheck1">{{ $item->display_name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel
                        </button>
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
