@extends('admin.master')

@section('title')
    manage-product
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product Manage</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   Manage-Product-Table
                </div>
                <h2 class="text-center text-success">{{Session('message')}}</h2>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr >
                            <th>product name</th>
                            <th>category name</th>
                            <th>brand name</th>
                            <th>price</th>
                            <th>description</th>
                            <th>Status</th>
                            <th>product image</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                       <tbody>
                       @foreach($products as $product)
                        <tr>
                           <td>{{$product->product_name}}</td>
                           <td>{{$product->category_name}}</td>
                           <td>{{$product->brand_name}}</td>
                           <td>{{$product->price}}</td>
                           <td>{{$product->description}}</td>
                           <td>{{$product->status==1 ? 'published': 'unpublished'}}</td>
                           <td>
                               <img src="{{asset($product->image)}}" alt="" style="width: 150px; height: 130px;">
                           </td>
                            <td style="width:400px;">
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-info float-end">Edit</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="" class="">
                                            <form action="{{route('delete-product')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="submit" class="btn btn-danger float-end" onclick="return confirm('Are you sure?')" value="Delete">
                                            </form>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        @if($product->status==1)
                                            <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-warning ">UnPublished</a>
                                        @else
                                            <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-success ">Published</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                       @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
