<form class="connexionContainer" action="register.php" method="post" name="register">
    <h1 class="connexionTitle">S'inscrire</h1>
    <input type="text" class="connexionInput" name="lastname" placeholder="Nom" maxlength="25" required />
    <input type="text" class="connexionInput" name="firstname" placeholder="Prenom" maxlength="25" required />
    <input type="text" class="connexionInput" name="email" placeholder="Email" required />
    <input type="password" class="connexionInput" name="password" placeholder="Mot de passe*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
    <p class="textPassword">*Au moins 8 caractères, un chiffre, une lettre majuscule et une minuscule.</p>
    <input type="submit" name="submit" value="S'inscrire" class="connexionButton" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>