@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Employee</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employee</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{route('employees.search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_id" class="form-control floating">
                                    <label class="focus-label">Employee ID</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_name" class="form-control floating">
                                    <label class="focus-label">Employee Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_email" class="form-control floating">
                                    <label class="focus-label">Employee Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{route('employees.boxDetail')}}" class="grid-icon"><i class="fas fa-th"></i></a>
                        <a href="{{route('employees.index')}}" class="list-icon active"><i class="fas fa-bars"></i></a>
                        <a href="{{route('employees-export')}}" class="btn btn-success btn-add-emp bg-primary">Export
                            Employee</a>
                        <a href="{{route('employees.create')}}" class="btn btn-success btn-add-emp"
                           data-bs-target="#add_employee"><i class="fas fa-plus"></i> Add Employee</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($employees as $emp)
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="card user-card emp-card">
                            <div class="user-img-sec">
                                <img src="{{asset('storage/images/employee_image/'.$emp->image)}}" alt="User Image">
                                <h4>{{$emp->first_name}} {{$emp->last_name}}</h4>
                                <h5>{{$emp->position->position_name}}</h5>
                                <h6 class="bg-1">{{$emp->position->position_name}}</h6>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('employees.edit',$emp->id)}}" data-bs-toggle="modal"
                                           data-bs-target="#edit_employee">Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                           data-bs-target="#delete_employee">Delete</a>
                                    </div>
                                </div>
                                <div class="comment-sec">
                                    <i class="fas fa-comment-dots"></i>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <h4>Employee ID <span>{{$emp->id}}</span></h4>
                                <h4>Date of Join <span>{{$emp->statusemployee->start_date}}</span></h4>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('employees.detail',$emp->id)}}">View Profile</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
@endsection
