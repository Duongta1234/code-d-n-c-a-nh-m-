@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Role</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Role</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{ route('roles.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="name" class="form-control floating">
                                    <label class="focus-label">Tên</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="display_name" class="form-control floating">
                                    <label class="focus-label">Tên hiển thị</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                @can('create-role')
                    <div class="col-md-4">
                        <div class="add-emp-section">
                            <a href="{{route('roles.create')}}" class="btn btn-success btn-add-emp"
                               data-bs-target=""><i class="fas fa-plus"></i> Add Role</a>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Tên hiển thị</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>
                                            @if($role->name !== 'admin')
                                                @can('update-role')
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="edit-em"><i
                                                            class="fas fa-pen"></i></a>
                                                @endcan
                                                @can('delete-role')
                                                    <a href="{{ route('roles.destroy', $role->id) }}"
                                                       data-bs-toggle="modal" data-bs-target="#delete_employee"
                                                       data-delete="{{ $role->id }}" class="delete-em"><i
                                                            class="far fa-trash-alt" data-delete="{{ $role->id }}"></i></a>
                                                @endcan
                                            @endif
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
        @if(count($roles) > 0)
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Delete Employee</h3>
                                    <p>Are you sure want to delete?</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="row">
                                        <div class="col-6 input-delete">
                                            <button class="btn btn-primary continue-btn" style="width: 100%">Delete
                                            </button>
                                        </div>
                                        <div class="col-6 input-delete">
                                            <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            let href;
            $('.delete-em').on('click', function (e) {
                e.preventDefault();
                if (e.target.matches('a') || e.target.matches('i')) {
                    href = e.target.closest('a').getAttribute('href')

                }
            })

            var table = $('.datatable').DataTable();

            // Xử lý sự kiện khi DataTables chuyển trang
            $('.datatable').on('page.dt', function () {
                // Cập nhật giá trị data-delete cho mỗi nút xóa
                var currentPage = table.page.info().page;
                table.page(currentPage).draw('page');

                $('.delete-em').on('click', function (e) {
                    e.preventDefault();
                    if (e.target.matches('a') || e.target.matches('i')) {
                        href = e.target.closest('a').getAttribute('href')
                    }
                })

            });

            $('.input-delete .continue-btn').on('click', function (e) {
                e.preventDefault();
                let form = e.target.form;
                form.setAttribute('action', href);
                form.submit();
            })

        })

    </script>
@endsection

