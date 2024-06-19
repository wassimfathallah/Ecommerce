@php
if(Auth::check()){
  $master= Auth::user()->callMasterPage();
 }else{
  $master="layouts.master";
}


@endphp

@extends("$master")
@section('title', 'Categories')

@section('body')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('the category was inserted successfly !') }}
        </div>
    @endif

    <table class="table py-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $category['id'] }}</th>
                    <td> <img src="{{ asset('storage/' . $category['image']) }}" height="50px" width="50px"></td>
                    <td>{{ $category['name'] }}</td>
                    <td>{!! Str::limit($category['description'], 92, ' ...') !!}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-success"
                            role="button">Show</a>

                        <form method="post" action="{{ route('categories.destroy', $category) }}" style=" display: inline;">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-warning"
                                role="button">Update</a>

                            <button type="submit" class="btn btn-outline-danger">Delete</button>

                        </form>
                    </td>

                </tr>
            @empty
                <td align="center">There is no category yet !</td>
            @endforelse


        </tbody>
    </table>
    <div>{{ $categories->links() }}</div>

@endsection
