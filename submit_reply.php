<?php

require_once "start_session.php";
//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

$conn=new mysqli($host,$user,$pass,$db);
//if connection error send error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
//connected to db successfully. now to begin the registration process.
else {

    //post does not exist
if ((!isset($_POST)) ){
    echo "nothing";
}
//post exists
else {
    //thread title exists
    if ((isset($_POST['content-container'])) && (!empty($_POST['content-container'])) && (isset($_SESSION)) && (isset($_SESSION['thread_id'])) && (!empty($_SESSION['thread_id']))) {
        $content=$_POST['content-container'];
        $thread_number = $_SESSION['thread_id'];
        $login_id = $_SESSION['login_id'];

        //create a new mysqli connection
        $conn=new mysqli($host,$user,$pass,$db);

                        
        //if sqli connection error print error message.
        if ($conn->connect_error){
            echo "failed to connect to db".$conn->connect_error;
        }
        //else, you are connected.
        else {
            //add to thread query
            $qry_insert_threads="INSERT INTO posts (thread_id, login_id, post_time, message) VALUES ('$thread_number', '$login_id', NOW(), '$content')";
            $result_set = mysqli_query($conn, $qry_insert_threads);
        }
        header("Location: thread2.php");
    }
    else {
        echo "_POST or _SESSION empty";
    }
}
}