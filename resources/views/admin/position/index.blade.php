@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Chức vụ</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chức vụ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8">
                    <form class="d-flex" action="{{ route('route_search_position') }}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 70%" type="search" placeholder="Search"
                               name="search_position">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_position_add') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i> Thêm chức vụ</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        @include('admin.layouts.error')
                        <table class="table table-striped custom-table datatable" style="text-align: center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên chức vụ</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ListPosition as $pos)
                                <tr class="holiday-completed">
                                    <td>{{ $pos->id }}</td>
                                    <td>{{ $pos->position_name }}</td>
                                    <td>
                                        <a href="{{ route('route_position_edit', ['id' => $pos->id]) }}">
                                            <i class="fas fa-pen" style="margin-right: 5%"></i>
                                        </a>
                                        <a href="{{ route('route_position_delete', ['id' => $pos->id]) }}">
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
