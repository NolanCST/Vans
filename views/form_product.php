<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="product.css" />
    <title>Formproduct</title>
</head>
<body>
    <div class="bodyform">
    <form  class="box" action="product.php" method="POST"  >

    <h1 class="box-title">Que voulez - vous vendre ?</h1>

    <label for="title">Titre de l'annonce :</label><br/>
    <input  class="box-input" name="title" type="text" maxlength="15"> </input><br/>

   <label for="mark">Marque:</label><br/>
    <input class="box-input"  name="mark" type="text"> </input><br/>
    
    <label for="model">Modèle :</label><br/>
    <input class="box-input"  name="model" type="text"> </input><br/>

    <label for="power">Puissance:</label><br/>
    <input  class="box-input" name="power" type="text"> </input><br/>


    <label for="year">Année :</label><br/>
    <input  class="box-input" name="year" type="number"> </input><br/>


    <label for="description">Description:</label><br/>
    <input  class="box-input" name="description" type="text"> </input><br/>

    
    <label for="starting_price">Prix de départ:</label><br/>
    <input  class="box-input" name="starting_price" type="number"> </input><br/>


    <label for="end_date">Date de fin de l'enchère:</label><br/>
    <input  class="date-input" name="end_date" type="datetime-local"> </input><br/>

    <input type="submit" class="box-button" value= "Poster l'annonce"> </input><br/>
</form>
</div>
</body>
</html>


