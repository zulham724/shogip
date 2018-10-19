<?php

namespace App\Http\Controllers\UMKM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        with('umkm_category','state','city','district')->where('user_id',Auth::user()->id)->get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        // dd($data);
        return view('umkmuser.index',$data,$name);

        // $data['user'] = User::with('biodata')->find(Auth::user()->id);
        // return view('umkmuser.profil',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["umkm"] = Umkm::get();
        $data["user"] = User::find(Auth::user()->id);
        $data["umkm_categories"] = UmkmCategori::get();
        $data["states"] = State::where('id',33)->get();
        $data["cities"] = City::get();
        $data["districts"] = District::get();
        $data["legality_lists"] = LegalityList::get();
        
        return view('umkmuser.create',$data);
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

        foreach ($request['umkm_legalities'] as $ul => $umkm_legality) {
            $db[$ul] = new UmkmLegality;
            $db[$ul]->fill($umkm_legality);
            $db[$ul]->umkm_id = $umkm->id;
            $db[$ul]->save();
        }

        // dd($db);
        // dd($umkm);
        $umkm_biodata = new UmkmBiodata;
        $umkm_biodata->fill($request['biodata']);
        $umkm_biodata->umkm_id = $umkm->id;
        $umkm_biodata->save();
        // dd($umkm_biodata);
        foreach ($request['products'] as $p => $product) {
            $db = new Product;
            $db->fill($product);
            $db->umkm_id = $umkm->id;
            $db->save();
        }

        foreach ($request['achivements'] as $a => $achivement) {
            $data = new UmkmAchievement;
            $data->fill($achivement);
            $data->umkm_id = $umkm->id;
            $data->save();
        }

        foreach ($request['trainings'] as $t => $training) {
            $achievement = new UmkmTraining;
            $achievement->fill($training);
            $achievement->umkm_id = $umkm->id;
            $achievement->save();
        }
        // dd($request);

        return redirect()->route('umkmuser.index',$umkm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['umkm'] = Umkm::with('umkm_biodata','city','umkmachievements','umkmatrainings','user','products.product_images')->find($id);
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        // dd($data);
        return view('umkmuser.show',$data,$name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['umkm'] = Umkm::with('umkm_biodata','umkmachievements','umkmatrainings','products')->find($id);
        $data['umkm_categories'] = UmkmCategori::get();
        $data['states'] = State::get();
        $data['cities'] = City::get();
        $data['districts'] = District::get();
        $data["legality_lists"] = LegalityList::get();
        $name['user'] = User::with('biodata')->find(Auth::user()->id);
        return view('umkmuser.edit',$data,$name);
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
        $umkm = Umkm::find($id);
        $umkm->fill($request["umkm"]);
        $umkm->update();

        $umkm_legalities = UmkmLegality::where('umkm_id',$umkm->id)->delete();
        foreach ($request['umkm_legalities'] as $ul => $umkm_legality) {
            $db[$ul] = new UmkmLegality;
            $db[$ul]->fill($umkm_legality);
            $db[$ul]->umkm_id = $umkm->id;
            $db[$ul]->save();
        }

        $umkm_biodata = UmkmBiodata::where('umkm_id',$umkm->id)->first();
        $umkm_biodata->fill($request['biodata']);
        $umkm_biodata->update();
        // dd($umkm_biodata);

        $umkm_products = Product::where('umkm_id',$umkm->id)->delete();
        // dd($umkm_products);
        foreach ($request['products'] as $p => $product) {
            $db = new Product;
            $db->fill($product);
            $db->umkm_id = $umkm->id;
            $db->save();
        }

        $umkm_achivements = UmkmAchievement::where('umkm_id',$umkm->id)->delete();

        foreach ($request['achivements'] as $a => $achivement) {
            $data = new UmkmAchievement;
            $data->fill($achivement);
            $data->umkm_id = $umkm->id;
            $data->save();
        }

        $umkm_trainings = UmkmTraining::where('umkm_id',$umkm->id)->delete();

        foreach ($request['trainings'] as $t => $training) {
            $achievement = new UmkmTraining;
            $achievement->fill($training);
            $achievement->umkm_id = $umkm->id;
            $achievement->save();
        }

        return redirect()->route('umkmuser.index');
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

    public function user()
    {
        $data['umkm'] = Umkm::with('umkm_biodata','city','umkmachievements','umkmatrainings','user','products.product_images')->find($id);
        return view('umkmuser.profil',$data);
    }

}
