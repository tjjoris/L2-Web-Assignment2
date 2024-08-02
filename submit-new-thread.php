<?php


//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

$var = $_POST['threadtitle'];
echo $var;

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
    if ((isset($_POST['threadtitle'])) && (!empty($_POST['threadtitle']))
        && (isset($_POST['content-container'])) && (!empty($_POST['content-container']))) {
            $threadtitle=$_POST['threadtitle'];
            $content_container=$_POST['content-container'];
            echo "thread title is not empty";
            echo $_POST['threadtitle'];
            
            //create a new mysqli connection
            $conn=new mysqli($host,$user,$pass,$db);

                        
            //if sqli connection error print error message.
            if ($conn->connect_error){
                echo "failed to connect to db".$conn->connect_error;
            }
            //else, you are connected.
            else {
                //add to thread query
                $qry_insert_threads="INSERT INTO threads (thread_name) VALUES ('$threadtitle')";
                
                //get last surrogate key query
                $qry_thread_key="SELECT LAST_INSERT_ID() FROM threads";

                
                
                //insert thread into table
                $result_set = mysqli_query($conn, $qry_insert_threads);

                //get surrogate key of last inserted row.
                $last_id = $conn->insert_id;
                
                $qry_insert_posts="INSERT INTO posts (thread_id, login_id, post_time, message) 
                        VALUES ('$last_id', '1', NOW(), '$content_container')";

                //insert into posts
                $result_set = mysqli_query($conn, $qry_insert_posts);
                
                

            }

        } else {
            echo "thread values not set";
        }
    }
}


?>