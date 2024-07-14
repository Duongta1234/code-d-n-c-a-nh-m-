@extends('admin.layouts.main')
@section('content')

<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Chi tiết nhân viên {{$employee->id}}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img input-edit-profile">
                                    <a href="#"><img class="text-image"
                                            src="{{asset('storage/images/employee_image/'.$employee->image)}}"
                                            style="width: 200px"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left input-edit-profile">
                                            <h3 class="user-name m-t-0 mb-0 text-name">{{$employee->first_name}}
                                                {{$employee->last_name}}</h3>
                                            <h6 class="text-muted"></h6>
                                            {{-- <div class="staff-id">Chức vụ: {{$employee->position->position_name}}
                                            </div>--}}
                                            <td>
                                                @if ($employee->user_id)
                                                @foreach ($employee->user->getRoleNames() as $role)
                                                <span class="role-info role-bg-one text-employee-position">{{ $role
                                                    }}</span>
                                                @endforeach
                                                @endif
                                            </td>
                                            <div class="staff-id">Mã nv: {{$employee->id}}</div>
                                            @if ($employee->statusemployee)

                                            <div class="small doj text-muted">Ngày bắt đầu:
                                                {{$employee->statusemployee->start_date}}</div>
                                            @endif
                                            {{-- <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send
                                                    Message</a></div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-7 input-edit-profile">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">SĐT:</div>
                                                <div class="text"><a href
                                                        class="text-phone_number">{{$employee->phone_number}}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text"><a href>@if ($employee->user_id)
                                                        {{$employee->user->email}}
                                                        @else

                                                        @endif</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Giới tính: </div>
                                                <div class="text text-gender">{{$employee->gender}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Ngày sinh:</div>
                                                <div class="text text-birthday">{{\Illuminate\Support\Carbon::parse($employee->date_of_birth)->format('d/m/Y')}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Địa chỉ:</div>
                                                <div class="text text-address">{{$employee->address}}</div>
                                            </li>
                                            <li>
                                                <div class="title">
                                                    Trạng thái</div>
                                                @if ($employee->status == 1)
                                                <div class="text">Kích hoạt</div>
                                                @else
                                                <div class="text">Không kích hoạt</div>
                                                @endif
                                            </li>
                                            <li>
                                                <div class="title">Vị trí làm việc:</div>
                                                <div class="text text-address">{{$employee->position->position_name}}</div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if ($employee->status == '1')
                            <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal"
                                    class="edit-icon" href="{{route('employees.editDetail',$employee->id)}}"><i
                                        class="fas fa-pencil-alt"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card tab-box mt-3">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom pt-3 pb-2">
                        <li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab"
                                class="nav-link active">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Thông tin cá nhân @if ($employee->status == '1')
                            <a href="{{route('employees.editDetailPersonal',$employee->id)}}"
                                class="edit-icon personal-edit" data-bs-toggle="modal"
                                data-bs-target="#personal_info_modal"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                        </h3>
                        <ul class="personal-info">

                            <li>
                                <div class="title">CCCD
                                    No:</div>
                                <div class="text text-citizen_identity_card">{{$employee->card->citizen_identity_card}}
                                </div>
                            </li>
                            <li>
                                <div class="title">Nơi cấp:
                                </div>
                                <div class="text text-place_of_issue">{{$employee->card->place_of_issue}}</div>
                            </li>
                            <li>
                                <div class="title">Nơi cấp:
                                </div>
                                <div class="text text-issue_date">{{\Illuminate\Support\Carbon::parse($employee->card->issue_date)->format('d/m/Y')}}</div>
                            </li>
                            <li>
                                <div class="title">Nguyên quán</div>
                                <div class="text text-origin">{{$employee->origin}}</div>
                            </li>
                            <li>
                                <div class="title">Quốc tịch</div>
                                <div class="text text-nationality">{{$employee->nationality->nationality_name}}</div>
                            </li>
                            <li>
                                <div class="title">Tôn giáo</div>
                                <div class="text text-religion">{{$employee->religion->religion_name}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Trình độ <a href="#" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#education_info"><i class="fas fa-pencil-alt"></i></a>
                        </h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Trình độ: {{$employee->level->level_name}}</a>

                                            {{-- <span class="time">Năm tốt nghiệp:
                                                {{$employee->level->graduation_year}}</span> --}}
                                        </div>
                                    </div>
                                </li>
                                {{-- <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Chuyên môn: {{$employee->level->specialize_name}}
                                            </a>
                                            <div>Ngoại ngữ: {{$employee->level->foreign_language}}</div>

                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        {{-- <h3 class="card-title">Kỹ năng
                            <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#education_info"><i
                                    class="fas fa-pencil-alt"></i></a>
                        </h3> --}}
                        {{-- <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Kỹ năng: {{$employee->level->education_name}}</a>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Hình ảnh xác nhận</h3>
                        <ul class=" col-md-12 d-flex personal-info">
                            <li class="col-md-4 input-edit-profile">
                                <div class="title">Giao diện</div>
                                <div class=""><img class="text-image"
                                        src="{{asset('storage/images/employee_image/'.$employee->image)}}"
                                        style="width: 300px" /></div>
                            </li>
                            <li class="col-md-4 input-edit-personal">
                                <div class="title">Mặt trước</div>
                                <div class=""><img class="text-previous_image"
                                        src="{{asset('storage/images/previous_card/'.$employee->card->previous_image)}}"
                                        style="width: 300px" /></div>
                            </li>
                            <li class="col-md-4 input-edit-personal">
                                <div class="title">Mặt sau</div>
                                <div class=""><img class="text-behind_image"
                                        src="{{asset('storage/images/behind_card/'.$employee->card->behind_image)}}"
                                        style="width: 300px" /></div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Hợp đồng <a href="#" class="edit-icon" data-bs-toggle="modal"
                                                           data-bs-target="#family_info_modal"><i class="fas fa-pencil-alt"></i></a></h3>
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th>Tên hợp đồng</th>
                                        <th>Ngày kí</th>
                                        <th>Ngày có hiệu lực</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Nhân viên</th>
                                        <th>Vị trí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (!empty($employee->contract))

                                    <tr>
                                        <td>{{$employee->contract->contract_name}}</td>
                                        <td>{{$employee->contract->sign_date}}</td>
                                        <td>{{$employee->contract->effective_date}}</td>
                                        <td>{{$employee->contract->expiration_date}}</td>
                                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                         <td>{{$employee->position->position_name}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card profile-box flex-fill" style="width: 50rem;">
                            @if (!empty($employee->contract))

                            <div class="card-body">
                                <embed src="{{ asset('pdf/contract/'.$employee->contract->file_pdf) }}" type="application/pdf" width="100%" height="600px" />
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="profile_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin cá nhân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap edit-img">
                                <img class="inline-block" src="assets/img/profiles/avatar-02.jpg" alt="user">
                                <div class="fileupload btn input-edit-profile">
                                    <span class="btn-text">edit</span>
                                    <input class="upload " name="image" type="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block mb-3 input-edit-profile">
                                        <label class="col-form-label">First
                                            Name</label>
                                        <input type="text" name="first_name" class="form-control " value="John">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3 input-edit-profile">
                                        <label class="col-form-label">Last
                                            Name</label>
                                        <input type="text" name="last_name" class="form-control" value="Doe">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3 input-edit-profile">
                                        <label class="col-form-label">Birth
                                            Date</label>
                                        <input class="form-control" type="date" name="birthday" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3 input-edit-profile">
                                        <label class="col-form-label">Gender</label>
                                        <select class="select form-control" name="gender">
                                            <option value="">Trống</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-profile">
                                <label class="col-form-label">Phone
                                    Number</label>
                                <input type="text" name="phone_number" class="form-control" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-profile">
                                <label class="col-form-label">Address provinces</label>
                                <select class="select form-control" name="address_province">
                                    <option value="">Trống</option>
                                    @foreach ($provinces as $province)
                                    <option data-province="{{$province->id}}" value="{{$province->province_name}}">
                                        {{$province->province_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-profile">
                                <label class="col-form-label">Address districts</label>
                                <select class="select form-control" name="address_district">
                                    <option value="">Trống</option>
                                    @foreach ($districts as $district)
                                    <option data-district="{{$district->id}}"
                                        data-province_id="{{$district->province_id}}"
                                        value="{{$district->district_name}}">
                                        {{$district->district_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-profile">
                                <label class="col-form-label">Address Ward</label>
                                <select class="select form-control" name="address_ward">
                                    <option value="">Trống</option>
                                    @foreach ($wards as $ward)
                                    <option data-district_id="{{$ward->district_id}}" value="{{$ward->ward_name}}">
                                        {{$ward->ward_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-profile">
                                <label class="col-form-label">Address Detail</label>
                                <input class="form-control" name="address_detail" type="text" value="">
                            </div>
                        </div>

                    </div>
                    <div class="submit-section input-edit-profile">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- personnal --}}
<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin thẻ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">CCCD</label>
                                <input type="text" name="citizen_identity_card" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Nơi cấp</label>
                                <input type="text" name="place_of_issue" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Ngày cấp</label>
                                <input type="date" name="issue_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Mặt trước</label>
                                <input type="file" name="previous_image" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Mặt sau</label>
                                <input type="file" name="behind_image" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Tỉnh/Thành Phố</label>
                                <select class="select form-control" name="address_province">
                                    <option value="">Trống</option>
                                    @foreach ($provinces as $province)
                                    <option data-province="{{$province->id}}" value="{{$province->province_name}}">
                                        {{$province->province_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Quận/Huyện</label>
                                <select class="select form-control" name="address_district">
                                    <option value="">Trống</option>
                                    @foreach ($districts as $district)
                                    <option data-district="{{$district->id}}"
                                        data-province_id="{{$district->province_id}}"
                                        value="{{$district->district_name}}">
                                        {{$district->district_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Xã/Phường</label>
                                <select class="select form-control" name="address_ward">
                                    <option value="">Trống</option>
                                    @foreach ($wards as $ward)
                                    <option data-district_id="{{$ward->district_id}}" value="{{$ward->ward_name}}">
                                        {{$ward->ward_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Địa chỉ cụ thể</label>
                                <input class="form-control" name="address_detail" type="text" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Quốc tịch</label>
                                <select class="select" name="nationality_id">
                                    <option value="">Trống</option>
                                    @foreach ($nationalities as $nationality)
                                    <option value="{{$nationality->id}}">
                                        {{$nationality->nationality_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3 input-edit-personal">
                                <label class="col-form-label">Tôn giáo</label>
                                <select class="select" name="religion_id">
                                    <option value="">Trống</option>
                                    @foreach ($religions as $religion)
                                    <option value="{{$religion->id}}">{{$religion->religion_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section input-edit-personal">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Family Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Family
                                    Member <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Name
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Relationship
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Date
                                                of birth <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Phone
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Education
                                    Informations <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Name
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Relationship
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Date
                                                of birth <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Phone
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="add-more">
                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i>
                                        Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Personal Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Primary
                                Contact</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Relationship
                                            <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone
                                            <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone
                                            2</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Primary
                                Contact</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Name
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Relationship
                                            <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone
                                            <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone
                                            2</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div id="education_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Education Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Education
                                    Informations <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Oxford University" class="form-control floating">
                                            <label class="focus-label">Institution</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Computer Science" class="form-control floating">
                                            <label class="focus-label">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" value="01/06/2002"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">Starting
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" value="31/05/2006"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">Complete
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="BE Computer Science"
                                                class="form-control floating">
                                            <label class="focus-label">Degree</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Grade A" class="form-control floating">
                                            <label class="focus-label">Grade</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Education
                                    Informations <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Oxford University" class="form-control floating">
                                            <label class="focus-label">Institution</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Computer Science" class="form-control floating">
                                            <label class="focus-label">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" value="01/06/2002"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">Starting
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <div class="cal-icon">
                                                <input type="text" value="31/05/2006"
                                                    class="form-control floating datetimepicker">
                                            </div>
                                            <label class="focus-label">Complete
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="BE Computer Science"
                                                class="form-control floating">
                                            <label class="focus-label">Degree</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus focused">
                                            <input type="text" value="Grade A" class="form-control floating">
                                            <label class="focus-label">Grade</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-more">
                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i>
                                        Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div id="experience_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Experience Informations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Experience
                                    Informations <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating"
                                                value="Digital Devlopment Inc">
                                            <label class="focus-label">Company
                                                Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating" value="United States">
                                            <label class="focus-label">Location</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating" value="Web Developer">
                                            <label class="focus-label">Job
                                                Position</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="01/07/2007">
                                            </div>
                                            <label class="focus-label">Period
                                                From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="08/06/2018">
                                            </div>
                                            <label class="focus-label">Period
                                                To</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Experience
                                    Informations <a href="javascript:void(0);" class="delete-icon">
                                        <i class="far fa-trash-alt"></i>
                                    </a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating"
                                                value="Digital Devlopment Inc">
                                            <label class="focus-label">Company
                                                Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating" value="United States">
                                            <label class="focus-label">Location</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <input type="text" class="form-control floating" value="Web Developer">
                                            <label class="focus-label">Job
                                                Position</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="01/07/2007">
                                            </div>
                                            <label class="focus-label">Period
                                                From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block mb-3 form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="08/06/2018">
                                            </div>
                                            <label class="focus-label">Period
                                                To</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-more">
                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i>
                                        Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

</div>

</div>
@endsection
@section('js')
<script src="{{asset('assets/js/admin/employee-detail.js')}}"></script>
@endsection
