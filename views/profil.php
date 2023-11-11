<?php
session_start();
if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit(); 
}

ob_start(); 

$id = $_SESSION['id'];
require __DIR__."/../dataBase.php";
$query = $dbh->prepare("SELECT * FROM `user` WHERE id_user=$id");
$query->execute();
$results = $query->fetchAll();
foreach ($results as $result) { ?>
    <form class="container" action="profil.php" method="POST">
        <h1>Profile</h1>
        <input class="profilElement" type="text" name="lastname" value="<?php echo $result['lastname']?>" maxlength="25" required/>
        <input class="profilElement" type="text" name="firstname" value="<?php echo $result['firstname']?>" maxlength="25" required/>
        <input class="profilElement" type="email" name="email" value="<?php echo $result['email']?>" required/>
        <input class="profilElement" type="password" name="password" placeholder="Modifier votre mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*_=+]).{12,}" required/>
        <input type="submit" name="submit" value="Modifier" class="profilButton"/>
    </form>
<?php }
require __DIR__."/../classes/profil.class.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateUser = new Profil ($_POST["lastname"], $_POST["firstname"], $_POST["email"], password_hash($_POST["password"],PASSWORD_DEFAULT));
    $updateUser->update();
} ?>

<?php
$content = ob_get_clean();
require_once("navigation.php");