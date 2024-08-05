<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
<?php
    //get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

//create a new mysqli connection
$conn = new mysqli($host,$user,$pass,$db,$port);

//if sqli connection error print error message.
if ($conn->connect_error){
    echo "error here";
    echo "failed to connect to db".$conn->connect_error;
}
//else, you are connected.
else {
    // require_once "start_session.php";
    // $thread_id = $_SESSION['thread_id'];
    // echo $thread_id;

    // if (!$_SESSION['logged_in']) {
    //     header("Location:index.php");
    // }
    // function show_thread($thread_id){
        //query for posts in thead
        // $qry_select_thread="SELECT * FROM posts WHERE 'thread_id' = '$thread_id'";
        $qry_all_threads="SELECT * FROM threads";

        //run query to get posts
        $result_set = mysqli_query($conn, $qry_all_threads);

        //get the result from the query.
        // $result = mysqli_fetch_assoc($result_set);
        // echo $result['thread_name'];
        // echo "stuff";
        // foreach ($result as $item){
        //     echo $item;
        //     // if ($item['thread_name'] != null) {
        //     //     echo $item['thread_name'];
        //     // }
        // }

        // Fetch and display the data
        while ($row = mysqli_fetch_assoc($result_set)) {
            // echo "Thread ID: " . $row['id'] . "<br>";
            // echo "Thread Title: " . $row['thread_name'] . "<br>";
            $thread_name = $row['thread_name'];
            // echo "<hr>";
        // }
    

            echo <<<_END
                        <div class="main-thread">
                            <a href="thread.html">
                            <div class="user-profile">
                                <img src="images/userIcon.png">
                                <div>
                                    <p>User name / author</p>
                                    <span class="when-posted">July 24 2023 2:31 PM</span>
                                </div>
                            </div>
                            <div class="main-thread-title">
                                    $thread_name
                            </div>
                            </a>
                            </div>  
                    _END;
        }
    // }
}

?>

<form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button>
</body>
</html>