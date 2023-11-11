<form class="connexionContainer" action="register.php" method="post" name="register">
    <h1 class="connexionTitle">S'inscrire</h1>
    <input type="text" class="connexionInput" name="lastname" placeholder="Nom" maxlength="25" required />
    <input type="text" class="connexionInput" name="firstname" placeholder="Prenom" maxlength="25" required />
    <input type="text" class="connexionInput" name="email" placeholder="Email" required />
    <input type="password" class="connexionInput" name="password" placeholder="Mot de passe*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*_=+]).{12,}" required />
    <p class="textPassword">*Au moins 12 caractères, un chiffre, une lettre majuscule, une minuscule, un caractère parmi !@#$%^&*_=+.</p>
    <input type="submit" name="submit" value="S'inscrire" class="connexionButton" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>