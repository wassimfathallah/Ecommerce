@php
if(Auth::check()){
  $master= Auth::user()->callMasterPage();
 }else{
  $master="layouts.master";
}


@endphp

@extends("$master")
@section('title', 'Product edit')
@section('body')
    <div class=" ">
        <!-- contact section start -->
        <div class="contact_section layout_padding">
            <div class="container">
                <div class="contact_jkmain">
                    <h1 class="request_text">Update Product</h1>
                    @if ($errors->any())

                        <strong>Error :</strong>

                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>Error :{{ $error }}</li>
                            @endforeach
                        </div>

                    @endif

                    <form action="{{ route('products.update', $product['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <img src="{{ asset('storage/' . $product['image']) }}" width="50" height="60">

                        </div>

                        <div class="form-group col-md-6">
                            <label>Name :</label>
                            <input type="text" class="form-control" placeholder="name" name="name"
                                value="{{ old('name', $product['name']) }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="form-group col-md-6">
                            <label>Price :</label>
                            <input type="number" class="form-control" placeholder="price" name="price"
                                value="{{ old('price', $product['price']) }}">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                        <label>Qauntity :</label>
                        <input type="number" class="form-control" placeholder="quantity" name="quantity"
                            value="{{ old('quantity', $product['quantity']) }}">
                        @if ($errors->has('quantity'))
                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Category</label>
    
                        <select name="category_id" class="form-control">
                            <option selected>Category</option>
                            @foreach ($categories as $category)
                                <option @selected($product['category_id']) class="form-control" name="category_id"
                                    value="{{$category['id']}}">
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                   
            <div class="form-group col-md-6">
                <label>Size :</label>

                <select name="size" class="form-control">
                    <option selected>Size</option>
                    @foreach ($sizes as $size)
                        <option @selected(old('size',$product['size'])) class="form-control" name="size"
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
                        <option @selected(old('color',$product['color'])) class="form-control" name="color"
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
                        <label>image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image',$product['image'])}}">
        
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>description</label>
                        <textarea class="form-control" placeholder="description" rows="9" id="comment" name="description">{{old('description',$product['description'])}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
        
                    <button type="submit" class="btn btn-warning col-6 my-3">Update</button>
                      
                    </form>
                </div>
            </div>
        </div>
        <!-- contact section end -->











    </div>
@endsection
