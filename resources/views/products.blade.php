
  @php
  if(Auth::check()){
    $master= Auth::user()->callMasterPage();
   }else{
    $master="layouts.master";
  }
 
  
 @endphp

@extends("$master")
 

@section('title', ' ALL Products')

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
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <th scope="row">{{ $product['id'] }}</th>
                    <td> <img src="{{ asset('storage/' . $product['image']) }}" height="50px" width="50px"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{!! Str::limit($product['description'], 12, ' ...') !!}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-success"
                            role="button">Show</a>
                        <form method="post" action="{{ route('products.destroy', $product) }}" style=" display: inline;">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-warning"
                                role="button">Update</a>

                            <button type="submit" class="btn btn-outline-danger">Delete</button>

                        </form>

                    </td>


                </tr>
            @empty
                <td align="center">There is no product yet !</td>
            @endforelse


        </tbody>
    </table>
    <div>{{ $products->links() }}</div>

@endsection
