/******************************************FakeBook******************************************
*
* In diesem Js-File, werden die Funktionen zwei Icons (Like-Icon, Trash-Icon), welche unter jedem
* Beitrag erscheinen Kontrolliert
*
********************************************************************************************/

	$(document).ready(function() {
		//wen der User auf '.like' klickt
		$('.like').on('click',function(){
            
			var postid = $(this).data('id'); //Der Wert des Dattribut data.id wird übermittelt (Post ID)
			    $post = $(this);
              
            //Die Daten werden mit Ajax über das File, dblike in die Datenbank eingetragen
			$.ajax({
				url: 'dblike', //Übermittelt die Daten zu dblike
				type: 'post', //Methode der Übermittlung
				data: {
					'postid': postid //Dateninhalt
                },
                
				success: function(response){
					//Dies wird ausgeführt, wend die Daten erfolgreich übermittelt
					//wurden
					
					//Dem Momentanen Element, wird die Klasse '.active'
					//zugewiese (Dadurch, wird das Like-Icon Blau)
                    $($post).toggleClass('active')
					
				}
			});
		});

		//wen der User auf '.trash' klickt
		$('.trash').on('click',function(){
            
			var trash = $(this).data('id'); //Der Wert des Dattribut data.id wird übermittelt (Post ID)
				$post = $(this);
				postid = "#"+trash;
				
			 //Die Daten werden mit Ajax über das File, dblike in die Datenbank eingetragen	
			$.ajax({
				url: 'dbTrash', //Übermittelt die Daten zu dblike
				type: 'post', //Methode der Übermittlung
				data: {
					'trash': trash //Dateninhalt
                },
                
				success: function(response){
					//Dies wird ausgeführt, wend die Daten erfolgreich übermittelt
					//wurden
					
					//Die Gestalltung (css) des Momentanen Elementes wird
					//bearbeitet (Wird nicht mehr angezeigt)
					$(postid).css('display','none');
					
					
				}
			});
		});
      
    });

	