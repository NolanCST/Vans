<?php ob_start(); ?>
<h1>TestTemplate</h1>

<?php
$content = ob_get_clean();
require_once("./layouts/navigation.php");