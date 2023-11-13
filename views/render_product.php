<?php ob_start();
session_start(); ?>

<?php
    require __DIR__."/../dataBase.php";
    $where="";
    @$keywords=$_GET["keywords"];
    @$valider=$_GET["valider"];
    if(isset($valider) && !empty(trim($keywords))) {
        // requête pour les recherches générales 
        $res=$dbh->prepare("select * from product where title like '%$keywords%' or mark like '%$keywords%' or model like '%$keywords%' or power like '%$keywords%' or year like '%$keywords%' or end_date like '%$keywords%' or last_price like '%$keywords%' or description like '%$keywords%' or starting_price like '%$keywords%' ");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tabs=$res->fetchAll();
        $afficher="oui";
    }
?>

<!-- Formulaire input pour la recherche rapide -->
<form class="form-filter" name="fo" method="post" action="">
    <h1> Recherche rapide</h1>
    <SELECT class="form-control" id="marque" name="marque"  >
        <option >--marque--</option>
            <?php 
                $res=$dbh->prepare("SELECT DISTINCT mark FROM product");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                $res->execute();
                $marque=$res->fetchAll();

                for($i=0; $i <count($marque);$i++) { ?>  
                    <option><?php echo $marque[$i]["mark"] ?></option>
                    <?php }
            ?>
    </SELECT>
    <SELECT class="form-control" id="model" name="modele"  >
        <option >--modele--</option>
            <?php 
                $res=$dbh->prepare("SELECT DISTINCT model FROM product");
                $res->setFetchMode(PDO::FETCH_ASSOC);
                $res->execute();
                $modele=$res->fetchAll();

                for($i=0; $i <count($modele);$i++) { ?>  
                    <option><?php echo $modele[$i]["model"] ?></option>
                    <?php }
            ?>
    </SELECT>


    <input class="input-filter-submit" type="submit" name="multisearch" value="Rechercher" />
</form>

<?php

// -----------------------------------------------------------


if(isset($_POST['multisearch']))
    {  
        $where = "select * from product where ";
        if ( !empty($_POST['marque']) ) 
        {
            $where = $where . 'mark like \'%' . $_POST['marque'] . '%\'';
        }
        if ( !empty($_POST['marque']) && !empty( $_POST['modele'] ) ) {
            $where = $where . 'or ';
        }
        if ( !empty($_POST['modele']) ) 
        {
            $where = $where . 'model like \'%' . $_POST['modele'] . '%\'';
        }
      
            $query = $dbh->prepare($where);
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
    }else if (@$afficher =="oui") {
            foreach ($tabs as $tab) {
                echo "<h1> Vente N° $tab[id_product]: </h1>";
                echo "<h2> Titre : $tab[title]</h2>"; 
                echo "<p> Description : $tab[description]</p>";
                echo "<p> Prix de départ : $tab[starting_price]</p>";
                echo "<p> Date de fin : $tab[end_date]</p>";
                echo "<p> ___________________</p>";
                }
    } else {
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
}


// requête générale de la database
?>

<!-- <div class="annonceContainer">
    <div class="annonce-search">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
            </ul>
        </div>
    </div>
        <button class="brn btn-lg btn-block btn-default-dark" type="submit">Rechercher</button>
    </div>
</div> -->

<?php
$content = ob_get_clean();
require_once("navigation.php");