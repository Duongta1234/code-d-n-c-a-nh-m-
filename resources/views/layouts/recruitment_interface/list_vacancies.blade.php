@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">

    <div class="content container-fluid pb-0">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>Tuyển dụng</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tuyển dụng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row filter-row">
            {{-- <div class="col-xxl-8">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3 form-focus mb-0">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Project Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3 form-focus mb-0">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3 form-focus select-focus mb-0">
                            <select class="select floating">
                                <option>Select Role</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-search mb-3"><i class="fas fa-search me-2"></i>
                            Search </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="add-emp-section">
                    <a href="projects.html" class="grid-icon active"><i class="fas fa-th"></i></a>
                    <a href="project-list.html" class="list-icon"><i class="fas fa-bars"></i></a>
                    <a href="#" class="btn btn-success btn-add-emp" data-bs-toggle="modal"
                        data-bs-target="#create_project"><i class="fas fa-plus"></i> Create Project</a>
                </div>
            </div>
        </div> --}}

        <div class="row">
            @foreach($ListJobPosting as $list)
            <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    {{-- <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" alt="Icon">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a
                                        href="{{route('route_job_posting_detail',['id'=>$list->id])}}">{{$list->title}}</a>
                                </h4>
                                <h6 class="project-text">Số lượng: {{$list->job_position->quantity}}</h6>
                            </div>
                        </div>
                        <p class="project-p">{!!\Illuminate\Support\Str::words($list->description, 50)!!}</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Lương</h5>
                                <h6>{{number_format($list->salary)}}VNĐ</h6>
                            </li>
                            <li>
                                <h5>Hạn nộp</h5>
                                <h6>{{ \Illuminate\Support\Carbon::parse($list->application_deadline)->format('d/m/Y') }}</h6>
                            </li>
                        </ul>
                        {{-- <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul> --}}
                        {{-- <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" alt="Icon">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <h6 class="project-text">3 open tasks, 3 tasks completed</h6>
                            </div>
                        </div>
                        <p class="project-p">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. When an unknown printer took a galley of type and scrambled it...</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Cost</h5>
                                <h6>$1200</h6>
                            </li>
                            <li>
                                <h5>Deadline</h5>
                                <h6>29 Jun, 2020</h6>
                            </li>
                        </ul>
                        <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" alt="Icon">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <h6 class="project-text">3 open tasks, 3 tasks completed</h6>
                            </div>
                        </div>
                        <p class="project-p">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. When an unknown printer took a galley of type and scrambled it...</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Cost</h5>
                                <h6>$1200</h6>
                            </li>
                            <li>
                                <h5>Deadline</h5>
                                <h6>29 Jun, 2020</h6>
                            </li>
                        </ul>
                        <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" ...">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <h6 class="project-text">3 open tasks, 3 tasks completed</h6>
                            </div>
                        </div>
                        <p class="project-p">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. When an unknown printer took a galley of type and scrambled it...</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Cost</h5>
                                <h6>$1200</h6>
                            </li>
                            <li>
                                <h5>Deadline</h5>
                                <h6>29 Jun, 2020</h6>
                            </li>
                        </ul>
                        <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" alt="...">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <h6 class="project-text">3 open tasks, 3 tasks completed</h6>
                            </div>
                        </div>
                        <p class="project-p">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. When an unknown printer took a galley of type and scrambled it...</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Cost</h5>
                                <h6>$1200</h6>
                            </li>
                            <li>
                                <h5>Deadline</h5>
                                <h6>29 Jun, 2020</h6>
                            </li>
                        </ul>
                        <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-3">
                <div class="card project-card-det">
                    <div class="card-header">
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i>
                                    Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="media d-flex">
                            <span class="avatar flex-shrink-0">
                                <img src="assets/img/client-small.png" Icon">
                            </span>
                            <div class="media-body flex-grow-1">
                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                <h6 class="project-text">3 open tasks, 3 tasks completed</h6>
                            </div>
                        </div>
                        <p class="project-p">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. When an unknown printer took a galley of type and scrambled it...</p>
                        <ul class="cost-li">
                            <li>
                                <h5>Cost</h5>
                                <h6>$1200</h6>
                            </li>
                            <li>
                                <h5>Deadline</h5>
                                <h6>29 Jun, 2020</h6>
                            </li>
                        </ul>
                        <ul class="team-li">
                            <li>
                                <h5>Project Leader</h5>
                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img
                                        src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                            </li>
                            <li>
                                <h5>Team</h5>
                                <ul class="team-members">
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe"><img
                                                src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img
                                                src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                    </li>
                                    <li class="dropdown avatar-dropdown">
                                        <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">+15</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="avatar-group">
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                </a>
                                                <a class="avatar avatar-xs" href="#">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                            <div class="avatar-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">«</span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">»</span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="m-b-5 mt-4">Progress <span class="text-blue float-end">40%</span></p>
                        <div class="progress progress-sm mb-0">
                            <div class="progress-bar progress-profile bg-blue" role="progressbar"
                                data-bs-toggle="tooltip" title="40%"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


    <div id="create_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Project Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Client</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Rate</label>
                                    <input placeholder="$50" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">&nbsp;</label>
                                    <select class="select">
                                        <option>Hourly</option>
                                        <option>Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Priority</label>
                                    <select class="select">
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Add Project Leader</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Team Leader</label>
                                    <div class="project-members">
                                        <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Add Team</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Team Members</label>
                                    <div class="project-members">
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="Richard Miles" class="avatar">
                                            <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                            <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus" class="avatar">
                                            <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-block mb-3">
                            <label class="col-form-label">Description</label>
                            <div id="editor"></div>
                        </div>
                        <div class="input-block mb-3">
                            <label class="col-form-label">Upload Files</label>
                            <input class="form-control" type="file">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="edit_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Project Name</label>
                                    <input class="form-control" value="Project Management" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Client</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Rate</label>
                                    <input placeholder="$50" class="form-control" value="$5000" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">&nbsp;</label>
                                    <select class="select">
                                        <option>Hourly</option>
                                        <option selected>Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Priority</label>
                                    <select class="select">
                                        <option selected>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Add Project Leader</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Team Leader</label>
                                    <div class="project-members">
                                        <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Add Team</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Team Members</label>
                                    <div class="project-members">
                                        <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="Richard Miles" class="avatar">
                                            <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                            <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                        </a>
                                        <a href="#" data-bs-toggle="tooltip" title="Mike Litorus" class="avatar">
                                            <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-block mb-3">
                            <label class="col-form-label">Description</label>
                            <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="input-block mb-3">
                            <label class="col-form-label">Upload Files</label>
                            <input class="form-control" type="file">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary cancel-btn" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete_project" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Project</h3>
                        <p>Are you sure want to delete?</p>
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

</div>
@endsection
