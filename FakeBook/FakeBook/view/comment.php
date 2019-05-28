<?php
/******************************************FakeBook******************************************
*
*  In diesem File, wird der Beitrag angezeigt, welcher KOmmentiert werden soll.
*  => stellt die Kommentar Funktion dar
*
********************************************************************************************/

//Die ID des Beitrages wird in der Url übermittelt (comment.[Post_ID])
// Hier wird die ID ausgelesen
$comment = explode('.', $_SESSION['url']);
$comment = $comment[1];

if (empty($comment))
{
  header("Location:home");

}

?>

<section class="content">
    <h2 class="displaynone">comment</h2>

    <?php
            //Hier werden die Informationen zum Beitrag mit der entprechenden ID
            //aus der Datenbank gelesen
            $sql = "Select ID_Post,Profilbild,Username,Beitrag,Time FROM post Join user ON ID_User = User_ID  Where ID_Post = ?
            order by Time desc;";
            $db = connect();
            $statement = $db->prepare($sql);
            $statement->bind_param('i',$comment);
            $statement->execute();
            $statement->bind_result($ID_Post,$Profilbild,$User,$Beitrag,$Time);

            while($statement->fetch()){
                $Beitraege = array('IDPost' => $ID_Post,'Profilbild' => $Profilbild, 'User' => $User, 'Beitrag' => $Beitrag, 'Time' => $Time);
                }   

              
            //Hier wedene die Kommentare zum entsprechenden Beitrag aus der
            //Datenbank gelesene 
            $sql = "SELECT Username,Kommentar,Profilbild,Time FROM kommentar Join user ON ID_User = User_ID  Where Post_ID = ? Order by Time desc";
            $db = connect();
            $statement = $db->prepare($sql);
            $statement->bind_param('i',$comment);
            $statement->execute();
            $statement->bind_result($username,$com,$Profilbild,$Time);

            $comments = array();

            while($statement->fetch()){
                $comments[] = array('username' => $username,'Kommentar' => $com, 'Profilbild' => $Profilbild,'Time' => $Time);
                }   


            //In dierse Funktion, wird überprüft ob der USer, diesen Beitrag
            //schon geliket hat oder nicht
            function userLiked($post_id){

                $userid = $_SESSION['userdata']['ID_User'];
                echo $userid;
                $db = connect();
                $sql = "SELECT count(*) FROM liken WHERE User_ID = ? AND Post_ID = ?;";
                $statement = $db->prepare($sql);
                $statement->bind_param('ii',$userid,$post_id);
                $statement->execute();
                $statement->bind_result($userLikeCheck);

                 while($statement->fetch()){
                     $check = array('userLike' => $userLikeCheck);
                 }
                
                 if ($check['userLike'] == 1) {
                  return true;
                }else{
                  return false;
                }
            
}

?>
  

    <!-- Darstellung des Beitrages-->
    <article id="<?php echo htmlspecialchars($Beitraege['IDPost']); ?>">
        <h2 class="displaynone"><?php $Beitraege['IDPost']; ?></h2>

        

        <?php

        $user = "user".".".$Beitraege['User']; //Für den Link zum Userprofil
        $post = "comment".".".$Beitraege['IDPost'];  //Für den Link zum Kommentieren des Beitrages

        ?>

        <a href=<?php echo htmlspecialchars($user); ?>>
            <div class="userimg"><img alt="Das Bild konnte nicht angezeigt werden."
                    src="picture/<?php echo htmlspecialchars($Beitraege['Profilbild'])?>">
            </div>
            <div class="user">
                <p><?php echo htmlspecialchars($Beitraege['User']); ?></p>
            </div>
            <div class="datum">
                <p><?php echo htmlspecialchars($Beitraege['Time']); ?></p>
            </div>
        </a><br />
        <div class="beitrag">
            <p><?php echo htmlspecialchars($Beitraege['Beitrag']); ?></p>
        </div>

        <!-- Icons -->
        <div id="kommentieren">

            <!--Like Funktion-->
            <i <?php if(userLiked($Beitraege['IDPost'])):?> 
            class="like far fa-heart active postIcon" 
            <?php else: ?>
                class="like far fa-heart postIcon" 
            <?php endif ?> data-id="<?php echo $Beitraege['IDPost'];?>"></i>

          
            
        </div>



    </article>
    
    <!-- Auflistung der Kommentare-->
    <?php foreach($comments as $coms): ?>

    <article class="com">
    <h2 class="displaynone"><?php $Beitraege['Time']; ?></h2>

    <a href="<?php echo $user; ?>">
            <div class="userimg"><img alt="Das Bild konnte nicht angezeigt werden."
                    src="picture/<?php echo htmlspecialchars($coms['Profilbild'])?>">
            </div>
            <div class="user">
                <p><?php echo htmlspecialchars($coms['username']); ?></p>
            </div>
            <div class="datum">
                <p><?php echo htmlspecialchars($coms['Time']); ?></p>
            </div>
        </a><br /><br />
        <div class="beitrag">
            <p><?php echo htmlspecialchars($coms['Kommentar']); ?></p>
        </div>
    </article>

    <?php endforeach?>
</section>

<!-- Eingabe für ein neuen Kommentar-->
<div class="bottom">
    <form action="validator_comment" method="Post">
                    <input type="hidden" name="PostID" Value="<?php echo htmlspecialchars($Beitraege['IDPost']); ?>"> <!-- Damit die Post_ID übermittelt werden kan-->
                    <input id="CommentBox" name ="comment" type="text"  maxlength="400" required>
                    <input type="submit" id="buttonC" Value="Senden">
   </form>
                    
</div>

