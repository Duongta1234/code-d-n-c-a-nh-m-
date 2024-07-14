@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Sửa Lương cơ bản</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sửa lương cơ bản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('basicSalary.index') }}" class="btn btn-success btn-add-emp" >
                            <i class="fas fa-plus"></i> Danh sách Lương cơ bản
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <form action="{{route('basicSalary.update',$basicSalary->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Mã nhân viên<span
                                class="text-danger">*</span></label>
                        <select class="select" name="employee_id">
                            <option value="">Trống</option>
                            @foreach ($employees as $employee)
                                <option value="{{$employee->id}}" {{old('employee_id')==$employee->id ||
                                     $basicSalary->employee_id == $employee->id ?
                                    'selected':false}}>{{$employee->id}}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <span
                            class="text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tháng<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="month" value="{{ old('month') ?? $basicSalary->month }}">
                        @error('month')
                        <span
                            class="text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Năm<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="year" value="{{ old('year') ?? $basicSalary->year }}">
                        @error('year')
                        <span
                            class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lương cơ bản<span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="basic_salary" value="{{ old('basic_salary') ?? $basicSalary->basic_salary }}">
                        @error('basic_salary')
                        <span
                            class="text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



