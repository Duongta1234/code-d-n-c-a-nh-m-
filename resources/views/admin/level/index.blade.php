@extends('admin.layouts.main')
@section('content')
   <div class="flex justify-content-end align-content-end">
    <div class=" list-Level pt-4 pl-5">LIST LEVEL</div>
    <div>
        <table class="table table hover">
            <thead>

                <th>Education_name</th>
                <th>school</th>
                <th>foreign_language</th>
                <th>graduation_year</th>
                <th>specialize_name</th>
                <th>type_of_expertise</th>
                <td>Action</td>
            </thead>
            <tbody>
                @foreach($levels as $item)
                 <tr>
                    <td>{{$item -> education_name}}</td>
                    <td>{{$item -> school}}</td>
                    <td>{{$item -> foreign_language}}</td>
                    <td>{{$item -> graduation_year}}</td>
                    <td>{{$item -> specialize_name}}</td>
                    <td>{{$item -> type_of_expertise}}</td>
                    <td>
                        <a href="{{route('edit',$item->id)}}" class="btn btn-warning">edit</a>
                        <form action="{{ route('delete', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>

                    </form>

                    </td>
                 </tr>
                @endforeach
            </tbody>
        </table>

    </div>
   </div>
@endsection

@section('scripts')
<script>

</script>
@endsection
