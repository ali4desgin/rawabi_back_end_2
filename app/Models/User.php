<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    public $timestamps = false;

protected $fillable = ['not_id'];

    public static function getInfo($userid = 0){

       $orders =  Order::where("user_id",$userid)->count();
       $processes =  Order_users::where("user_id",$userid)->count();
       $payments =  Payments::where("user_id",$userid)->count();

       $info["orders"] = $orders;
       $info["process"] = $processes;
       $info["payments"] = $payments;

        $info["rate"] = "new User";







       return $info;
    }



    public static function  getStatusUi($user_id , $status){

        switch ($status){
            case 'blocked':
                    return "<a href=\"".route('admin_change_status_user',['user_id'=>$user_id,'status'=>'active'])."\" class=\"btn btn-success btn-sm\">Activate</a>
                ";

                    break;

            case 'active':
                return "<a href=\"".route('admin_change_status_user',['user_id'=>$user_id,'status'=>'blocked'])."\" class=\"btn btn-danger btn-sm\">Block</a>
                ";

                break;


            case 'pending':
                return "<a href=\"".route('admin_change_status_user',['user_id'=>$user_id,'status'=>'active'])."\" class=\"btn btn-success btn-sm\">Activate</a>
<a href=\"".route('admin_change_status_user',['user_id'=>$user_id,'status'=>'blocked'])."\" class=\"btn btn-danger btn-sm\">Block</a>
                ";

                break;
        }
    }


}
