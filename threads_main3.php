<?php
ob_start();
require_once "start_session.php";
//set thread page number to 0
$_SESSION['main_threads_page_number'] = 0;

//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

// $conn=new mysqli($host,$user,$pass,$db);
//if connection error send error message.
if ($conn->connect_error){
    // echo "failed to connect to db".$conn->connect_error;
}
//connected to db successfully. now to begin the registration process.
else {

    //post does not exist
    if ((!isset($_POST)) ){
    }
    //post exists
    else {
        //set the search input to an empty string in case the post value is empty.
        $search_input = " ";
        if ((isset($_POST['search_input'])) && (!empty($_POST['search_input'])))
        {
            $search_input = $_POST['search_input'];
        }
        //create a new mysqli connection
        // $conn=new mysqli($host,$user,$pass,$db);
                    
        //if sqli connection error print error message.
        if ($conn->connect_error){
            // echo "failed to connect to db".$conn->connect_error;
        }
        //else, you are connected.
        else {
            //run search
            //sanatize search input
            $sanatized_search_input =  $conn->real_escape_string($search_input);

            //add to thread query
            $qry_search="SELECT threads.id AS id FROM threads ORDER BY threads.last_post_time DESC";
            //get result set
            $result_set = mysqli_query($conn, $qry_search);
            
            //query has values
            if ($result_set) {

                $results_array = mysqli_fetch_all($result_set, MYSQLI_ASSOC);

                $_SESSION['show_threads'] = $results_array;
                header("Location: show_multiple_threads.php");
                exit();
            }
        }
    }
}
?>