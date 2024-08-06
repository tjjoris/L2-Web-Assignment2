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
require_once "sidebar.php";

echo " <div class='main'>";
    //get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";
require_once "start_session.php";

$_SESSION['last_page'] = "threads_main";

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
        $qry_all_threads="SELECT threads.id AS id, thread_name, posts.post_time AS post_time, logins.uname AS uname, threads.last_post_time AS last_post_time FROM threads LEFT JOIN posts ON posts.thread_id = threads.id LEFT JOIN logins ON logins.id = posts.login_id ORDER BY threads.last_post_time DESC";

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
            $op_name = $row['uname'];
            $post_time = $row['post_time'];
            $thread_id = $row['id'];
            // echo "<hr>";
        // }
    

            echo <<<_END
                        <div class="main-thread">
                            <a href="thread_redirect.php?thread_id=$thread_id">
                            <div class="user-profile">
                                <img src="images/userIcon.png">
                                <div>
                                    <p>$op_name / author</p>
                                    <span class="when-posted">$post_time</span>
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
</div>
<!-- <form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button> -->
</body>
</html>