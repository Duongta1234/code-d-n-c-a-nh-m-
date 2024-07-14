@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Bài đăng tuyển dụng</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bài đăng tuyển dụng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_job_posting_index') }}" class="btn btn-success btn-add-emp" > Danh sách bài đăng tuyển dụng</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h2 class="modal-title">Bài đăng tuyển dụng</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_job_posting_edit',['id'=>$job_posting->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tiêu đề <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" value="{{$job_posting->title}}">
                        @error('title')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Mô tả <span
                                class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control">{{$job_posting->description}}</textarea>
                        @error('description')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Yêu cầu <span
                                class="text-danger">*</span></label>
                        <textarea name="request" id="request" class="form-control">{{$job_posting->request}}</textarea>
                        @error('request')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lương <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="salary" value="{{$job_posting->salary}}">
                        @error('date_post')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Quyền lợi <span
                                class="text-danger">*</span></label>
                        <textarea name="benefit" id="benefit" class="form-control">{{$job_posting->benefit}}</textarea>
                        @error('benefit')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thời gian làm việc <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="working_time" value="{{$job_posting->working_time}}">
                        @error('working_time')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Địa chỉ làm việc <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="address" value="{{$job_posting->address}}">
                        @error('address')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thời hạn ứng tuyển <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="application_deadline" value="{{$job_posting->application_deadline}}">
                        @error('application_deadline')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Liên lạc <span
                                class="text-danger">*</span></label>
                        <input class="form-control" id="contact" type="text" name="contact" value="{{$job_posting->contact}}">
                        @error('contact')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Trạng thái <span
                                class="text-danger">*</span></label><br>
                        <input type="radio" name="status" value="1" {{$job_posting->status == 1? 'checked': ''}} >Kích hoạt
                        <input type="radio" name="status" value="0" {{$job_posting->status == 0? 'checked': ''}} style="margin-left: 10%">Không kích hoạt
                        @error('status')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí tuyển dụng <span
                                class="text-danger">*</span></label>
                        <select class="select" name="job_position_id">
                            @foreach ($job_position as $pos)
                                <option value="{{$pos->id}}" {{$job_posting->job_position_id == $pos->id? 'selected': ''}}>{{$pos->title}}</option>
                            @endforeach
                        </select>
                        @error('job_position_id')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Người đăng <span
                                class="text-danger">*</span></label>

                        <select class="select" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" {{$job_posting->user_id == $user->id? 'selected': ''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="submit-section" style="margin-bottom: 20px">
                        <button class="btn btn-primary submit-btn">Lưu bài viết</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



