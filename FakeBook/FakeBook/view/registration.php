<!--
/******************************************FakeBook******************************************
*
*  Auf dieser Seite, kan man sich Registrieren
*
********************************************************************************************/
-->
<div id="registration" class="card">
    <div class="headform">
        <h1 class="">Registration</h1>
    </div>


    <form action="registrierung_validierung" method="post">
        <div id="nachname" class="form formhint" > <!-- Nachname -->
            <input type="text" name="nachname" placeholder=" Nachname*" maxlength="15" autocomplete="off" autofocus required><br>
            <p class="hint" id="hintZeichenN">Darf kein "<>" oder "+" haben</p>
        </div>
        <div id="vorname" class="form formhint"> <!-- Vorname-->
            <input type="text" name="vorname" placeholder=" Vorname*" maxlength="15" autocomplete="off" required><br>
            <p class="hint" id="hintZeichenV">Darf kein "<>" oder "+" haben</p>
        </div>
        <div id="Email-Input" class="form formhint"> <!-- Email -->
            <input type="Email" name="email" placeholder=" E-mail*" autocomplete="off" maxlength="30" required>
            <p class="hint" id="hintZeichen">Muss ein @ aufweisen</p>
            <p class="hint" id="hintPunkt">Gültige Email</p>
            
        </div>
        <div id="tel" class="form formhint"> <!-- Telefon Nummer-->
            <input type="num" id="Telephone" name="Telephone" placeholder=" Handy-Nummer" maxlength="11" minlength="11" autocomplete="off"><br>
            <p class="hint" id="hintTelBegin">Muss mit "41" beginnen</p>
            <p class="hint" id="hintTelLeerzeichen">Darf keine Leerzeichen, Buchstaben oder Sonderzeichen aufweisen</p>
            <p class="hint" id="hintTelLaenge">Muss 11 Zahlen lang sein lang sein</p>
        </div>
        <div id="benutzername" class="form formhint"> <!-- Username -->
            <input type="text" name="benutzername" placeholder=" Benutzername*" maxlength="15" autocomplete="off" required><br/>
            <p class="hint" id="hintZeichenB">Darf kein "<>" oder "+" haben</p>
            
        </div>

        <div id="Passwort-Input" class="form formhint"> <!-- Password 1 -->
            <input type="Password" name="pw1" id="pw1" placeholder=" Passwort*" maxlength="20" autocomplete="off" required>
            <p class="hint" id="hintAnzahl">Mindestens 8 Zeichen</p>
            <p class="hint" id="hintSonderzeichen">Muss Sonderzeichen aufweisen</p>
            <p class="hint" id="hintZahl">Muss eine Zahl aufweisen</p>
        </div>
        <div id="Passwort-InputSec" class="form formhint"> <!-- Password 2 -->
            <input type="Password" name="pw2" id="pw2" placeholder=" Passwort wiederholen*" maxlength="20" autocomplete="off" required>
            <p class="hint" id="hintPW">Passwort muss mit dem ersten Passwort übereinstimmen </p>
        </div>
        <div id="anmerkung" class="form">
           <p><span>*</span>müssen ausgeführt werden</p>
        </div>
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'regU'){?>
                    <p class="error">Der Username ist schon vergeben</p>
        <?php }  ?>
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'regE'){?>
                    <p class="error">Die E-Mail ist schon Registriert</p>
        <?php }  ?>
        <div class="button">
            <button type="submit" id="submit" name="submit">Registrieren</button>
        </div>
        <p id="konto">Hast du schon ein Konto?<a href="login"> Einloggen</a></p> <!-- Link zum Login -->

    </form>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
<script src='./js/ValidationEmail.js'></script> <!-- Validation Email-->
<script src='./js/validationPassword.js'></script> <!-- Validation Password-->
<script src='./js/ValidationTel.js'></script> <!-- Validation Telefonnummer-->
