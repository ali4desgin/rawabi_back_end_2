<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //


    public static function sendMessage($id = ""){
        $content = array(
            "en" => 'English Message'
        );

        $fields = array(
            //replace app_id with admin noti_id
            'app_id' => "31ef1509-d097-4837-88c3-508d7a8c64b7",
            'include_player_ids' => array("6f542ed7-860d-42f4-a42a-56e724691988"),
            'data' => array("foo" => "bar"),
            'contents' => $content
        );

        $fields = json_encode($fields);


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


    }

}
