@extends('admin.layouts.main')
@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="page-head-box">
                    <h3>National</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">National </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row filter-row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="add-emp-section">
                    <a href="{{route('national.create')}}" class="btn btn-success btn-add-emp" ><i class="fas fa-plus"></i> Add National</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>nationality_name </th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($national as $nat)
                                <tr class="holiday-completed">
                                    <td>{{ $nat->id }}</td>
                                    <td>{{ $nat->nationality_name }}</td>
                                    <td class="text-end ico-sec">
                                        <a href="{{route('national.edit',$nat->id) }}" >
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{route('national.destroy',$nat->id) }}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#delete_employee"
                                           data-delete="{{$nat->id}}"
                                           class="delete-em">
                                            <i class="far fa-trash-alt"
                                               data-delete="{{$nat->id}}"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post">
        @csrf
        @method('DELETE')
        <div class="modal custom-modal fade" id="delete_employee" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete religion</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6 input-delete">
                                    <button class="btn btn-primary continue-btn" style="width: 100%">Delete</button>
                                </div>
                                <div class="col-6 input-delete">
                                    <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@section('js')
    <script type="module" src="{{asset('assets/js/showtoast.js')}}"></script>
    <script>
        $(document).ready(function(){
            let href;
            $('.active-em').on('click', function(e){
                e.preventDefault();
                if(e.target.matches('a') || e.target.matches('i')){
                    href = e.target.closest('a').getAttribute('href')
                    $('#form-active').attr('action', href);
                    $('#form-active').submit();

                }
            })

            var table = $('.datatable').DataTable();

            // Xử lý sự kiện khi DataTables chuyển trang
            $('.datatable').on('page.dt', function() {
                // Cập nhật giá trị data-delete cho mỗi nút xóa
                var currentPage = table.page.info().page;
                table.page(currentPage).draw('page');

                $('.active-em').on('click', function(e){
                    e.preventDefault();
                    if(e.target.matches('a') || e.target.matches('i')){
                        href = e.target.closest('a').getAttribute('href')
                        $('#form-active').attr('action', href);
                        $('#form-active').submit();

                    }
                })

            });

            $('.input-delete .continue-btn').on('click', function(e){
                e.preventDefault();
                let form = e.target.form;
                form.setAttribute('action',href);
                // console.log(form)
                form.submit()
            })

        })
    </script>
@endsection

