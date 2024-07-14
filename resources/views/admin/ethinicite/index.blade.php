@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="page-head-box">
                        <h3>Employee</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ethinicite</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row filter-row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus mb-0">
                                <input type="text" class="form-control floating">
                                <label class="focus-label">Employee ID</label>
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
                                    <option>Select Designation</option>
                                    <option>Web Developer</option>
                                    <option>Web Designer</option>
                                    <option>Android Developer</option>
                                    <option>Ios Developer</option>
                                </select>
                                <label class="focus-label">Designation</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a href="#" class="btn btn-success btn-search"><i class="fas fa-search me-2"></i> Search
                            </a>
                        </div>
                    </div>
                </div>
                {{-- create --}}

                <div class="col-md-4">
                    <div class="add-emp-section">
                        <a href="employees.html" class="grid-icon"><i class="fas fa-th"></i></a>
                        <a href="employees-list.html" class="list-icon active"><i class="fas fa-bars"></i></a>
                        <a href="{{ route('ethinicite.create') }}" class="btn btn-success btn-add-emp"
                            data-bs-target="#add_employee"><i class="fas fa-plus"></i> Add Ethnicitie</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-end no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ethinicites as $ethinicite)
                                    <tr>

                                        <td>{{ $ethinicite->id }}</td>
                                        <td>{{ $ethinicite->ethnicity_name }}</td>
                                        <td class="text-end ico-sec">
                                            <a href="{{ route('ethinicite.edit', $ethinicite->id) }}" class="edit-em"><i
                                                    class="fas fa-pen"></i></a>
                                            <form action="{{ route('ethinicite.destroy', $ethinicite->id) }}"
                                                method="Post">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
                                <h3>Delete Employee</h3>
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

        {{-- Thêm Employees --}}
        {{-- @include('admin.employees.add') --}}

        {{-- Sửa Employees --}}
        {{-- @include('admin.employees.edit') --}}






    </div>
@endsection
{{-- @section('js')
<script>
    $(document).ready(function(){
        let href;
        $('.delete-em').on('click', function(e){
            e.preventDefault();
            if(e.target.matches('a') || e.target.matches('i')){
                href = e.target.closest('a').getAttribute('href')

            }
        })

        var table = $('.datatable').DataTable();

    // Xử lý sự kiện khi DataTables chuyển trang
    $('.datatable').on('page.dt', function() {
        // Cập nhật giá trị data-delete cho mỗi nút xóa
        var currentPage = table.page.info().page;
        table.page(currentPage).draw('page');

        $('.delete-em').on('click', function(e){
                e.preventDefault();
                if(e.target.matches('a') || e.target.matches('i')){
                href = e.target.closest('a').getAttribute('href')
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
    // $(document).ready(function(){

    //     var table = $('.datatable').DataTable();
    //     var currentPage;
    // // Xử lý sự kiện khi DataTables chuyển trang
    // $('.datatable').on('page.dt', function() {
    //     // Cập nhật giá trị data-delete cho mỗi nút xóa
    //     currentPage = table.page.info().page;
    //     table.page(currentPage).draw('page');

    //     $('.delete-em').on('click', function(e){
    //             e.preventDefault();
    //             let id = e.target.dataset.delete
    //             deleteEmployees(id);
    //     })

    // });


    //     // Thêm
    //         $('.input-add .cancel-btn').click(function(e){
    //             e.preventDefault();
    //         })

    //         $('.input-add .submit-btn').click(function(e){
    //             e.preventDefault();

    //             let formData = new FormData(e.target.form);
    //             $.ajax({
    //                 url:$(this).attr('action'),
    //                 type:"post",
    //                 data:formData,
    //                 contentType: false,
    //                 processData: false,
    //                 dataType: 'json',
    //                 success: function(response){
    //                     if (response.errors) {
    //                         $('.input-add .error').text('');
    //                       for (const key in response.errors) {
    //                         $('.input-add .'+key+'-error').text(response.errors[key][0]);
    //                        }
    //                     }else{
    //                         window.location.href = '{{route('employees.index')}}';
    //                     }
    //                 }
    //             })
    //         })

    //         $('.input-add select[name="origin_province"]').on('change', function(e){
    //             let selectProvince = $('.input-add select[name="origin_province"] option:selected')
    //             let selectDistrict =  $('.input-add select[name="origin_district"]')
    //             disabledDistrict(selectProvince, selectDistrict)
    //         })

    //         $('.input-add select[name="origin_district"]').on('change', function(e){
    //             let selectDistrict = $('.input-add select[name="origin_district"] option:selected')
    //              let selectWard = $('.input-add select[name="origin_ward"]')
    //             disabledWard(selectDistrict,selectWard)
    //         })

    //         $('.input-add select[name="address_province"]').on('change', function(e){
    //             let selectProvince = $('.input-add select[name="address_province"] option:selected')
    //             let selectDistrict =  $('.input-add select[name="address_district"]')
    //             disabledDistrict(selectProvince, selectDistrict)
    //         })

    //         $('.input-add select[name="address_district"]').on('change', function(e){
    //              let selectDistrict = $('.input-add select[name="address_district"] option:selected')
    //              let selectWard = $('.input-add select[name="address_ward"]')
    //             disabledWard(selectDistrict,selectWard)
    //         })

    //         //Edit
    //         $('.datatable .edit-em').on('click','.edit-em', function(){
    //             let href = $(this).attr('href')
    //             console.log(href)
    //             $.ajax({
    //                 url:href,
    //                 type:"get",
    //                 success: function(response){
    //                     console.log(response)
    //                     let data = response.data

    //                     $('input[name="id"]').val(data.id);
    //                     $('.input-edit input[name="first_name"]').val(data.first_name);
    //                     $('.input-edit input[name="last_name"]').val(data.last_name);
    //                     $('.input-edit input[name="birthday"]').val(data.birthday);
    //                     $('.input-edit select[name="gender"]').val(data.gender).trigger('change.select2');
    //                     // $('.input-edit input[name="image"]').val(data.image);
    //                     $('.input-edit input[name="phone_number"]').val(data.phone_number);
    //                     $('.input-edit input[name="citizen_identity_card"]').val(data.card.citizen_identity_card);
    //                     $('.input-edit input[name="place_of_issue"]').val(data.card.place_of_issue);
    //                     $('.input-edit input[name="issue_date"]').val(data.card.issue_date);
    //                     // $('.input-edit input[name="previous_image"]').val();
    //                     // $('.input-edit input[name="behind_image"]').val();
    //                     $('.input-edit select[name="position"]').val(data.position.id).trigger('change.select2');
    //                     $('.input-edit select[name="nationality_id"]').val(data.nationality.id).trigger('change.select2');
    //                     $('.input-edit select[name="religion_id"]').val(data.religion.id).trigger('change.select2');
    //                     $('.input-edit select[name="ethnicity_id"]').val(data.ethnicity.id).trigger('change.select2');
    //                     $('.input-edit select[name="status_employee"]').val(data.status_employee.id).trigger('change.select2');
    //                     $('.input-edit select[name="level"]').val(data.level.id).trigger('change.select2');
    //                     $('.input-edit select[name="user_id"]').val(data.user.id).trigger('change.select2');

    //                     let origin = data.origin.split('-')

    //                     //value origin province
    //                     $('.input-edit select[name="origin_province"]').val(origin[3]).trigger('change.select2');

    //                     // xử lý province_id
    //                     let selectedProvince = $('.input-edit select[name="origin_province"] option:selected')
    //                     let selectDistrict =  $('.input-edit select[name="origin_district"]')
    //                     disabledDistrict(selectedProvince, selectDistrict)

    //                     //value origin district
    //                     $('.input-edit select[name="origin_district"]').val(origin[2]).trigger('change.select2');

    //                     // xử lý district cha
    //                     let selectedDistrict = $('.input-edit select[name="origin_district"] option:selected')
    //                     let selectWard = $('.input-edit select[name="origin_ward"]')
    //                     disabledWard(selectedDistrict,selectWard)

    //                     //value origin ward and detail
    //                     $('.input-edit select[name="origin_ward"]').val(origin[1]).trigger('change.select2');
    //                     $('.input-edit input[name="origin_detail"]').val(origin[0])

    //                     // xử lý thanh đổi của origin province và district
    //                     $('.input-edit select[name="origin_province"]').on('change', function(e){
    //                      let selectProvince = $('.input-edit select[name="origin_province"] option:selected')
    //                      let selectDistrict =  $('.input-edit select[name="origin_district"]')
    //                      selectDistrict.val('').trigger('change.select2')
    //                      disabledDistrict(selectProvince, selectDistrict)
    //                     })

    //                     $('.input-edit select[name="origin_district"]').on('change', function(e){
    //                      let selectDistrict = $('.input-edit select[name="origin_district"] option:selected')
    //                      let selectWard = $('.input-edit select[name="origin_ward"]')
    //                      selectWard.val('').trigger('change.select2')
    //                      disabledWard(selectDistrict,selectWard)
    //                     })


    //                     let address = data.address.split('-')

    //                     // value address province
    //                     $('.input-edit select[name="address_province"]').val(address[3]).trigger('change.select2');

    //                     // xử lý address province_id
    //                     let selectedProvinceAddress = $('.input-edit select[name="address_province"] option:selected')
    //                     let selectDistrictAddress =  $('.input-edit select[name="address_district"]')
    //                     disabledDistrict(selectedProvinceAddress, selectDistrictAddress)

    //                     // Value address district
    //                     $('.input-edit select[name="address_district"]').val(address[2]).trigger('change.select2');

    //                     // xử lý address district_id
    //                     let selectedDistrictAddress = $('.input-edit select[name="address_district"] option:selected')
    //                     let selectWardAddress = $('.input-edit select[name="address_ward"]')
    //                     disabledWard(selectedDistrictAddress,selectWardAddress)

    //                     //value address ward and detail
    //                     $('.input-edit select[name="address_ward"]').val(address[1]).trigger('change.select2');
    //                     $('.input-edit input[name="address_detail"]').val(address[0])

    //                 }
    //             })


    //             $('.input-edit .cancel-btn').click(function(e){
    //              e.preventDefault();
    //             })

    //            $('.input-edit .submit-btn').click(function(e){
    //              e.preventDefault();
    //              let id = $('input[name="id"]').val();
    //             //  var route = '{{ route('employees.update','MODEL_ID') }}'.replace('MODEL_ID', id);
    //             //  console.log(route);
    //              let formData = new FormData(e.target.form);
    //               $.ajax({
    //                 url:'{{ route('employees.update','MODEL_ID') }}'.replace('MODEL_ID', id),
    //                 type:"post",
    //                 data:formData,
    //                 contentType: false,
    //                 processData: false,
    //                 dataType: 'json',
    //                 success: function(response){
    //                     if (response.errors) {
    //                         $('.input-edit .error').text('');
    //                       for (const key in response.errors) {
    //                         $('.input-edit .'+key+'-error').text(response.errors[key][0]);
    //                        }
    //                     }else{
    //                         window.location.href = '{{route('employees.index')}}';
    //                     }
    //                 }
    //              })

    //             })
    //         })

    //         //Xoá
    //         $('.delete-em').on('click', function(e){
    //             e.preventDefault();
    //             let id = e.target.dataset.delete
    //             deleteEmployees(id);
    //         })

    //         function deleteEmployees(id){
    //             console.log(id);
    //             $('.input-delete .continue-btn').click(function(e){
    //              e.preventDefault();
    //             //   let formData = e.target.form
    //             let _token = $('.form-delete-em input[name="_token"]').val();
    //             let _method = $('.form-delete-em input[name="_method"]').val();
    //               $.ajax({
    //                 url:'{{ route('employees.destroy','MODEL_ID') }}'.replace('MODEL_ID', id),
    //                 type:"post",
    //                 data:{
    //                     _token,
    //                     _method
    //                 },
    //                 dataType: 'json',
    //                 success: function(response){
    //                     if (response.success) {
    //                         console.log('reponse:'+id)
    //                         // window.location.href = '{{route('employees.index')}}';

    //                     }
    //                 }
    //              })

    //             })
    //         }

        //         function disabledDistrict(selectProvince,selectDistrict){
        //             let provinces = selectProvince[0].dataset.province

        //             let districts =selectDistrict[0].options

        //             $.each(districts, function(index,value){
        //                 if(!value.hasAttribute('disabled')){
        //                     value.setAttribute('disabled','disabled')
        //                 }

        //             })

        //             $.each(districts, function(index,value){
        //                 if(value.dataset.province_id == provinces || value.dataset.province != undefined ){
        //                     // console.log([value.value])
        //                     value.removeAttribute('disabled')
        //                 }

        //             })
        //         }

        //         function disabledWard(selectDistrict,selectWard){
        //             let districts = selectDistrict[0].dataset.district

        //             let wards = selectWard[0].options

        //             $.each(wards, function(index,value){
        //                 if(!value.hasAttribute('disabled')){
        //                     value.setAttribute('disabled','disabled')
        //                 }

        //             })

        //             $.each(wards, function(index,value){
        //                 if(value.dataset.district_id == districts || value.dataset.district != undefined ){
        //                     value.removeAttribute('disabled')
        //                 }

        //             })
        //         }
        //     })
</script>
@endsection --}}
