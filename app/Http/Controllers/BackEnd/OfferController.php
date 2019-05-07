<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    //
    public  function  index(){

        $offers = Offer::orderBy("id","desc")->paginate(20);
        return view("BackEnd.Offers.index",compact("offers"));
    }


    public function  change_status(Request $request){
        $offer_id = $request->input("offer_id");
        $offer = Offer::find($offer_id);

        if(empty($offer)){
            return back();
        }

        Offer::where("id",$offer_id)->update([
            "status"=>$request->input("status")
        ]);
        return back();
    }



    public  function  add_offer(){
        return view("BackEnd.Offers.add");
    }



    public  function  delete_offer(Request $request){
        $offer_id = $request->input("offer_id");
        $offer = Offer::find($offer_id);

        if(empty($offer)){
            return back();
        }

        $offer->delete();
        return back();
    }

    public  function add_offer_post(Request $request){

        $request->validate([
            "title"=>"required",
            "message"=>"required"
        ]);


        $has_image = "no";
        $image_name = "";



    if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image_name = uniqid("offer_").'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/offer/image/');
        if($image->move($destinationPath, $image_name)){

            $has_image = "yes";


            }else{

                return back()->withErrors("الصورة المرفقة غير سليمة");
            }

        }



        $oofer = new Offer();
        $oofer->title = $request->input("title");
        $oofer->description = $request->input("message");
        $oofer->has_image = $has_image;
        $oofer->image = $image_name;
        $oofer->save();




    return redirect(route("admin_offers"));
}

}
