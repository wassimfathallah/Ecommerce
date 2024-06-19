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








    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                <label>Name :</label>
                <input type="text" class="form-control" placeholder="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>Price :</label>
                <input type="number" name="price" class="form-control" placeholder="price" value="{{ old('price') }}">

                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>Quantity :</label>
                <input type="number" name="quantity" class="form-control" placeholder="quantity"
                    value="{{ old('quantity') }}">
                @if ($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
            </div>

          
            <div class="form-group col-md-6">
                <label>Size :</label>

                <select name="size" class="form-control">
                    <option selected>Size</option>
                    @foreach ($sizes as $size)
                        <option @selected(old('size')) class="form-control" name="size"
                            value={{$size}}>
                            {{ $size }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
            </div>

            <div class="form-group col-md-6">
                <label>Color :</label>

                <select name="color" class="form-control">
                    <option selected>Color</option>
                    @foreach ($colors as $color)
                        <option @selected(old('color')) class="form-control" name="color"
                            value={{$color}}>
                            {{ $color }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
            </div>


            <div class="form-group col-md-6">
                <label>Image :</label>
                <input type="file" name="image"class="form-control" placeholder="please chose a image"
                    value="{{ old('image') }}">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>



            <div class="form-row">


                <div class="form-group col-md-6">
                    <label>Category :</label>

                    <select name="category_id" class="form-control">
                        <option selected>Category</option>
                        @foreach ($categories as $category)
                            <option @selected(old('category_id')) class="form-control" name="category_id"
                                value="{{ $category['id'] }}">
                                {{ $category['name'] }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group col-md-6">
                <label>Description :</label>
                <textarea class="form-control" placeholder="description" rows="9" id="comment" name="description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary col-6 my-3">Create</button>
    </form>




@endsection

