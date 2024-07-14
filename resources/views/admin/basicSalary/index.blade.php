@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Lương cơ bản</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lương cơ bản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            @can('create-user')
                <div class="row filter-row">
                    <div class="col-md-8">
                        <form class="d-flex" action="{{route('basicSalary.search')}}" method="POST">
                            @csrf
                            <input class="form-control me-2" style="width: 70%" type="search"
                                   placeholder="Nhập mã nhân viên"
                                   name="search_basicSalary">
                            <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="add-emp-section">
                            <a href="{{route('basicSalary.create')}}" class="btn btn-success btn-add-emp"
                               data-bs-target=""><i class="fas fa-plus"></i> Thêm Lương cơ bản</a>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                <tr>
                                    <th hidden>ID</th>
                                    @can('show-employees')
                                        <th>Mã Nhân viên</th>
                                    @endcan()
                                    <th>Lương cơ bản</th>
                                    <th>Tháng</th>
                                    <th>Năm</th>
                                    @can('show-employees')
                                        <th>Thao tác</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_basicSalary as $baSala)
                                    <tr>

                                        <td hidden>{{ $baSala->id }}</td>

                                        @can('show-employees')
                                            <td>{{ $baSala->employee_id }}</td>
                                        @endcan
                                        <td>{{number_format($baSala->basic_salary)}} VND</td>
                                        <td>{{ $baSala->month }}</td>
                                        <td>{{ $baSala->year }}</td>
                                        @can('show-employees')
                                            <td class="text-end ico-sec">
                                                <a href="{{route('basicSalary.edit',$baSala->id) }}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="{{route('basicSalary.delete',$baSala->id) }}"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#delete_basicSalary"
                                                   data-delete="{{$baSala->id}}"
                                                   class="delete-em">
                                                    <i class="far fa-trash-alt"
                                                       data-delete="{{$baSala->id}}"></i>
                                                </a>
                                            </td>
                                        @endcan

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @can('show-employees')
            <form action="{{ route('basicSalary.delete', $baSala->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal custom-modal fade" id="delete_basicSalary" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Xoá Lương cơ bản </h3>
                                    <p>Bạn muốn xoá Lương cơ bản này không?</p>
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
        @endcan
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


