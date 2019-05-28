<?php
/******************************************FakeBook******************************************
*
*  Hier werden die Einstellungen, welche der User ändern möchte überprüft und in
*   die Datenbank eingeztragen
*
********************************************************************************************/
function dbEinstellungen(){
    //Datenbank verbindung
    

    //Bild Name
    $Profilbild = $_FILES['Profilbild']['name'];
    $NewVorname = $_POST['Vorname'];
    $NewName = $_POST['Name'];
    $NewUsername = $_POST['username'];
    $NewEmail = $_POST['Email'];
    $UserID = $_SESSION['userdata']['ID_User'];
    $Telephone = (string)$_POST['Telephone'];
    if(!empty($_POST['pw1'])){
    $NewPassword = hash('sha256',$_POST['pw1']);
    }
    else{
        $NewPassword = $_SESSION['userdata']['Passwort'];
    }
    //Momentaner Username, welcher für die überprüfung in der Datenbank gebraucht wird
    $username = $_SESSION['userdata']['username'];
    
    //Wene ein Profilbild mitgegeben wurde, wird der Name mit einem Datum
    //("Y-m-d-h-m-s") ergänzt
    if(!empty($Profilbild)){

    $temp = explode('.',$Profilbild); //Spaltet den Namen nach "." auf un erstellt eine Liste
    $lastElement = count($temp) - 1; //Zählt die anzahl Elemente in der Liste und (-1 für das letzet Element) 
    $secondLastElement = count($temp) -2; //Zählt die anzahl Elemente in der Liste und (-2 für das Zweit letzet Element) 

    $time = time(); //Aktuelle Zeit
    $timeDate = date("Y-m-d-h-m-s",$time); //Aktuele Zeit und Datum
    $NewProfilbild = $temp[$secondLastElement].".".$timeDate; //.(string)$timeDate;    //Das Aktuelle Datum wird vor dem letzen Punkt eingesetzte
    $NewProfilbild = $NewProfilbild.".".$temp[$lastElement]; //Der Dateiname wird mit einem Punkt angehängt
    }else{
        $NewProfilbild = $_SESSION['userdata']['Profilbild'];
    }
    
    //Hier wird überprüft ob der Username schon vorhanden ist
    $sql = "SELECT username FROM user where username = ? and not username = ?;";
    $db = connect();
    $statement = $db->prepare($sql);
    $statement->bind_param('ss',$NewUsername,$username);
    $statement->execute();
    $statement->bind_result($usernameProof);

    while($statement->fetch()){
      $user = array('username'=>$usernameProof);
    }

    if(!empty($user)){
      echo "User ist schon vorhande";
      var_dump($user);
      
    }

    
    //Wir geschaut ob die Email schon vorhanden ist
    $sql = "SELECT email FROM user where email = ? and not username = ?;";
    $statement = $db->prepare($sql);
    $statement->bind_param('ss',$NewEmail,$username);
    $statement->execute();
    $statement->bind_result($mail);

    while($statement->fetch()){
      $Mail = array('Email'=>$mail);
    }

    if(!empty($Mail)){
      echo "Mail ist schon vorhanden";
      var_dump($Mail);
      exit();
    }

    //Alle Daten werden in der Datenbank aktualisiert
    $sql = "Update user Set Vorname = ?, Name = ?, Passwort = ?, username = ?, Email = ?, Profilbild = ?,Telephone = ? Where username = ?;";
    $statement = $db->prepare($sql);
    $statement->bind_param('ssssssss',$NewVorname,$NewName,$NewPassword,$NewUsername,$NewEmail,$NewProfilbild,$Telephone,$username);
    $statement->execute();

    //Das Bild, welches mitgegeben wurde wird in den Ordner picture verschoben
    if(!empty($Profilbild)){
    move_uploaded_file($_FILES['Profilbild']['tmp_name'],"picture/../picture/$NewProfilbild");
    $pfad = "picture/../picture".$NewProfilbild;
    }else{
        $pfad = $_SESSION['userdata']['Profilbild'];
    }
    
    //Die SESSION wird mit den neuen Daten aktualisiert
    $_SESSION['userdata'] = array('ID_User'=> $UserID,'Name' => $NewName, 'Vorname' => $NewVorname,'username' => $NewUsername,'Email' => $NewEmail,'Passwort' => $NewPassword,'Telephone' => $Telephone,'Profilbild' => $pfad,'login' => true);
   
    header("Location:user.");

    

}

?>