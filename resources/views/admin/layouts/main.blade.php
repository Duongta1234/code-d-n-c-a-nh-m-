<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <title>Leaves - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://cdn.tiny.cloud/1/6qdh1umqbzmjyndgiwk3o0shv2ujm1f4v7ucbolt0jihzwg3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#description'
        });
        tinymce.init({
            selector: '#request'
        });
        tinymce.init({
            selector: '#benefit'
        });
        tinymce.init({
            selector: '#contact'
        });
    </script>

</head>

<body>

<div class="main-wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @include('admin.layouts.error')
    @yield('content')

    {{-- <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Leaves</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Leaves</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h4>12 / 60</h4>
                        <h6>Today Presents</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h4>8</h4>
                        <h6>Planned Leaves</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h4>0</h4>
                        <h6>Unplanned Leaves</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h4>12</h4>
                        <h6>Pending Requests</h6>
                    </div>
                </div>
            </div>


            <div class="row filter-row">

                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="input-block mb-3 form-focus select-focus mb-0">
                        <select class="select floating">
                            <option> -- Select -- </option>
                            <option>Casual Leave</option>
                            <option>Medical Leave</option>
                            <option>Loss of Pay</option>
                        </select>
                        <label class="focus-label">Leave Type</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="input-block mb-3 form-focus select-focus mb-0">
                        <select class="select floating">
                            <option> -- Select -- </option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                        <label class="focus-label">Leave Status</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="input-block mb-3 form-focus mb-0">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="input-block mb-3 form-focus mb-0">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <a href="#" class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="add-emp-section">
                        <a href="#" class="btn btn-success btn-add-emp" data-bs-toggle="modal"
                            data-bs-target="#add_leave"><i class="fas fa-plus"></i> Add Leave</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-09.jpg"
                                                    alt="User Image"></a>
                                            <a href="#">Richard Miles <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>8 Mar 2019</td>
                                    <td>9 Mar 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-three">New</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-02.jpg"
                                                    alt="User Image"></a>
                                            <a> John Doe <span>Web Designer</span></a>
                                        </h2>
                                    </td>
                                    <td>Medical Leave</td>
                                    <td>27 Feb 2019</td>
                                    <td>27 Feb 2019</td>
                                    <td>1 day</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-10.jpg"
                                                    alt="User Image"></a>
                                            <a>John Smith <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>LOP</td>
                                    <td>24 Feb 2019</td>
                                    <td>25 Feb 2019</td>
                                    <td>2 days</td>
                                    <td>Personnal</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-05.jpg"
                                                    alt="User Image"></a>
                                            <a>Mike Litorus <span>IOS Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Paternity Leave</td>
                                    <td>13 Feb 2019</td>
                                    <td>17 Feb 2019</td>
                                    <td>5 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-one">Declined</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-24.jpg"
                                                    alt="User Image"></a>
                                            <a>Richard Parker <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>30 Jan 2019</td>
                                    <td>31 Jan 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-three">New</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-08.jpg"
                                                    alt="User Image"></a>
                                            <a>Catherine Manseau <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Maternity Leave</td>
                                    <td>5 Jan 2019</td>
                                    <td>15 Jan 2019</td>
                                    <td>10 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-15.jpg"
                                                    alt="User Image"></a>
                                            <a>Buster Wigton <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Hospitalisation</td>
                                    <td>15 Jan 2019</td>
                                    <td>25 Jan 2019</td>
                                    <td>10 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-20.jpg"
                                                    alt="User Image"></a>
                                            <a>Melita Faucher <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>13 Jan 2019</td>
                                    <td>14 Jan 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-one">Declined</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-03.jpg"
                                                    alt="User Image"></a>
                                            <a>Tarah Shropshire <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>10 Jan 2019</td>
                                    <td>10 Jan 2019</td>
                                    <td>1 day</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-three">New</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-20.jpg"
                                                    alt="User Image"></a>
                                            <a>Domenic Houston <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>10 Jan 2019</td>
                                    <td>11 Jan 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-02.jpg"
                                                    alt="User Image"></a>
                                            <a>John Doe <span>Web Designer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>9 Jan 2019</td>
                                    <td>10 Jan 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-two">Approved</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar"><img
                                                    src="{{asset('')}}assets/img/profiles/avatar-25.jpg"
                                                    alt="User Image"></a>
                                            <a>Rolland Webber <span>Web Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>Casual Leave</td>
                                    <td>7 Jan 2019</td>
                                    <td>8 Jan 2019</td>
                                    <td>2 days</td>
                                    <td>Going to Hospital</td>
                                    <td class="text-center">
                                        <span class="role-info role-bg-one">Declined</span>
                                    </td>
                                    <td class="text-end ico-sec">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit_leave"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_approve"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row">
                            <div class="input-block mb-3 col-md-12">
                                <label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select Leave Type</option>
                                    <option>Casual Leave 12 Days</option>
                                    <option>Medical Leave</option>
                                    <option>Loss of Pay</option>
                                </select>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">Number of days <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text">
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">Remaining Leaves <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div>
                            <div class="input-block mb-3 col-md-12">
                                <label class="col-form-label">Leave Reason <span
                                        class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control"></textarea>
                            </div>
                            <div class="submit-section col-md-12">
                                <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="edit_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Leave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row">
                            <div class="input-block mb-3 col-md-12">
                                <label class="col-form-label">Leave Type <span class="text-danger">*</span></label>
                                <select class="select">
                                    <option>Select Leave Type</option>
                                    <option>Casual Leave 12 Days</option>
                                </select>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" value="01-01-2019" type="text">
                                </div>
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">Number of days <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" readonly type="text" value="2">
                            </div>
                            <div class="input-block mb-3 col-md-6">
                                <label class="col-form-label">Remaining Leaves <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" readonly value="12" type="text">
                            </div>
                            <div class="input-block mb-3 col-md-12">
                                <label class="col-form-label">Leave Reason <span
                                        class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control">Going to hospital</textarea>
                            </div>
                            <div class="submit-section col-md-12">
                                <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_approve" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Leave</h3>
                            <p>Are you sure want to delete this leave?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
</div>


<script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/admin/main.js')}}"></script>
{{-- @vite('resources/js/app.js') --}}


<script>
    $(document).ready(function(){
        $('.form-logout').on('click', function(e){
            e.preventDefault();
            e.target.closest('form').submit();
        })

    })
</script>
@yield('js')
</body>
@yield('scripts')
<!-- Mirrored from smarthr.dreamguystech.com/html/template2/leaves.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 09:14:49 GMT -->
<script>
    $(function () {
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cmt_anh_contract").change(function () {
            readURL(this, '#anh_contract');
        });

    });
</script>
</html>
