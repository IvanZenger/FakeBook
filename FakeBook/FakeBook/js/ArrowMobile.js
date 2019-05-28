/******************************************FakeBook******************************************
*
*  Dieses Js-File, wird eine Funktion ausgeführt wen die ID '#arrow'
*  angeklickt wurde (Der Pfeil)
*  *Wir nur eingeblendet wen die Display breite kleiner als 600px ist

********************************************************************************************/

$(function () {

    $('#arrow').click(function () { // Klick auf den Button
        $('body,html').animate({

            //Mit dieser Funktion, wird der Client mit einer Animation(Slide) zu
			//Start der Aktuellen Seite geführt
            scrollTop: 0
        }, 400);//Dauer der Animation -> in Milisekunden
        return false;
    });
});