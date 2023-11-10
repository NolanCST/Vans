<?php


// A CORRIGER 


$dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT * FROM `product` p LEFT JOIN `details` d ON p.id_product = d.id_product");


$query->execute();


$results = $query->fetchAll();

foreach ($results as $result) {
    echo "<h1> Vente N° $result[id_product]: </h1>";
    echo "<h2> Titre : $result[title]</h2>"; 
    echo "<p> Marque : $result[mark]</p>";
    echo "<p> Modèle : $result[model]</p>";
    echo "<p> Puissance : $result[power]</p>";
    echo "<p> Année : $result[year]</p>";
    echo "<p> Description : $result[description]</p>";
    echo "<p> Prix de départ : $result[starting_price]</p>";
    echo "<p> Date de fin : $result[end_date]</p>";
    echo "<p> ___________________</p>";

}
