@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Yêu cầu nghi phép</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Yêu cầu nghỉ phép</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <p style="color: blue">
                Yêu cầu đang chờ duyệt: {{ $pendingCount }}
            </p>
            <p style="color: green">
                Yêu cầu đang đã duyệt: {{ $approvedCount }}
            </p>
            <p style="color: red">
                Yêu cầu đang từ chối duyệt: {{ $rejectedCount }}
            </p>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{ route('leave_requests.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3">
                                    <label class="focus-label">Từ ngày</label>
                                    <input type="date" name="start_date" class="form-control floating"
                                           value="{{ old('start_date') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3">
                                    <label class="focus-label">Đến ngày</label>
                                    <input type="date" name="end_date" class="form-control floating"
                                           value="{{ old('end_date') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3">
                                    <label class="focus-label">Trạng thái</label>
                                    <select class="select floating" name="status">
                                        <option value="">-</option>
                                        <option value="pending">pending</option>
                                        <option value="approved">approved</option>
                                        <option value="rejected">rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <label class="focus-label" style="visibility: hidden;">Search</label>
                                <button type="submit" class="btn btn-success btn-search" style="width: 100%;"><i
                                        class="fas fa-search me-2"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                @can('create-send-request-leave')
                    <div class="col-md-4">
                        <div class="add-emp-section">
                            <a href="{{route('leave_requests.create')}}" class="btn btn-success btn-add-emp"
                               data-bs-target=""><i class="fas fa-plus"></i> Thêm nghỉ phép</a>
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
                                    <th>TT</th>
                                    <th>Từ ngày</th>
                                    <th>Đến ngày</th>
                                    <th>Lý do</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaveRequests as $leaveRequest)
                                    <tr>
                                        <td>{{$leaveRequest->id}}</td>
                                        <td>{{ \Carbon\Carbon::parse($leaveRequest->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($leaveRequest->end_date)->format('d-m-Y') }}</td>
                                        <td>{{$leaveRequest->reason}}</td>
                                        <td>{{$leaveRequest->status}}</td>

                                        <td class="text-end ico-sec">
                                            @if($leaveRequest->status == 'pending')
                                                @can('update-send-request-leave')
                                                    <a href="{{route('leave_requests.edit',$leaveRequest->id)}}"
                                                       class="edit-em"><i class="fas fa-pen"></i></a>
                                                @endcan
                                                @can('delete-send-request-leave')
                                                    <a href="#" data-id="{{$leaveRequest->id}}" data-bs-toggle="modal"
                                                       data-bs-target="#delete_employee" class="delete-em"><i
                                                            class="far fa-trash-alt"></i></a>
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
    </div>
    <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal custom-modal fade" id="delete_employee" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Xóa yêu cầu nghỉ phép</h3>
                            <p>Bạn có chắc chắn muốn xóa?</p>
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

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var table = $('.datatable').DataTable();

            $('.delete-em').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#deleteForm').attr('action', '/leave_requests/' + id);
            });

            $('.datatable').on('page.dt', function () {
                var currentPage = table.page.info().page;
                table.page(currentPage).draw('page');

                $('.delete-em').on('click', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $('#deleteForm').attr('action', '/leave_requests/' + id);
                });
            });

            $('.input-delete .continue-btn').on('click', function (e) {
                e.preventDefault();
                $('#deleteForm').submit();
            });
        });
    </script>

@endsection
