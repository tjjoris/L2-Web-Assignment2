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
    if ((isset($_POST['threadtitle']))) {
        echo "tread title isset";
        //thread title is not empty
        if (!empty($_POST['threadtitle'])) {
            $threadtitle=$_POST['threadtitle'];
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
                $query_insert="INSERT INTO threads (thread_name) VALUES ('$threadtitle')";
                // $insert_query="INSERT INTO logins (uname, email, password) 
                //         VALUES ('$uname', '$email', '$hash')";
                
                //insert thread into table
                $result_set = mysqli_query($conn, $query_insert);
                //get last surrogate key
                // $result_set = mysqli_query($conn, $query_insert);
                
                //get last surrogate key query
                $query_get_last_key="SELECT LAST_INSERT_ID()";
                

            }

        } else {
            echo "thread title is empty";
        }
    }
    else {
    echo "post var not set";
    }
}
}


?>