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
                            <li class="breadcrumb-item active" aria-current="page">thêm nhân viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="add-emp-section">
                    <a href="{{ route('employees.index') }}" class="btn btn-success btn-add-emp"><i
                            class="fas fa-plus"></i> Danh sách nhân viên</a>
                </div>
            </div>
        </div>
        <div class="modal-header">
            <h2 class="modal-title">Thêm nhân viên</h2>
        </div>
        <div class="modal-body">
            <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div></div>
                <div class="row filter-row">
                    <h3>Thông tin nhân viên<span class="text-danger">*</span></h3>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Họ<span class="text-danger">*</span></label>
                                    <input class="form-control" name="first_name" type="text"
                                        value="{{old('first_name')}}">
                                    @error('first_name')
                                    <span class="text-danger first_name-error error">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Tên<span class="text-danger">*</span></label>
                                    <input class="form-control" name="last_name" type="text"
                                        value="{{old('last_name')}}">
                                    @error('last_name')

                                    <span class="text-danger last_name-error error">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Ngày sinh<span class="text-danger">*</span></label>
                                    <input class="form-control " name="birthday" type="date"
                                        value="{{old('birthday')}}">
                                    @error('birthday')

                                    <span class="text-danger birthday-error error">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Số điện thoại<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" name="phone_number" type="text"
                                        value="{{old('phone_number')}}">
                                    @error('phone_number')

                                    <span class="text-danger phone_number-error error">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Giới tính<span class="text-danger">*</span></label>
                                    <select class="select" name="gender">
                                        <option value="">Trống</option>
                                        <option value="Nam" {{old('gender')=='Nam' ? 'selected' :false}}>Nam</option>
                                        <option value="Nữ" {{old('gender')=='Nữ' ? 'selected' :false}}>Nữ</option>
                                        <option value="Khác" {{old('gender')=='Khác' ? 'selected' :false}}>Khác
                                        </option>
                                    </select>
                                    @error('gender')

                                    <span class="text-danger gender-error error">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3 input-add">
                                    <label class="col-form-label">Quốc tịch<span class="text-danger">*</span></label>
                                    <select class="select" name="nationality_id">
                                        <option value="">Trống</option>
                                        @foreach ($nationalities as $nationality)
                                        <option value="{{$nationality->id}}" {{old('nationality_id')==$nationality->id ?
                                            'selected':false}}>
                                            {{$nationality->nationality_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('nationality_id')

                                    <span class="text-danger nationality_id-error error">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Hình ảnh<span class="text-danger">*</span></label>
                            <input class="form-control" id="cmt_image" name="image" type="file" accept="image/*"
                                value="{{old('image')}}">
                            <img id="image"
                                src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                                alt="your image" style="max-width: 400px; height:200px; margin-top: 2%  ;"
                                class="img-fluid" />
                            @error('image')
                            <span class="text-danger image-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row filter-row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    <h3>Giấy tờ tuỳ thân<span class="text-danger">*</span></h3>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Căn cước công dân<span class="text-danger">*</span></label>
                            <input class="form-control" name="citizen_identity_card" type="text"
                                value="{{old('citizen_identity_card')}}">
                            @error('citizen_identity_card')
                            <span class="text-danger citizen_identity_card-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Nơi cấp<span class="text-danger">*</span></label>
                            <input class="form-control" name="place_of_issue" type="text"
                                value="{{old('place_of_issue')}}">
                            @error('place_of_issue')

                            <span class="text-danger place_of_issue-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Ngày cấp<span class="text-danger">*</span></label>
                            <input class="form-control " name="issue_date" type="date" value="{{old('issue_date')}}">
                            @error('issue_date')

                            <span class="text-danger issue_date-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row filter-row">
                    <h3>Hình ảnh xác nhận<span class="text-danger">*</span></h3>
                    <div class="col-sm-6">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Mặt trước căn cước<span class="text-danger">*</span></label>
                            <input class="form-control" name="previous_image" type="file" accept="image/*"
                                value="{{old('previous_image')}}">
                            <img id="anh_previous"
                                src="https://cdn.tuoitre.vn/2021/1/26/image005-1611657096178727614385.jpg"
                                alt="your image" style="max-width: 400px; height:200px; margin-top: 2%  ;"
                                class="img-fluid" />
                            @error('previous_image')

                            <span class="text-danger previous_image-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Mặt sau căn cước<span class="text-danger">*</span></label>
                            <input class="form-control" name="behind_image" type="file" accept="image/*" value="{{old('behind_image')}}">
                            <img id="anh_behind"
                                src="https://cdn.tuoitre.vn/2021/1/26/image007-16116571601142115231509.jpg"
                                alt="your image" style="max-width: 400px; height:200px; margin-top: 2%  ;"
                                class="img-fluid" />
                            @error('behind_image')

                            <span class="text-danger behind_image-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row filter-row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    <h3>Địa chỉ thường trú<span class="text-danger">*</span></h3>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Tỉnh/Thành phố<span class="text-danger">*</span></label>
                            <select class="select" name="origin_province">
                                <option value="">Trống</option>
                                @foreach ($provinces as $province)
                                <option data-province="{{$province->id}}" value="{{$province->province_name}}"
                                    {{old('origin_province')==$province->province_name ? 'selected':false}}>
                                    {{$province->province_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('origin_province')

                            <span class="text-danger origin_province-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Quận/Huyện<span
                                    class="text-danger">*</span></label>
                            <select class="select" name="origin_district">
                                <option value="">Trống</option>
                                @foreach ($districts as $district)
                                <option data-district="{{$district->id}}" data-province_id="{{$district->province_id}}"
                                    value="{{$district->district_name}}" {{old('origin_district')==$district->
                                    district_name ? 'selected':false}}>
                                    {{$district->district_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('origin_district')
                            <span class="text-danger origin_district-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Xã/Phường<span
                                    class="text-danger">*</span></label>
                            <select class="select" name="origin_ward">
                                <option value="">Trống</option>
                                @foreach ($wards as $ward)
                                <option data-district_id="{{$ward->district_id}}" value="{{$ward->ward_name}}"
                                    {{old('origin_ward')==$ward->ward_name ? 'selected':false}}>{{$ward->ward_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('origin_ward')

                            <span class="text-danger origin_ward-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Địa chỉ cụ thể<span class="text-danger">*</span></label>
                            <input class="form-control" name="origin_detail" type="text"
                                value="{{old('origin_detail')}}">
                            @error('origin_detail')

                            <span class="text-danger origin_detail-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row filter-row ">
                    <h3>Địa chỉ tạm trú<span class="text-danger">*</span></h3>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Tỉnh/Thành phố<span class="text-danger">*</span></label>
                            <select class="select" name="address_province">
                                <option value="">Trống</option>
                                @foreach ($provinces as $province)
                                <option data-province="{{$province->id}}" value="{{$province->province_name}}"
                                    {{old('address_province')==$province->province_name ? 'selected':false}}>
                                    {{$province->province_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('address_province')

                            <span class="text-danger address_province-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Quận/Huyện<span class="text-danger">*</span></label>
                            <select class="select" name="address_district">
                                <option value="">Trống</option>
                                @foreach ($districts as $district)
                                <option data-district="{{$district->id}}" data-province_id="{{$district->province_id}}"
                                    value="{{$district->district_name}}" {{old('address_district')==$district->
                                    district_name ? 'selected':false}}>
                                    {{$district->district_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('address_district')

                            <span class="text-danger address_district-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Xã/Phường<span class="text-danger">*</span></label>
                            <select class="select" name="address_ward">
                                <option value="">Trống</option>
                                @foreach ($wards as $ward)
                                <option data-district_id="{{$ward->district_id}}" value="{{$ward->ward_name}}"
                                    {{old('address_ward')==$ward->ward_name ? 'selected':false}}>{{$ward->ward_name}}
                                </option>
                                @endforeach
                            </select>
                            @error('address_ward')

                            <span class="text-danger address_ward-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Địa chỉ cụ thể<span class="text-danger">*</span></label>
                            <input class="form-control" name="address_detail" type="text"
                                value="{{old('address_detail')}}">
                            @error('address_detail')

                            <span class="text-danger address_detail-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row filter-row shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    <h3>Thông tin thêm<span class="text-danger">*</span></h3>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Tôn giáo<span class="text-danger">*</span></label>
                            <select class="select" name="religion_id">
                                <option value="">Trống</option>
                                @foreach ($religions as $religion)
                                <option value="{{$religion->id}}" {{old('religion_id')==$religion->id ?
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
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Dân tộc<span class="text-danger">*</span></label>
                            <select class="select" name="ethnicity_id">
                                <option value="">Trống</option>
                                @foreach ($ethnicities as $ethnicity)
                                <option value="{{$ethnicity->id}}" {{old('ethnicity_id')==$ethnicity->id ?
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
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Trình độ<span class="text-danger">*</span></label>
                            <select class="select" name="level">
                                <option value="">Trống</option>
                                @foreach ($levels as $level)
                                <option value="{{$level->id}}" {{old('level')==$level->id ?
                                    'selected':false}}>{{$level->level_name}}</option>
                                @endforeach
                            </select>
                            @error('level')

                            <span class="text-danger level-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-edit">
                            <label class="col-form-label">Chức vụ<span class="text-danger">*</span></label>
                            <select class="select" name="position">
                                <option value="">Trống</option>
                                @foreach ($positions as $position)
                                <option value="{{$position->id}}" {{old('position')==$position->id ?
                                    'selected':false}}>{{$position->position_name}}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger position-error error"></span>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Tài khoản<span class="text-danger">*</span></label>
                            <select class="select" name="user_id">
                                <option value="">Trống</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}" {{old('user_id')==$user->id ?
                                    'selected':false}}>{{$user->email}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="text-danger user_id-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="row filter-row ">
                    <h3>Thông tin công việc<span class="text-danger">*</span></h3>
                    <div class="col-sm-4">
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Chức vụ<span class="text-danger">*</span></label>
                            <select class="select" name="position">
                                <option value="">Trống</option>
                                @foreach ($positions as $position)
                                <option value="{{$position->id}}" {{old('position')==$position->id ?
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
                        <div class="input-block mb-3 input-add">
                            <label class="col-form-label">Trạng thái nhân viên<span class="text-danger">*</span></label>
                            <select class="select" name="status_employee">
                                <option value="">Trống</option>
                                <option value="1" {{old('status_employee')==1? 'selected' :false}}>Đang làm
                                </option>
                                <option value="2" {{old('status_employee')==2? 'selected' :false}}>Đã nghỉ
                                </option>
                            </select>
                            @error('status_employee')

                            <span class="text-danger status_employee-error error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                </div> --}}
        </div>
        <div class="submit-section input-add">
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
@section('scripts')
<script>
    $(document).ready(function() {
        function changeImageEdit(input, image) {
        input.on("change", function (e) {
            var file = e.target.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    changeImageEdit($('#cmt_image'),$('#image'))
    changeImageEdit($('.input-add input[name="previous_image"]'),$('#anh_previous'))
    changeImageEdit($('.input-add input[name="behind_image"]'),$('#anh_behind'))
    });

</script>
@endsection
@section('js')

@endsection
