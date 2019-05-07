<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Models\info;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $user_id  = $request->input("user_id");
        $orders = Order::where("user_id",$user_id)->get()->toArray();
//        foreach ($orders as $offer){
//            if($offer["has_image"]=="yes"){
//                $offer["image"] = asset("offer/image/".$offer["image"]);
//            }
//            $data[] = $offer;
//        }
        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["data"] = $orders;
        return \response()->json($response);
    }

    public  function  news(){

        $news = News::all();

        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["data"] = $news;


        return $response;


    }



 public  function  info(){

        $news = info::all()->first();;



        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["data"] = $news;


        return $response;


    }



}
