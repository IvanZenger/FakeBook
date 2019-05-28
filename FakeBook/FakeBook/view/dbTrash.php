<?php
/******************************************FakeBook******************************************
*
*  Hier werden die Beiträge, welche vom User glöscht wurden, in der Datenbank gelöscht
*
********************************************************************************************/
function dbTrash(){
    $db = connect(); //Verbindung zu Datenbank

    $trash = $_POST['trash'];//ID des Beitrag
    
    //Löschen des Beitrages in der Datenbank
    $sql = "Delete From post where ID_Post = ?";
    $statement = $db->prepare($sql);
    $statement->bind_param('i',$trash);
    $statement->execute();
    
}

?>