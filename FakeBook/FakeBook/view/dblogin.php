<?php
/******************************************FakeBook******************************************
*
*  Hier werden die Daten beim einloggen mit der Datenbank verglichen
*
********************************************************************************************/
function dblogin(){

 
   $db =  connect(); //Verbindung zur Datenbank
   unset($_SESSION['error']);
   

    $name= $_SESSION["rest_validator"]; //Benutzername 
    $password = $_SESSION["pw"]; //Passwort (sha256)
    session_unset();

    //Wird geschaut ob der User, mit diesen Angaben in der Datenbank vohanden ist
    $sql = "SELECT ID_User,Name,Vorname,username,Email,Passwort,Telephone,Profilbild FROM user WHERE username like ? AND Passwort like ?;";
    $statement = $db->prepare($sql);
    $statement->bind_param('ss', $name, $password);
    $statement->execute();

 
    $statement->bind_result($ID_User,$Name,$Vorname,$username,$Email,$Passwort,$Telephone,$Profilbild);
    
    while($statement->fetch())
    {
	    $user = array('IDuser' => $ID_User, 'Name' => $Name, 'Vorname' => $Vorname, 'username' => $username, 'Email' => $Email, 'Passwort' => $Passwort,'Telephone' => $Telephone, 'Profilbild' => $Profilbild, 'ID_User' => $ID_User);
        
    }
   
    
    //Wen der User vorhanden ist, werden alle Daten in die Session gespeichert
    //un ins home weitergeleitet
    if(!empty($user)){
        $_SESSION['userdata'] = array('ID_User' => $user['IDuser'], 'Name' => $user['Name'], 'Vorname' => $user['Vorname'],'username' => $user['username'],'Email' => $user['Email'],'Passwort' => $user['Passwort'],'Telephone' => $user['Telephone'],'Profilbild' => $user['Profilbild']);
        
        //$_SESSION['userdata']['login'] = true;
        //header("Location: home");
        header("Location: dbTelCode_sms");
                
    }   
    else { //Wen der User nicht vorhanden ist, wird er in Login zurückgeleitet
        $_SESSION['error'] = 'login';
        header("Location: login");
    }

}
    
    

/*

  /*       
    $username = $_POST['benutzername'];
    $pw = $_POST['Password'];

  //  alert("Geben Sie eine gültige Passwort an!");
 
    $sql = "SELECT ID_User, Username from user where Username = ? and Passwort = ?"
    $statement = $db->prepare($sql);
    $statement->bind_param('ss', $username, $pw);
    $statement->execute();
    $statement->bind_result($id_user, $name);

    while($statement->fetch()){
        $user = array('id_user' => $id_user, 'name' => $name);
    }

    if(!empty($user)){
        $_SESSION['userdata'] = array("id" => $user['id_user'], "name" => $user['name'], "login" => true);
        header("Location: secure");
    }else{
        echo 'Benutzer oder Passwort falsch!!';
    }
    */
 


?>