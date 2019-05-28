<?php 
/******************************************FakeBook******************************************
*
*  Auf dieser Seite, wird das Profil des Users und seine Beiträge dargestellt
*
********************************************************************************************/

$user = explode('.', $_SESSION['url']); //Der Username wird über die URL übertrage (user.[username])
$user = $user[1]; //Username

if (empty($user[1]))
{
    $user = $_SESSION['userdata']['username'];
}

$db = connect(); //Verbindung zur Datenbnak 

//Hier wird die ID des User aus der Datenbang gelesen
$sql = "SELECT ID_User FROM user WHERE username = ?;";

$statement = $db->prepare($sql);
$statement->bind_param('s', $user);
$statement->execute();

$statement->bind_result($IDUser);

while($statement->fetch())
{
    $ID_User = $IDUser;
}

//Sucht nach der Anzahl der Freunde 
$sql = "SELECT count(FromUser_ID) FROM kollegen WHERE ToUser_ID = ?;";
$statement = $db->prepare($sql);
$statement->bind_param('i', $ID_User);
$statement->execute();

$statement->bind_result($AnzUser);

while($statement->fetch())
{
    $friends = $AnzUser;
}


//Sucht nach der Anzahl der Beiträge
$sql = "SELECT count(User_ID) FROM post WHERE User_ID = ?;";
$statement = $db->prepare($sql);
$statement->bind_param('i', $ID_User);
$statement->execute();

$statement->bind_result($AnzPosts);

while($statement->fetch())
{
    $posts = $AnzPosts;
}

if($posts == 1){ 
    $ScoreBeitrag = "Beitrag";
}else{
    $ScoreBeitrag = "Beiträge";
}




//Sucht nach der Anzahl der Likes
$sql = "SELECT COUNT(User_ID) from liken
        WHERE Post_ID IN (
            SELECT  ID_Post FROM post 
            where User_ID = ?
            );";
$statement = $db->prepare($sql);
$statement->bind_param('i', $ID_User);
$statement->execute();

$statement->bind_result($AnzLikes);

while($statement->fetch())
{
    $likes = $AnzLikes;
}

if($likes == 1){
    $ScoreLike = "Like";
}else{
    $ScoreLike = "Likes";
}


//Sucht den Pfad des Profilbildes, uname, name, vorname um die User Seite aufzubauen.
$sql = "SELECT Profilbild, username, Name, Vorname from user WHERE ID_User = ?;";
$statement = $db->prepare($sql);
$statement->bind_param('i', $ID_User);
$statement->execute();

$statement->bind_result($pb, $uname, $name, $vorname);

while($statement->fetch())
{
    $userdata = array('pb' => $pb, 'username' => $uname, 'name' => $name, 'vorname' => $vorname);
}

//Hier weden all Beiträge, welch von diesem User gepostet wurden, aus der
//Datenbank gelesen
$sql = "SELECT ID_Post,Profilbild,Username,Beitrag,Time FROM post Join user ON ID_User = User_ID where User_ID = ? order by Time desc;";
            
$statement = $db->prepare($sql);
$statement->bind_param('i', $ID_User);
$statement->execute();
$statement->bind_result($ID_Post,$Profilbild,$User,$Beitrag,$Time);

if(empty($Profilbild)){
    $Profilbild = "../picture/DefaultProfilbild.png";
}

$Beitraege = array();

while($statement->fetch())
    {
    $Beitraege[] = array('IDPost' => $ID_Post,'Profilbild' => $Profilbild, 'User' => $User, 'Beitrag' => $Beitrag, 'Time' => $Time);
    }   


    //In dieser Funktion, wird geschaut, ob der aktuelle User diesen
    //Beitrag schon geliked hat
    function userLiked($post_id)
    {
        $db = connect(); //Datenbank verbindung

        $userid = $_SESSION['userdata']['ID_User']; //ID des aktuellen User
        
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
        }
        else{ //Wen er den BEitrag noch nich geliket hat, wird false zurück gegeben 
        return false;
        }
    }


    //In dieser Funktion, wird geschaut, ob der aktuelle User mit diesem User
    //schon befreundet ist
    function friend($IDUser,$ToUser) {
        $db = connect(); //Datenbank verbindung
    
        $sql = "SELECT count(FromUser_ID) from kollegen where FromUser_ID = ? and ToUser_ID = ?;";
        $statement = $db->prepare($sql);
        $statement->bind_param("ii", $IDUser, $ToUser);
        $statement->execute();
        $statement->bind_result($result);

        
        while($statement->fetch()){
            $alreadyFriends = $result;
        }
        
        //Wen er mit dem User schon befreundet ist, wird true zurück gegeben
        if ($alreadyFriends == 1) {
            return true;
            }
            else{ //Wen er mit dem User nohc nicht befreundet ist, wird false zurück gegeben
            return false;
            }

    }
   

?>

<section>

    <!-- Follow Funktion: Desktop ansicht-->
    <!-- HIer wird die Funktion friend() aufgerufen-->
    <div class="FollowU w3-hide-small"><input <?php if(friend($_SESSION['userdata']['ID_User'],$ID_User)):?>
            class="Follow" value="Abonniert" style="background-color: white; color: #3c5a99; border: 3px solid #3c5a99;"
            <?php else: ?> class="Follow" value="Folgen" <?php endif ?> type="submit"
            data-id="<?php echo htmlspecialchars($ID_User);?>"></div>





    <h2 class="displaynone">User-Container</h2>

    <article id="profile">
        <!-- Follow Funktion: Mobile ansicht-->
        <!-- HIer wird die Funktion friend() aufgerufen-->

        <div class="FollowU w3-hide-medium w3-hide-large"><input

                <?php if(friend($_SESSION['userdata']['ID_User'],$ID_User)):?> 
                class="Follow " value="Abonniert"
                style="background-color: white; color: #3c5a99; border: 3px solid #3c5a99; top: 20;" 
                <?php else: ?>
                class="Follow" value="Folgen" <?php endif ?> 
                type="submit" data-id="<?php echo htmlspecialchars($ID_User);?>"></div>
                
        <h2 class="displaynone">Profile</h2>

    </article>

    <div id="profilbild"><a href=""><img alt="Das Bild kan nicht angezeigt werden."
                src="picture/<?php echo htmlspecialchars($userdata['pb']); ?>"></a></div> <!-- Profilbild -->


    <div id="name">

        <p id="profilusername">
            <?php
                echo htmlspecialchars($userdata['username']); //Username
            ?>
        </p>
        <p id="profilename">
            <?php
                echo htmlspecialchars($userdata['vorname']); //Vorname
                echo "&nbsp;";
                echo htmlspecialchars($userdata['name']); //Nachname
            ?>
        </p>

    </div>

    <div id="scorebar">

        <div class="scoreitem">
            <p><span><?php echo htmlspecialchars($friends); ?></span><br />Follower</p> <!-- Anzahl Follower-->
        </div>
        <div class="scoreitem scoreitemborader">
            <p><span> <?php echo htmlspecialchars($posts); ?> 
                </span><br /><?php echo htmlspecialchars($ScoreBeitrag); ?></p> <!-- Anzahl Beiträge -->
        </div>
        <div class="scoreitem scoreitemborader">
            <p><span> <?php echo htmlspecialchars($likes); ?> </span><br /><?php echo htmlspecialchars($ScoreLike); ?> <!-- Anzahl Likes-->
            </p>
        </div>

    </div>


    
    <!-- Hier werden die Beiträge des Users aufgelistet-->
    <?php foreach($Beitraege as $Post): ?>


    <article id="<?php echo htmlspecialchars($Post['IDPost']); ?>"><!-- ID des Beitrages--> 
        <h2 class="displaynone">Beitrag <?php echo htmlspecialchars($Post['IDPost']); ?></h2>

        <a href="user.<?php echo $Post['User'];?>">
            <div class="userimg"><img alt="Das Bild kan nicht angezeigt werden."
                    src="picture/<?php echo htmlspecialchars($Post['Profilbild']); ?>"></div><!-- Profilbild -->
            <div class="user">
                <p><?php echo htmlspecialchars($Post['User']); ?></p><!-- Username -->
            </div>
            <div class="datum">
                <p><?php echo htmlspecialchars($Post['Time']); ?></p><!-- Timestamp -->
            </div>
        </a>
        <br />
        <div class="beitrag">
            <?php echo htmlspecialchars($Post['Beitrag']); ?></p><!-- Inhalt des Beitrages -->
        </div>

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
            <!-- Durch das betätigen des Icon, wird der User auf einen neue Seite geleitet (comment.[IDPost]) wo er 
                den BEitrag Kommentieren kan -->
            <a href="comment.<?php echo htmlspecialchars($Post['IDPost']);?>"><span class="comment fa-stack"
                    id="comment">
                    <i class="fas fa-circle fa-stack-2x postIcon"></i>
                    <i class="far fa-comment-alt fa-stack-1x postIcon"></i></span></a>


            <?php 
                if($_SESSION['userdata']['username'] == $Post['User']){//Wen der Username aus der SESSION mit der des Beitrages übereinstimmt, hat der User die Möglichkeit den Beitrag
                    //löschen (das Löschen-Icon wird nur bei den Beitragen
                    //angezeigt, welche von den aktuellen User der
                    //eingelloggt ist, gepostet wurden)
            ?>
            <span class="fa-stack trash" id="trash" data-id="<?php echo htmlspecialchars($Post['IDPost']);?>">
            <!-- data-id: ID des aktuellen Post-->
                <i class="fas fa-circle fa-stack-2x postIcon"></i>
                <i class="far fa-trash-alt fa-stack-1x postIcon"></i>
            </span>
            <?php 
        }
        ?>
        </div>



    </article>

    <?php endforeach?>
</section>