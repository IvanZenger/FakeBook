<!--
/******************************************FakeBook******************************************
*
* Dieser Header, verfüght über die Suchbar, das Plus-Icon, User-Icon, Home-Icon
* und das Burger-Icon
*
********************************************************************************************/
-->


<div id="header-Container">
    <!-- Titel -->
    <div id="headtitle">
        <h1 id="header-FakeBook" class="w3-hide-small w3-hide-medium"><a href="home">FakeBoo<span
                    class="burger2">k</span></a></h1>
        <h1 id="header-FakeBookM" class="w3-hide-large "><a href="home">F<span class="burger2">B</span></a></h1>


    </div>
    <!--Alle Icons und die Liste welche erscheint, wen auf das Burger-Icon gecklickt wird-->
    <div id="header-navigation">
        <nav>
            <ul>
                <li class="burger" id="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul><!-- LListe welche erscheint, wen auf das Burger-Icon gecklickt wird-->
                        <li><a href="hilfe">Hilfe</a></li> 
                        <li><a href="impressum">Impressum</a></li>
                        <li><a href="einstellungen">Einstellungen</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </li>
                <li class="w3-hide-small"><a href="user."><i class="fas fa-user"></i></a></li><!-- User-Icon -->
                <li class="w3-hide-small"><a href="home"><i class="fas fa-home"></i></a></li><!-- Home-Icon -->
                <li class="plus" id="plus"><a href="newPost"><i class="fas fa-plus"></i></a></li><!-- Plus-Icon -->

            </ul>

        </nav>

    </div>



    <div class="searchdiv inputWithIcon" id="searchDiv"> <!-- Suchbar -->

        <input class="search w3-hide-medium w3-hide-large" autocomplete="off" id="searchM" name="search" type="text"
            onfocus="openSearchMobile()" placeholder="Search"> <!-- Mobile ansicht, wen die Suchbar fokusiert wird, wird die Funktion openSearchMobile() aus ddem File Search File ausgeführt-->

        <input class="search w3-hide-small" id="search" autocomplete="off" name="search" type="text"
            onfocus="openSearchDesktop()"placeholder="Search"> <!-- Desktop ansicht, wen die Suchbar fokusiert wird, wird die Funktion openSearchMobile() aus ddem File Search File ausgeführt-->

        <i class="fas fa-search"></i>

        <button class="button" id="closeSearch" onCLick="closeSearch()">Abbrechen</button> <!-- Wen der Button angeklickt wird, wird das Such Panel wieder ausgeblendet-->


    </div>



</div>