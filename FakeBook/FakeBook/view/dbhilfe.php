<?php
/******************************************FakeBook******************************************
*
*  Hier wird das Problem, welches ein User meldet in die Datenbank gespeichert
*
********************************************************************************************/
function dbhilfe()
{
  if(!empty($_SESSION['data'])) {
  $db = connect(); //Bindet die Datenbank verbindung ein

  $data = $_SESSION['data'];
  unset($_SESSION['data']);
  
    $report = $data['report']; //Inhalt des Problem
    $User_ID = $_SESSION['userdata']['ID_User']; //Aktuelle ID des User


    $sql = "INSERT INTO Hilfe (Hilfe, User_ID) values(?,?);";
    
    $statement = $db->prepare($sql);
    $statement->bind_param('si', $report, $User_ID);
    $statement->execute();
    header("location:home");
  }
  else
  {
    header("Location:login");
  }
}





?>