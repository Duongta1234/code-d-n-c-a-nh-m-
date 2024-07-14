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


            <div class="row">
                <div class="col-md-12">
                    <div class="custom-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Employee</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('employees.update',$employee->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Họ<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="first_name" type="text"
                                                           value="{{old('first_name') ?? $employee->first_name}}">
                                                    @error('first_name')

                                                    <span class="text-danger first_name-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Tên<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="last_name" type="text"
                                                           value="{{old('last_name') ?? $employee->last_name}}">
                                                    @error('last_name')

                                                    <span class="text-danger last_name-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Ngày sinh<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control " name="birthday" type="date"
                                                           value="{{old('birthday')?? $employee->date_of_birth}}">
                                                    @error('birthday')

                                                    <span class="text-danger birthday-error error">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Hình ảnh<span
                                                            class="text-danger">*</span></label>
                                                    <img id="anh_preview" src="{{asset('storage/images/employee_image/'.$employee->image)}}" alt="your image"
                                                         style="max-width: 200px; height: 100px; margin-bottom: 10px;" class="img-fluid"/>
                                                    <input class="form-control" name="image" type="file"
                                                           value="{{old('image')}}">
                                                    @error('image')

                                                    <span class="text-danger image-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Số điện thoại<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="phone_number" type="text"
                                                           value="{{old('phone_number')?? $employee->phone_number}}">
                                                    @error('phone_number')

                                                    <span class="text-danger phone_number-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Giới tính<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="gender">
                                                        <option value="">Trống</option>
                                                        <option value="Nam" {{old('gender')=='Nam' || $employee->gender ==
                                                        'Nam' ? 'selected':false}}>Nam</option>
                                                        <option value="Nữ" {{old('gender')=='Nữ' || $employee->gender ==
                                                        'Nữ' ? 'selected':false}}>Nữ</option>
                                                        <option value="Khác" {{old('gender')=='Khác' || $employee->gender ==
                                                        'Khác' ? 'selected':false}}>Khác</option>
                                                    </select>
                                                    @error('gender')

                                                    <span class="text-danger gender-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Căn cước công dân<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="citizen_identity_card" type="text"
                                                           value="{{old('citizen_identity_card') ?? $employee->card->citizen_identity_card}}">
                                                    @error('citizen_identity_card')
                                                    <span
                                                        class="text-danger citizen_identity_card-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Nơi cấp<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="place_of_issue" type="text"
                                                           value="{{old('place_of_issue')?? $employee->card->place_of_issue}}">
                                                    @error('place_of_issue')

                                                    <span class="text-danger place_of_issue-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Ngày cấp<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control " name="issue_date" type="date"
                                                           value="{{old('issue_date') ?? $employee->card->issue_date}}">
                                                    @error('issue_date')

                                                    <span class="text-danger issue_date-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Mặt trước căn cước<span
                                                            class="text-danger">*</span></label>
                                                    <img id="anh_preview" src="{{asset('storage/images/previous_card/'.$employee->card->previous_image)}}" alt="your image"
                                                         style="max-width: 200px; height: 100px; margin-bottom: 10px;" class="img-fluid"/>
                                                    <input class="form-control" name="previous_image" type="file"
                                                           value="{{old('previous_image')?? $employee->card->previous_image}}">
                                                    @error('previous_image')

                                                    <span class="text-danger previous_image-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Mặt sau căn cước<span
                                                            class="text-danger">*</span></label>
                                                    <img id="anh_preview" src="{{asset('storage/images/behind_card/'.$employee->card->behind_image)}}" alt="your image"
                                                         style="max-width: 200px; height: 100px; margin-bottom: 10px;" class="img-fluid"/>
                                                    <input class="form-control" name="behind_image" type="file"
                                                           value="{{old('behind_image')?? $employee->card->behind_image}}">
                                                    @error('behind_image')

                                                    <span class="text-danger behind_image-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Quốc tịch<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="nationality_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($nationalities as $nationality)
                                                            <option value="{{$nationality->id}}"
                                                                {{old('nationality_id')==$nationality->id ||
                                                                $employee->nationality->id == $nationality->id?
                                                                'selected':false}}>
                                                                {{$nationality->nationality_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('nationality_id')

                                                    <span class="text-danger nationality_id-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Nguyên quán tỉnh<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="origin_province">
                                                        <option value="">Trống</option>
                                                        @foreach ($provinces as $province)
                                                            <option data-province="{{$province->id}}"
                                                                    value="{{$province->province_name}}"
                                                                {{old('origin_province')==$province->province_name || $origin[3]
                                                                == $province->province_name? 'selected':false}}>
                                                                {{$province->province_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('origin_province')

                                                    <span
                                                        class="text-danger origin_province-error error">{{$message}}</span>
                                                    @enderror
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
                                                                    value="{{$district->district_name}}" dis
                                                                {{old('origin_district')==$district->district_name || $origin[2]
                                                                == $district->district_name ? 'selected':false}}>
                                                                {{$district->district_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('origin_district')
                                                    <span
                                                        class="text-danger origin_district-error error">{{$message}}</span>
                                                    @enderror
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
                                                                    value="{{$ward->ward_name}}" dis {{old('origin_ward')==$ward->
                                                        ward_name || $origin[1] == $ward->ward_name?
                                                        'selected':false}}>{{$ward->ward_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('origin_ward')

                                                    <span class="text-danger origin_ward-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Địa chỉ cụ thể<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="origin_detail" type="text"
                                                           value="{{old('origin_detail')?? $origin[0]}}">
                                                    @error('origin_detail')

                                                    <span class="text-danger origin_detail-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Hiện tại tỉnh<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="address_province">
                                                        <option value="">Trống</option>
                                                        @foreach ($provinces as $province)
                                                            <option data-province="{{$province->id}}"
                                                                    value="{{$province->province_name}}"
                                                                {{old('address_province')==$province->province_name ||
                                                                $address[3] == $province->province_name ? 'selected':false}}>
                                                                {{$province->province_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('address_province')

                                                    <span
                                                        class="text-danger address_province-error error">{{$message}}</span>
                                                    @enderror
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
                                                                    value="{{$district->district_name}}" dis
                                                                {{old('address_district')==$district->district_name ||
                                                                $address[2] == $district->district_name ? 'selected':false}}>
                                                                {{$district->district_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('address_district')

                                                    <span
                                                        class="text-danger address_district-error error">{{$message}}</span>
                                                    @enderror
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
                                                                    value="{{$ward->ward_name}}" dis {{old('address_ward')==$ward->
                                                        ward_name || $address[1] == $ward->ward_name ?
                                                        'selected':false}}>{{$ward->ward_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('address_ward')

                                                    <span class="text-danger address_ward-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Địa chỉ cụ thể<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="address_detail" type="text"
                                                           value="{{old('address_detail') ?? $address[0]}}">
                                                    @error('address_detail')

                                                    <span class="text-danger address_detail-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Tôn giáo<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="religion_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($religions as $religion)
                                                            <option value="{{$religion->id}}" {{old('religion_id')==$religion->
                                                        id || $employee->religion->id == $religion->id ?
                                                        'selected':false}}>{{$religion->religion_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('religion_id')

                                                    <span class="text-danger religion_id-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Dân tộc<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="ethnicity_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($ethnicities as $ethnicity)
                                                            <option value="{{$ethnicity->id}}"
                                                                {{old('ethnicity_id')==$ethnicity->id ||
                                                                $employee->ethnicity->id == $ethnicity->id ?
                                                                'selected':false}}>{{$ethnicity->ethnicity_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('ethnicity_id')

                                                    <span class="text-danger ethnicity_id-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Chức vụ<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="position">
                                                        <option value="">Trống</option>
                                                        @foreach ($positions as $position)
                                                            <option value="{{$position->id}}" {{old('position')==$position->id
                                                        || $employee->position->id == $position->id ?
                                                        'selected':false}}>{{$position->position_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('position')

                                                    <span class="text-danger position-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Trạng thái nhân viên<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="status_employee">
                                                        <option value="">Trống</option>
                                                        <option value="1" {{old('status_employee')== 1 || $employee->statusEmployee->status == 1? 'selected' :false}}>
                                                            Đang làm</option>
                                                        <option value="2" {{old('status_employee')== 2 || $employee->statusEmployee->status == 2? 'selected' :false}}>
                                                            Đã nghỉ</option>
                                                    </select>
                                                    @error('status_employee')

                                                    <span
                                                        class="text-danger status_employee-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Trình độ<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="level">
                                                        <option value="">Trống</option>
                                                        @foreach ($levels as $level)
                                                            <option value="{{$level->id}}" {{old('level')==$level->id ||
                                                        $employee->level->id == $level->id ?
                                                        'selected':false}}>{{$level->education_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('level')

                                                    <span class="text-danger level-error error">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-edit">
                                                    <label class="col-form-label">Tài khoản<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="user_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{$user->id}}" {{old('user_id')==$user->id ||
                                                        $employee->user_id == $user->id ?
                                                        'selected':false}}>{{$user->email}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')

                                                    <span class="text-danger user_id-error error">{{$message}}</span>
                                                    @enderror
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

@endsection
