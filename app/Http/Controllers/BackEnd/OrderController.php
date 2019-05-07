<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Order;
use App\Models\Order_users;
use App\Models\RoomChat;
use App\Models\Writing;
use App\models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public  function  index(){


        if(isset($_GET['record_no'])){

            $orders = Order::where("record_no","LIKE",$_GET['record_no'])->orderBy("id","desc")->paginate(20);
        }else{

            $orders = Order::orderBy("id","desc")->paginate(20);
        }








        return view("BackEnd.Orders.index",compact("orders"));
    }




    public function  change_status(Request $request){
        $id = $request->input("order_id");
        $status = $request->input("status");


		if($status=="complete"){
			$order = Order::find($id);

			if(!empty($order)){


				Writing::where("id",$order->writing_number)->update([
					"balance" => DB::raw("balance + 25")
				]);	

		
			}
			
		}
		

        Order::where("id",$id)->update([
            "status"=>$status,
            "admin_id"=>$request->session()->get("manger_id")
        ]);


       return back();
    }



    public  function  view_chats($order_id){
        $order = Order::find($order_id);
        if(empty($order)){
            return back();
        }



        $chats = RoomChat::where("order_id",$order_id)->orderBy("id","desc")->paginate(20);

        return view("BackEnd.Orders.chats",compact("chats","order"));

    }


    public function send_message(Request $request){

        if($request->input("isImage")=="no"){
            $request->validate([
                "message"=>"required",
                "room_id"
            ]);
            $chat_room = new RoomChat();
            $chat_room->order_id = $request->input("room_id");
            $chat_room->is_image = "no";
            $chat_room->message = $request->input("message");
            $chat_room->isAdmin = "yes";
            $chat_room->save();

        }else{



            if ($request->hasFile('image')) {
                $request->validate([
                    "room_id"
                ]);
                $image = $request->file('image');
                $image_name = uniqid("chat_").'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/chats/images/');
                if($image->move($destinationPath, $image_name)){

                    $chat_room = new RoomChat();
                    $chat_room->order_id = $request->input("room_id");
                    $chat_room->is_image = "yes";
                    $chat_room->image = $image_name;
                    $chat_room->isAdmin = "yes";
                    $chat_room->save();



                }else{

                    return back()->withErrors("invalid image");
                }
                //  $this->save();

            }

        }


        return back();
    }



    public  function  view_order(Request $request){

        $request->validate([
            "order_id"=>"required|integer"
        ]);

        $order_id = $request->input("order_id");
        $order = Order::find($order_id);
        if(empty($order)){
            return back();
        }



        $user = User::find($order->user_id);
        $admin = null;
        $writing = Writing::find($order->writing_id);
        if($order->admin_id>=1){
            $admin = User::find($order->admin_id);
        }

        if(empty($writing)){
            $writing = null;
        }


        return view("BackEnd.Orders.view",compact("order","user","admin","writing"));

    }
}
