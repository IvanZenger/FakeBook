/******************************************FakeBook******************************************
*
*  In diesem Js-File, wird der Counter auf der Seite counter.php und newPost.php
*   Kontrolliert
*
********************************************************************************************/

//Diese Funtion wird ausgeführ wen in der KLasse '.problem' (Textarea) etwas veränder wurde
// (wen geschrieben oder gelöscht wird)
$('.problem').keyup(function(){ 
    var limit = 399; // Maximale Anzahl an Zeichen  
    var count = $(this).val().length; //Anzahl Zeichen in '.problem'
    $('.counter').html(count);
    if (count > limit) { 
        $('#counter').css('border-color','#cf3939'); //Wen die Anzahl Zeichen, über dem Limit ist, wird der "Border" rot
    } else { 
        $('#counter').css('border-color','white'); //Wen die Anzahl Zeichen, unter dem Limit ist, wird der "Border" weiss
    } 
});

$('.newPost').keyup(function(){ 
    var limit = 999; // Maximale Anzahl an Zeichen  
    var count = $(this).val().length; //Anzahl Zeichen in '.problem'
    $('.newPostC').html(count);
    if (count > limit) { 
        $('#newPostC').css('border-color','#cf3939'); //Wen die Anzahl Zeichen, über dem Limit ist, wird der "Border" rot
    } else { 
        $('#newPostC').css('border-color','white'); //Wen die Anzahl Zeichen, unter dem Limit ist, wird der "Border" weiss
    } 
});
