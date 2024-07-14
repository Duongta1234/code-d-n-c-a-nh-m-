@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Vị trí tuyển dụng</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Vị trí tuyển dụng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form class="d-flex" action="{{route('route_search_job_position')}}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 70%" type="search" placeholder="Search" name="search_job_position">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{route('route_job_position_add')}}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Thêm vị trí tuyển dụng</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vị trí </th>
                                <th>Mô tả </th>
                                <th>Số lượng </th>
                                <th >Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListJobPosition as $list)
                                <tr class="holiday-completed">
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->title }}</td>
                                    <td>{{ $list->description }}</td>
                                    <td>{{ $list->quantity }}</td>
                                    <td >
                                        <a href="{{ route('route_job_position_edit',['id'=>$list->id]) }}" >
                                            <i class="fas fa-pen" style="margin-right: 10%"></i>
                                        </a>
                                        <a href="{{ route('route_job_position_delete',['id'=>$list->id]) }}" >
                                            <i class="far fa-trash-alt"></i>
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
@endsection

