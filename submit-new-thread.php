<?php


//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";


if ((!isset($_POST)) ){
    echo "nothing";
}
else {
    if (true || (isset($_POST['threadtitle']))) {
        echo "tread title isset";
        if (!empty($_POST['threadtitle'])) {
            echo "thread title is not empty";
            echo $_POST['threadtitle'];
            // global $thread_title=$_POST['thread-title'];
        } else {
            echo "thread title is empty";
            // echo "$_POST['thread-title']";

        }
        $testvar=$_POST['uname'];
        echo $testvar;
        // $thread_title=$_POST['threadtitle'];
        echo $thread_title;
    }
    else {
    echo "post var not set";
    }
}
    //create a new mysqli connection
$conn=new mysqli($host,$user,$pass,$db);
//if sqli connection error print error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
//else, you are connected.
else {
    //add to thread query
    // $query_insert="INSERT INTO threads (thread_name) VALUES ('$thread_title')";
    // $insert_query="INSERT INTO logins (uname, email, password) 
    //         VALUES ('$uname', '$email', '$hash')";
    //get last surrogate key query
    $query_get_last_key="SELECT LAST_INSERT_ID()";
    
    //insert thread into table
    // $result_set = mysqli_query($conn, $query_insert);
    //get last surrogate key
    // $result_set = mysqli_query($conn, $query_insert);
    

}


?>