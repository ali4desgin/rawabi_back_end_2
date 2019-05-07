<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Writing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class WritingController extends Controller
{
    //

    public  function  index(){
        $users = Writing::orderBy("id","desc")->paginate(20);
        return view("BackEnd.Writings.index",compact("users"));
    }


    public  function  delete_writing(Request $request){

        $writing_id = $request->input("writing_id");

        $writing = Writing::find($writing_id);

        if(!empty($writing)){
            $writing->delete();
        }



        return back();
    }



    public  function  add_writing(){
        $users = Writing::orderBy("id","desc")->paginate(20);
        return view("BackEnd.Writings.add",compact("users"));
    }




    public  function  add_writing_post(Request $request){
        $request->validate([
            "name"=>"required|min:3",
            "number"=>"required|min:1|max:1000"
        ]);

        $new = new Writing();
        $new->name = $request->input("name");
        $new->number = $request->input("number");
        $new->save();

        return redirect(route("admin_writings"));
    }


    public  function  edit_balance_writing(Request $request){

        $request->validate([
            "writing_id"=>"required|integer"
        ]);


        $writing = Writing::find($request->input("writing_id"));

        if(empty($writing)){
            return back();
        }




        return view("BackEnd.Writings.edit",compact("writing"));
    }


    public  function  edit_balance_writing_post(Request $request){

        $request->validate([
            "writing_id"=>"required|integer",
            "number"=>"required",
            "balance"=>"required",
            "name"=>"required",
        ]);


        $writing = Writing::find($request->input("writing_id"));

        //return $writing;
        if(empty($writing)){
            return back();
        }





        Writing::where("id",$request->input("writing_id"))->update([
            "number"=>$request->input("number"),
            "balance"=>$request->input("balance"),
            "name"=>$request->input("name")
        ]);

        return redirect(route("admin_writings"));
    }


	public function orders(Request $request){
		$request->validate([
			"id"=>"required|integer|exists:writings"		
		]);
		$orders = Order::where([["status","complete"],["writing_number",$request->input("id")]])->paginate(20);
		return view("BackEnd.Writings.orders",compact("orders"));
	}
}
