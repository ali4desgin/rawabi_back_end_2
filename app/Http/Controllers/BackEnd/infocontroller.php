<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class infocontroller extends Controller
{
    //

    public  function  index(){
        $newses = info::orderBy("id","desc")->paginate(20);
        return view("BackEnd.info.index",compact("newses"));
    }




    public  function  add_news(){
        return view("BackEnd.info.add");
    }



    public  function  delete_news(Request $request){
        $news_id = $request->input("news_id");
        $news = info::find($news_id);

        if(empty($news)){
            return back();
        }

        $news->delete();
        return back();
    }

    public  function add_news_post(Request $request){

       


        $oofer = new info();
        $oofer->phone1 = $request->input("phone1");
        $oofer->phone2 = $request->input("phone2");
        $oofer->phone3 = $request->input("phone3");
        $oofer->whatsapp = $request->input("whatsapp");
        $oofer->mail = $request->input("mail");
        $oofer->longt = $request->input("longt");
        $oofer->lat = $request->input("lat");
        $oofer->save();




        return redirect(route("admin_info"));
    }



}
