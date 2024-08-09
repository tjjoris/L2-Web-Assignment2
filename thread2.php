<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php
//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";
require_once "start_session.php";
$thread_number = NULL;
$result_set = NULL;


if ((isset($_SESSION))) {
    $thread_number = $_SESSION['thread_id'];
}

//create a new mysqli connection
// $conn = new mysqli($host,$user,$pass,$db,$port);

//if sqli connection error print error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
else {
    if (($thread_number != null) && (isset($thread_number))) {
        //query to get this thread title.
        $qry_this_thread="SELECT threads.thread_name AS thread_name, posts.post_time AS post_time, logins.uname AS uname, posts.message AS message FROM threads JOIN posts ON posts.thread_id = threads.id JOIN logins ON logins.id = posts.login_id WHERE posts.thread_id = $thread_number";
        
        //run query to get posts
        $result_set = mysqli_query($conn, $qry_this_thread);

        while ($row = mysqli_fetch_assoc($result_set)) {
            $thread_name = $row['thread_name'];
            $op_name = $row['uname'];
            $post_time = $row['post_time'];
            $message = $row['message'];
        }
    }
    else {
        echo "thread number not set";
    }

}


require_once "sidebar.php";

?>
            <?php
            echo <<<_END
            <div class="post-title"><h1>$thread_name</h1>
            
                <div class="post-threads">
            _END;
                       
                //if sqli connection error print error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
else {
    if (($thread_number != null) && (isset($thread_number))) {
        //query to get this thread.
        $qry_this_thread="SELECT threads.thread_name AS thread_name, posts.post_time AS post_time, logins.uname AS uname, posts.message AS message FROM threads JOIN posts ON posts.thread_id = threads.id JOIN logins ON logins.id = posts.login_id WHERE posts.thread_id = $thread_number";

        //run query to get posts
        $result_set = mysqli_query($conn, $qry_this_thread);

                while ($row = mysqli_fetch_assoc($result_set)) {
                    $thread_name = $row['thread_name'];
                    $uname = $row['uname'];
                    $post_time = $row['post_time'];
                    $message = $row['message'];
                    // php to display each post in thread
                    echo <<<_END
                        <div class="post-container">
                            <div class="user-profile">
                                <img src="images/userIcon.png">
                                <div>
                                    <p>$uname / author</p>
                                    <span>$post_time</span>
                                </div>
                            </div>
                            <div class="main-thread-title">
                                $message
                            </div>
                        </div>                        
                        <hr>
                        
                    _END;
                }
            }
        }

        
                ?>
                </div>

                <!-- area to respond to thread -->
                 <form action="submit_reply.php" method="POST">
                    <div class="post">
                        
                        <div class="post-container">
                            <div class="author-container">                     
                            </div>
                            <label for="content-container" class="message-label">Message:</label>
                            <br>
                            <textarea type="text" name="content-container" id="content-container" placeholder="enter post here" class="message-text"></textarea>
                        </div>
                        <div class="post-button-container">
                            <button class="T-Btn" type="submit" >Reply</button>
                        </div>
                    </div>
                </form>

                 <div class="thread-navigation-buttons">
                    <div class="navigation-container-left">  
                    </div>
                    <div class="navigation-container-right">
                    </div>
                </div>
            </div>
    <!-- </form> -->
</body>
</html>