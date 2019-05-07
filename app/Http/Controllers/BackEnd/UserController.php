<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Order;
use App\Models\Order_users;
use App\Models\Payments;
use App\models\User;
use App\Models\User_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public  function  index(){

        $users = User::where("isAdmin","no")->orderBy("id","desc")->paginate(20);
        return view("BackEnd.Users.index",compact("users"));
    }


    public  function  index2(){

        $users = User::where("isAdmin","yes")->orderBy("id","desc")->paginate(20);
        return view("BackEnd.Users.index2",compact("users"));
    }



    public function  change_status(Request $request){
        $user_id = $request->input("user_id");
        $user = User::find($user_id);

        if(empty($user)){
            return back();
        }

        User::where("id",$user_id)->update([
            "status"=>$request->input("status")
        ]);
        return back();
    }




    public function add_user(){
        return  view("BackEnd.Users.add");
    }


    public function  add_user_post(Request $request){
        $request->validate([
            "username"=>"required|min:1",
            "phone"=>"required|unique:users",
            "password"=>"required|min:6"
        ]);

        $new = new User();
        $new->username = $request->input("username");
        $new->password = password_hash($request->input("password"),PASSWORD_DEFAULT);
        $new->phone = $request->input("phone");
        $new->isAdmin = "yes";
        $new->save();

        return redirect(route("admin_users2"));
    }

    public  function  orders($user_id){
        $user = User::find($user_id);

        if(empty($user)){
            return back();

        }

        if(isset($_GET['record_no'])){
            $orders = Order::where([["record_no",$_GET['record_no'],["user_id",$user->id]]])->orderBy("id","desc")->paginate(20);
        }else{
            $orders = Order::where("user_id",$user->id)->orderBy("id","desc")->paginate(20);
        }


        return view("BackEnd.Orders.user",compact("orders"));
    }


}
