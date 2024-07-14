@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Hợp đồng lao động</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>--}}
                                {{-- <li class="breadcrumb-item active" aria-current="page">Hợp đồng lao động</li>--}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @can('show-employees')
                <div class="row filter-row">
                    <div class="col-md-8">
                        <form class="d-flex" action="{{route('route_contract_index')}}" method="POST">
                            @csrf
                            <input class="form-control me-2" style="width: 60%" type="search" placeholder="Tìm kiếm...."
                                   name="search_name">
                            <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="add-emp-section">
                            <a href="{{route('route_contract_add')}}" class="btn btn-success btn-add-emp"><i
                                    class="fas fa-plus"></i> Thêm hợp đồng</a>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nhân viên</th>
                                <th>Ngày có hiệu lực</th>
                                <th>Ngày hết hạn</th>
                                <th>Tên hợp đồng</th>
                                <th>Vị trí</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListContract as $cont)
                                <tr class="holiday-completed">
                                    <td>{{$cont->id }}</td>
                                    <td>{{$cont->employee->first_name .' '. $cont->employee->last_name }}</td>
                                    <td>{{$cont->effective_date }}</td>
                                    <td>{{$cont->expiration_date }}</td>
                                    <td>{{$cont->contract_name }}</td>
                                    <td>{{ $cont->position->position_name }}</td>
                                    <td>

                                        @can('show-employees')
                                            <a href="{{ route('route_contract_edit',['id'=>$cont->id]) }}">
                                                <i class="fas fa-pen" style="margin-right: 5%"></i>
                                            </a>
                                            <a href="{{ route('route_contract_delete', $cont->id) }}"
                                               data-bs-toggle="modal" data-bs-target="#delete_employee"
                                               data-delete="{{ $cont->id }}" class="delete-em"><i
                                                    class="far fa-trash-alt" data-delete="{{ $cont->id }}"></i></a>
                                        @endcan
                                        <a href="{{ route('route_contract_show',['id'=>$cont->id]) }}"><i
                                                class="fa-solid fa-eye"></i></a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <form action="{{ route('route_contract_delete', $cont->id) }}" method="POST">
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
        </div>
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

