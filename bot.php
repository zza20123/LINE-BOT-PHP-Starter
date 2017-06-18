<?php

$strAccessToken = "d1lRmTQoY59pWv8Bs6BOlb63Nk3Sf7h/bZ6Dj/DzjotVFu6Yx8+jOSERqnIOXaYsCi1Tpw0tPcGwjmSwE7WX4BTXfQvwlBr+uI9V+6Dm/yEoAbIiA1LqWvP7HGtHIhlFzzcaTD/osk6Y3h04+ZAKEQdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$_msg = $arrJson['events'][0]['message']['text'];


$api_key="JQu8U4XiE-fFSO0Ut3l7AmvLEt4MERRb";
$url = 'https://api.mlab.com/api/1/databases/rung/collections/linebot?apiKey='.$api_key.'';
$json = file_get_contents('https://api.mlab.com/api/1/databases/rung/collections/linebot?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
$data = json_decode($json);
$isData=sizeof($data);

if (strpos($_msg, 'สอนAD') !== false) {
  if (strpos($_msg, 'สอนAD') !== false) {
    $x_tra = str_replace("สอนAD","", $_msg);
    $pieces = explode("|", $x_tra);
    $_question=str_replace("[","",$pieces[0]);
    $_answer=str_replace("]","",$pieces[1]);
    //Post New Data
    $newData = json_encode(
      array(
        'question' => $_question,
        'answer'=> $_answer
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'ขอบคุณที่สอน RUNG AD น๊าน่ารักที่สุด';
  }
}else{
  if($isData >0){
   foreach($data as $rec){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = $rec->answer;
   }
  }else{
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'ตะเองเค้าไม่รู้คำตอบอ่ะ ตัวเองสอนให้เค้าได้นะเพียงพิมพ์: สอน AD[คำถาม|คำตอบ]พิมพ์ให้ถูกต้องนะตัวเอง';
  }
}


$channel = curl_init();
curl_setopt($channel, CURLOPT_URL,$strUrl);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($channel);
curl_close ($channel);
{
  "type": "123",
  "baseUrl": "https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjo55_vy8bUAhWJvY8KHXvMBWkQjRwIBw&url=https%3A%2F%2Fth.etoren.com%2Fproducts%2Fsamsung-galaxy-s8-plus-dual-sim-g955fd-64gb-gold&psig=AFQjCNFt2uGfwrPFGWAHAEoHncadt51BGQ&ust=1497847755015712",
  "altText": "this is an imagemap",
  "baseSize": {
      "height": 1040,
      "width": 1040
  },
  "actions": [
      {
          "type": "uri",
          "linkUri": "https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjo55_vy8bUAhWJvY8KHXvMBWkQjRwIBw&url=https%3A%2F%2Fth.etoren.com%2Fproducts%2Fsamsung-galaxy-s8-plus-dual-sim-g955fd-64gb-gold&psig=AFQjCNFt2uGfwrPFGWAHAEoHncadt51BGQ&ust=1497847755015712",
          "area": {
              "x": 0,
              "y": 0,
              "width": 520,
              "height": 1040
          }
      },
      {
          "type": "message",
          "text": "hello",
          "area": {
              "x": 520,
              "y": 0,
              "width": 520,
              "height": 1040
          }
      }
  ]
}
?>
