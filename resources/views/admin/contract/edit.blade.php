@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Hợp đồng lao động</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hợp đồng lao động</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_contract_index') }}" class="btn btn-success btn-add-emp" > Danh sách hợp đồng</a>
                    </div>
                </div>
            </div>
            <div class="modal-header">

                <h2 class="modal-title">Sửa hợp đồng</h2>
            </div>
            <div class="modal-body">
                @include('admin.layouts.error')
                <form action="{{ route('route_contract_edit',['id'=>$contract->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tên hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_name" value="{{$contract->contract_name}}" placeholder="Abc...">
                        @error('contract_name')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Hình ảnh <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="image" id="cmt_anh_contract" value="{{$contract->image}}" accept="image/*">
                        <img id="anh_contract"
                             src="{{$contract->image? Storage::url($contract->image):'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg'}}"
                             alt="your image"
                             style="max-width: 450px; height:300px; margin-top: 2%  ;" class="img-fluid"/>
                        @error('image')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày kí <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="sign_date" value="{{$contract->sign_date}}" >
                        @error('sign_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày có hiệu lực <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="effective_date" value="{{$contract->effective_date}}" placeholder="">
                        @error('effective_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày hết hạn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="expiration_date" value="{{$contract->expiration_date}}">
                        @error('expiration_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Loại hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="type_contract" value="{{$contract->type_contract}}">
                        @error('type_contract')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lương <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="salary" value="{{$contract->salary}}">
                        @error('salary')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Họ và tên <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="full_name" value="{{$contract->full_name}}">
                        @error('full_name')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Điều khoản hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_terms" value="{{$contract->contract_terms}}">
                        @error('contract_terms')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thông tin hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_infor" value="{{$contract->contract_infor}}">
                        @error('contract_infor')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Mã nhân viên <span
                                class="text-danger">*</span></label>
                        {{--                        <input class="form-control" type="text" name="employee_id" placeholder="">--}}
                        <select class="select" name="employee_id">
                            <option value="">Chọn mã nhân viên</option>
                            @foreach ($employee as $emp)
                                <option value="{{$emp->id}}" {{$contract->employee_id == $emp->id? 'selected': ''}} >{{$emp->id}} </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí <span
                                class="text-danger">*</span></label>
                        {{--                        <input class="form-control" type="text" name="position_id" placeholder="">--}}
                        <select class="select" name="position_id">
                            <option value="">Chọn vị trí</option>
                            @foreach ($position as $pos)
                                <option value="{{$pos->id}}" {{$contract->position_id == $pos->id? 'selected': ''}} >{{$pos->position_name}}</option>
                            @endforeach
                        </select>
                        @error('position_id')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" style="margin-bottom: 2%">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


