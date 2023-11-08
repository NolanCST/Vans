<?php

require __DIR__."/form_register.php";

require __DIR__."/../classes/register.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myUser = new Register ($_POST["lastname"], $_POST["firstname"], $_POST["email"], $_POST["password"]);
    $myUser->save();
}