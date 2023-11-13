
<?php ob_start();
session_start(); ?>
<?php
    require __DIR__."/../dataBase.php";
    @$keywords=$_GET["keywords"];
    @$valider=$_GET["valider"];
    if(isset($valider) && !empty(trim($keywords))) {
        // include("render_product.php");
        $res=$dbh->prepare("select * from product where title like '%$keywords%' or mark like '%$keywords%' or model like '%$keywords%' or power like '%$keywords%' or year like '%$keywords%' or end_date like '%$keywords%' or last_price like '%$keywords%' or description like '%$keywords%' or starting_price like '%$keywords%' ");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab=$res->fetchAll();
        $afficher="oui";
    }
?>
<form class="form-filter" name="fo" method="get" action="">
    <input class="input-filter-search" value="<?php echo $keywords ?>" type="text" name="keywords"  placeholder="Mots-clés" />
    <input class="input-filter-submit" type="submit" name="valider" value="Rechercher" />
</form>
<?php if (@$afficher =="oui") {?>
    <div id="resultats">
        <div id="nbr"><?=count($tab). " ".(count($tab)>1?"résultats trouvés":"résultat trouvé") ?></div>
        <ol>
            <?php for($i=0; $i <count($tab);$i++) { ?>  
            <li><?php echo $tab[$i]["title"] ?></li>
            <?php } ?>
        </ol>
    </div>
<?php } ?>

<?php



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