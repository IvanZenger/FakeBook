<?php
/******************************************FakeBook******************************************
*
* Kontrolliert ob die Registations-daten (Benutzername, Email) schon in der Datenbank vorhande sind
* Wen diese noch nicht vorhanden sind wird der Accounnt in die Datenbank gespeichert und ins Home weitergeleitet.
*
********************************************************************************************/

function dbregistration(){
  //Bindet die Datenbank verbindung ein
  $db = connect();

  //Um die restlichen Felder (Vorname, Nachname, Benutzername) zu Validieren.



  //SESSION-Werte werden in "validation.php" zugewiesen
    $name = $_SESSION['nachname'];
    $vorname = $_SESSION['vorname'];
    $email = $_SESSION['mail'];
    $benutzername = $_SESSION['benutzername'];
    $password = $_SESSION['pw'];

    if(validationTel($_SESSION['Telephone'])){

      $Telephone = $_SESSION['Telephone'];
    }
    else
    {
     
    }

    $DefaultProfilBild = "../picture/DefaultProfilbild.png";


    $_SESSION['rest_validator'] = $name;
    rest_validierung();
    $name = $_SESSION['rest_validator'];

    $_SESSION['rest_validator'] = $vorname;
    rest_validierung();
    $vorname = $_SESSION['rest_validator'];

    $_SESSION['rest_validator'] = $benutzername;
    rest_validierung();
    $benutzername = $_SESSION['rest_validator'];

    session_unset();




   
  //Wir geschaut ob der Benutzername schon vorhanden ist
    $sql = "SELECT username FROM user where username = ?;";
    
    $statement = $db->prepare($sql);
    $statement->bind_param('s',$benutzername);
    $statement->execute();
    $statement->bind_result($username);

    while($statement->fetch()){
      $user = array('username'=>$username);
      
    }
   
    if(!empty($user['username'])){
      $_SESSION['error'] = 'regU';
      header("Location: registration");
      exit();
    }
    //Wir geschaut ob die Email schon vorhanden ist
    $sql = "SELECT email FROM user where email = ?;";
    $statement = $db->prepare($sql);
    $statement->bind_param('s',$email);
    $statement->execute();
    $statement->bind_result($mail);

    while($statement->fetch()){
      $Mail = array('Email'=>$mail);
    }

    if(!empty($Mail)){
      $_SESSION['error'] = 'regE';
      header("Location: registration");
      exit();
    }
    
    if(isset($Telephone)){
    //Der Account wirde erstellt und zum Home wieter geleitet.
    $sql = "Insert INTO user (Name,Vorname,email,username,Passwort,Telephone,Profilbild) values(?,?,?,?,?,?,?);";

    $statement = $db->prepare($sql);
    $statement->bind_param('sssssss', $name,$vorname,$email,$benutzername,$password,$Telephone,$DefaultProfilBild);
    $statement->execute();
    //muss evt. wieder verwendet werden: $_SESSION['userdata'] = array('ID_User' => $IDUser,'Name' => $name, 'Vorname' => $vorname,'username' => $benutzername,'Email' => $email,'Passwort' => $password,'Profilbild' => $DefaultProfilBild,'login' => true);
    header("location:login");

    }else{
      $sql = "Insert INTO user (Name,Vorname,email,username,Passwort,Profilbild) values(?,?,?,?,?,?);";

    $statement = $db->prepare($sql);
    $statement->bind_param('ssssss', $name,$vorname,$email,$benutzername,$password,$DefaultProfilBild);
    $statement->execute();
    //muss evt. wieder verwendet werden: $_SESSION['userdata'] = array('ID_User' => $IDUser,'Name' => $name, 'Vorname' => $vorname,'username' => $benutzername,'Email' => $email,'Passwort' => $password,'Profilbild' => $DefaultProfilBild,'login' => true);
    header("location:login");
    }
    





    






}

?>