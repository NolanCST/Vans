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
                    <div class='image'>image</div>
                    <div class='info'>";

                foreach($element as $x => $value){
        
                    if ($x == "id_product" ||$x == "starting_price" ||$x == "last_price" ||$x == "end_date" ||$x == "model" ||$x == "mark" ||$x == "power" ||$x == "year" ||$x == "description" /* ||$x == "image" */) {
                        
                        if($x == "last_price" || $x == "starting_price"){
                            echo "<div class='cla-$x'>". $x . " : ". $value . " €</div>" ;
                        } else if ($x == "power"){
                            echo "<div class='cla-$x'>". $x . " : ". $value . " ch</div>" ;
                        } /* else if($x == 'image'){
                            echo "<div class='cla-$x'> <img src='uploads/".$x."'></div>";
                        }  */else {
                            echo "<div class='cla-$x'>". $x . " : ". $value . " </div>" ;
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