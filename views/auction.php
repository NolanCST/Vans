<?php
require __DIR__."/form_auction.php";

require __DIR__."/../classes/auction.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myAuction = new Auction ($_POST["montant"]);
    $myAuction->save();
}