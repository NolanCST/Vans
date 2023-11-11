<section class="box">
<form class="form-floating" action="login.php" method="post" name="login">
    <h1 class="box-title">Connexion</h1>
    <!-- <div class="form-group">
        <input type="email" class="box-input" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe" required>
    </div> -->
    <div class="form-floating mb-3">
        <input type="email" class="form-control transparent-input" id="floatingInput" name="email" placeholder="name@example.com">
        <label for="floatingInput">Adresse email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control transparent-input" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Mot de passe</label>
    </div>
    <div class="form-group">
        <input type="submit" value="Connexion " name="submit" class="btn btn-login btn-warning">
    </div>
    <div class="form-group">
        <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
    </div>


</form>
</section>
