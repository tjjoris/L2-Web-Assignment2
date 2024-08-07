<?php
require_once "start_session.php";
$max_count = (count($_SESSION['show_threads']));
echo $max_count;
echo ($_SESSION['main_threads_page_number'] + 10);
//check if main threads page number in session is set.
if ((!isset($_SESSION['main_threads_page_number'])) && (empty($_SESSION['main_threads_page_number']))){
    // echo "main_threads_page_number in session not set";
    $_SESSION['main_threads_page_number'] = 0;
} 
else {
    if ($max_count > ($_SESSION['main_threads_page_number'] + 10)) {
        $_SESSION['main_threads_page_number'] = $_SESSION['main_threads_page_number'] + 10;
    }
}
echo $_SESSION['main_threads_page_number'];

header ("Location: show_multiple_threads.php");
?>