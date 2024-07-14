@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>InterviewSchedule</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">InterviewSchedule</li>
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
                                    <h5 class="modal-title">Add InterViewSchedule</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('interviewschedule.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Tên Người Phỏng Vấn<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="user_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($User as $user)
                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                        <span
                                                            class="text-danger first_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Kiểm Tra Hồ sơ<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="profile_screening_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($profileScreening as $profile)
                                                            <option value="{{$profile->id}}">{{$profile->candidate_id}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('profile_screening_id')
                                                        <span
                                                            class="text-danger first_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Ngày Phỏng Vấn<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="interview_day" type="date"
                                                        >
                                                    @error('interview_day')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Giờ Phỏng Vấn<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="interview_time" type="time"
                                                        >
                                                    @error('interview_time')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Địa điểm phỏng vấn<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="interview_location" type="text"
                                                        >
                                                    @error('interview_location')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Trạng Thái<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="status" type="text"
                                                        >
                                                    @error('status')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Nội dung phỏng vấn<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="interview_content" rows="4"></textarea>
                                                    @error('interview_content')
                                                        <span class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            {{-- <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Tên<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="last_name" type="text"
                                                        value="{{ old('last_name') }}">
                                                    @error('last_name')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Ngày sinh<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control " name="birthday" type="date"
                                                        value="{{ old('birthday') }}">
                                                    @error('birthday')
                                                        <span
                                                            class="text-danger birthday-error error">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Hình ảnh<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="image" type="file"
                                                        value="{{ old('image') }}">
                                                    @error('image')
                                                        <span class="text-danger image-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Số điện thoại<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" name="phone_number" type="text"
                                                        value="{{ old('phone_number') }}">
                                                    @error('phone_number')
                                                        <span
                                                            class="text-danger phone_number-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Giới tính<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="gender">
                                                        <option value="">Trống</option>
                                                        <option value="Nam"
                                                            {{ old('gender') == 'Nam' ? 'selected' : false }}>Nam</option>
                                                        <option value="Nữ"
                                                            {{ old('gender') == 'Nữ' ? 'selected' : false }}>Nữ</option>
                                                        <option value="Khác"
                                                            {{ old('gender') == 'Khác' ? 'selected' : false }}>Khác</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="text-danger gender-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>






                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Hiện tại tỉnh<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="address_province">
                                                        <option value="">Trống</option>
                                                        @foreach ($provinces as $province)
                                                            <option data-province="{{ $province->id }}"
                                                                value="{{ $province->province_name }}"
                                                                {{ old('address_province') == $province->province_name ? 'selected' : false }}>
                                                                {{ $province->province_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('address_province')
                                                        <span
                                                            class="text-danger address_province-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                        </div>
                                </div>
                                <div class="submit-section input-add">
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
@endsection
