/******************************************FakeBook******************************************
*
*   In diesem JS-File, wird der Klasse '.burger' die Klasse 'active'
*   "zugewiesen", wen die Klasse '.burger' anegcklickt wird
*
********************************************************************************************/

$(document).ready(function(){
    $('.burger').click(function(){
        $('.burger').toggleClass('active')


    });

});

