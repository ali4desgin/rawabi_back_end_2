<?php

namespace App\Http\Controllers\BackEnd;

use App\Charts\BackEnd\Dashboard;
use App\Mail\Emails\EventPushed;
use App\Models\Manger;
use App\Models\Manger_detail;
use App\Models\PushNotify;
use Edujugon\PushNotification\PushNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Session;

class HomeController extends Controller
{
    //0be25d3f724acc91d854af06945d57e9e79abb808f63fc4481b71ba5677563ff

    public  function  index(){


       PushNotify::send("السلام عليكم","مستخدم جديد");

        return view("BackEnd.Home.auth");
    }



    public  function  auth(Request $request){

        // validate login detail
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:5"
        ]);

       // return $request->input("password");


       $manager =   Manger::where("email",$request->input("email"))->first();



  //    return password_hash($request->input("password"),PASSWORD_DEFAULT);

       if(empty($manager)){

           return back()->withErrors(["email"=>"email address or password are not valid"]);
       }else{


         

               if($manager->perm != "full"){
                   return back()->withErrors(["email"=>"this is not allowed to access the panel"]);
               }else{





                   //return Session::get("ali")
                   $request->session()->put("manger_id",$manager->id);



                   return redirect(route("admin_dashboard"));

               }



          



       }

    }











    public function  logout(Request $request){
        \Illuminate\Support\Facades\Session::flush();
        return redirect(route("admin_login"));
    }

    public  function  dashboard(){
//
//        Mail::to("ali4desgin@gmail.com")
//
//            ->queue(new EventPushed());

        $chart = new Dashboard();
        $chart->height = "200px";
        $chart->labels(['Users', 'Orders', 'Payments',"profit"]);
        $chart->dataset('Users', 'line', collect([6, 2, 5, 4]));
        $chart->dataset('Orders', 'line', collect([45, 2, 3, 4]));
        $chart->dataset('Users', 'line', collect([3, 24, 5, 6]));
        return view("BackEnd.Home.dashboard",compact("chart"));
    }







    public  function  settings(Request $request){

        $id = $request->session()->get("manger_id");
        //$request->session()->get("manger_permissions");


        $manger =  Manger::find($id);
        if(empty($manger)){
            return back();
        }
        return view("BackEnd.Home.settings",compact("manger"));
    }


    public  function  edit_manger_post(Request $request){
        $id = $request->session()->get("manger_id");
        $manger =  Manger::find($id);

        if(empty($manger)){
            return back();
        }


        $request->validate([

            "name" => "required",
            "status" => "required",
            "permissions" => "required"
        ]);




        if(!empty($request->input("new_password"))){
            $password = $request->input("new_password");

            if(strlen($password)<=5){
                return back()->withErrors("new password must be more than 6 char");
            }
            $password = password_hash($password,PASSWORD_DEFAULT);
        }else{

            $password = $manger->password;
        }





        Manger::where("id",$manger->id)->update([
            "name" => $request->input("name"),
            "password" => $password,

            "status" => $request->input("status")
        ]);
        return back()->withErrors("done");

    }
}
