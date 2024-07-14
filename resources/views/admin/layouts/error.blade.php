@if ( Session::has('success') )

    <div class="alert alert-success alert-dismissible" role="alert" >
        <strong class="error-success">{{ Session::get('success') }}</strong>
    </div>
@endif
@if ( Session::has('error') )

    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong class="error-danger">{{ Session::get('error') }}</strong>
    </div>
@endif
{{-- @if ($errors->any())--}}
{{--    <div class="alert" role="alert">--}}
{{--        <span class="text-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--        </span>--}}
{{--    </div>--}}
{{--@endif--}}

