<?php
require_once "start_session.php";
if ((isset($_SESSION)) && (isset($_GET)) && (isset($_GET['thread_id']))) {
    $_SESSION['thread_id'] = $_GET['thread_id'];
    header ("Location: thread2.php");
}
?>