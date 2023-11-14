<?php
session_start();
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
        var_dump($products['id_product']);

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
    $myAuction->save();
} ?>

<section class='formNewPrice'>
<form action='' method='post'>
    <input type='number' name='montant' id='new_valeur' placeholder='votre prix'>
    <button type='submit'>Encherir</button>
</form>
</section>
