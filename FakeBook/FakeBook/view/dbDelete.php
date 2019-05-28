<?php
/******************************************FakeBook******************************************
*
* In diesem File, wird der Account in der Datenbank gelöscht
*
********************************************************************************************/
function dbDelete(){

    $db= connect();

    $ID_User = $_SESSION['userdata']['ID_User']; //Aktuelle ID des User

    
    $sql = "Delete From user Where ID_User = ?;";
    $statement = $db->prepare($sql);
    $statement -> bind_param('i',$ID_User);
    $statement -> execute();

    var_dump($statement);
    session_destroy();
    header("Location:login");




}
?>