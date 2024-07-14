@extends('admin.layouts.main')
@section('content')
<tbody>
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
                    {{-- <div class="add-emp-section">
                        <a href="{{ route('route_religion_add') }}" class="btn btn-success btn-add-emp"><i
                                class="fas fa-plus"></i> Add Religion</a>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>National Name </th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($national as $item)
                                <tr>
                                    <td class="list-group-item">{{$item->id}}</td>
                                    <td class="list-group-item">{{$item->nationality_name}}</td>
                                    <td class="list-group-item">
                                        <a href="{{ route('deleteNational',['id'=>$item->id]) }}">Delete</a>
                                        <a href="{{ route('editNational',['id'=>$item->id]) }}">Edit</a>
                                    <td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

</tbody>
@endsection
