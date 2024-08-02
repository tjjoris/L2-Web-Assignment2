<?php


//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";


    session_start();
    $thread_id = $_SESSION['thread_id'];
    echo $thread_id;

    if (!$_SESSION['logged_in']) {
        header("Location:index.php");
    }

function show_thread($thread_id){
    echo "test";
    echo "$thread_id";
    //query for posts in thead
    $qry_select_thread="SELECT * FROM posts WHERE 'thread_id' = '$thread_id'";

    //create a new mysqli connection
    $conn=new mysqli($host,$user,$pass,$db);

    //run query to get posts
    $result_set = mysqli_query($conn, $qry_select_thread);

    //get the result from the query.
    $result = mysqli_fetch_assoc($result_set);

    foreach ($result as $item){
        echo $item;
    }
}
function test(){
    echo "test 1";
}

?>