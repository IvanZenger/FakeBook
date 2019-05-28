<?php
/******************************************FakeBook******************************************
*
*  Dieses File, nimmt jede anfrage entegegen, wertete sie aus und leitet sie mit
*  den Attributen an den Builder weiter (ruft die funktion build() auf)
*
********************************************************************************************/
		
		session_start();

		include_once './view/dbConnect.php'; //Verbindung zur Datenbank
		include_once './resources/validator.php'; //Validator
		include_once './resources/builder.php'; //Builder
		include_once './view/dblogin.php'; //Login
		include_once './view/dbRegistration.php'; //Registration
		include_once './view/dbEinstellungen.php'; //Einstellungen
		include_once './view/dbPost.php'; //Beitrag
		include_once './view/dbLike.php'; //Like
		include_once './view/dbSearch.php'; //Suche
		include_once './view/dbhilfe.php'; //Hilfe
		include_once './view/dbTrash.php'; //Trash
		include_once './view/dbComment.php'; //Kommentar
		include_once './view/dbfollow.php'; //Follow
		include_once './view/dbDelete.php'; // Account Löschen
		include_once './view/dbTelCode.php'; // Account Löschen

		//Hier wird die URL gelesen und nach / gespallten und in ein Array umgewandelt
		$temp = trim($_SERVER['REQUEST_URI'], '/');
		$uri = explode('/',$temp);


// Hier wird geschaut, welche Seite aufgerufen wird

	if(!empty($uri[0])){
			$uri[0] = strtolower($uri[0]);
			
			switch($uri[0]){

				case 'dbfollow':
					dbFollow();
					break;

				case 'logout':
					session_destroy();
					header("Location:login");
					break;

				case 'dbhilfe':
					dbhilfe();
					break;

				case 'dbsearch':
					dbSearch();
					break;
				

				case 'dbtrash':
					dbTrash();
					break;
				case 'dbcomment':
					dbComment();
					break;
	
				case 'dbregistration':
					dbregistration();
					break;

				case 'dblogin':
					dblogin();
					break;

				case 'dbeinstellungen':
					dbEinstellungen();
					break;

				case 'dblike':
					dbLike();
					break;

				case 'dbpost';
					dbPost();
					break;

				case 'dbdelete';
					dbDelete();
					break;

				case 'dbtelcode_checkcode';
					CheckCode();
					break;
				case 'dbtelcode_sms';
					SMS();
					break;
				
				case 'registrierung_validierung':
					registrierung_validierung();
					break;

				case 'login_validator':
					login_validator();
					break;
				case 'validator_comment':
					validator_comment();
					break;
				case 'validator_hilfe':
				validator_hilfe();
						break;
				case 'validator_newpost':
				validator_newPost();
							break;
						
				case 'hilfe':
				if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
					build('hilfe.php', 1,true);
					break;
				}

				//Für die Links der User Profile
				// In die URL wird comment.[PostID] geschrieben
				case (preg_match('/comment.*/',$uri[0]) ? true : false): //Hier wird geschaut, ob in der URL "comment." am anfang steht 
					$_SESSION['url'] =  $uri[0]; //Wird in die SESSION gespeichert
					if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
						build('comment.php', 1,true);			
					}
					else{
						header("Location:login");				
					}
					break;

				case 'home':
				if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
					build('home.php', 1,true);			
				}
				else{
					header("Location:login");				
				}
				break;
				
				case 'impressum':
				if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
					build('impressum.php', 1,true);
					break;

				}
				
				//  Um einen User anzusehen wird der entsprechende Nutzer in der
				//	Url (user.[Name]) übertragen mit dem Regex ob "user." dabei ist.
				case (preg_match('/user.*/',$uri[0]) ? true : false):
				if($_SESSION['userdata']['login']){ //in der Session wurde gespeichert, ob sich der
													//Benutzer eingeloggt hat.
					$_SESSION['url'] =  $uri[0];
					build('user.php', 1, true);		
					break;	
				}
				else{
					header("Location:login");	
					break;			
				}

				case 'newpost':
				if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
					build('newPost.php', 1, true);			
				}
				else{
					header("Location:login");				
				}
				break;
					
				case 'einstellungen':
				if($_SESSION['userdata']['login']){ // Hier wird überprüft, ober der user schon eingelogt ist
					build('einstellungen.php',3,false);		
				}
				else{
					header("Location:login");				
				}
				break;
				
				case 'telcode':
					build('TelCode.php', 2,false);
					break;

				case 'login':
					build('login.php', 2,false);
					break;

				case 'registration':
					build('registration.php', 2, false);
					break;

				default:
					build('404.php', 2, false);
				}
		}
		else{
			build('login.php', 2, false);
		}


		?>

