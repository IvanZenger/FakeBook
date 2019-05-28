<?php
/******************************************FakeBook******************************************
*
*  HIer wird eine SMS an den User geschickt für die Two Factor Autorisierung
*
********************************************************************************************/

function SMS(){
    //Bindet die Datenbank verbindung ein
  $db = connect();

  
  
  
    $num = $_SESSION['userdata']['Telephone']; //Telefon aus der Datenbank

    if (empty($num)){
        $_SESSION['userdata']['login'] = true;
        header("Location:home");//Wen keine angegeben ist soll keine Autorisierung durchgeführt werden
        exit();
    }
  
    //gibt eine 6-stellige Zahl zurück und speichert sie in der $code Variable.
    mt_srand((double)microtime()*1000000); 
    $code = mt_rand(0,999999); 
   
    $newTime = date("H:i:s",strtotime(date("H:i:s")." +10 minutes"));
    
    
    
    
    //Inser in DB
    $sql = "Insert into sms (Time) Values(?);";
    $statement = $db->prepare($sql);
    $statement -> bind_param('s',$newTime);
    $statement->execute();

    //SMS Max auslesen
    $sql = "Select max(ID_sms),Time From sms Group by ID_sms order by ID_sms desc Limit 1;";
    $statement = $db->prepare($sql);
    $statement -> execute();
    $statement -> bind_result($smsID,$Time);

    while($statement -> fetch()){
        $maxSms = array('currentMax' => $smsID,'Time' => $Time);
    }

    if($maxSms['currentMax'] > 200){
    
    header("Location:home");
    }

 
    
    //Code in Session speichern
    $_SESSION['userdata']['code'] = $code;
    $_SESSION['userdata']['smsTime'] = $maxSms['Time'];

  
   
  //Url zusammen stellen
    $params = array(
        'u' => 'user907976',// sec user: user908013
        'p' => 'ykjCR0pfX9Z8u8sIdBLDQhfqQrLW7jBtaK70K3iIsvanwsq72CiLvWpBNXTe8mRg', //sec API: hbrV3Pu94AIJberGa29yiQVAhZyELaPr5vg2dnWPUfVpB96NsXrSo3WwDuoDkUx7
        'to' => $num,
        'type' => 'direct',
        'text' => "Ihr Code lautet: $code",
        'from' => 'FakeBook'
      );
      $url = 'https://gateway.sms77.io/api/sms?' . http_build_query($params);
      
    
//Verbindung zum Server (SSH)
    $curl_handle=curl_init();
    curl_setopt($curl_handle, CURLOPT_URL,"$url");
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'FakeBook');
    $query = curl_exec($curl_handle);
    curl_close($curl_handle);

      
      header("Location:TelCode");
    
    
    
    
}

//Code wird überprüft
function CheckCode(){

    $newTimeTrue = date("H:i:s");
    $CodeInput  = $_POST['code'];
    $code = $_SESSION['userdata']['code'];
    $smsTime = $_SESSION['userdata']['smsTime'];

 
    if( $smsTime <= $newTimeTrue){
        $_SESSION['userdata']['code'] == Null;
        echo "Der Timer ist abglaufen";
        header("Location:telcode");
        $_SESSION['error'] = 'code';
    }else{

      
    if($CodeInput == $code){
      $_SESSION['userdata']['login'] = true;
        header("Location: home");
    }else{
      $_SESSION['error'] = 'code';
        header("Location: telcode");
    }
}



}



?>