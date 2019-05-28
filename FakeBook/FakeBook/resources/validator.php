<?php
/******************************************FakeBook******************************************
*
* 
*
********************************************************************************************/
function rest_validierung()
{
    $eingabe = $_SESSION['rest_validator'];

    $eingabe = preg_replace ( '/[^a-z0-9#@éèçàäüöÜÄÖ]/i', '', $eingabe ); //Alle zeichen die nicht 0-9, a-z, A-Z, #, @, öäüÜÄÖ, éàè 
    //                                                                      sind werden durch "" ersetzt. 
    $_SESSION['rest_validator'] = $eingabe;
}

    function mail_validierung($form){

        if (isset($_POST[$form]) && !empty($_POST[$form]))
        {
            $email = $_POST[$form];
            
            if (preg_match("/^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/", $email))
            {
                $correct_email = true;
                
            }
            else {
          
                $correct_email = false;
            }
        }
        else {
            $correct_email = false;
        }
        $_SESSION['mail'] = $email;

     
        return $correct_email;
    }



function pw_validation ($password1, $password2){

    $pw1 = $_POST[$password1];
    $pw2 = $_POST[$password2];
    



if ($pw1 === $pw2){
        if(preg_match('/^(?=.*?[0-9])(?=.*?[^a-zA-Z0-9 ]).{8,}$/',$pw1)){

            $correct_password = true;
        }
        else 
        {
            $correct_password = false;
        } 
        
    }


    $_SESSION['pw'] = hash("sha256" ,$pw1);


    return $correct_password;


}

function validationTel($tel){
    if(preg_match('/^(0|0041|\+41)?[1-9][0-9].{9,9}$/',$tel))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function registrierung_validierung (){
    $mail_validiert = mail_validierung("email");
    $password_validiert = pw_validation("pw1","pw2");

    /* => Muss evt. wieder verwendet  */
    $_SESSION['username'] = $_POST['benutzername'];
    $_SESSION['nachname'] = $_POST['nachname'];
    $_SESSION['vorname'] = $_POST['vorname'];
    $_SESSION['benutzername'] = $_POST['benutzername'];
    $_SESSION['Telephone'] = $_POST['Telephone'];

    if ($mail_validiert && $password_validiert)
    {
    
        header("location: dbregistration");
        
    }
    else 
    {
        header("location: registration");
    }
}


function login_validator (){

    $_SESSION['rest_validator'] = $_POST['benutzername'];
    rest_validierung();


    if (pw_validation("password","password"))
    {
        header("Location: dblogin");
    }
    else 
    {
        $_SESSION['error'] = 'login';
        header("Location: login");
    }
}

function validator_comment(){
    $data = $_POST;

 
        if(strlen($data['comment']) > 400) {
            echo 'Kommentar zu gross, fassen Sie sich kuuml;rzer!';
            $invalid = true;
        }
    
    

    if(!$invalid){
        $_SESSION['data'] = $data;
        header("Location:dbcomment");
    }

}

function validator_hilfe(){
    $data = $_POST;

 
        if(strlen($data['report']) > 400) {
            echo 'Kommentar zu gross, fassen Sie sich k&uuml;rzer!';
            $invalid = true;
        }
    
    

    if(!$invalid){
        $_SESSION['data'] = $data;
        header("Location:dbhilfe");
    }
}

function validator_newPost(){
    $data = $_POST;

 
        if(strlen($data['Post']) > 1000) {
            echo 'Kommentar zu gross, fassen Sie sich k&uuml;rzer!';
            $invalid = true;
        }
    
    

    if(!$invalid){
        $_SESSION['data'] = $data;
        header("Location:dbPost");
    }
}
?>