<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $table = "offers";
    public $timestamps = false;

    public static function getImage($has_image, $image){

        switch($has_image){

            case 'yes':
                $image_html = "<img src='". asset(env("APP_PUBLIC_URL")."offer/image/".$image)."' width='50'/>";

                return $image_html;
                break;
            case 'no':
                $ui = "<span class=\"label label-info\">لا توجد صورة</span>";
                return $ui;
                break;



        }
    }



    public static function get_type_ui($type){

        switch($type){

            case 'active':
                $ui = "<span class=\"label label-success\"> نشط</span>";
                return $ui;
                break;
            case 'expire':
                $ui = "<span class=\"label label-danger\">منتهي</span>";
                return $ui;
                break;



        }
    }
}
