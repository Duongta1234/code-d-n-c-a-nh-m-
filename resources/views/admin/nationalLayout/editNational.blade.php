@extends('admin.layouts.main')
@section('content')
<div class="alert alert-success">

    <div class="container">
        <!-- edit form column -->
        <div class="col-lg-12 text-lg-center">
            <h2>Edit National</h2>
            <br>
            <br>
        </div>
        <div class="col-lg-8 push-lg-4 personal-info">
            <form role="form" action="{{ route('editNational',['id'=>$national->id]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                    <div class="col-lg-9">
                        <input name="name" class="form-control" type="text" value={{$national->nationality_name}} />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <button><a href="/">Cancel</a></button>
                        <button type="submit">Edit</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <hr />
</div>
@endsection
