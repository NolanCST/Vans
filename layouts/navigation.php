<?php

     function afficher_navbar($titreNavbar, $navigation ) {
        foreach ($navigation as $onglets => $lien) {
            echo "<a class=\"navigation\" href=\"$lien\"> $onglets </a>";
        }
     }