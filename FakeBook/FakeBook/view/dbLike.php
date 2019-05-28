<?php
/******************************************FakeBook******************************************
*
*  Hier wird ein eintrag in der Datenbank eingetragen oder Gelöscht
*  Es dient dazu, das ein User ein Beitrag Liken kan
*
********************************************************************************************/
function dbLike(){
  
    $postID = $_POST['postid']; //ID des Beitrages
    $userID = $_SESSION['userdata']['ID_User'];//ID des Aktuellen User
    
    //Schuat in der Datenbank ob dieser User den Beitrag schon gelikt hat
    $sql = "SELECT COUNT(*) FROM liken WHERE User_ID = ? AND Post_ID = ?;";
    $db = connect();
    $statement = $db->prepare($sql);
    $statement->bind_param('ii',$userID,$postID);
    $statement->execute();
    $statement->bind_result($userLikeCheck);
    
    while($statement->fetch()){
        $check = array('userLike' => $userLikeCheck);
    }
    
    //Wen dieser User den Beitrag schon gelikt hat, wird dier Eintrag gelöscht
    if ($check['userLike'] == 1) {
        $sql = "Delete FROM liken Where User_ID = ? AND Post_ID = ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param('ii',$userID,$postID);
        $statement->execute();

    }else{ //Wen dieser User, den Beitrag noch nicht gelikt hat, werden die Daten in die Datenbank geschrieben
       
        $sql = "Insert INTO liken (User_ID, Post_ID) values(?,?);";
        $statement = $db->prepare($sql);
        $statement->bind_param('ii',$userID,$postID);
        $statement->execute();
    }

    

}








?>