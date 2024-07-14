@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Chi tiết</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="admin-dashboard.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Chi tiết tuyển dụng
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="project-title">
                            <h2>Chi tiết tuyển dụng</h2>
                        </div>
                        <div class="mt-4">
                            <h4 style="font-size: 22px">Mô tả công việc</h4>
                            <p>{!!$job_posting_detail->description!!}</p>
                        </div>
                        <div>
                            <h4 style="font-size: 22px">Yêu cầu</h4>
                            <p>{!!$job_posting_detail->request!!}</p>
                        </div>
                        <div>
                            <h4 style="font-size: 22px">Quyền lợi</h4>
                            <p>{!!$job_posting_detail->benefit!!}</p>
                        </div>
                        <div>
                            <h4 style="font-size: 22px">Thời gian làm việc</h4>
                            <p>{{$job_posting_detail->working_time}}</p>
                        </div>
                        <div>
                            <h4 style="font-size: 22px">Địa chỉ làm việc</h4>
                            <p>Địa chỉ: {!!$job_posting_detail->address!!}</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="job-content">
                            <h2 class="p-0 p-sm-3">Ứng tuyển</h2>
                            <ul>
                                <p>Ứng viên có thể liên hệ và gửi thông tin qua:</p>
                                <div class="address-contact d-flex align-items-center">
                                    <div class="icon-contact">
                                        <img src="https://career.adamosoft.com/pages/images/job_detail/icon_email.png"
                                            alt="icon">
                                    </div>
                                    <p class="text-dark mb-0"><span class="text-black-50">Email:
                                        </span>
                                        tuyendungvanphat68@gmail.com
                                    </p>
                                </div>
                                <div class="address-contact d-flex align-items-center">
                                    <div class="icon-contact">
                                        <img src="https://career.adamosoft.com/pages/images/job_detail/icon_phone.png"
                                            alt="icon">
                                    </div>
                                    <p class="text-dark mb-0"><span class="text-black-50">Phone:
                                        </span>0944037082
                                    </p>
                                </div>
                                <p class="last-p">Hoặc điền thông tin tại đây:</p>
                                <form action="{{ route('route_candidate_add') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="input-block mb-3 col-6">
                                            <label class="col-form-label">Họ và tên <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name" required>
                                            {{-- @error('name')--}}
                                            {{-- <span class="text-danger "><b>{{$message}}</b></span>--}}
                                            {{-- @enderror--}}
                                        </div>

                                        <div class="input-block mb-3 col-6">
                                            <label class="col-form-label">Số điện thoại <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="phone" required>
                                            {{-- @error('phone')--}}
                                            {{-- <span class="text-danger "><b>{{$message}}</b></span>--}}
                                            {{-- @enderror--}}
                                        </div>
                                        <div class="input-block mb-3 col-6">
                                            <label class="col-form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" required>
                                            {{-- @error('email')--}}
                                            {{-- <span class="text-danger "><b>{{$message}}</b></span>--}}
                                            {{-- @enderror--}}
                                        </div>

                                        <div class="input-block mb-3 col-6">
                                            <label class="col-form-label">Địa chỉ <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="address" required>
                                            {{-- @error('address')--}}
                                            {{-- <span class="text-danger "><b>{{$message}}</b></span>--}}
                                            {{-- @enderror--}}
                                        </div>
                                    </div>


                                    <div class="input-block mb-3" hidden>
                                        <label class="col-form-label">Vị trí ứng tuyển <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="job_posting_id"
                                            value="{{$job_posting_detail->id}}">
                                    </div>

                                    <div class="input-block mb-3">
                                        <label class="col-form-label">File CV <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="file_cv" accept=".pdf"
                                            required>
                                        @error('file_cv')
                                        <span class="text-danger "><b>{{$message}}</b></span>
                                        @enderror
                                    </div>


                                    <div class="submit-section" style="text-align: center">
                                        <button class="btn btn-success submit-btn">Gửi hồ sơ ứng tuyển</button>
                                    </div>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body prj-tbl pb-0">
                        <h6 class="card-title m-b-15">Chi tiết</h6>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Lương:</td>
                                    <td class="text-end">{{number_format($job_posting_detail->salary)}}VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Ngày đăng:</td>
                                    <td class="text-end">{{$job_posting_detail->created_at->format('d-m-Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hạn nộp:</td>
                                    <td class="text-end">{{$job_posting_detail->application_deadline}}</td>
                                </tr>
                                <tr>
                                    <td>Vị trí</td>
                                    <td class="text-end">{{$job_posting_detail->job_position->title}}</td>
                                </tr>
                                <tr>
                                    <td>Số lượng</td>
                                    <td class="text-end">{{$job_posting_detail->job_position->quantity}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
