@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Bảng lương</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="admin-dashboard.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Bảng lương
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        {{-- <div class="page-header">
            <div class="row align-items-center">
                <div class="col-auto float-end ms-auto">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white">CSV</button>
                        <button class="btn btn-white">PDF</button>
                        <button class="btn btn-white">
                            <i class="fa fa-print fa-lg"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="payslip-title">
                            Bảng Lương tháng {{$salary->basicSalary->month}} {{$salary->basicSalary->year}}
                        </h4>
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="{{asset('assets/img/logo2.png')}}" class="inv-logo" alt="Logo" />
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    {{-- <h3 class="text-uppercase">Payslip #49029</h3>
                                    <ul class="list-unstyled">
                                        <li>Salary Month: <span>March, 2019</span></li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-b-20">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-0"><strong>{{$salary->basicSalary->employee->first_name}} {{$salary->basicSalary->employee->last_name}}</strong></h5>
                                    </li>
                                    <li><span>{{$salary->basicSalary->employee->position->position_name}}</span></li>
                                    <li>Mã nhân viên: {{$salary->basicSalary->employee->id}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-">
                                <div>
                                    <h4 class="m-b-10"><strong>Thu nhập</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Lương cơ bản</strong>
                                                    <span class="float-end">{{number_format($salary->basicSalary->basic_salary)}}VNĐ</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Số ngày công trong tháng</strong>
                                                    <span class="float-end">{{$salary->quantity_attendance}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Số ngày chấm công</strong>
                                                    <span class="float-end">{{$workDays}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Số ngày phép</strong>
                                                    <span class="float-end">{{$salary->allowed_leave_days}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Lương bị trừ</strong>
                                                    <span class="float-end">{{number_format($salary->deducted_salary)}}VNĐ</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Lương hiện tại</strong>
                                                    <span class="float-end"><strong>{{number_format($salary->final_salary)}}VNĐ</strong></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection