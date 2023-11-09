<?php
  session_start();
  if(!isset($_SESSION["email"])){
    header("Location: ../connexion/login.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css" />
        <link rel="stylesheet" type="text/css" href="profil.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Vans Profile</title>
    </head>
    <body>
        <header>
            <?php require __DIR__."/../layouts/navigation.php"; ?>
        </header>
        <main>
            <?php
            $id = $_SESSION['id'];
            $dbh = new PDO ("mysql:dbname=vans;host=127.0.0.1", "root", "");
            $query = $dbh->prepare("SELECT * FROM `user` WHERE id_user=$id");
            $query->execute();
            $results = $query->fetchAll();
            foreach ($results as $result) { ?>
                <div class="container">
                    <h1>Profile</h1>
                    <p class="profilElement">Nom: <?php echo $result['lastname'] ?></p>
                    <p class="profilElement">Prenom: <?php echo $result['firstname'] ?></p>
                    <p class="profilElement">Email: <?php echo $result['email'] ?></p>
                </div>
            <?php }
            ?>
        </main>
    </body>
</html>