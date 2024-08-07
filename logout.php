
<?php
require_once "start_session.php";
$_SESSION['logged_in'] = FALSE;
session_destroy();
// require_once "start_session.php";
header ("Location: index.php");
?>