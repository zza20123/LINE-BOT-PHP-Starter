<?php
 
$strAccessToken = "fTfjHLGrrDJBRHEYwyhm66yARlhoAJxt+xX88YDAMlQYe0Esvp/4QIEQc71TY/K/bivN9UfaaO8Gl5tBaDTVnpD4xE+Y6DzBuSLm2ZVBhvMwO+N1aEPzHe6A+A6jSTMstFBCv07yyXYz4a+/vtwRsQdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ชื่อของคุณคือ ".$arrJson['events'][0]['source']['userId'];
if($arrJson['events'][0]['message']['text'] == "ดีจ้า"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = " ยินดีที่ได้รู้จักนะ ".$arrJson['events'][0]['source']['userId'];
  
