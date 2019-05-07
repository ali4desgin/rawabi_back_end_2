<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = "tickets";
    public $timestamps = false;


    public  static  function  getStatusUi($status){
        switch ($status){
            case 'new':
                return "<span class='label'>new</span>";
                break;

            case 'admin_reply':
                return "<span class='label label-info'>waiting for user</span>";
                break;
            case 'user_reply':
                return "<span class='label label-warning'>user waiting</span>";
                break;
            case 'closed':
                return "<span class='label label-danger'>closed</span>";
                break;
        }
    }
}
