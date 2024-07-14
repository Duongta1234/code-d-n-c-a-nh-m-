@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Xác nhận nghỉ phép</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Xác nhận nghỉ phép</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <form action="" method="POST" class="row filter-row">
                @csrf
                <div class="col-sm-6 col-md-2">
                    <div class="input-block mb-3">
                        <label class="focus-label">Từ ngày</label>
                        <input type="date" name="start_date" class="form-control floating" value="{{ old('start_date') }}">
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">
                    <div class="input-block mb-3">
                        <label class="focus-label">Đến ngày</label>
                        <input type="date" name="end_date" class="form-control floating" value="{{ old('end_date') }}">
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">
                    <div class="input-block mb-3">
                        <label class="focus-label">Mã nhân viên</label>
                        <input type="text" name="id" class="form-control floating" value="{{ old('id') }}">
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">
                    <div class="input-block mb-3">
                        <label class="focus-label">Họ Tên</label>
                        <input type="text" name="first_last_name" class="form-control floating" value="{{ old('first_last_name') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
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
                <div class="col-sm-6 col-md-1">
                    <div class="input-block mb-3">
                        <label class="focus-label" style="visibility: hidden;">Search</label>
                        <button type="submit" class="btn btn-success btn-search" style="width: 100%;"><i class="fas fa-search me-2"></i> Search</button>
                    </div>
                </div>
            </form>
            <p style="color: blue">
                Yêu cầu đang chờ duyệt: {{ $pendingCount }}
            </p>
            <p style="color: green">
                Yêu cầu đang đã duyệt: {{ $approvedCount }}
            </p>
            <p style="color: red">
                <a>Yêu cầu đang từ chối duyệt: {{ $rejectedCount }}
            </p>
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                <tr>
                                    <th scope="col">TT</th>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Họ Tên</th>
{{--                                    <th scope="col">Tên</th>--}}
                                    <th scope="col">Từ ngày</th>
                                    <th scope="col">Đến ngày</th>
                                    <th scope="col">Lý do</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaveRequests as $request)
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{optional( $request->user->employee)->id}}</td>
                                        <td>{{optional($request->user->employee)->first_name}} {{optional( $request->user->employee)->last_name}} </td>
{{--                                        <td>{{optional($request->user->employee)->first_name}}</td>--}}
                                        <td>{{ \Carbon\Carbon::parse($request->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($request->end_date)->format('d-m-Y') }}</td>
                                        <td>{{ $request->reason }}</td>
                                        <td>
    <span
        class="{{ $request->status == 'approved' ? 'status-approved' : ($request->status == 'rejected' ? 'status-rejected' : ($request->status == 'pending' ? 'status-pending' : '')) }}">
        {{ $request->status }}
    </span>
                                        </td>


                                        <td>
                                            <a href="{{ route('leave_requests.approve', $request->id) }}"
                                               class="approval"><i class="fa-solid fa-check"
                                                                   style="color: #000000;"></i></a>
                                            <a href="{{ route('leave_requests.rejected', $request->id) }}"
                                               class="approval"><i class="fa-solid fa-xmark"
                                                                   style="color: #000000;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form action="" method="post" class="form-approval">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            var table = $('.datatable').DataTable();
            $('.datatable').on('page.dt', function () {
                // Cập nhật giá trị data-delete cho mỗi nút xóa
                var currentPage = table.page.info().page;
                table.page(currentPage).draw('page');

                updateApproval()

            });

            updateApproval()

            function updateApproval() {
                $('.approval').on('click', function (e) {
                    e.preventDefault();
                    console.log(e);
                    if (e.target.matches('a') || e.target.matches('i')) {
                        let href = $(e.target).closest('a').attr('href');
                        let form = $('.form-approval');
                        form.attr('action', href);
                        form.submit()
                    }
                })
            }

        })
    </script>
@endsection
<style>
    .status-approved {
        color: green;
    }

    .status-rejected {
        color: red;
    }

    .status-pending {
        color: blue;
    }


</style>
