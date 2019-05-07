<?php

namespace App\Http\Controllers\Api;

use App\Mail\ForgetPassword;
use App\Models\Order;
use App\models\User;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //


    public function forget(Request $request){

        $email =  $request->input("email");

        $response = [];
        $user = User::where("email",$email)->first();

        if(!empty($user)){
            Mail::to([$email])->send(new ForgetPassword($user->password_real));
            $response['response'] = true;
            $response['message'] = "email has been sent check your inbox";
        }else{
            $response['response'] = false;
            $response['message'] = "please enter your valid email address";

        }



        return \response()->json($response);
    }

    public function  login(Request $request){
        $phone    = $request->input("phone");
        $password = $request->input("password");
        $not_id = $request->input("not_id"); 

        $response = [];

        if($phone=="" || $password==""){
            $response["response"] = false;
            $response["error_code"] = 1;
            $response["message"] = "username and password can't be empty";

        }else{

            $user  = User::where("phone",$phone)->first();

            if(empty($user)){

                $response["response"] = false;
                $response["error_code"] = 2;
                $response["message"] = "phone and password wrong";
            }else{


//                User::where("not_id",$not_id)->first()
//                ->update(['not_id' => "" ]);
//                $user_noti->not_id = "";
//                $user_noti->save();
//
//                $user->not_id = $not_id;
//                $user->save();
             User::where("phone",$phone)->first()
              ->update(['not_id' => $not_id ]);
                if(password_verify($password,$user->password)){

                    if($user->status=="active"){
                        $orders  = Order::where("user_id",$user->id)->count();
                        $response["response"] = true;
                        $response["error_code"] = 0;
                        $response["message"] = "login success";
                        $response["user"] = $user;
                        $response["orders"] = $orders;
                    }else{
                        $response["response"] = false;
                        $response["error_code"] = 3;
                        $response["message"] = "this user has been blocked ";

                    }



                }else{
                    $response["response"] = false;
                    $response["error_code"] = 2;
                   // $response["password"] =password_hash("12345678",1);
                    $response["message"] = "phone and password wrong";

                }






            }

        }




        return \response()->json($response);
    }



    public function  register(Request $request){
        $username = $request->input("username");
        $phone = $request->input("phone");
        $email = $request->input("email");
        $password = $request->input("password");
        $not_id = $request->input("not_id");
        $response = [];

        if($username=="" || $email=="" || !filter_var($email,FILTER_VALIDATE_EMAIL)|| $password=="" || $phone=="" || strlen($phone)<=6 || strlen($password)<6){
            $response["response"] = false;
            $response["error_code"] = 1;
            $response["message"] = "تاكد من البيانات المدخلة";

        }else{

            $user  = User::where("phone",$phone)->first();

            if(empty($user)){

                $user_accout = new User();
                $user_accout->username = $username;
                $user_accout->password_real = $password;
                $user_accout->password = password_hash($password,PASSWORD_DEFAULT);
                $user_accout->phone = $phone;
                $user_accout->email = $email;
                $user_accout->not_id = $not_id;
                $user_accout->save();


                $response["response"] = true;
                $response["error_code"] = 0;
                $response["message"] = "success";
                $response["user_id"] = $user_accout->id;
                $response["orders"] = 0;

            }else{

                $response["response"] = false;
                $response["error_code"] = 2;
                $response["message"] = "this phone is already used";




            }

        }




        return \response()->json($response);
    }




}

