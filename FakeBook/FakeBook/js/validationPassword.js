/******************************************FakeBook******************************************
*
*  In diesem Js-File, werden die Passwort und Text Felder, Client-Seitig Validiert
*
********************************************************************************************/

//Hier wird das input Feld mit dem Namen, pw1 überprüft
$('input[name="pw1"').on('input', function() {
	var passwordPattern = /^(?=.*?[0-9])(?=.*[@#%&$£])(?=.*?[a-zA-Z0-9]).{8,}$/; // Dieser (folgende) Muster wurde zuerst verwendet, falls das Muster welches jetzt verwendet wird nicht zutrifft kan dieses wieder verwendet werden /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#%&$£])[A-Za-z\d@#%&$£]{8,}$/
	var passwordZeichen = /^.{8,}$/;
	var passwordSonderzeichen = /(?=.*[@#%&$£])/;
	var passwordZahl = /(?=.*[1-9])/;

	

	//Wen das Muster stimmt soll der Border die Farbe grün haben, sonst rot
	$(this).css('border', '2px solid black');
	if (passwordPattern.test($(this).val())) {
		$(this).css('border-color', '#01a00b');
	} else {
		$(this).css('border-color', '#FF6666');
	}

	//Wen die das Passwort mindestens acht Zeichen aufweist soll die Farbe des
	//Hinweises "Mindestens 8 Zeichen" grün sein, sonst rot
	if (passwordZeichen.test($(this).val())) {
		$('#hintAnzahl').css('color', '#01a00b');
	} else {
		$('#hintAnzahl').css('color', '#FF6666');
	}

	//Wen die das Passwort minedesten ein Sondezeichen aufweist soll die Farbe des
	//Hinweises "Muss sonderzeichen aufweisen" grün sein, sonst rot
	if (passwordSonderzeichen.test($(this).val())) {
		$('#hintSonderzeichen').css('color', '#01a00b');
	} else {
		$('#hintSonderzeichen').css('color', '#FF6666');
	}

	//Wen die das Passwort mindestens eine Zahl aufweist soll die Farbe des
	//Hinweises "Muss eine Zahl aufweisen" grün sein, sonst rot
	if (passwordZahl.test($(this).val())) {
		$('#hintZahl').css('color', '#01a00b');
	} else {
		$('#hintZahl').css('color', '#FF6666');
	}

	
//Hier werden alle Input Felder mit dem type "text" validiert


});

var textPatternFirst = /</;
var textPatternSec = />/;
var textPatternThird = /\+/;

$('input[type="text"').on('input', function(){


	$(this).css('border', '2px solid black');
	

	if (textPatternFirst.test($(this).val())) {
		$(this).css('border-color', '#FF6666');
				
		
	}
	else
	{
		if (textPatternSec.test($(this).val())) {
			$(this).css('border-color', '#FF6666');

		}
		else
		{
			
			if (textPatternThird.test($(this).val())) {
			$(this).css('border-color', '#FF6666');
			}
			else
			{
				$(this).css('border-color', '#01a00b');
				
			}
		}
	}
		
	
});
$('input[name="nachname"').on('input', function(){


	$(this).css('border', '2px solid black');
	

	if (textPatternFirst.test($(this).val())) {
		$(this).css('border-color', '#FF6666');
				
		
	}
	else
	{
		if (textPatternSec.test($(this).val())) {
			$(this).css('border-color', '#FF6666');

		}
		else
		{
			
			if (textPatternThird.test($(this).val())) {
			$(this).css('border-color', '#FF6666');
			}
			else
			{
				$(this).css('border-color', '#01a00b');
				$('#hintZeichenN').css('color', '#01a00b');
				
			}
		}
	}
		
	
});
$('input[name="vorname"').on('input', function(){

	
	$(this).css('border', '2px solid black');
	

	if (textPatternFirst.test($(this).val())) {
		$(this).css('border-color', '#FF6666');
				
		
	}
	else
	{
		if (textPatternSec.test($(this).val())) {
			$(this).css('border-color', '#FF6666');

		}
		else
		{
			
			if (textPatternThird.test($(this).val())) {
			$(this).css('border-color', '#FF6666');
			}
			else
			{
				$(this).css('border-color', '#01a00b');
				$('#hintZeichenV').css('color', '#01a00b');
				
			}
		}
	}
		
	
});
$('input[name="benutzername"').on('input', function(){

	
	$(this).css('border', '2px solid black');
	

	if (textPatternFirst.test($(this).val())) {
		$(this).css('border-color', '#FF6666');
				
		
	}
	else
	{
		if (textPatternSec.test($(this).val())) {
			$(this).css('border-color', '#FF6666');

		}
		else
		{
			
			if (textPatternThird.test($(this).val())) {
			$(this).css('border-color', '#FF6666');
			}
			else
			{
				$(this).css('border-color', '#01a00b');
				$('#hintZeichenB').css('color', '#01a00b');
				
			}
		}
	}
		
	
});
//Hier wird das input Feld mit dem Namen, pw2 überprüft
$('input[name="pw2"').on('input', function() {
	var pw1 = document.querySelector('#pw1').value; //Inhalt des Element mit der ID "pw1"
	var pw2 = document.querySelector('#pw2').value; //Inhalt des Element mit der ID "pw2"
	
	//Wen die beiden Inhalte übereinstimmen ist der Border die Farbe grün, sonst
	//rot
	//Zudem ist die Farbe des Hinweises "Passwort muss mit dem ersten Passwort
	//übereinstimmen", wen beide Passwörter gleich sind, grün sonst rot
	if (pw2 == pw1) {
		$(this).css('border-color', '#01a00b');
		$('#hintPW').css('color', '#01a00b');
	} else {
		$(this).css('border-color', '#FF6666');
		$('#hintPW').css('color', '#FF6666');
	}
});

//Diese Funktion wird ausgeführt, wen der Submit mit der ID "MustSubmit" geklickt
//wird (Dieser Submit wird auf der Seite registration.php  angezeigt)
$('button[id="MustSubmit"]').click(function() {
	var pw1check = document.querySelector('#pw1').value; //Inhalt des Element mit der ID "pw1"
	var pw2check = document.querySelector('#pw2').value; //Inhalt des Element mit der ID "pw2"

	if (checkPassword()) {
		if (pw1check == pw2check) {
			$('form').submit(); //Wen der Inhalt Gültig ist und beide Paswörter gleich sind, soll das Form "ausgeführt" werden
		}else{
			alert('Beide Passwörter müssen gleich sein'); //Wen beide Passwörter nicht gleich sind soll ein Alert ausgeführt werden
			$('form').submit(function(e) { //Und der Submit im Form wird nicht ausgeführt 
				e.preventDefault();
			});
		}
	} else {
		alert('Geben Sie eine gültige Passwort an!'); //Wen der Inhalt nicht Gültig ist, soll ein Alert ausgeführt werden
		$('form').submit(function(e) { //Und der Submit im Form wird nicht ausgeführt 
			e.preventDefault();
		});
	}
});



//Diese Funktion wird ausgeführt, wen der Submit mit der ID "CanSubmit" geklickt
//wird (Dieser Submit wird auf der Seite einstellungen.php  angezeigt)
$('button[id="CanSubmit"]').click(function() {
	var pw1check = document.querySelector('#pw1').value; //Inhalt des Element mit der ID "pw1"
	var pw2check = document.querySelector('#pw2').value; //Inhalt des Element mit der ID "pw2"

	if (checkPassword()) { 
		if (pw1check == pw2check) {
			$('form').submit(); //Wen der Inhalt Gültig ist und beide Paswörter gleich sind, soll das Form "ausgeführt" werden
		}else{
			alert('Beide Passwörter müssen gleich sein');//Wen beide Passwörter nicht gleich sind soll ein Alert ausgeführt werden
			$('form').submit(function(e) { //Und der Submit im Form wird nicht ausgeführt 
				e.preventDefault(); 
			});
			
		}
	} 
	else if(pw1check.length == 0){
		$('form').submit(); //Wen kein Passwort eingegeben wurde (Da das Passwort nicht geändert werden muss) wird das Form ausgeführt
	}else{
		alert('Geben Sie eine gültige Passwort an!'); //Wen der Inhalt nicht Gültig ist, soll ein Alert ausgeführt werden
		$('form').submit(function(e) { //Und der Submit im Form wird nicht ausgeführt 
			e.preventDefault();
		});
	
	}
});

//In dieser Funktion, wird die Gültikeit des Passwortes überprüft
function checkPassword() {
	var passwordPattern = /^(?=.*?[0-9])(?=.*[@#%&$£])(?=.*?[^a-zA-Z0-9]).{8,}$/;
	return passwordPattern.test($('input[name="pw1"]').val());
}
