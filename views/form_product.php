<form   action="product.php" method="POST"  >


    <label for="title">Titre de l'annonce :</label><br/>
    <input name="title" type="text" maxlength="15"> </input><br/>

   <label for="mark">Marque:</label><br/>
    <input name="mark" type="text"> </input><br/>
    
    <label for="model">Modèle :</label><br/>
    <input name="model" type="text"> </input><br/>

    <label for="power">Puissance:</label><br/>
    <input name="power" type="text"> </input><br/>


    <label for="year">Année :</label><br/>
    <input name="year" type="number"> </input><br/>


    <label for="description">Description:</label><br/>
    <input name="description" type="text"> </input><br/>

    
    <label for="starting_price">Prix de départ:</label><br/>
    <input name="starting_price" type="number"> </input><br/>


    <label for="end_date">Date de fin de l'enchère:</label><br/>
    <input name="end_date" type="datetime-local"> </input><br/>

    <input type="submit" value= "Poster l'annonce"> </input><br/>
</form>

