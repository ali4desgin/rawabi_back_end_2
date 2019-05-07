<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = "categories";
    public $timestamps = false;

    public  static  function  getDetail($category_detail = ""){

        $jsons = json_decode($category_detail,true);

        return $jsons;
    }
}
