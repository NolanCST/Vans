<?php
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
        require __DIR__."/../dataBase.php";
        $query = $dbh->prepare("INSERT INTO `auction` (new_auction, date_auction) VALUES (:new_auction, NOW()");
        $query->bindValue(':new_auction', $this->montant, PDO::PARAM_STR);
        $results = $query->execute();
            if($results){ ?>
                <div class="alert alert-success" role="alert">
                    Votre enchère a bien été prise en compte.
                </div>
        <?php }
    }
}
