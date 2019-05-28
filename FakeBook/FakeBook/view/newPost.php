<!--
/******************************************FakeBook******************************************
*
* Auf dieser Seite, kan der User einen Neuen Post verfassen
*
********************************************************************************************/
-->
<div id="newPost" class="card">
    <div class="headform w3-hide-small">
        <h1>Neuer Beitrag</h1>
    </div>
    <form action="validator_newPost" method="Post">
        <textarea placeholder=" Neuer Post" name="Post" maxlength="1000" class="newPost" required autofocus></textarea>
        <div id="newPostC">
            <div class="newPostC"></div>
            <p>/1000</p> <!-- Wir für den Counter verwendet -->
        </div>


        <div class="button">
            <button type="submit">Posten</button>
        </div>
    </form>

</div>