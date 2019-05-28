<?php
function dbSearch(){
    $db = connect();
    $query = trim($_POST['query'], ' ');
    $query = "%".$query."%";

    $output = " ";
   
    //if($query[1] == "@"){ //Währe für die unten beschriebene Funktion

        $result = array();

        //Es werden alle Ergebnise aus der Datenbank gelesen
        $sql ="Select Profilbild,username FROM user Where Name Like ? OR Vorname LIKE ? OR username LIKE ? limit 11;";
        $statement = $db->prepare($sql);
        $statement->bind_param('sss',$query,$query,$query);
        $statement->execute();
        $statement->bind_result($searchP,$searchU);
    
        while($statement->fetch()){
            $result[] = array('search' => $searchU, 'Profilbild' => 'picture/'.$searchP);
        }
    
        //Hier wird jedes Resultat in die Variable $output geschrieben
        foreach($result as $res){
            $output .=  //.= "Append"
            
                '<a href="user.'.$res["search"].'"><div class="searchRes"><div class="searchimg"><img src="'.$res["Profilbild"].'"></div><p>'.$res["search"].'</p></div></a>';
            
        }
      

        echo $output; //Hier wird der Inhalt ausgegeben un im DIV SerachPanel angezeigt
    //}
    /* Hier wäre die Funktion, das man ein @ für die Suche nach USer und ein
    # für die Suche nach Schlagwörter in Beiträgen verwendet. Da aber die Suche auch sons sehr Performance schwach ist, ist dieser Teil 
    Auskomentiert. Dies Kann evt. später verwendet werden


    else if($query[1] == "#"){
        $query = trim($_POST['query'], '#');
        $result = array();
        $sql ="Select ID_Post FROM post Where Beitrag LIKE ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param('s',$query);
        $statement->execute();
        $statement->bind_result($search);
    
        while($statement->fetch()){
            $result[] = array('search' => $search);
        }
    
        
    
        foreach($result as $res){
            echo $res['search']."<br/>";
            
        }
    }
    else {

        $sql ="Select username FROM user Where Name Like ? OR Vorname LIKE ? OR username LIKE ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param('sss',$query,$query,$query);
        $statement->execute();
        $statement->bind_result($search);

    
        while($statement->fetch()){
            $result[] = array('search' => $search);
        }
    
        $sql ="Select ID_Post FROM post Where Beitrag LIKE ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param('s',$query);
        $statement->execute();
        $statement->bind_result($search);

        while($statement->fetch()){
            $result[] = array('search' => $search);
        }
    
        foreach($result as $res){
            echo $res['search']."<br/>";
            
        }



    }

    

    
    
*/
}


        
?>