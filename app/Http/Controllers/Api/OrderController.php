<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\User;
class OrderController extends Controller
{





    public function  test(){
        $userRecord =  User::select("not_id")->orderBy("id","desc")->get()->toArray();
//
         var_dump($userRecord);

        $ids = [];
        foreach($userRecord as $item){
            $ids[] = $item['not_id'];
//            array_push( ,$item['not_id']);
        }
        return $this->push_notification(["c95954f1-8441-4207-83bd-1c1585f5e621"]);
//        return self::sendMessage($ids,1);
//        return $userRecord;

    }
    public function get(Request $request){
        $order_id = $request->input("order_id");

        $order = Order::find($order_id);

        // respose 
        $response = [];

        if(empty($order)){
            $response["response"] = false;
            $response["message"] = "invalid order id";
        }else{
            $response["response"] = true;
            $response["message"] = "success";
            $response["order"] = $order;
        }


        return \response()->json($response); 
    }



    public function add_admin(Request $request){
        $order_id = $request->input("order_id");
        $admin_id = $request->input("admin_id");

        $order = Order::find($order_id);

        // respose 
        $response = [];

        if(empty($order)){
            $response["response"] = false;
            $response["message"] = "invalid order id";
        }else{

            Order::where("id",$order_id)->update([
                "admin_id"=>$admin_id,
                "status"=>"active"
            ]);
            $response["response"] = true;
            $response["message"] = "success";
        }


        return \response()->json($response); 
    }




    public function new_list(){
        




        $orders = Order::where("admin_id",null)->orderBy("id","desc")->get()->toArray();

        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["count"] = count($orders);
        $response["data"] = $orders;



        return \response()->json($response);
    }



    public function admin_list(Request $request){

      

        $user_id  = $request->input("admin_id");

        $orders = Order::where("admin_id",$user_id)->orderBy("id","desc")->get()->toArray();

        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["count"] = count($orders);
        $response["data"] = $orders;



        return \response()->json($response);
    }




    public function index(Request $request){

        


        $user_id  = $request->input("user_id");

        $orders = Order::where("user_id",$user_id)->orderBy("id","desc")->get()->toArray();

        $response["response"] = true;
        $response["error_code"] = 0;
        $response["message"] = "success";
        $response["count"] = count($orders);
        $response["data"] = $orders;



        return \response()->json($response);
    }



    private function push_notification($ids){



        $content = array(
            "en" => "new order",
            "ar" => "طلب جديد"
        );

        $fields = array(
            'app_id' => "506f3538-e434-41e6-88d4-07e4f920ce4b",
            'include_player_ids' => $ids,
            'data' => array("foo" => "bar"),
            'contents' => $content
        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;

    }



//    public  function sendMessage($ids,$order_id){
//        $content = array(
//            "en" => "new order",
//            "ar" => "طلب جديد"
//            );
//
//        $fields = array(
//            //replace app_id with admin noti_id
//            'app_id' => "506f3538-e434-41e6-88d4-07e4f920ce4b",
//            'include_player_ids' => $ids,
//            'data' => array("type" => "new_chat_message","order_id" => $order_id
//        ),
//            'contents' => $content
//        );
//
//        $fields = json_encode($fields);
//        //print("\nJSON sent:\n");
//        //print($fields);
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//        curl_setopt($ch, CURLOPT_POST, TRUE);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//       // ob_start();
//        $response = curl_exec($ch);
//        //ob_end_clean();
//        curl_close($ch);
//
//
//    }



    public  function create(Request $request){

        

        $user_id    = $request->input("user_id");
        $country    = $request->input("country");
        $service    = $request->input("service");
        $profit     = $request->input("profit");
        $job        = $request->input("job");
        $jobLoc     = $request->input("jobLoc");
        $bank       = $request->input("bank");
        $mobile     = $request->input("mobile");
        $sallary    = $request->input("sallary");
        $record     = $request->input("record");
        $jobDes     = $request->input("jobDes");
        $writing     = $request->input("writing");


        if(!empty($user_id) && !empty($country) && !empty($service) && !empty($profit) &&
            !empty($job) && !empty($jobLoc) && !empty($bank) && !empty($mobile) &&
            !empty($sallary) && !empty($record) && !empty($jobDes) ){


            $order = new Order();
            $order->user_id = $user_id;
            $order->status = "pending";
            $order->type = $service;
            $order->city = $country;
            $order->record_no = $record;
            $order->phone = $mobile;
            $order->job	 = $job;
            $order->workshop = $jobLoc;
            $order->service_duration = $jobDes;
            $order->sallary = $sallary;
            $order->bank = $bank;
            $order->profit = $profit;
            $order->writing_number = $writing;
            $order->save();
               
            $ids = array();


            $userRecord =  User::select("not_id")->where("isAdmin","yes")->orderBy("id","desc")->get()->toArray();
    
            // var_dump($userRecord);
            
            foreach($userRecord as $item){
                array_push( $ids,$item['not_id']);
            }
            self::sendMessage($ids,1);
            
           
          

            $response["response"] = true;
            $response["error_code"] = 0;
            $response["message"] = "تم اضافة الطلب بنجاح";

        }else{
            $response["response"] = false;
            $response["error_code"] = 1;
            $response["message"] = "يرجى ملئ جميع الخانات ";


        }

        return \response()->json($response);
    }
}


