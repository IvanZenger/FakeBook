<!--
/******************************************FakeBook******************************************
*
*  Auf dieser Seite, werden alle Beiträge, aus der Datenbank auf der Seite aufgelistet
*
********************************************************************************************/
-->
<section class="content">
    <h2 class="displaynone">Content-Home</h2>
    
    <?php
            //Hier werden die Daten aus der Datenbank geholt
            $sql = "Select ID_Post,Profilbild,Username,Beitrag,Time FROM post Join user ON ID_User = User_ID order by Time desc;";
            $db = connect();
            $statement = $db->prepare($sql);
            $statement->execute();
            $statement->bind_result($ID_Post,$Profilbild,$User,$Beitrag,$Time);

            $Beitraege = array();

            while($statement->fetch()){
                $Beitraege[] = array('IDPost' => $ID_Post,'Profilbild' => $Profilbild, 'User' => $User, 'Beitrag' => $Beitrag, 'Time' => $Time);
                }   

            //In dieser Funktion, wird geschaut, ob der aktuelle User diesen
            //Beitrag schon geliked hat
            function userLiked($post_id){
                $db = connect();//Datenbank verbindung

                $userid = $_SESSION['userdata']['ID_User'];//ID des aktuellen User
                
                $sql = "SELECT count(*) FROM liken WHERE User_ID = ? AND Post_ID = ?;";
                $statement = $db->prepare($sql);
                $statement->bind_param('ii',$userid,$post_id);
                $statement->execute();
                $statement->bind_result($userLikeCheck);

                 while($statement->fetch()){
                     $check = array('userLike' => $userLikeCheck);
                 }
                
                 //Wen er den Beitrag schon geliket hat, wird true zurück gegeben
                 if ($check['userLike'] == 1) {
                  return true;
                }else{ //Wen er den BEitrag noch nich geliket hat, wird false zurück gegeben 
                  return false;
                }
            
}

?>
    <!-- Hier wird jeder Beitrag aufgelistet-->
    <?php foreach($Beitraege as $Post): ?>


    <article id="<?php echo htmlspecialchars($Post['IDPost']); ?>"> <!-- User ID-->
        <h2 class="displaynone"><?php $Post['IDPost']; ?></h2>

        <?php $user = "user".".".$Post['User']; // Für die Links auf die Userprofile
        $post = "comment".".".$Post['IDPost'];  //Für die Link, um den Beitrag zu Kommentieren
        ?>

        <a href=<?php echo htmlspecialchars($user);?>> <!-- User ID => Link--> 
            <div class="userimg"><img alt="Das Bild konnte nicht angezeigt werden."
                    src="picture/<?php echo htmlspecialchars($Post['Profilbild'])?>"> <!-- Profilbild-->
            </div>
            <div class="user">
                <p><?php echo htmlspecialchars($Post['User']); ?></p><!-- Username -->
            </div>
            <div class="datum">
                <p><?php echo htmlspecialchars($Post['Time']); ?></p><!-- Timestamp -->
            </div>
        </a><br/>
        <div class="beitrag">
        <?php echo htmlspecialchars($Post['Beitrag']); ?></p> <!-- Beitrag Inhalt -->
        </div>

        <!-- Beitrag-Icons -->
        <div id="kommentieren">

            <!--Like Funktion-->
            <!-- Hier wird die Funktion userLiked() aufgerufen -->
            <!-- Wen der User diesen Beitrag schon geliket hat, wird das Herz schon Blau dargestellt, wne nicht ist es Weiss-->
            <i <?php if(userLiked($Post['IDPost'])):?> 
            class="like far fa-heart active postIcon" 
            <?php else: ?>
                class="like far fa-heart postIcon" 
            <?php endif ?> 
            data-id="<?php echo htmlspecialchars($Post['IDPost']);?>"></i>

                <!-- Kommentar-Icon -->
                <a href="<?php echo htmlspecialchars($post);?>"><span class="comment fa-stack" id="comment">
                <i class="fas fa-circle fa-stack-2x postIcon"></i>
                <i class="far fa-comment-alt fa-stack-1x postIcon"></i></span></a>
            
                <!-- Löschen-Icon -->
            <?php 
                if($_SESSION['userdata']['username'] == $Post['User']){  //Wen der Username aus der SESSION mit der des Beitrages übereinstimmt, hat der User die Möglichkeit den Beitrag
                    //löschen (das Löschen-Icon wird nur bei den Beitragen
                    //angezeigt, welche von den aktuellen User der
                    //eingelloggt ist, gepostet wurden)
            ?>
            <span class="fa-stack trash" id="trash" data-id="<?php echo htmlspecialchars($Post['IDPost']);?>"> 
            <!-- data-id: ID des aktuellen Post-->
                <i class="fas fa-circle fa-stack-2x postIcon"></i>
                <i class="far fa-trash-alt fa-stack-1x postIcon"></i>
            </span>
            <?php }?>

        </div>

    </article>
    <?php endforeach?>
</section>