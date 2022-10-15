<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function addProduct()
    {
        return view('admin.product.add-product');
    }

    public function manageProduct()
    {
        return view('admin.product.manage-product',[
            'products'=>Product::all()
        ]);
    }

    public function createProduct(Request $request)
    {
        $this->product = new Product();

        $this->product->product_name = $request->product_name;
        $this->product->category_name = $request->category_name;
        $this->product->brand_name = $request->brand_name;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        $this->product->image =$this->saveImage($request);
        $this->product->save();
        return redirect('/manage-product')->with('message','Product Created Successfully');
    }

    private function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'AdminProductManage/ProductImage/';
        $imageUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        if (file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();
        return back()->with('message','Product Deleted Successfully');
    }

    public function editProduct($id)
    {
        return view('admin.product.edit-product',[
            'product'=>Product::find($id)
        ]);
    }

    public function updateProduct(Request $request)
    {
        $this->product = Product::find($request->id);
        $this->product->product_name = $request->product_name;
        $this->product->category_name = $request->category_name;
        $this->product->brand_name = $request->brand_name;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        if ($request->file('image'))
        {
            if ($this->product->image)
            {
                unlink($this->product->image);
            }
            $this->product->image =$this->saveImage($request);
        }
        $this->product->save();
        return redirect('/manage-product')->with('message','Product Updated Successfully');
    }

    public function status($id)
    {
        $product = Product::find($id);
        if ($product->status == 1)
        {
            $product->status = 0;
            $product->save();
            return back();
        }
        else
        {
            $product->status = 1;
            $product->save();
            return back();
        }
    }
}
