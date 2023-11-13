<?php
    // affiche les erreurs sur mac
    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    class Truc {

        public function connexion(){
            require __DIR__ ."/../database.php";

            $query = $dbh->prepare("SELECT * FROM ( SELECT * FROM `product` ORDER BY `id_product` DESC LIMIT 10 ) sub ORDER BY `id_product` ASC;");

            $query -> execute();

            $resultAll = $query->fetchALL();
            $this -> card ($resultAll);
        }

        public function card($tab){
            foreach($tab as $key => $element){
                
                echo "
                <div class='cardA' id='card-$key'> 
                    <div class='info'>";

                foreach($element as $x => $value){

                    if ($x == "title" || $x == "id_product" ||$x == "starting_price" ||$x == "last_price" ||$x == "end_date" ||$x == "model" ||$x == "mark" ||$x == "power" ||$x == "year" ||$x == "description" ||$x == "image") {
                        
                        if($x == "last_price" || $x == "starting_price"){
                            if($x == "last_price"){
                                echo "<div class='cla-$x'> Dernier prix : ". $value . " €</div>" ;
                            } else {
                                echo "<div class='cla-$x'> Prix inicial : ". $value . " €</div>" ;
                            }
                            
                        } else if ($x == "power"){
                            echo "<div class='cla-$x'> Puissance : ". $value . " ch</div>" ;


                        } else if($x == 'image'){
                            echo "<div class='cla-$x'>".'<img src="data:image/jpeg;base64,'.base64_encode($value).'"/></div>';
                        }  else {
                            
                            if ($x == 'title') {
                                echo "<div class='cla-$x'> Titre : ". $value . " </div>" ;
                            } else if ($x == 'mark') {
                                echo "<div class='cla-$x'> Marque : ". $value . " </div>" ;
                            } else if ($x == 'model') {
                                echo "<div class='cla-$x'> Modèle : ". $value . " </div>" ;
                            } else if ($x == 'power') {
                                echo "<div class='cla-$x'> Puissance : ". $value . " </div>" ;
                            } else if ($x == 'year') {
                                echo "<div class='cla-$x'> Année : ". $value . " </div>" ;
                            } else if ($x == 'description') {
                                echo "<div class='cla-$x'> Description : ". $value . " </div>" ;
                            }else if ($x == 'starting_price') {
                                echo "<div class='cla-$x'> Prix de départ : ". $value . " </div>" ;
                             } else if ($x == 'end_date'){
                                echo "<div class='cla-$x'> Date de fin d'enchère : ". $value . " </div>" ;
                            } else {
                                echo "<div class='cla-$x'>". $x . " : ". $value . " </div>" ;
                            }

                        }
                    }
                }
                echo     
                    "</div>
                    <div class='formNewPrice'>
                        <form action='' method='post'>
                            <input type='number' name='new_valeur' id='new_valeur' placeholder='votre prix'>
                            <button type='submit'>valider</button>
                        </form>
                    </div>
                </div>";
            }
        }
    }
    $myList = new Truc();
    $myList -> connexion();


?>
