@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Lương nhân viên</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lương</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-md-12">
                <form action="{{route('salary.index')}}" method="get">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus mb-0">
                                <input type="text" name="employee_id" class="form-control floating">
                                <label class="focus-label">Mã nhân viên</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus select-focus mb-0">
                                <select class="select floating" name="month">
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <label class="focus-label">Chọn tháng</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered custom-table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nhân viên</th>
                                <th>Tháng</th>
                                <th>Lương cơ bản</th>
                                <th>Số ngày phép</th>
                                <th>Số ngày nghỉ</th>
                                <th>Số ngày nghỉ được duyệt</th>
                                <th>Lương bị trừ</th>
                                <th>Lương nhận được</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                            <tr>
                                <th>{{optional($salary->basicSalary->employee)->id}}</th>
                                <td>{{optional($salary->basicSalary->employee)->last_name}}</td>
                                <td>{{optional($salary->basicSalary)->month}}</td>
                                <td>{{ number_format(optional($salary->basicSalary)->basic_salary, 0, ',', '.') }}</td>
                                <td>{{ number_format($salary->allowed_leave_days, 0, ',', '.') }}</td>
                                <td>{{ number_format($salary->absent_days, 0, ',', '.') }}</td>
                                <td>{{ number_format($salary->approved_leave_days, 0, ',', '.') }}</td>
                                <td>{{ number_format($salary->deducted_salary, 0, ',', '.') }}</td>
                                <td>{{ number_format($salary->final_salary, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
