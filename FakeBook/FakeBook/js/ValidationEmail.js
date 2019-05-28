/******************************************FakeBook******************************************
*
*  In diesem Js-File, werden die input Felder mit dem type "Email" Client-Seitig
*  Validiert
*
********************************************************************************************/

// Hier wird das Feld auf den Inhalt überpfrüft und es werden Visuele zu der
// Korrekt hiet der Momentanen Eingabe gegeben hinweise gegeben
$('input[type="email"').on('input' , function() {
	var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/;
	var mailZeichen = /@/; 
	
	//Wen das Muster stimmt soll der Border die Farbe rot haben, sonst weiss
	//Zudem wird wen der Inhalt Gültig ist die Farbe des Hinweise "Gültige
	//Email" grün, sonst rot
	$(this).css('border', '2px solid black');
	if (mailPattern.test($(this).val())) {
		$(this).css('border-color', '#01a00b');
		$("#hintPunkt").css('color', '#01a00b');
		
	} else {
		$(this).css('border-color', '#FF6666');	
		$("#hintPunkt").css('color', '#FF6666');
	}

	//Wen die Email ein @ aufweist soll die Farbe des Hinweises grün sein, sonst
	//rot
	if (mailZeichen.test($(this).val())) {
		
		$("#hintZeichen").css('color', '#01a00b');
		
	} else {
		
		$("#hintZeichen").css('color', '#FF6666');
	}
});

//Hier wird das Feld auf ihre Gültikeit überprüft, wen der User auf den button
//mit dem type "submit" klickt 
$('button[type="submit"]').click(function() {
	if(checkMail()) {
		$('form').submit(); //Wen der Inhalt Gültig ist, soll das Form "ausgeführt" werden
	} else {
		alert("Geben Sie eine gültige Emailadresse an!"); // Wen der Inhalt nicht Gültig ist, soll ein Alert ausgeführt werden
		$('form').submit(function(e){
	        e.preventDefault();
	    });
	}
});

//überprüft auf Gültikeit des email Feldes
function checkMail() {
	var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/;
	return mailPattern.test($('input[type="email"]').val());
}


