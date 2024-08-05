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

    function show_thread($thread_id){
    echo "test";
    echo "$thread_id";
    //query for posts in thead
    $qry_select_thread="SELECT * FROM posts WHERE 'thread_id' = '$thread_id'";

    //run query to get posts
    $result_set = mysqli_query($conn, $qry_select_thread);

    //get the result from the query.
    $result = mysqli_fetch_assoc($result_set);

    foreach ($result as $item){
        echo $item;
    }
}

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
                            All kittens are cute because
                    </div>
                    </a>
                    </div>  
            _END;
}

?>

<form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button>
</body>
</html>