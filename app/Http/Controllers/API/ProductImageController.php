<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $productimages = ProductImage::with('product')->get();
        return response()->json($productimages);
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

        return response()->json($productimage);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productimage = ProductImage::find($id);

        return response()->json($productimage);
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
        return response()->json($productimage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productimage = ProductImage::find($id)->delete();
        return response()->json($productimage);
    }
}
