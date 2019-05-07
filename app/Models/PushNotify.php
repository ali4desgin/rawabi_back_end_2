<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushNotify extends Model
{
    //

    public static function send($title,$message){

$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://76cd3801-423c-4427-902c-75d08a4c1053.pushnotifications.pusher.com/publish_api/v1/instances/76cd3801-423c-4427-902c-75d08a4c1053/publishes",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"interests\":[\"users\"],\"apns\":{\"aps\":{\"alert\":{\"title\":\"{$title}\",\"body\":\"{$message}\"}}}}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer 06B6F72FF9BB986635AB9782555589FE82FDA11A39EEE62FA022EE8E3DC2D816",
                "Content-Type: application/json",
                "Postman-Token: 08de739c-2870-4e41-a0b8-0e580afa9c9a",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
        } else {
            // echo $response;
        }

/*        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://76cd3801-423c-4427-902c-75d08a4c1053.pushnotifications.pusher.com/publish_api/v1/instances/76cd3801-423c-4427-902c-75d08a4c1053/publishes",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"interests\":[\"users\"],\"apns\":{\"aps\":{\"alert\":{\"title\":\"{$title}\",\"body\":\"{$message}\"}}}}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer 06B6F72FF9BB986635AB9782555589FE82FDA11A39EEE62FA022EE8E3DC2D816",
                "Content-Type: application/json",
                "Postman-Token: 08de739c-2870-4e41-a0b8-0e580afa9c9a",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
        } else {
            // echo $response;
        }


*/
    }
}
