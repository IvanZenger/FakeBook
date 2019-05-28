<?php
/******************************************FakeBook******************************************
*
* Hier weden die Kommentare in die Datenbank geschrieben
*
********************************************************************************************/

function dbComment(){
    $db = connect();

if(!empty($_SESSION['data'])){

$data = $_SESSION['data'];
unset($_SESSION['data']);

$comment = $data['comment']; //Kommentar inhalt
$PostID = $data['PostID']; //Beitrag ID
$UserID = $_SESSION['userdata']['ID_User']; //Des Aktuellen User

//Eintrag in die Datenbank(Tabelle: kommentar)
$sql = "INSERT Into kommentar (Kommentar,Post_ID,User_ID) Values(?,?,?)";
$statement = $db->prepare($sql);
$statement->bind_param('sii',$comment,$PostID,$UserID);
$statement->execute();

header("Location: comment.$PostID");//Wird zurück zum Post geleitet
}
else 
{
    header("Location:login");
}
}

?>