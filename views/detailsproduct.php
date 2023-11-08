<?php

$dbh = new PDO("mysql:dbname=bocal_shop_toto;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT p.nom, p.prix_ttc, d.prix_vente_ttc, d.quantite FROM `details_achat` d LEFT JOIN `produits` p ON d.produit_id = p.id;");


$query->execute();


$results = $query->fetchAll();

foreach ($results as $result) {
    echo "<h1> N° $result[id]: Starting price : $result[starting_price]</h1>";
    echo "<h1> Last price:  $result[last_price]</h1>";
    echo "<h1> end_date : $result[end_date]</h1>";
    echo "<h1> model : $result[model]</h1>";
    echo "<h1> mark : $result[mark]</h1>";
    echo "<h1> power : $result[power]</h1>";
    echo "<h1> year : $result[year]</h1>";
    echo "<h1> description : $result[description]</h1>";
    echo "<h1> ___________________</h1>";
}
