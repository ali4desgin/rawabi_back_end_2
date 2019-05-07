<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $table = "orders";
    public $timestamps = false;


    public static function getInfo($order_id = 0, $package_id = 0,$country_id = 0,$user_id = 0){
        $package = Package::find($package_id);
       // return $package;
        if(empty($package)){
            return false;
        }
        $users = Order_users::where("order_id",$order_id)->count();
        $category =  Category::find($package->category_id);



        if($country_id!=0){
            $country =  Country::find($country_id);
            if(empty($country)){
                return false;
            }
            $info["country"] = $country;

        }


        if($user_id!=0){
            $user =  User::find($user_id);
            if(empty($user)){
                return false;
            }
            $info["user"] = $user;

        }




        if(empty($category)){
            return false;
        }

        $parnet_category =  Category::find($category->parent);


        if($category->parent!=0){
            if(empty($parnet_category)){
                return false;
            }
        }

        $info["category"] = $category;
        $info["users"] = $users;
        $info["package"] = $package;
        $info["parnet_category"] = $parnet_category;









        return $info;
    }






    public static function get_status_ui($status){

        switch($status){

            case 'pending':
                $ui = "<span class=\"label label-primary\">انتطار الموافقة</span>";
                return $ui;
                break;
            case 'complete':
                $ui = "<span class=\"label label-success\">مكتمل</span>";
                return $ui;
                break;
            case 'closed':
                $ui = "<span class=\"label label-warning\">تم الاغلاق</span>";
                return $ui;
                break;
            case 'active':
                $ui = "<span class=\"label label-info\">مغعل حاليا</span>";
                return $ui;
                break;


        }
    }

    public static function get_type_ui($type){

        switch($type){

            case 'card':
                $ui = "<span class=\"label label-warning\"> تقسيط بطاقات سوا</span>";
                return $ui;
                break;
            case 'phone':
                $ui = "<span class=\"label label-info\"> تقسيط جوالات</span>";
                return $ui;
                break;



        }
    }






    public static function get_status_ui2($status){

        switch($status){

            case 'pending':
                $ui = "انتطار الموافقة";
                return $ui;
                break;
            case 'complete':
                $ui = "مكتمل";
                return $ui;
                break;
            case 'closed':
                $ui = "تم الاغلاق";
                return $ui;
                break;
            case 'active':
                $ui = "مغعل حاليا";
                return $ui;
                break;


        }
    }

    public static function get_type_ui2($type){

        switch($type){

            case 'card':
                $ui = " تقسيط بطاقات سو";
                return $ui;
                break;
            case 'phone':
                $ui = "تقسيط جوالات";
                return $ui;
                break;



        }
    }

}
