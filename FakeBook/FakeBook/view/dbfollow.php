<?php
/******************************************FakeBook******************************************
*
* Hier werden, wen ein User einem anderen User Folgen möchte, die Daten in die
* Datenbank gespeichert
*
********************************************************************************************/
function dbFollow()
{
    $db = connect(); //Verbindung zu Datenbank

    $ToUser = $_POST['ToUser']; //User (ID) welcher der Aktuelle User Folgen möchte
    $FromUser = $_SESSION['userdata']['ID_User']; //User ID des Aktuellen User

    //Hier wird in der Datenbank geschaut, ob dieser User den anderem User schon
    //Folgt
    $sql = "SELECT COUNT(*) FROM kollegen WHERE FromUser_ID = ? AND ToUser_ID = ?;";

    $statement = $db->prepare($sql);
    $statement->bind_param('ii',$FromUser,$ToUser);
    $statement->execute();
    $statement->bind_result($userFollow);
    
    while($statement->fetch()){
        $follow = array('userFollow' => $userFollow);
    }

    //Wen der User diesem User schon Folgt, soll der Eintrag gelöscht werden
    if ($follow['userFollow'] == 1) {

        $sql = "Delete FROM kollegen Where FromUser_ID = ? AND ToUser_ID = ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param('ii',$FromUser,$ToUser);
        $statement->execute();

    }else{ //Wen der User dem anderen USer, noch nicht Folgt, sollen die Daten in die Datenbank gespeichert werden

        $sql = "INSERT into kollegen (FromUser_ID, ToUser_ID) VALUES(?,?);";
        $statment = $db->prepare($sql);
        $statment->bind_param("ii", $FromUser, $ToUser);
        $statment->execute();
       
    }
    
}

?>