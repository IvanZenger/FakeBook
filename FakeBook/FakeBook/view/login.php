<!--
/******************************************FakeBook******************************************
*
*  Auf dieser Seite kan man sich Einloggen
*
********************************************************************************************/
-->
    <div id="login" class="card">
            <div class="headform"><h1 class="">Login</h1></div>

            <form action="login_validator" method="Post">

                <div id="benutzername" class="form">
                    <!-- Benutzername -->
                    <input type="text" name="benutzername" placeholder=" Benutzername" maxlength="15" required><br><br>
                </div>

                <!-- Passwort -->
                <div id="PasswortLoginInput" class="form">
                    <input type="Password" name="password" placeholder=" Passwort" maxlength="20" required>
                    
                    <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'login'){?>
                    <p class="error">Passwort oder Benutzername falsch</p>
                    <?php }  ?>
                    
                </div>

                <div class="button">
                    <button type="submit">Anmelden</button>
                </div>
                <!-- Link zur Registration -->
                <p id="konto">Hast du noch kein Konto?<a href="registration"> Registrieren</a></p>

            </form>
        </div>
   