<!--
/******************************************FakeBook******************************************
*
*  Auf dieser Seite, kan der User seine Probleme melden
*
********************************************************************************************/
-->
        <div id="help" class="card">
            <div class="headform"><h1>Hilfe</h1></div>
            <p>Falls Sie unklarheiten haben hilft Ihnen unser Support-Team gerne weiter. <br>Verfassen sie ihr anliegen im unteren Feld.</p>
            <form action="validator_hilfe" method="POST">
                <textarea placeholder=" Melde dein Problem" maxlength="400" class="problem" required name="report"></textarea>
                <div id="counter">
                    <div class="counter"></div><p>/400</p><!-- Für Counter funktion -->
                </div>


                <div class="button">
                    <button type="submit">Senden</button>
                </div>




            </form>





        </div>
        

