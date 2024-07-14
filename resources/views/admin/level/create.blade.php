@extends('admin.layouts.main')
@section('content')
<div class="flex pl-5 ml-5 flex justify-center align-center">

    <form action="{{route('level.create')}}" method="POST">
        @csrf
        <div class="">
            <h1>Thêm Trình độ</h1>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">education_name</label>
            <input type="text" name="education_name" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">school</label>
            <input type="text" name="school" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">foreign_language</label>
            <input type="text" name="foreign_language" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">foreign_language</label>
            <input type="date" name="graduation_year" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">specialize_name</label>
            <input type="text" name="specialize_name" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">type_of_expertise</label>
            <input type="text" name="type_of_expertise" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
