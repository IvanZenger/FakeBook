
<?php
/******************************************FakeBook******************************************
*
*  Hier wird in einer Funktion eine Verbindung zur Datenbank hergestellt
*
********************************************************************************************/
    function connect(){


        $db = mysqli_connect('[Server]','[User]','[Password]','[Database]');


        return $db;
    }
       
    


   

?>