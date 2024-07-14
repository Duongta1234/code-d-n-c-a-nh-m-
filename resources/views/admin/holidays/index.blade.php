@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Ngày lễ</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ngày lễ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            @can('create-user')
                <div class="row filter-row">
                    <div class="add-emp-section">
                        <a href="{{route('holiday.create')}}" class="btn btn-success btn-add-emp"
                           data-bs-target=""><i class="fas fa-plus"></i> Thêm Ngày lễ</a>
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
                                    <th>ID</th>
                                    <th>Lễ/Dịp</th>
                                    <th>Ngày</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($holidays as $holiday)
                                    <tr>
                                        <td>{{ $holiday->id }}</td>
                                        <td>{{ $holiday->description }}</td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($holiday->date)->format('d/m/Y') }}</td>
                                        <td class="text-end ico-sec">
                                            <a href="{{route('holiday.edit',$holiday->id) }}" >
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="{{route('holiday.delete',$holiday->id) }}"
                                               data-bs-toggle="modal"
                                               data-bs-target="#delete_holiday"
                                               data-delete="{{$holiday->id}}"
                                               class="delete-em">
                                                <i class="far fa-trash-alt"
                                                   data-delete="{{$holiday->id}}"></i>
                                            </a>
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
        @can('show-employees')
        <form action="{{ route('holiday.delete', $holiday->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal custom-modal fade" id="delete_holiday" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Xoá ngày lễ</h3>
                                <p>Bạn muốn xoá ngày lễ này không?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6 input-delete">
                                        <button class="btn btn-primary continue-btn" style="width: 100%">Delete</button>
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

