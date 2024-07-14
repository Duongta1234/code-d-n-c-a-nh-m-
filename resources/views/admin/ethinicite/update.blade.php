@extends('admin.layouts.main')
@section('content')

<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Update Ethinicite</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ethinicite</li>
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
                                <h5 class="modal-title">Update Employee</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('ethinicite.update',$ethinicite->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="input-block mb-3 input-add">
                                                <label class="col-form-label">ethnicity_name<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="ethnicity_name" value="{{$ethinicite->ethnicity_name}}" type="text">
                                                @error('ethnicity_name')

                                                <span class="text-danger ethnicity_name-error error">{{$message}}</span>
                                                @enderror
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



</div>


@endsection

