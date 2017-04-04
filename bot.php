<?php
include ('line-bot-api/php/line-bot.php');
$channelSecret = 'a168babcd43da274ae224bf2c5ab1437';
$access_token  = 'fTfjHLGrrDJBRHEYwyhm66yARlhoAJxt+xX88YDAMlQYe0Esvp/4QIEQc71TY/K/bivN9UfaaO8Gl5tBaDTVnpD4xE+Y6DzBuSLm2ZVBhvMwO+N1aEPzHe6A+A6jSTMstFBCv07yyXYz4a+/vtwRsQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();
}
{
  "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
  "type": "message",
  "timestamp": 1462629479859,
  "source": {
    "type": "user",
    "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
  },
  "message": {
    "id": "325708",
    "type": "sticker",
    "packageId": "1",
    "stickerId": "1"
  }
}
