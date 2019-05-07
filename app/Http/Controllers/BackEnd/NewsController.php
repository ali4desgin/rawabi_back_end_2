<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //

    public  function  index(){
        $newses = News::orderBy("id","desc")->paginate(20);
        return view("BackEnd.News.index",compact("newses"));
    }




    public  function  add_news(){
        return view("BackEnd.News.add");
    }



    public  function  delete_news(Request $request){
        $news_id = $request->input("news_id");
        $news = News::find($news_id);

        if(empty($news)){
            return back();
        }

        $news->delete();
        return back();
    }

    public  function add_news_post(Request $request){

        $request->validate([
            "title"=>"required",
            "message"=>"required"
        ]);


        $oofer = new News();
        $oofer->title = $request->input("title");
        $oofer->message = $request->input("message");
        $oofer->save();




        return redirect(route("admin_news"));
    }



}
