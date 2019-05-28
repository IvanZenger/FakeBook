/******************************************FakeBook******************************************
*
* Dieses Js-File, sorgt dafür das ein Pfeil engeblendet wird, wen man nach
* untern Scrollt. Mit diesem Pfeil gelant man wieder nach oben (an den Start der
* aktuellen Seite)
*	
*  *Wir nur eingeblendet wen die Display breite grösser als 600px ist
********************************************************************************************/

$(document).ready(function() {
	// Die Klasse '.back-to-top' wird ausgeblendet (Der Pfeil)
	$('.back-to-top').hide()
	

	// Funktion für das Scroll-Verhalten
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				// Wenn 100 Pixel gescrolled wurde soll die Klasse
				// '.back-to-top' eingeblendet werden (Der Pfeil)
				$('.back-to-top').fadeIn();
			} else {
				//Wen der Absstand zu Top(Seiten anfang) kleiner ist als 100,
				//soll der Pfeil ausgeblendet werden
				$('.back-to-top').fadeOut();
			}
		});


		//Diese FUnktion wird ausgeführt, wen die Klasse '.back-to-top'
		//angeklickt wurde (Der Pfeil)
		$('.back-to-top').click(function() {
			
			$('body,html').animate(
				{
					//Mit dieser Funktion, wird der Client mit einer Animation(Slide) zu
					//STart der Aktuellen Seite geführt
					scrollTop: 0
				},
				400//Dauer der Animation -> in Milisekunden
			); 
			return false;
		});
	});
});


