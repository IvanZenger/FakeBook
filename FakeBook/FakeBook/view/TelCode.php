<!--
/******************************************FakeBook******************************************
*
*  Hier wird ein Code verlangt für die Two Factor Autorisierung
*
********************************************************************************************/
-->
<div id="codeCheck" class="card">
<div class="headform"><h1 id="notFoundhead">Code</h1></div>
<h3>Wir haben ihnen ein Code auf <br/> ihre Handy Nummer geschickt</h3>

<form action="dbTelCode_CheckCode" method="Post">




<div id="code" class="form">
    <input type="num" name="code" placeholder=" 6-Stelliger Code" maxlength="6" minlength="6" required>
</div>
<?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'code'){?>
                    <p class="error">Ihr Code ist ungültig oder abgelofen</p>
        <?php }  ?>
<div class="button">
    <button type="submit">Senden</button>
</div>


</form>

<p id="codeA">Brauchen sie ein neuen Code?<a href="dbTelCode_sms"> Neuer Code</a></p>
</div>

