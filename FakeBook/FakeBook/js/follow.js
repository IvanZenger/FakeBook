/******************************************FakeBook******************************************
*
* In diesem Js-File, wird der Buttom Welcher auf den Userprofil Seiten
* Kontrolliert und Daten übermittelt
*
********************************************************************************************/


$(document).ready(function() {

	$('.follow').on('click',function(){
        var follow = $(this).data('id'); //Der Wert des Dattribut data.id wird übermittelt (ID_User)

        //Die Daten werden mit Ajax über das File, dbfollow in die Datenbank eingetragen
        $.ajax({
            url: 'dbfollow', //Übermittelt die Daten zu dbfollow
            type: 'Post', //Methode der Übermittlung
            data: {
                'ToUser': follow //Dateninhalt
            },
     
            //Dies wird ausgeführt, wend die Daten erfolgreich übermittelt
            //wurden
            success: function(response){
                
                
                //Wenn der Client diesem User noch nicht Folgt und auf den
                //Button klickt, Folgt er diesen User und der Button wird
                //anders dargestellt
                if ($('.follow').val() == "Folgen") {
                    $('.follow').css('background-color','white');
                    $('.follow').css('color','#3c5a99');
                    $('.follow').css('border','3px solid #3c5a99');
                    $('.follow').val('Abonniert');
                   
                    
                } else {

                    //Wenn der Client diesem User schon Folgt und nochmal auf den
                    //Button klickt, entfolgt er diesen User und der Button wird
                    //anders dargestellt

                    $('.follow').css('background-color','#3c5a99');
                    $('.follow').css('color','white');
                    $('.follow').css('border','none');
                    $('.follow').val('Folgen');
                }
                
                               
            }
        });
    });
});