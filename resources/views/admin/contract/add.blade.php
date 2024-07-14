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
                <h2 class="modal-title">Thêm hợp đồng</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('route_contract_add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tên hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_name" placeholder="Abc...">
                        @error('contract_name')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Hình ảnh <span
                                class="text-danger">*</span></label>

                        <input class="form-control" type="file" id="cmt_anh_contract" name="image" accept="image/*">
                        <img id="anh_contract"
                             src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                             alt="your image"
                             style="max-width: 400px; height:200px; margin-top: 2%  ;" class="img-fluid"/>
                        @error('image')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày kí <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="sign_date" placeholder="Abc...">
                        @error('sign_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày có hiệu lực <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="effective_date" placeholder="">
                        @error('effective_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày hết hạn <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="expiration_date" placeholder="">
                        @error('expiration_date')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Loại hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="type_contract" placeholder="">
                        @error('type_contract')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Lương <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="salary" placeholder="">
                        @error('salary')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Họ và tên <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="full_name" placeholder="">
                        @error('full_name')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Điều khoản hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_terms" placeholder="">
                        @error('contract_terms')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="input-block mb-3">
                        <label class="col-form-label">Thông tin hợp đồng <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="contract_infor" placeholder="">
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
                                <option value="{{$emp->id}}" >{{$emp->id}} </option>
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
                                <option value="{{$pos->id}}" >{{$pos->position_name}}</option>
                            @endforeach
                        </select>
                        @error('position_id')
                        <span class="text-danger "><b>{{$message}}</b></span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


