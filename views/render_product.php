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



    echo "<div class='containerCardB'>";


    foreach ($results as $result => $elements) {
        echo "<div class='cardA'>
        <div class='info'>";


        foreach($elements as $key =>$element){
            if ($key == "title" /* || $key == "id_product" */ ||$key == "starting_price" ||$key == "last_price" ||$key == "end_date" ||$key == "model" ||$key == "mark" ||$key == "power" ||$key == "year" ||$key == "description" ||$key == "image") {
                 
                if($key == "last_price" || $key == "starting_price"){
                    if($key == "last_price"){
                        echo "<div class='cla-$key'> Dernier prix : ". $element . " €</div>" ;
                    } else {
                        echo "<div class='cla-$key'> Prix inicial : ". $element . " €</div>" ;
                    }
                    
                } else if ($key == "power"){
                    echo "<div class='cla-$key'> Puissance : ". $element . " ch</div>" ;


                } else if($key == 'image'){
                    echo "<div class='cla-$key'>".'<img src="data:image/jpeg;base64,'.base64_encode($element).'"/></div>';
                }  else {
                    
                    if ($key == 'title') {
                        echo "<div class='cla-$key'> Titre : ". $element . " </div>" ;
                    } else if ($key == 'mark') {
                        echo "<div class='cla-$key'> Marque : ". $element . " </div>" ;
                    } else if ($key == 'model') {
                        echo "<div class='cla-$key'> Modèle : ". $element . " </div>" ;
                    } else if ($key == 'power') {
                        echo "<div class='cla-$key'> Puissance : ". $element . " </div>" ;
                    } else if ($key == 'year') {
                        echo "<div class='cla-$key'> Année : ". $element . " </div>" ;
                    } else if ($key == 'description') {
                        echo "<div class='cla-$key'> Description : ". $element . " </div>" ;
                    }else if ($key == 'starting_price') {
                        echo "<div class='cla-$key'> Prix de départ : ". $element . " </div>" ;
                     } else if ($key == 'end_date'){
                        echo "<div class='cla-$key'> Date de fin d'enchère : ". $element . " </div>" ;
                    } else {
                        echo "<div class='cla-$key'>". $key . " : ". $element . " </div>" ;
                    }

                }
            
            }
        
        }
        echo "</div> </div>";

    }
}else if (@$afficher =="oui") {

    echo "<div class='containerCardB'>";

    foreach ($tabs as $tab => $elements ) {

        echo "<div class='cardA'>
        <div class='info'>";


        foreach($elements as $key =>$element){
            if ($key == "title" /* || $key == "id_product" */ ||$key == "starting_price" ||$key == "last_price" ||$key == "end_date" ||$key == "model" ||$key == "mark" ||$key == "power" ||$key == "year" ||$key == "description" ||$key == "image") {
                 
                if($key == "last_price" || $key == "starting_price"){
                    if($key == "last_price"){
                        echo "<div class='cla-$key'> Dernier prix : ". $element . " €</div>" ;
                    } else {
                        echo "<div class='cla-$key'> Prix inicial : ". $element . " €</div>" ;
                    }
                    
                } else if ($key == "power"){
                    echo "<div class='cla-$key'> Puissance : ". $element . " ch</div>" ;


                } else if($key == 'image'){
                    echo "<div class='cla-$key'>".'<img src="data:image/jpeg;base64,'.base64_encode($element).'"/></div>';
                }  else {
                    
                    if ($key == 'title') {
                        echo "<div class='cla-$key'> Titre : ". $element . " </div>" ;
                    } else if ($key == 'mark') {
                        echo "<div class='cla-$key'> Marque : ". $element . " </div>" ;
                    } else if ($key == 'model') {
                        echo "<div class='cla-$key'> Modèle : ". $element . " </div>" ;
                    } else if ($key == 'power') {
                        echo "<div class='cla-$key'> Puissance : ". $element . " </div>" ;
                    } else if ($key == 'year') {
                        echo "<div class='cla-$key'> Année : ". $element . " </div>" ;
                    } else if ($key == 'description') {
                        echo "<div class='cla-$key'> Description : ". $element . " </div>" ;
                    }else if ($key == 'starting_price') {
                        echo "<div class='cla-$key'> Prix de départ : ". $element . " </div>" ;
                     } else if ($key == 'end_date'){
                        echo "<div class='cla-$key'> Date de fin d'enchère : ". $element . " </div>" ;
                    } else {
                        echo "<div class='cla-$key'>". $key . " : ". $element . " </div>" ;
                    }

                }
            
            }
        
        }
        echo "</div> </div>";
    }
} else {


    $query = $dbh->prepare("SELECT * FROM product");
    $query->execute();
    $results = $query->fetchAll();

    echo "<div class='list'>";

    foreach ($results as $result => $elements) {
        echo "<div class='cardA'>
        <div class='info'>";

        foreach($elements as $key =>$element){
            if ($key == "title" /* || $key == "id_product" */ ||$key == "starting_price" ||$key == "last_price" ||$key == "end_date" ||$key == "model" ||$key == "mark" ||$key == "power" ||$key == "year" ||$key == "description" ||$key == "image") {
                 
                if($key == "last_price" || $key == "starting_price"){
                    if($key == "last_price"){
                        echo "<div class='cla-$key'> Dernier prix : ". $element . " €</div>" ;
                    } else {
                        echo "<div class='cla-$key'> Prix inicial : ". $element . " €</div>" ;
                    }
                    
                } else if ($key == "power"){
                    echo "<div class='cla-$key'> Puissance : ". $element . " ch</div>" ;


                } else if($key == 'image'){
                    echo "<div class='cla-$key'>".'<img src="data:image/jpeg;base64,'.base64_encode($element).'"/></div>';
                }  else {
                    
                    if ($key == 'title') {
                        echo "<div class='cla-$key'> Titre : ". $element . " </div>" ;
                    } else if ($key == 'mark') {
                        echo "<div class='cla-$key'> Marque : ". $element . " </div>" ;
                    } else if ($key == 'model') {
                        echo "<div class='cla-$key'> Modèle : ". $element . " </div>" ;
                    } else if ($key == 'power') {
                        echo "<div class='cla-$key'> Puissance : ". $element . " </div>" ;
                    } else if ($key == 'year') {
                        echo "<div class='cla-$key'> Année : ". $element . " </div>" ;
                    } else if ($key == 'description') {
                        echo "<div class='cla-$key'> Description : ". $element . " </div>" ;
                    }else if ($key == 'starting_price') {
                        echo "<div class='cla-$key'> Prix de départ : ". $element . " </div>" ;
                     } else if ($key == 'end_date'){
                        echo "<div class='cla-$key'> Date de fin d'enchère : ". $element . " </div>" ;
                    } else {
                        echo "<div class='cla-$key'>". $key . " : ". $element . " </div>" ;
                    }

                }
            
            }
        
        }
        echo "
            </div> 
                <div class='formNewPrice'>
                    <form action='' method='post'>
                        <input type='number' name='new_valeur' id='new_valeur' placeholder='votre prix'>
                        <button type='submit'>valider</button>
                    </form>
                </div>
            </div>";
    }
    echo"</div>";

}


// requête générale de la database
?>


<script>
    let r = false;

    let doc = document.querySelectorAll(".cardA .image, .cardA .info");

    doc.forEach(box => {
        box.addEventListener("click", function(e) {

            let trouver = document.querySelector(".cardA.active");

            console.log("hello", box.parentElement);
            console.log("hello", e.target.parentElement.id);

            if (r == true || r == null) {
                box.parentElement.classList.remove("active");
                document.querySelector(".list").classList.remove("active");
                document.querySelector("body").classList.remove("active");
                r = false;
            } else if (r == false) {
                box.parentElement.classList.add("active");
                document.querySelector(".list").classList.add("active");
                document.querySelector("body").classList.add("active");
                r = true;
            }
        });
    })


    let trouver = document.querySelector(".cardA");

    trouver.addEventListener(DOMContentLoaded, (event) => {
        alert('coucou');
    })
</script>
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