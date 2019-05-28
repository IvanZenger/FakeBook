$('input[name="Telephone"').on('input' , function() {
	var telPattern = /^(0|0041|\+41)?[1-9][0-9].{9,9}$/;
	var telAnfang = /^[41].{1,10}$/;
	//var telLeerzeichen = ;
	var tellaenge = /^(0|0041|\+41)?[1-9][0-9].{9,9}$/
	
	//Wen das Muster stimmt soll der Border die Farbe rot haben, sonst weiss
	//Zudem wird wen der Inhalt Gültig ist die Farbe des Hinweise "Gültige
	//Email" grün, sonst rot
	$(this).css('border', '2px solid red');
	if (telPattern.test($(this).val())) {
		$(this).css('border-color', '#01a00b');
		$("#hintTelLaenge").css('color', '#01a00b');
		$("#hintTelLeerzeichen").css('color', '#01a00b');
		
		
	} else {
		$(this).css('border-color', '#FF6666');	
		$("#hintTelLaenge").css('color', '#FF6666');
		$("#hintTelLeerzeichen").css('color', '#FF6666');
	}
	

	//Wen die Email ein @ aufweist soll die Farbe des Hinweises grün sein, sonst
	//rot
	$("#hintTelBegin").css('color', '#01a00b');
	if (telAnfang.test($(this).val())) {
		
		$("#hintTelBegin").css('color', '#01a00b');
		
	} else {
		
		$("#hintTelBegin").css('color', '#FF6666');
	}
	
});

//Hier wird das Feld auf ihre Gültikeit überprüft, wen der User auf den button
//mit dem type "submit" klickt 
$('button[type="submit"]').click(function() {
	var Telephone = document.querySelector('#Telephone').value;
	if(empty(Telephone)){
		$('form').submit();
	}else{
	if(checkTel()) {
		$('form').submit(); //Wen der Inhalt Gültig ist, soll das Form "ausgeführt" werden
	} else {
		alert("Geben Sie eine gültige Telefonadresse ein"); // Wen der Inhalt nicht Gültig ist, soll ein Alert ausgeführt werden
		$('form').submit(function(e){
	        e.preventDefault();
	    });
	}
}
});

//überprüft auf Gültikeit des email Feldes
function checkTel() {
	var telPattern = /^(0|0041|\+41)?[1-9][0-9].{9,9}$/;
	return telPattern.test($('input[name="Telephone"]').val());
}


