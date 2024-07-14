@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Bài đăng tuyển dụng</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bài đăng tuyển dụng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <form action="{{route('route_search_job_posting')}}" method="post">
                <div class="row filter-row">
                    @csrf
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3 form-focus mb-0">
                            <input type="text" name="search_job_posting" class="form-control floating">
                            <label class="focus-label">Bài đăng</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3 form-focus select-focus mb-0">
                            <select class="select floating" name="status">
                                <option value="">-</option>
                                <option value="0">Không kích hoạt</option>
                                <option value="1">Kích hoạt</option>
                            </select>
                            <label class="focus-label">Trạng thái</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-success btn-search">Search</button>
                    </div>
                    @can('create-job-posting')
                        <div class="col-sm-6 col-md-3">
                            <div class="add-emp-section">
                                <a href="{{route('route_job_posting_add')}}" class="btn btn-success btn-add-emp"><i
                                        class="fas fa-plus"></i>
                                    Thêm bài đăng tuyển dụng</a>
                            </div>
                        </div>
                    @endcan
                </div>

            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Vị trí tuyển</th>
                                <th>Người đăng</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListJobPosting as $list)
                                <tr class="holiday-completed">
                                    <td>
                                        {{ $list->id}}
                                    </td>

                                    <td>
                                        {{ $list->title}}
                                    </td>

                                    <td>
                                        {{$list->job_position->title }}
                                    </td>

                                    <td>
                                        {{$list->user->employee->first_name }} {{$list->user->employee->last_name }}
                                    </td>
                                    <td>
                                        {{$list->created_at }}
                                    </td>
                                    <td>
                                        {{$list->status==1?"Kích hoạt":"Không kích hoạt" }}</a>
                                    </td>
                                    <td>
                                        @can('update-job-posting')
                                            <a href="{{ route('route_job_posting_edit',['id'=>$list->id]) }}">
                                                <i class="fas fa-pen" style="margin-right: 10%"></i>
                                            </a>
                                        @endcan
                                        <a href="{{ route('route_job_posting_detail',['id'=>$list->id]) }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
