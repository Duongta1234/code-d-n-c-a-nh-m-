@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Religions</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Religion</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="add-emp-section">
                    <a href="{{ route('religion.create') }}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Add Religion</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Religion Name </th>
                            <th>Religion Another Name </th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($religion as $reli)
                                <tr class="holiday-completed">
                                    <td>{{ $reli->id }}</td>
                                    <td>{{ $reli->religion_name }}</td>
                                    <td>{{ $reli->religion_another_name }}</td>
                                    <td class="text-end ico-sec">
                                        <a href="{{ route('religion.edit',$reli->id) }}" >
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('religion.destroy',$reli->id) }}" >
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
