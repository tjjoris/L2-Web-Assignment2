
<?php 
//start session
if (!isset($_SESSION)){
    session_start();
}
//if not logged in, go to login.
if (!$_SESSION['logged_in']) {
    header("Location:index.php");
}
?>