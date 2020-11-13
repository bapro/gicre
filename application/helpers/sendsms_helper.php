<?php 
  function sendsms($mobileno, $textmessage, $return = '0'){       
        $sender = 'SEDEMO';  //Use sender name here
        $smsGatewayUrl = 'https://instantalerts.co/api/web/send/?apikey=69cmmo4z4oi68tu86po3464g22a72gg05&sender=SEDEMO&to=919035xxxxx&message=Test+message&format=json';
        $apikey = '69cmmo4z4oi68tu86po3464g22a72gg05'; // Use API key here

        $textmessage = urlencode($textmessage);
        $api_element = '/api/web/send/';
        $api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$mobileno.
'&message='.$textmessage;    
        $smsgatewaydata = $smsGatewayUrl.$api_params;
        $url = $smsgatewaydata;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        if($return == '1'){
            return $output;            
        }
    }
?>


