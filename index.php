<?php
 
$strAccessToken = "0qvyOtTrnXuu7moC1pMLdrFMvI+hth0vRlkqjByrquZG0HVcOzydiTgSSeceZr+WTuTNSYwQJvB6RufkpReV67KP/fERrXCs5e8G0iiiXyBvDyqMd+TFSTZB6mjqSiPyUOz++srjZb9wTjZp0IqsXwdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "getAPI"){
  $arrPostData = array();
  //$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['to'] = "Ufb00beda08083bcf402fbd2160b75574";
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "API:".$arrJson['events'][0]['source']['groupId'];
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
