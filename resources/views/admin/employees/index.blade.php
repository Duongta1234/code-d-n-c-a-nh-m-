@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Nhân viên</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nhân viên</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @can('show-employees')
            <div class="row filter-row">
                <div class="col-md-8">
                    <form action="{{route('employees.search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_id" class="form-control floating">
                                    <label class="focus-label">Mã nhân viên</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_name" class="form-control floating">
                                    <label class="focus-label">Họ tên</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-block mb-3 form-focus mb-0">
                                    <input type="text" name="search_email" class="form-control floating">
                                    <label class="focus-label">Email</label>
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
                        {{-- <a href="employees.html" class="grid-icon"><i class="fas fa-th"></i></a>
                        <a href="employees-list.html" class="list-icon active"><i class="fas fa-bars"></i></a> --}}
                        <a href="{{route('employees-export')}}" class="btn btn-success btn-add-emp bg-primary">Export
                            thông tin</a>
                        @can('create-employees')
                            <a href="{{route('employees.create')}}" class="btn btn-success btn-add-emp"
                               data-bs-target="#add_employee"><i class="fas fa-plus"></i> Thêm thông tin</a>
                        @endcan
                    </div>
                </div>
            </div>
            @endcan
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                {{-- <th class="text-nowrap">Join Date</th> --}}
                                <th>Role</th>
                                <th class="text-end no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr data-tr="{{$employee->id}}">
                                    <td>{{$employee->id}}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{route('employees.detail',$employee->id)}}" class="avatar"><img
                                                    class="text-employee-image"
                                                    src="{{asset('storage/images/employee_image/'.$employee->image)}}"
                                                    alt="User Image"></a>
                                            <a href="{{route('employees.detail',$employee->id)}}"
                                               class="text-employee-name">{{$employee->first_name}}
                                                {{$employee->last_name}}{{--<span>Web Designer</span>--}}</a>
                                        </h2>
                                    </td>
                                    <td class="text-employee-email">@if ($employee->user_id)
                                            {{$employee->user->email}}
                                        @endif</td>
                                    <td class="text-employee-phone_number">{{$employee->phone_number}}</td>
                                    <td class="text-employee-position">
                                        @if ($employee->user_id)
                                            @foreach ($employee->user->getRoleNames() as $role)
                                                <span class="role-info role-bg-one">{{ $role }}</span>
                                            @endforeach
                                        @endif
                                    </td>

                                    <td class="text-end ico-sec">
                                        {{-- @if (auth()->user()->can('view-all')) --}}
                                        @can('update-employees')
                                            <a href="{{route('employees.edit',$employee->id)}}" data-bs-toggle="modal"
                                               data-bs-target="#edit_employee" class="edit-em"
                                               data-update="{{route('employees.update',$employee->id)}}"><i
                                                    class="fas fa-pen"></i></a>
                                        @endcan
                                        @can('status-employees')
                                            @if ($employee->status == 0)
                                                <a href="{{route('employees.active',$employee->id)}}"
                                                   data-delete="{{$employee->id}}" class="active-em"><i
                                                        class="fa-solid fa-lock"
                                                        style="color: #333333;"></i></a>
                                            @else
                                                <a href="{{route('employees.active',$employee->id)}}"
                                                   data-delete="{{$employee->id}}" class="active-em"><i
                                                        class="fa-solid fa-unlock"
                                                        style="color: #333333;"></i></a>
                                            @endif
                                            {{-- @endif --}}
                                        @endcan
                                        <a href="{{route('employees.detail',$employee->id)}}"><i
                                                class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- form active --}}
        <form action="" method="post" enctype="multipart/form-data" id="form-active">
            @csrf
        </form>

        {{-- <form action="" method="post">
            @csrf
            @method('DELETE')
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6 input-delete">
                                        <button class="btn btn-primary continue-btn" style="width: 100%">Delete</button>
                                    </div>
                                    <div class="col-6 input-delete">
                                        <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}

        <div id="edit_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="" name="id">

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Thông tin nhân viên<span class="text-danger">*</span></h3>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Họ<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="first_name" type="text" value="">
                                                <span class="text-danger first_name-error error"></span>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Tên<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="last_name" type="text" value="">
                                                <span class="text-danger last_name-error error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Ngày sinh<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control " name="birthday" type="date" value="">
                                                <span class="text-danger birthday-error error"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Số điện thoại<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="phone_number" type="text" value="">
                                                <span class="text-danger phone_number-error error"></span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Giới tính<span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="gender">
                                                    <option value="">Trống</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                                <span class="text-danger gender-error error"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Quốc tịch<span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="nationality_id">
                                                    <option value="">Trống</option>
                                                    @foreach ($nationalities as $nationality)
                                                        <option value="{{$nationality->id}}">
                                                            {{$nationality->nationality_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger nationality_id-error error"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-block mb-3 input-edit">
                                                <label class="col-form-label">Hình ảnh<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control edit-info" name="image" type="file" value="">
                                                <span class="text-danger image-error error"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">

                                            <div class="mb-3 input-edit">
                                                <img class="image-avatar" src=""
                                                     style="width: 300px; height:200px; margin-top: 2% ;object-fit: cover;" class=" "
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Giấy tờ tùy thân<span class="text-danger">*</span></h3>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Căn cước công dân<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="citizen_identity_card" type="text" value="">
                                        <span class="text-danger citizen_identity_card-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Nơi cấp<span class="text-danger">*</span></label>
                                        <input class="form-control" name="place_of_issue" type="text" value="">
                                        <span class="text-danger place_of_issue-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Ngày cấp<span class="text-danger">*</span></label>
                                        <input class="form-control " name="issue_date" type="date" value="">
                                        <span class="text-danger issue_date-error error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Hình ảnh xác nhận<span class="text-danger">*</span></h3>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Mặt trước căn cước<span
                                                class="text-danger">*</span></label>

                                        <input class="form-control" name="previous_image" type="file" value="">
                                        <span class="text-danger previous_image-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Mặt sau căn cước<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="behind_image" type="file" value="">
                                        <span class="text-danger behind_image-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 input-edit">
                                        <img id="anh_contract"
                                             src="https://cdn.tuoitre.vn/2021/1/26/image005-1611657096178727614385.jpg"
                                             alt="your image" style="max-width: 400px; height:200px; margin-top: 2%  ;"
                                             class="img-fluid previous-image"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 input-edit">
                                        <img id="anh_contract"
                                             src="https://cdn.tuoitre.vn/2021/1/26/image007-16116571601142115231509.jpg"
                                             alt="your image" style="max-width: 400px; height:200px; margin-top: 2%  ;"
                                             class="img-fluid behind-image"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Địa chỉ thường trú<span class="text-danger">*</span></h3>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Nguyên quán tỉnh<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="origin_province">
                                            <option value="">Trống</option>
                                            @foreach ($provinces as $province)
                                                <option data-province="{{$province->id}}"
                                                        value="{{$province->province_name}}">
                                                    {{$province->province_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger origin_province-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Nguyên quán quận/huyện<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="origin_district">
                                            <option value="">Trống</option>
                                            @foreach ($districts as $district)
                                                <option data-district="{{$district->id}}"
                                                        data-province_id="{{$district->province_id}}"
                                                        value="{{$district->district_name}}">
                                                    {{$district->district_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger origin_district-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Nguyên quán xã/phường<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="origin_ward">
                                            <option value="">Trống</option>
                                            @foreach ($wards as $ward)
                                                <option data-district_id="{{$ward->district_id}}"
                                                        value="{{$ward->ward_name}}">
                                                    {{$ward->ward_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger origin_ward-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Địa chỉ cụ thể<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="origin_detail" type="text" value="">
                                        <span class="text-danger origin_detail-error error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Địa chỉ tạm trú<span class="text-danger">*</span></h3>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Hiện tại tỉnh<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="address_province">
                                            <option value="">Trống</option>
                                            @foreach ($provinces as $province)
                                                <option data-province="{{$province->id}}"
                                                        value="{{$province->province_name}}">
                                                    {{$province->province_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger address_province-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Hiện tại quận/huyện<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="address_district">
                                            <option value="">Trống</option>
                                            @foreach ($districts as $district)
                                                <option data-district="{{$district->id}}"
                                                        data-province_id="{{$district->province_id}}"
                                                        value="{{$district->district_name}}">
                                                    {{$district->district_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger address_district-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Hiện tại xã/phường<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="address_ward">
                                            <option value="">Trống</option>
                                            @foreach ($wards as $ward)
                                                <option data-district_id="{{$ward->district_id}}"
                                                        value="{{$ward->ward_name}}">
                                                    {{$ward->ward_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger address_ward-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Địa chỉ cụ thể<span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" name="address_detail" type="text" value="">
                                        <span class="text-danger address_detail-error error"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <h3>Thông tin thêm<span class="text-danger">*</span></h3>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Tôn giáo<span class="text-danger">*</span></label>
                                        <select class="select" name="religion_id">
                                            <option value="">Trống</option>
                                            @foreach ($religions as $religion)
                                                <option value="{{$religion->id}}">{{$religion->religion_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger religion_id-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Dân tộc<span class="text-danger">*</span></label>
                                        <select class="select" name="ethnicity_id">
                                            <option value="">Trống</option>
                                            @foreach ($ethnicities as $ethnicity)
                                                <option value="{{$ethnicity->id}}">{{$ethnicity->ethnicity_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger ethnicity_id-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Trình độ<span class="text-danger">*</span></label>
                                        <select class="select" name="level">
                                            <option value="">Trống</option>
                                            @foreach ($levels as $level)
                                                <option value="{{$level->id}}">{{$level->level_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger level-error error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Chức vụ<span class="text-danger">*</span></label>
                                        <select class="select" name="position">
                                            <option value="">Trống</option>
                                            @foreach ($positions as $position)
                                                <option value="{{$position->id}}">{{$position->position_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger position-error error"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-block mb-3 input-edit">
                                        <label class="col-form-label">Tài khoản<span
                                                class="text-danger">*</span></label>
                                        <select class="select" name="user_id">
                                            <option value="">Trống</option>
                                            {{-- @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="text-danger user_id-error error"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="submit-section input-edit">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Thêm Employees --}}
        {{-- @include('admin.employees.add') --}}

        {{-- Sửa Employees --}}
        {{-- @include('admin.employees.edit') --}}

    </div>
@endsection
@section('js')
    <script type="module" src="{{asset('assets/js/showtoast.js')}}"></script>
    <script src="{{asset('assets/js/admin/employee.js')}}"></script>
@endsection
