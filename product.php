<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Vans Home</title>
    </head>
    <body>
    <header>
    <?php
    require __DIR__ . "/layouts/navigation.php";
?>
    </header>
    <section>
    <?php
    require __DIR__ . "/views/form_product.php";
    require __DIR__ . "/classes/products.class.php";
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myProduct = new Product (
        $_POST["starting_price"],
        $_POST["end_date"], 
         $_POST["model"] ,
         $_POST["mark"] ,
         $_POST["power"] ,
         $_POST["year"] ,
         $_POST["model"] ,
         $_POST["mark"] ,
         $_POST["power"] ,
         $_POST["year"] ,
         $_POST["description"] 
        );
      $myProduct -> save();
      $myProduct -> save();
    }


// $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");
// $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

// $query = $dbh->prepare("SELECT * FROM product");
// $query = $dbh->prepare("SELECT * FROM product");


// $query->execute();
// $query->execute();


// $results = $query->fetchAll();
// $results = $query->fetchAll();

// foreach ($results as $result) {
//     echo "<h1> N° $result[id]: Starting price : $result[starting_price]</h1>";
//     echo "<h1> Last price:  $result[last_price]</h1>";
//     echo "<h1> end_date : $result[end_date]</h1>";
//     echo "<h1> model : $result[model]</h1>";
//     echo "<h1> mark : $result[mark]</h1>";
//     echo "<h1> power : $result[power]</h1>";
//     echo "<h1> year : $result[year]</h1>";
//     echo "<h1> description : $result[description]</h1>";
//     echo "<h1> ___________________</h1>";
// }
?>
    </section>

    </body>

</html>
