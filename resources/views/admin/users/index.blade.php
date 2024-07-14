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
                                <li class="breadcrumb-item active" aria-current="page">user</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{ route('users.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="name" class="form-control floating">
                                    <label class="focus-label">Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="email" class="form-control floating">
                                    <label class="focus-label">Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus select-focus mb-0">
                                    <select class="select floating" name="status">
                                        <option value="">-</option>
                                        <option value="active">active</option>
                                        <option value="inactive">inactive</option>
                                    </select>
                                    <label class="focus-label">Trạng thái</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search</button>
                            </div>
                        </div>
                    </form>

                </div>
                @can('create-user')
                    <div class="col-md-4">
                        <div class="add-emp-section">
                            <a href="{{route('users.create')}}" class="btn btn-success btn-add-emp"
                               data-bs-target="#add_employee"><i class="fas fa-plus"></i> Thêm User</a>
                        </div>
                    </div>
                @endcan
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @include('admin.layouts.error')
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{--                                <th>Password</th>--}}
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            {{--                                <th class="text-end no-sor">Assign Employee</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                {{--                                    <td>{{$user->password}}</td>--}}
                                <td>{{$user->status}}</td>
                                <td>
                                    @can('update-user')
                                        @if (!$user->hasRole('admin'))
                                            <a href="{{ route('users.edit', $user->id) }}" class="edit-em"><i
                                                    class="fas fa-pen"></i></a>
                                        @endif
                                    @endcan

                                    @can('status-user')
                                        @if (!$user->hasRole('admin'))
                                            @if ($user->status == 'inactive')
                                                <a href="/users/activate/{{ $user->id }}"><i class="fa-solid fa-lock"
                                                                                             style="color: #333333;"></i></a>
                                            @else
                                                <a href="/users/deactivate/{{ $user->id }}"><i
                                                        class="fa-solid fa-unlock" style="color: #333333;"></i></a>
                                            @endif
                                        @endif
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
