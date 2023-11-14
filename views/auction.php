<?php
session_start();

if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit(); 
}

class Auction {
    private int $montant;

    public function __construct ($montant) {
        $this->montant = $montant;
    }

    public function __get ($property) {
        if ($property === "montant") {
            return $this->montant;
        } else {
            return $this->$property;
        }
    }
    public function verification() {
        require __DIR__ . "/../dataBase.php";
       //recuperation du prix de base
        $startingPriceRecup = $dbh->prepare("SELECT starting_price FROM `product` WHERE id_product='" . $_GET['id'] . "'");
        $startingPriceRecup->execute();
        $startingPrice = $startingPriceRecup->fetchColumn();

        if ($this->montant < $startingPrice) {
            ?>
            <div class="alert alert-danger" role="alert">
                Vous ne pouvez pas enchérir en dessous du prix de départ.
            </div>
            <?php
            return;
        }
       //recuperation du dernier prix
        $lastPriceRecup = $dbh->prepare("SELECT new_auction FROM `auction` WHERE id_product='" . $_GET['id'] . "' ORDER BY date_auction DESC LIMIT 1");
        $lastPriceRecup->execute();
        $lastPrice = $lastPriceRecup->fetchColumn();

        if ($lastPrice !== false && $this->montant <= $lastPrice) {
            ?>
            <div class="alert alert-danger" role="alert">
                Vous devez miser un montant superieur à la mise précédente.
            </div>
            <?php
            return;
        }


        $query = $dbh->prepare("UPDATE `product` SET last_price=:last_Price WHERE id_product='" . $_GET['id'] . "'");
        $query->bindValue(':last_Price', $this->montant, PDO::PARAM_STR);
        $results = $query->execute();
        $this->save();
    }


    public function save () {
        $id = $_SESSION['id'];
        require __DIR__."/../dataBase.php";
        //recuperation des donnees de l'utilisateurs
        $dbuser = $dbh->prepare("SELECT id_user, firstname FROM `user` WHERE id_user=$id");
        $dbuser->execute();
        $users = $dbuser->fetch();

        //recuperation des donnees du produits
        $dbproduct = $dbh->prepare("SELECT id_product FROM `product` WHERE id_product='".$_GET['id']."'");
        $dbproduct->execute();
        $products = $dbproduct->fetch();

        $query = $dbh->prepare("INSERT INTO `auction` (new_auction, date_auction, id_user, id_product) VALUES (:new_auction, NOW(), :id_user, :id_product)");
        $query->bindValue(':new_auction', $this->montant, PDO::PARAM_STR);
        $query->bindValue(':id_user', $users['id_user'], PDO::PARAM_STR);
        $query->bindValue(':id_product', $products['id_product'], PDO::PARAM_STR);
        $results = $query->execute();
            if($results){ ?>
                <div class="alert alert-success" role="alert">
                    Votre enchère a bien été prise en compte.
                </div>
        <?php }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myAuction = new Auction ($_POST["montant"]);
    $myAuction->verification();
}

// AFFICHAGE DES DETAILS DU PRODUIT

require __DIR__."/../dataBase.php";

$query = $dbh->prepare("SELECT * FROM `product` WHERE id_product='".$_GET['id']."'");
$query->execute();
$results = $query->fetchAll();
foreach($results as $result) { ?>
    <p>Titre: <?php echo $result['title']?></p>
    <p>Prix de depart: <?php echo $result['starting_price']?></p>
    <p>Dernier prix: <?php echo $result['last_price']?></p>
    <p>Date de fin: <?php echo $result['end_date']?></p>
    <p>Marque: <?php echo $result['mark']?></p>
    <p>Modele: <?php echo $result['model']?></p>
    <p>Puissance: <?php echo $result['power']?></p>
    <p>Annee: <?php echo $result['year']?></p>
    <p>Description: <?php echo $result['description']?></p>
<?php } ?>

 <!-- FORMULAIRE POUR ENCHERIR -->

<section class='formNewPrice'>
<form action='' method='post'>
    <input type='number' name='montant' id='new_valeur' placeholder='votre prix'>
    <button type='submit'>Encherir</button>
</form>
</section>

<?php

// AFFICHAGE DE L'HISTORIQUE

$historyAuction = $dbh->prepare("SELECT a.new_auction, a.date_auction, u.firstname FROM `auction` a LEFT JOIN `user` u ON u.id_user=a.id_user LEFT JOIN `product` p ON p.id_product=a.id_product WHERE p.id_product='".$_GET['id']."'");
$historyAuction->execute();
$results = $historyAuction->fetchAll();
echo "<h3>Enchere precedente:</h3>";
foreach($results as $result) { ?>
    <p><?php echo $result['new_auction']?>€, le <?php echo $result['date_auction']?> par <?php echo $result['firstname']?>.</p>
<?php } ?>