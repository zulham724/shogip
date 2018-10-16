<?php

namespace App\Http\Controllers\UMKM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Umkm;
use App\User;
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
        $data['umkm'] = Umkm::with('products.product_images')->where('user_id',Auth::user()->id)->first();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        // dd($data);
        return view('umkmuser/productimage.index',$data,$name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('umkmuser/productimage.create',$data,$name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request['productimages'] as $p => $product) {
            $db = new ProductImage;
            $db->fill($product);
            if (isset($product["image"])){
                $path = $product['image']->store('product');
                $db->image = $path;
            }
            $db->save();
        }
        return redirect('productimageuser');
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
        //
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
        //
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
