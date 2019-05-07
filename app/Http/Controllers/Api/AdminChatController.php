<?php

namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\RoomChat;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminChatController extends Controller
{

    public function list(Request $request){
        $admin1_id  = $request->input("admin1_id");
        $admin2_id  = $request->input("admin2_id");

        $chats = RoomChat::where([["admin1_id",$admin1_id],["admin2_id",$admin2_id]])->orWhere([["admin1_id",$admin2_id],["admin2_id",$admin1_id]])->orderBy("id","asc")->get()->toArray();




        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["count"] = count($chats);
        $response["data"] = $chats;
        return \response()->json($response);
    }



    public function add_message(Request $request){

        $admin1_id  = $request->input("admin1_id");
        $admin2_id  = $request->input("admin2_id");


        if($request->input("isImage")=="no"){
           
            $chat_room = new RoomChat();
	    $chat_room->sender_id = $admin1_id;
            $chat_room->admin1_id = $admin1_id;
            $chat_room->admin2_id = $admin2_id;
            $chat_room->is_image = "no";
            $chat_room->message = $request->input("message");
            $chat_room->save();

            $response["response"] = true;
            $response["error_code"] = 0;
            $response["message"] = "saved";
        }else{


            $image=$request->input("image");
            $decoded=base64_decode($image);

            $img_name=uniqid("chat_").'.jpg';
            $img = 'app/public/chats/images/'.$img_name;
            file_put_contents($img,$decoded);

            $chat_room = new RoomChat();
	    $chat_room->sender_id = $admin1_id;
            $chat_room->admin1_id = $admin1_id;
            $chat_room->admin2_id = $admin2_id;
            $chat_room->is_image = "yes";
            $chat_room->image = $img_name;
            $chat_room->isAdmin = "yes";
            $chat_room->save();
            $response["response"] = true;
            $response["error_code"] = 0;
            $response["message"] = "saved";

        }




        return \response()->json($response);
    }
}

