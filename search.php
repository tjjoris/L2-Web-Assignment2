<?php
echo "test";
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
        echo "should begin to run search";
        if ((isset($_POST['search_input'])) && (!empty($_POST['search_input'])))
        {
            echo "should run search";
            $search_input = $_POST['search_input'];
            //create a new mysqli connection
            $conn=new mysqli($host,$user,$pass,$db);
                        
            //if sqli connection error print error message.
            if ($conn->connect_error){
                echo "failed to connect to db".$conn->connect_error;
            }
            //else, you are connected.
            else {
                echo "running search";
                //add to thread query
                $qry_search="SELECT threads.id AS id FROM threads JOIN posts ON threads.id = posts.thread_id WHERE message LIKE '%$search_input%'";
                //get result set
                $result_set = mysqli_query($conn, $qry_search);
                
                //query has values
                if ($result_set) {

                    $results_array = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

                    $_SESSION['show_threads'] = $results_array;
                    header("Location: show_multiple_threads.php");
                }
            }
        }
    }
}
?>