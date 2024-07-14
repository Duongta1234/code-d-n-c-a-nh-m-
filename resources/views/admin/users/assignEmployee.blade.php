{{--@extends('admin.layouts.main')--}}
{{--@section('content')--}}
{{--    <div class="page-wrapper">--}}

{{--        <div class="content container-fluid">--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="page-head-box">--}}
{{--                        <h3>Employee</h3>--}}
{{--                        <nav aria-label="breadcrumb">--}}
{{--                            <ol class="breadcrumb">--}}
{{--                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">User</li>--}}
{{--                            </ol>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="row filter-row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6 col-md-3">--}}
{{--                            <div class="input-block mb-3 form-focus mb-0">--}}
{{--                                <input type="text" class="form-control floating">--}}
{{--                                <label class="focus-label">User ID</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6 col-md-3">--}}
{{--                            <div class="input-block mb-3 form-focus mb-0">--}}
{{--                                <input type="text" class="form-control floating">--}}
{{--                                <label class="focus-label"> Name</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6 col-md-3">--}}
{{--                            <div class="input-block mb-3 form-focus select-focus mb-0">--}}
{{--                                <select class="select floating">--}}
{{--                                    <option>Select Designation</option>--}}
{{--                                    <option>Web Developer</option>--}}
{{--                                    <option>Web Designer</option>--}}
{{--                                    <option>Android Developer</option>--}}
{{--                                    <option>Ios Developer</option>--}}
{{--                                </select>--}}
{{--                                <label class="focus-label">Designation</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6 col-md-3">--}}
{{--                            <a href="#" class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="add-emp-section">--}}
{{--                        <a href="" class="grid-icon"><i class="fas fa-th"></i></a>--}}
{{--                        <a href="" class="list-icon active"><i class="fas fa-bars"></i></a>--}}
{{--                        <a href="{{route('users.create')}}" class="btn btn-success btn-add-emp"--}}
{{--                           data-bs-target="#add_employee"><i class="fas fa-plus"></i> Add User</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-striped custom-table datatable">--}}
{{--                            <h2>Assign Employee to User: {{ $user->name }}</h2>--}}
{{--                            <form action="{{ route('users.updateEmployee', $user->id) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('PATCH')--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="current_employee">Current Employee:</label>--}}
{{--                                    <input type="text" class="form-control" id="current_employee" name="current_employee" value="{{ $employee ? $employee->last_name : 'No employee assigned' }}" readonly>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="employee">Select New Employee:</label>--}}
{{--                                    <select class="form-control" id="employee" name="employee_id">--}}
{{--                                        @foreach ($employees as $employee)--}}
{{--                                            <option value="{{ $employee->id }}" {{ $user->employee && $employee->id == $user->employee->id ? 'selected' : '' }}>{{ $employee->last_name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <button type="submit" class="btn btn-primary">Assign</button>--}}
{{--                            </form>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
