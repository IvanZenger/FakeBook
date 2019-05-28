-
<!--
/******************************************FakeBook******************************************
*
* Hier wird dem User die mögischkeit gegeben, all seine Daten zu ändern
*
********************************************************************************************/
-->
<div class="card">
    <div class="headform w3-hide-small">
        <h1>Einstellungen</h1>
    </div>

    <!-- Profilbild -->
    <div id="profilbild"><a href=""><img alt="Das Bild kan nicht angezeigt werden."
                src="picture/<?php echo htmlspecialchars($_SESSION['userdata']['Profilbild']); ?>"></a>
    </div>
    <form action="dbEinstellungen" method="Post" enctype="multipart/form-data">
        <div class="optionHandle">
            <!-- Profilbild hochladen => Akzeptiert: ".jpg,.png,.JPEG"-->
            <div class="option"><input type="file" name="Profilbild" id="uploadImg" accept=".jpg,.png,.JPEG"></div>


            <div class="option">
                <div class="attribut">
                    <p>Vorname:</p>
                </div>
                <div class="value">
                    <p>
                        <input type="text" name="Vorname"
                            Value="<?php echo htmlspecialchars($_SESSION['userdata']['Vorname']);?>"><!-- Vorname -->

                    </p>
                </div>
            </div>

            <div class="option">
                <div class="attribut">
                    <p>Name:</p>
                </div>
                <div class="value">
                    <p>
                        <input type="text" name="Name"
                            Value="<?php echo htmlspecialchars($_SESSION['userdata']['Name']);?>"><!-- Nachname -->
                    </p>
                </div>
            </div>
            <div class="option">
                <div class="attribut">
                    <p>Benutzername:</p>
                </div>
                <div class="value">
                    <p>
                        <input type="text" name="username"
                            Value="<?php echo htmlspecialchars($_SESSION['userdata']['username']);?>">
                        <!-- Benutzername -->
                    </p>
                </div>
            </div>
            <div class="option formhint" id="tel">
                <div class="attribut">
                    <p>Handy-Nummer:</p>
                </div>
                <div class="value">
                    <p>
                        <input type="tel" name="Telephone" autocomplete= "off"
                            value="<?php echo htmlspecialchars($_SESSION['userdata']['Telephone']);?>"> <!-- Telefon Nummer  -->
                            <p class="hint" id="hintTelBegin">Muss mit "41" beginnen</p>
                            <p class="hint" id="hintTelLeerzeichen">Darf keine Leerzeichen, Buchstaben oder Sonderzeichen aufweisen</p>
                            <p class="hint" id="hintTelLaenge">Muss 12 Zahlen lang sein lang sein</p>
                    </p>
                </div>
            </div>
            <div class="option formhint" id="Email-Input">
                <div class="attribut">
                    <p>Email:</p>
                </div>
                <div class="value">
                    <p>
                        <input type="email" name="Email" autocomplete="off"
                            value="<?php echo htmlspecialchars($_SESSION['userdata']['Email']);?>"> <!-- Email  -->
                        <p class="hint" id="hintZeichen">Muss ein @ aufweisen</p>
                        <p class="hint" id="hintPunkt">Gültige Email</p>
                    </p>
                </div>
            </div>
            <div class="option formhint" id="Passwort-Input">
                <div class="attribut">
                    <p>Passwort ändern</p>
                </div>
                <div class="value">
                    <p>
                        <input type="Password" name="pw1" id="pw1" Placeholder="Neues Password"><!-- Password 1 -->
                        <p class="hint" id="hintAnzahl">Mindestens 8 Zeichen</p>
                        <p class="hint" id="hintSonderzeichen">Sonderzeichen</p>
                        <p class="hint" id="hintZahl">Muss eine Zahl aufweisen</p>
                    </p>
                </div>
            </div>
            <div class="option formhint" id="Passwort-InputSec">
                <div class="attribut">
                    <p>Passwort wiederholen</p>
                </div>
                <div class="value">
                    <p>
                        <input type="Password" name="pw2" id="pw2" Placeholder="Password wiederholen">
                        <!-- Password 2 -->
                        <p class="hint" id="hintPW">Passwort muss mit dem ersten Passwort übereinstimmen </p>
                    </p>
                </div>
                
            </div>
            <div class="button">
                <button type="submit" id="CanSubmit">Senden</button>
            </div>
            <a href="dbDelete" id="DelAccount">Account Löschen</a>
        </div>
    </form>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
<script src='./js/ValidationEmail.js'></script><!-- Validation Email -->
<script src='./js/validationPassword.js'></script><!-- Validation Password-->
<script src='./js/ValidationTel.js'></script> <!-- Validation Telefonnummer-->