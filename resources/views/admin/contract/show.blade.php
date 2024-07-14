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
            @can('show-employees')
            <div class="row filter-row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="{{ route('route_contract_index') }}" class="btn btn-success btn-add-emp"> Danh sách hợp
                            đồng</a>
                    </div>
                </div>
            </div>
            @endcan
            <div class="modal-body">
                    <div class="input-block mb-3">
                        <label class="col-form-label">Tên nhân viên</label>
                        <input class="form-control" type="text" readonly
                               value="{{ $contract->employee->first_name .' '. $contract->employee->last_name }}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Tên hợp đồng</label>
                        <input class="form-control" type="text" readonly value="{{ $contract->contract_name }}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">File PDF hợp đồng</label>
                        <embed src="{{ asset('pdf/contract/'.$contract->file_pdf) }}" type="application/pdf"
                               width="100%" height="600px"/>
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày kí</label>
                        <input class="form-control" type="text" readonly value="{{ $contract->sign_date }}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày có hiệu lực</label>
                        <input class="form-control" type="text" readonly value="{{ $contract->effective_date }}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Ngày hết hạn</label>
                        <input class="form-control" type="text" readonly value="{{ $contract->expiration_date }}">
                    </div>

                    <div class="input-block mb-3">
                        <label class="col-form-label">Vị trí</label>
                        <input class="form-control" type="text" readonly
                               value="{{ $contract->position->position_name }}">
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
