<?php
$access_token = 'fTfjHLGrrDJBRHEYwyhm66yARlhoAJxt+xX88YDAMlQYe0Esvp/4QIEQc71TY/K/bivN9UfaaO8Gl5tBaDTVnpD4xE+Y6DzBuSLm2ZVBhvMwO+N1aEPzHe6A+A6jSTMstFBCv07yyXYz4a+/vtwRsQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
