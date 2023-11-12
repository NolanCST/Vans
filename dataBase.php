<?php
// windows
/* $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", ""); */

// Mac
/*  $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1; port=8889", "root", "root"); */

    try{
        //windows
        $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");
    } catch (Exception $e) {

        // Mac
        $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1; port=8889", "root", "root");
        // Ou si on veut le message, $e->message
    }