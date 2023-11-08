
<?php

require __DIR__."/views/form_product.php";
require __DIR__."/classes/products.class.php";


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myProduct = new Produits (
        $_POST["starting_price"], 
        $_POST["last_price"], 
        $_POST["end_date"], 
         $_POST["model"] ,
         $_POST["mark"] ,
         $_POST["power"] ,
         $_POST["year"] ,
         $_POST["description"] 
        );
      $myProduct -> sauvegarde();
    }


$dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT * FROM product");


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

