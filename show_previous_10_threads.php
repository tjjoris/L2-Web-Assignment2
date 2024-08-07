<?php
require_once "start_session.php";

//check if main threads page number in session is set.
if ((!isset($_SESSION['main_threads_page_number'])) && (empty($_SESSION['main_threads_page_number']))){
    // echo "main_threads_page_number in session not set";
    $_SESSION['main_threads_page_number'] = 0;
} 
else {
    $_SESSION['main_threads_page_number'] = $_SESSION['main_threads_page_number'] - 10;
    if ($_SESSION['main_threads_page_number'] < 0) {
        $_SESSION['main_threads_page_number'] = 0;
    }
}
header ("Location: show_multiple_threads.php");
?>