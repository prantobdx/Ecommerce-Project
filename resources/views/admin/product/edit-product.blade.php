@extends('admin.master')

@section('title')
   Update-Product
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Product</h3></div>
                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session('message')}}</h2>
                            <form action="{{route('update-product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text" name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name" />
                                            <label for="inputFirstName">Product name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="category_name" value="{{$product->category_name}}" placeholder="Enter category name" />
                                            <label for="inputEmail">Category Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="brand_name" value="{{$product->brand_name}}" placeholder="Product brand name" />
                                            <label for="inputEmail">Product Brand Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="price" value="{{$product->price}}" placeholder="Product Price" />
                                    <label for="inputEmail">Price</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="description" id="inputEmail" cols="30" rows="30">{!! $product->description !!}</textarea>
                                    <label for="inputEmail">Product Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="file" name="image" placeholder="Product image" />
                                    <label for="inputEmail">Image</label>
                                    <img src="{{asset($product->image)}}" class="my-2"  alt="" style="width:150px" height="130px">
                                </div>

                                <div class="mt-4 mb-0">
                                    <input type="submit" class="form-control btn btn-info" value="Update Product" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
