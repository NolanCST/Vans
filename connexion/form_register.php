<form class="box" action="register.php" method="post" name="register">
    <h1 class="box-title">S'inscrire</h1>
    <input type="text" class="box-input" name="lastname" placeholder="Nom" maxlength="25" required />
    <input type="text" class="box-input" name="firstname" placeholder="Prenom" maxlength="25" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
    <p class="textPassword">*Au moins 8 caractères, un chiffre, une lettre majuscule et une minuscule.</p>
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>