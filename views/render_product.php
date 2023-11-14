<?php ob_start();
session_start(); ?>

<!-- // requête pour les recherches générales  -->
<?php
    require __DIR__."/../dataBase.php";
    $where="";
    @$keywords=$_GET["keywords"];
    @$valider=$_GET["valider"];
    if(isset($valider) && !empty(trim($keywords))) {    
        $res=$dbh->prepare("select * from product where title like '%$keywords%' or mark like '%$keywords%' or model like '%$keywords%' or power like '%$keywords%' or year like '%$keywords%' or end_date like '%$keywords%' or last_price like '%$keywords%' or description like '%$keywords%' or starting_price like '%$keywords%' ");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tabs=$res->fetchAll();
        $afficher="oui";
    }
?>

<!-- Formulaire input pour la recherche rapide -->

<form class="form-filter" name="fo" method="post" action="">
    <div class="filter-title">
        <h1> Recherche rapide</h1>
    </div>
    <div class="filter-group">
        <div class="input-group mb-3 input-multi-search">
            <label class="input-group-text" for="inputGroupSelect01">Marque</label>
            <select class="form-select" id="inputGroupSelect01" name="marque">
                <option selected>... Choisir votre marque ...</option>
                    <?php 
                        $res=$dbh->prepare("SELECT DISTINCT mark FROM product");
                        $res->setFetchMode(PDO::FETCH_ASSOC);
                        $res->execute();
                        $marque=$res->fetchAll();

                        for($i=0; $i <count($marque);$i++) { ?>  
                            <option><?php echo $marque[$i]["mark"] ?></option>
                            <?php }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3 input-multi-search">
            <label class="input-group-text" for="inputGroupSelect02">Modèle</label>
            <select class="form-select" id="inputGroupSelect01" name="modele"  >
                <option >-- Choisir le modèle de la voiture --</option>
                    <?php 
                        $res=$dbh->prepare("SELECT DISTINCT model FROM product");
                        $res->setFetchMode(PDO::FETCH_ASSOC);
                        $res->execute();
                        $modele=$res->fetchAll();

                        for($i=0; $i <count($modele);$i++) { ?>  
                            <option><?php echo $modele[$i]["model"] ?></option>
                            <?php }
                    ?>
            </select>
        </div>
        <div>
            <input class="btn btn-outline-warning" type="submit" name="multisearch" value="Rechercher" />
        </div>
    </div>        
</form>

<?php

// ----> Condition pour les différentes types de recherches (générale, multi, nav) <----

if(isset($_POST['multisearch']))
    {  
        // affiche la demande lié au multisearch
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
        // affiche la demande lié au search nav
        foreach ($tabs as $tab) {
            echo "<h1> Vente N° $tab[id_product]: </h1>";
            echo "<h2> Titre : $tab[title]</h2>"; 
            echo "<p> Description : $tab[description]</p>";
            echo "<p> Prix de départ : $tab[starting_price]</p>";
            echo "<p> Date de fin : $tab[end_date]</p>";
            echo "<p> ___________________</p>";
            }
    } else { 
            // requête et affichage générale de la database
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
?>


<?php
$content = ob_get_clean();
require_once("navigation.php");