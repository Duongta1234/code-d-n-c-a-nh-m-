@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Sửa Role</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">sửa role</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('roles.index') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i>
                            List Role</a>
                    </div>
                </div>
            </div>
{{--            <div class="modal-header">--}}
{{--                <h2 class="modal-title">Edit Role</h2>--}}
{{--            </div>--}}
            <div class="modal-body">
                <form action="{{ route('roles.update',$role->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-block mb-3">
                        <label class="col-form-label"> Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name"
                               value="{{ old('name') ?? $role->name }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Display Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name"
                               value="{{ old('display_name') ?? $role->display_name }}">
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Group<span
                                class="text-danger">*</span></label>
                        <select name="group" class="form-control" value="{{ $role->group}}">
                            <option value="system">system</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Permission</label>
                        <div class="row">
                            @foreach($permissions as $groupName=>$permission)
                                <div class="col-5">
                                    <h4>{{$groupName}}</h4>
                                    <div>
                                        @foreach($permission as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                                       {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                                       value="{{$item->id}}" >

                                                <label class="custom-control-label"
                                                       for="customCheck1">{{$item->display_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel
                            </button>
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
