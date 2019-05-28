/******************************************FakeBook******************************************
*
* In diesem Js-File, wird das die Search Panel und Suchfunktion Kontrolliert
*
********************************************************************************************/


// Hier wird ein die Klasse "searchPlane" und "closeSearch" (Button)
// eingeblendet und alles andere im Header ausgeblendet
//-> Mobile
function openSearchMobile() {
    document.getElementById("plus").style.display = "none";
    document.getElementById("burger").style.visibility = "hidden";
    document.getElementById("headtitle").style.display = "none";

    document.getElementById("searchPlane").style.display = "block";

    document.getElementById("searchDiv").style.width = "90%";
    document.getElementById("searchDiv").style.marginLeft = "calc(50% - 46%)";

    document.getElementById("closeSearch").style.display = "block";

    document.getElementById("searchM").style.width = "70%";
    document.getElementById("searchM").style.borderTopRightRadius = "0";
    document.getElementById("searchM").style.borderBottomRightRadius = "0";
}
// Hier wird ein die Klasse "searchPlane" und "closeSearch" (Button)
// eingeblendet 
// -> Desktop
function openSearchDesktop(){
    document.getElementById("searchPlane").style.display = "block";
    document.getElementById("search").autocomplete = "off";

    document.getElementById("closeSearch").style.display = "block";

    document.getElementById("search").style.width = "70%";
    document.getElementById("search").style.borderTopRightRadius = "0";
    document.getElementById("search").style.borderBottomRightRadius = "0";

}

// Hier wird ein die Klasse "searchPlane" und "closeSearch" (Button)
// ausgemlendet und die ausgebmenteten Elemente im Header wieder eingeblendet
function closeSearch() {
    document.getElementById("searchPlane").style.display = "none";

    document.getElementById("closeSearch").style.display = "none";

    document.getElementById("plus").style.display = "block";
    document.getElementById("burger").style.visibility = "visible";
    document.getElementById("headtitle").style.display = "block";

    document.getElementById("searchDiv").style.width = "40%";
    document.getElementById("searchDiv").style.marginLeft = "calc(50% - 20%)";
    
    document.getElementById("search").style.width = "100%";
    document.getElementById("search").style.borderTopRightRadius = "10px";
    document.getElementById("search").style.borderBottomRightRadius = "10px";

    document.getElementById("searchM").style.width = "100%";
    document.getElementById("searchM").style.borderTopRightRadius = "10px";
    document.getElementById("searchM").style.borderBottomRightRadius = "10px";

}


  //Diese Funktion sorgt für eine Live Suche, nach User in der Datenbank
    $(document).ready(function(){
        
        //Diese Funktion sorgt für eine Live Suche, nach User in der Datenbank
        function load_data(query)
        {
            //Die Daten werden mit Ajax über das File, dbfollow in die Datenbank eingetragen
            $.ajax({
                url:"dbsearch", //Übermittelt die Daten zu dbsearch
                method:"post", //Methode der Übermittlung
                data:{
                    query:query //Dateninhalt
                },

                //Dies wird ausgeführt, wend die Daten erfolgreich übermittelt
                //wurden
                success:function(data)
                {
                    // in dem Element mit der ID "#searchPlane" werden die Daten
                    // eingeblendete, welche vond er DB as resultat zurück
                    // kommen (Die Daten weche im File dbsearch als echo
                    // ausgegeben werden)
                    $('#searchPlane').html(data);
                }
            });
        }
        
        //Diese Funtion wird ausgeführ wen in der KLasse '.search' (Textarea) etwas veränder wurde
        // (wen geschrieben oder gelöscht wird)
        $('.search').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search); //Die Funktion load_data wird ausgeführt (Daten-übertragung)
            }
        });
    });