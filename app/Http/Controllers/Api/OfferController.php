<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    //

    public  function  offers(){

        $offers = Offer::where("status","active")->get()->toArray();
        $data = [];
        foreach ($offers as $offer){
            if($offer["has_image"]=="yes"){
                $offer["image"] = asset(env("APP_PUBLIC_URL")."offer/image/".$offer["image"]);
            }
            $data[] = $offer;
        }
        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["data"] = $data;
        return \response()->json($response);

    }
}
