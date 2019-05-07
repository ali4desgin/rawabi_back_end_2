<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\RoomChat;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    //

    public function list(Request $request){
        $order_id  = $request->input("order_id");
        
        $chats = RoomChat::where("order_id",$order_id)->orderBy("id","desc")->get()->toArray();
        $order = Order::find($order_id);


        if(!empty($order)){
            $admin = User::find($order->admin_id);

//            return $admin;
            if(!empty($admin)){
                $phone = $admin->phone;
            }else{
                $phone = "0096655237319";
            }
        }else{
            $phone =  "0096655237319";
        }
        



        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["count"] = count($chats);
        $response["data"] = $chats;
        $response["whatsapp"] =  $phone;
        return \response()->json($response);
    }



    public function new_message(Request $request){

        $order_id  = $request->input("order_id");
        if($request->input("isImage")=="no"){
            // $request->validate([
            //     "message"=>"required",
            //     "order_id"=>"required",
            //     "isAdmin"=>"required"
            // ]);
            $chat_room = new RoomChat();
            $chat_room->order_id = $order_id;
            $chat_room->is_image = "no";
            $chat_room->message = $request->input("message");
            $chat_room->isAdmin = $request->input("isAdmin");
            $chat_room->save();


             self::push_notification($request->input("message"),$order_id,$request->input("isAdmin"));
            $response["response"] = true;
            $response["error_code"] = 0;
            $response["message"] = "saved";
        }else
        {





            $image=$request->input("image");
             $decoded=base64_decode($image);
                    
            $img_name=uniqid("chat_").'.jpg';
            $img = 'chats/images/'.$img_name;
            file_put_contents("/var/www/html/rawabi/app/public/".$img,$decoded);

            $chat_room = new RoomChat();
            $chat_room->order_id = $order_id;
            $chat_room->is_image = "yes";
            $chat_room->image = $img_name;
            $chat_room->isAdmin = $request->input("isAdmin");
            self::push_notification("photo sent for you",$order_id,$request->input("isAdmin"));


            $chat_room->save();
            $response["response"] = true;
            $response["error_code"] = 0;
            $response["message"] = "saved";

            

        }
        
        // {



        //     if ($request->hasFile('image')) {
        //         $request->validate([
        //             "order_id"=>"required"
        //         ]);
        //         $image = $request->file('image');
        //         $image_name = uniqid("chat_").'.'.$image->getClientOriginalExtension();

        //         $destinationPath = public_path('/chats/images/');


        //         $image=$request->input("image");
        //         $decoded=base64_decode($image);
                    
        //     $img_name=uniqid("chat_").'.jpg';
        //     $img = 'chats/images/'.$img_name;
        //     file_put_contents($img,$decoded);



        //         if($image->move($destinationPath, $image_name)){

        //             $chat_room = new RoomChat();
        //             $chat_room->order_id = $order_id;
        //             $chat_room->is_image = "yes";
        //             $chat_room->image = $image_name;
        //             $chat_room->isAdmin = "no";
        //             $chat_room->save();

        //             self::push_notification("photo sent for you",$order_id,$request->input("isAdmin"));


        //             $response["response"] = true;
        //             $response["error_code"] = 0;
        //             $response["message"] = "saved";


        //         }else{

        //             $response["response"] = false;
        //             $response["error_code"] = 0;
        //             $response["message"] = "invalid image";
        //         }
        //         //  $this->save();

        //     }

        // }




        return \response()->json($response);
    }




    private function push_notification($message , $order_id,$isAdmin){

        $order = Order::find($order_id);
        
        if(!empty($order) && $order->admin_id >= 1){

            if($isAdmin == "yes"){
                $user = User::select("not_id")->where("id", $order->user_id)->first();
            }else{
                $user = User::select("not_id")->where("id", $order->admin_id)->first();
            
            
            }


            // return $user->not_id;
            


            $content = array(
                "en" =>$message
            );
            
            $fields = array(
                //replace app_id with admin noti_id
                'app_id' => "506f3538-e434-41e6-88d4-07e4f920ce4b",
                'include_player_ids' => array($user->not_id),
                'data' => array("type" => "new_chat_message","order_id" => $order_id
            ),
                'contents' => $content
            );
            
            $fields = json_encode($fields);
            //print("\nJSON sent:\n");
            //print($fields);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           // ob_start();
            $response = curl_exec($ch);
            //ob_end_clean();
            curl_close($ch);



        }
        
        
    }
}

