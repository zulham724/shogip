<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Umkm;
use App\Product;
use App\ProductImage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['productimages'] = ProductImage::get();
        return view('productimage.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::get();
        return view('productimage.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $productimage = new ProductImage();
        $productimage->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product');
            $productimage->image = $path;    
        }
        $productimage->save();
             // dd($productimage);
        return redirect('productimages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['productimages'] = ProductImage::find($id);
        $data['products'] = Product::get();

        return view('productimage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $productimage = ProductImage::find($id);
        $productimage->fill($request->all());
         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product');
            $file = Storage::delete($productimage->image);
            $productimage->image = $path;    
        }
        $productimage->update();
             // dd($productimage);
        return redirect('productimages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductImage::find($id)->delete();
        return response()->json($data);
    }
}
