<?php
/******************************************FakeBook******************************************
*
*  Hier werden die neu erstelleten Beiträge in die Datenbank gespeichert
*
********************************************************************************************/
function dbPost(){
     //Bindet die Datenbank verbindung ein
     if(!empty($_SESSION['data'])) {
     $db = connect();

     $data = $_SESSION['data'];
    unset($_SESSION['data']);
    
    $Post = $data['Post'];//Inhalt des Beitrages
    $ID_User = $_SESSION['userdata']['ID_User'];//ID des Aktuellen USer

    //Der Beitrag wird in die Datenbank gespeichert
    $sql = "Insert into post (User_ID,Beitrag) values(?,?);";
    $statement = $db->prepare($sql);
    $statement->bind_param('is',$ID_User,$Post);
    $statement->execute();
    header("Location:home");
    


     }
     else
     {header("Location:login");}




}



?>