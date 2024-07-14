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
                                    <form action="{{route('interviewschedule.update',$interviewSchedule->id)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Tên Người Phỏng Vấn<span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="user_id">
                                                        <option value="">Trống</option>
                                                        @foreach ($User as $user)
                                                            <option value="{{ $user->id }}"
                                                                {{ old('user_id') == $user->id || $interviewSchedule->user->id == $user->id ? 'selected' : false }}>
                                                                {{ $user->name }}</option>
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
                                                            <option value="{{ $profile->id }}"
                                                                {{ old('profile_screening_id') == $profile->id || $interviewSchedule->profileScreening->id == $profile->id
                                                                    ? 'selected'
                                                                    : false }}>
                                                                {{ $profile->candidate_id }}
                                                            </option>
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
                                                        value="{{ $interviewSchedule->interview_day }}">
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
                                                    <input class="form-control"
                                                        value="{{ $interviewSchedule->interview_time }}"
                                                        name="interview_time" type="time">
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
                                                    <input class="form-control"
                                                        value="{{ $interviewSchedule->interview_location }}"
                                                        name="interview_location" type="text">
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
                                                    <input class="form-control" value="{{ $interviewSchedule->status }}"
                                                        name="status" type="text">
                                                    @error('status')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-block mb-3 input-add">
                                                    <label class="col-form-label">Nội dung phỏng vấn<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text"
                                                        value="{{ $interviewSchedule->interview_content }}"
                                                        name="interview_content">
                                                    @error('interview_content')
                                                        <span
                                                            class="text-danger last_name-error error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

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
