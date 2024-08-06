<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    
<header>
        <img class="logo" src="images/ourLogo.png" alt="logo">
        <div class="search-box">
            <img src="images/search.png">
            <input type="text" placeholder="Search">
        </div>
        <a class="navBtn" href="#"><button class="navBtn">Sign In</button></a>
        <a class="navBtn" href="#"><button class="navBtn">Sign Up</button></a>
    </header>
    <div class="container">
        <div class="left-bar">
            <div class="left-link">
                <!-- <a class="left-bar-Btn" href="new_thread.html"> -->
                <form action="new_thread2.php" method="POST" enctype="text/plain">
                    <button class="left-bar-Btn" type="submit">Post A Thread</button>
                </form>
                <!-- </a> -->
                <a href="#Home">Home</a>
                <a href="#MostPopular">Most popular</a>
            </div>
            <div class="left-topic">
                <p>Topics</p>
                <a href="thread.html"><u>All kittens are cute because</u></a>
                <a href="#topic2"><u>I wish kittens were fuzzier.</u></a>
                <a href="#topic3"><u>Need advice on how to dye my kitten</u></a>
                <a href="#topic4"><u>Why cats make the best pets</u></a>
            </div>
        </div>
            <div class="main">
    
<?php
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
        $qry_all_threads="SELECT threads.id AS id, thread_name, posts.post_time AS post_time, logins.uname AS uname FROM threads LEFT JOIN posts ON posts.thread_id = threads.id LEFT JOIN logins ON logins.id = posts.login_id";

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
<form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button>
</body>
</html>