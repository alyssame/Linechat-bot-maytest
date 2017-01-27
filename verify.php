<?php




$access_token = '/5DLwaBpj1czSviUnzWgmA22nkRDJOks8ydkVOto0prF8j3bfj6o3tIrcDfvEU+rmZ/apeOZXmEmgcqXPOuc2a4mB00UXMgzRlVXRbp5Y20t26BN9XyYl+wT+kY79meHDI2ekMnW0dV4/Vw8UAbLnAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
$result = curl_exec($ch);
curl_close($ch);

echo $result;


?>