<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Umkm;
use App\User;
use App\UmkmCategori;
use App\State;
use App\City;
use App\District;
use App\Biodata;
use App\UmkmBiodata;
use App\UmkmAchievement;
use App\UmkmTraining;
use App\Product;
use App\LegalityList;
use App\UmkmLegality;
use App\UmkmProblem;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['umkm'] = Umkm::
        with('umkm_category','state','city','district','user')
        ->orderBy('created_at','desc')->get();
        
        return view('umkm.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["umkm"] = Umkm::get();
        $data["users"] = User::get();
        $data["umkm_categories"] = UmkmCategori::get();
        $data["states"] = State::where('id',33)->get();
        $data["cities"] = City::get();
        $data["districts"] = District::get();
        $data["legality_lists"] = LegalityList::get();
        
        return view('umkm.create',$data);
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
        $umkm = new Umkm;
        $umkm->fill($request['umkm']);
        $umkm->save();
        // dd($umkm);
        $umkm_biodata = new UmkmBiodata;
        $umkm_biodata->fill($request['biodata']);
        $umkm_biodata->umkm_id = $umkm->id;
        $umkm_biodata->save();

        foreach ($request['problems'] as $p => $problem) {
            $umkm_problem = new UmkmProblem;
            $umkm_problem->fill($problem);
            $umkm_problem->umkm_id = $umkm->id;
            $umkm_problem->save();
        }

        if (isset($request['umkm_legalities'])) {
            # code...
            foreach ($request['umkm_legalities'] as $ul => $legality) {
                $umkm_legality = new UmkmLegality;
                $umkm_legality->fill($legality);
                $umkm_legality->umkm_id = $umkm->id;
                $umkm_legality->save();
            }
        } 
        if (isset($request['products'])) {
            # code...
            // dd($umkm_biodata);
            foreach ($request['products'] as $p => $product) {
                $umkm_product = new Product;
                $umkm_product->fill($product);
                $umkm_product->umkm_id = $umkm->id;
                $umkm_product->save();
            }
        } 


        // dd($request);

        return redirect()->route('umkms.index',$umkm->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['umkm'] = Umkm::with('umkm_biodata','city','user','products.product_images')->find($id);
        // dd($data);
        return view('umkm.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['umkm'] = Umkm::with('umkm_biodata','products','umkm_problems.problem_list')->find($id);
        $data['umkm_categories'] = UmkmCategori::get();
        $data['states'] = State::get();
        $data['cities'] = City::get();
        $data['districts'] = District::get();
        $data["legality_lists"] = LegalityList::get();
        
        return view('umkm.edit',$data);
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
        $umkm = Umkm::find($id);
        $umkm->fill($request['umkm']);
        $umkm->update();

        $umkm_biodata = UmkmBiodata::where('umkm_id',$umkm->id)->first();
        $umkm_biodata->fill($request['biodata']);
        $umkm_biodata->update();
        // dd($umkm_biodata);

        $umkm_problem = UmkmProblem::where('umkm_id',$umkm->id);
        $umkm_problem->delete();
        foreach ($request['problems'] as $p => $problem) {
            $umkm_problem = new UmkmProblem;
            $umkm_problem->fill($problem);
            $umkm_problem->umkm_id = $umkm->id;
            $umkm_problem->save();
        }

        if (isset($request['products'])) {
            # code...
            $umkm_products = Product::where('umkm_id',$umkm->id)->delete();
            foreach ($request['products'] as $p => $product) {
                $umkm_product = new Product;
                $umkm_product->fill($product);    
                $umkm_product->umkm_id = $umkm->id;
                $umkm_product->save();
            }
        } 
        // return "aer";
        return redirect()->route('umkms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Umkm::find($id)->delete();
        return response()->json($data);
    }

    public function peta($id)
    {
         $data['umkm'] = Umkm::with('umkm_category','state','city','district')
         ->where('city_id',$id)->get();
        return view('umkm.peta',$data);
    }
}
