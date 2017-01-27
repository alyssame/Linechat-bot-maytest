<?php
$access_token = '/5DLwaBpj1czSviUnzWgmA22nkRDJOks8ydkVOto0prF8j3bfj6o3tIrcDfvEU+rmZ/apeOZXmEmgcqXPOuc2a4mB00UXMgzRlVXRbp5Y20t26BN9XyYl+wT+kY79meHDI2ekMnW0dV4/Vw8UAbLnAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			
			$text1  = array('ดีจ้า', 'โย่ว', 'โหล', 'ใครอยู่');
			
			$res_text1 = array('เออ ว่า..','โย่ววว','ดีจ้า','...','มีไร','โหลลลลลล');
			
			$a1 = array_rand($res_text1);
			$b1 = $res_text1[$a1];
			
			
			if (strposa($text, $text1, 1)) {
				$messages = [
							[
								'type' => 'text',
								'text' => $b1
							]
							]
			}else{

			// Build message to reply back
			$messages = [
							[
								'type' => 'text',
								'text' => $text
							],
							[
								'type' => 'text',
								'text' => "โหลลลลลลลล"
							],
							[
								'type' => 'text',
								'text' => "ว่าไงงงงงงงงงงง"
							],
						];
			}

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => $messages,
			];
			$post = json_encode($data);
			
			
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}



function strposa($haystack, $needles=array(), $offset=0) {
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
}




