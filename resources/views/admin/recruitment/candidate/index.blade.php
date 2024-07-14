@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Danh sách ứng viên</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách ứng viên</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md">
                    <form class="d-flex" action="{{route('route_search_candidate')}}" method="POST">
                        @csrf
                        <input class="form-control me-2" style="width: 25%" type="search" placeholder="Tên" name="search_candidate_name">
                        <select class="form-control me-2" style="width:25%" name="job_posting_title">
                            <option value="" selected disabled> Vị trí ứng tuyển </option>
                            @foreach ($job_posting as $list)
                                <option value="{{$list->id}}">{{$list->title}}</option>
                            @endforeach
                        </select>
                        <input class="form-control me-2" style="width: 20%" type="date" name="date_apply">
                        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
                    </form>
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
                                <th>Họ và tên </th>
                                <th>Vị trí ứng tuyển </th>
                                <th>Ngày ứng tuyển</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListCandidate as $list)

                                <tr class="holiday-completed">

                                    <td>{{ $list->id }}</td>
{{--                                    <td><a href="{{ route('route_candidate_detail',['id'=>$list->id]) }}">{{ $list->name }}</a></td>--}}
{{--                                    <td><a href="{{ route('route_candidate_detail',['id'=>$list->id]) }}">{{ $list->job_posting->title }}</a></td>--}}
{{--                                    <td><a href="{{ route('route_candidate_detail',['id'=>$list->id]) }}">{{ $list->created_at->format('d-m-Y') }}</a></td>--}}
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->job_posting->job_position->title  }}</td>
                                    <td>{{ $list->created_at->format('d-m-Y') }}</a></td>
                                    <td><a href="{{ route('route_candidate_detail',['id'=>$list->id]) }}"><i
                                                class="fa-solid fa-eye"></i></a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
