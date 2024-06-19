@php
if(Auth::check()){
  $master= Auth::user()->callMasterPage();
 }else{
  $master="layouts.master";
}


@endphp

@extends("$master")
@section('title', 'Category create')
@section('body')

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row ">
            @if ($errors->any())

                <strong>Error :</strong>

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>Error :{{ $error }}</li>
                    @endforeach
                </div>

            @endif

            <div class="form-group col-md-6">
                <label>name</label>
                <input type="text" class="form-control" placeholder="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>image</label>
                <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>








            <div class="form-group col-md-6">
                <label>description</label>
                <textarea class="form-control" placeholder="description" rows="9" id="comment" name="description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary col-6 my-3">Create</button>
    </form>



@endsection