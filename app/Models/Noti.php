<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noti extends Model
{
    //

public static function sendOrderMessage($ids,$message,$order_id){ 
		$content = array(
			"en" => $message
			);
        
        $order = Order::find($order_id);
		$fields = array(
			//replace app_id with admin noti_id
			'app_id' => "7c26efc2-b438-4984-8c38-7db11299ea34b7",
			'include_player_ids' => $ids,
			'data' => array("foo" =>$order,"type" =>"order"),
			'contents' => $content
		);
		
	
            $fields = json_encode($fields);
      
    	
		
		$ch = curl_init();
		@curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		@curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		@curl_setopt($ch, CURLOPT_HEADER, FALSE);
		@curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = @curl_exec($ch);
		@curl_close($ch);
		
		
	}





    public static function sendChatMessage($id,$message,$order_id){
        $content = array(
            "en" => $message
            );
        
        $fields = array(
            //replace app_id with admin noti_id
            'app_id' => "7c26efc2-b438-4984-8c38-7db11299ea34",
            'include_player_ids' => array($id),
            'data' => array("type" => "chat","foo" => $order_id
        ),
            'contents' => $content
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = @curl_exec($ch);
        @curl_close($ch);
     
     
    }


}
