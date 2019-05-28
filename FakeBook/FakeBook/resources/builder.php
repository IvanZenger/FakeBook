<?php
/******************************************FakeBook******************************************
*
*  In diesem File, wird die Seite zusammen gebaut, welche vom User aufgerufen
*  wird
*  Die Daten (Attribute), welche Seite welchen Header, Footer hat, wird im
*  Index.php definiert
*
********************************************************************************************/

///* Attribute, der Funktion build() *///
/*

$page:
 Entspricht der Seite, welche aufgerufen wird


$header: 

1 = header.php, : Desktopansicht
2 = headerSec.php, : Mobileansicht
3 = headerCard.php : Moblieansicht,Desktopansicht ( => einstellungen.php)

$footer:

true: wird eingebunden (footer.php)
false: wird nicht eingebunden

*/

//Diese Funktion stellt die angefordete Seite zusammen
function build($page, $header, $footer)
{
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>FakeBook</title>
    <link rel="stylesheet" href="./css/main.css" />
    <meta charset="UTF-8">
    <link href="css/main.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <?php require_once 'searchPlane.php'; ?> <!--wird benötigt, für die Suchleiste--> 

    <?php //header: Desktop
        if ($header == 1){
            ?>
    <header>

        <?php require_once 'header.php'; ?>

    </header>
    <?php //headerSec: Mobileansicht
        }
        else if($header == 2){
            ?>
    <header>
        <?php require_once 'headerSec.php'; ?>

    </header>
    <?php
        } //Moblieansicht,Desktopansicht ( => einstellungen.php)
        else if($header == 3){
            
            ?>
    <header class="w3-hide-large w3-hide-medium"> <!-- Wen Mobile asicht: headerCard.php-->
        <?php require_once 'headerCard.php'; ?>
    </header>
    <header class="w3-hide-small"> <!-- Wen Desktop asicht: header.php-->
        <?php require_once 'header.php'; ?>
    </header>

    <?php
        }
        
        ?>

    <main>

        <?php require_once './view/'.$page; ?>
        <script src="js/counter.js"></script> <!-- Der Counter wird hier eingebunden, da die Funktion sonst nicht Funktioniert-->

    </main>

    <?php
        if($footer){
        ?>
    <footer>
        <?php require_once 'footer.php'; ?> <!-- true: footer.php -->
    </footer>
    <div id="arrow-up-d" class="w3-hide-small"><a href="#top" class="back-to-top"><span><i class="fas fa-arrow-up"></i></span></a></div><!--Pfeil für wieder an den start der Aktuellen Seite zu gelangen-->
    <!-- Der Pfeil wird über die Funktion im Arrow.js oder ArrowMobile.js Kontrolliert-->
    <?php
        }
        ?>

</body>

</html>
<?php
}
?>





<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script data-search-pseudo-elements defer src="https://use.fontawesome.com/releases/latest/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/burger.js"></script>
    <script src="js/postIcon.js"></script>
    <script src="js/Arrow.js"></script>
    <script src="js/ArrowMobile.js"></script>
    <script src="js/SearchPlane.js"></script>
    <script src="js/follow.js"></script>
