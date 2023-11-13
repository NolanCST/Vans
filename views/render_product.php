<?php ob_start(); ?>

<?php

$dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");


$query = $dbh->prepare("SELECT * FROM product");

$query->execute();

$results = $query->fetchAll();


foreach ($results as $result) {
echo "<h1> Vente N° $result[id_product]: </h1>";
echo "<h2> Titre : $result[title]</h2>"; 
echo "<p> Description : $result[description]</p>";
echo "<p> Prix de départ : $result[starting_price]</p>";
 echo "<p> Date de fin : $result[end_date]</p>";
 echo "<p> ___________________</p>";
}
?>

<div class="annonceContainer">
    <div class="annonce-search">
        <button class="brn btn-lg btn-block btn-default-dark" type="submit">Rechercher</button>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once("navigation.php");