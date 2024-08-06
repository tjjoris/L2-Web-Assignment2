<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
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
$conn = new mysqli($host,$user,$pass,$db,$port);

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
            // echo "Thread ID: " . $row['id'] . "<br>";
            // echo "Thread Title: " . $row['thread_name'] . "<br>";
            $thread_name = $row['thread_name'];
            $op_name = $row['uname'];
            $post_time = $row['post_time'];
            $message = $row['message'];
            // echo $message;
        }
    }
    else {
        echo "thread number not set";
    }

}

if ((isset($_SESSION)) && (isset($_SESSION[''])) && ($_SESSION[''])) {

}
?>

    <form action="thread.php" method="POST" enctype="text/plain">
        <header>
            <img class="logo" src="images/ourLogo.png" alt="logo">
            <div class="search-box">
                <img src="images/search.png">
                <input type="text" placeholder="Search">
            </div>
            <nav>
            </nav>
            <a class="navBtn" href="#"><button class="navBtn">Sign In</button></a>
            <a class="navBtn" href="#"><button class="navBtn">Sign Up</button></a>
        </header>
        <div class="container">
            <div class="left-bar">
                <div class="left-link">
                    <div class="new-threadBtn">
                        <form action="new_thread.php" method="POST" enctype="text/plain"></form>
                        <a class="left-bar-Btn" href="new_thread.html"><button class="left-bar-Btn">Post A Thread</button></a>
                    </div>
                    <a href="threads_main.html">Home</a>
                    <a href="#MostPopular">Most popular</a>
                </div>
                <div class="left-topic">
                    <p>Topics</p>
                    <a href="#topic1"><u>All kittens are cute because</u></a>
                    <a href="#topic2"><u>I wish kittens were fuzzier.</u></a>
                    <a href="#topic3"><u>Need advice on how to dye my kitten</u></a>
                    <a href="#topic4"><u>Why cats make the best pets</u></a>
                </div>
            </div>
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
                    // echo "Thread ID: " . $row['id'] . "<br>";
                    // echo "Thread Title: " . $row['thread_name'] . "<br>";
                    $thread_name = $row['thread_name'];
                    $uname = $row['uname'];
                    $post_time = $row['post_time'];
                    $message = $row['message'];
                    // php to display each post in thread
                    echo <<<_END
                        <div class="main-thread">
                            <a href="#mainpost1">
                            <div class="user-profile">
                                <img src="images/userIcon.png">
                                <div>
                                    <p>$uname / author</p>
                                    <span>$post_time</span>
                                </div>
                            </div>
                            <div class="main-thread-title">
                                $message
                                TEST123
                            </div>
                            </a>
                        </div>
                        
                    _END;
                }
            }
        }
                ?>
                </div>

        

            <!-- <div class="thread">
                <div class="post" class="first-post">
                    
                    <div class="author-container">
                        <span class="author-label">Author</span>
                        <span class="author-text">Coolguy21</span>                        
                    </div>
                    <div class="post-container">
                        <div >
                            Jan, 21, 2024
                        </div>
                         <div class="posted-text">
                            
                         </div>
                    </div>
                </div>


                <div class="post">
                    <div class="author-container">
                        <span class="author-label">Author</span>
                        <span class="author-text">SomeDude</span>                        
                    </div>
                    <div class="when-posted">
                        Jan, 21, 2024
                    </div>
                    <div class="post-container">
                         <div class="posted-text">
                            No i think kittns R dumb lol.
                         </div>
                    </div>
                </div>
                -----   
                <div class="post">
                    <div class="author-container">
                        <span class="author-label">Author</span>
                        <span class="author-text">AnotherPerson</span>                        
                    </div>
                    <div class="when-posted">
                        Jan, 21, 2024
                    </div>
                    <div class="post-container">
                         <div class="posted-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                         </div>
                    </div>
                </div> -->

                <!-- thread response -->
                <!-- <div class="post">
                    
                    <div class="post-container">
                        <div class="author-container">
                            <span class="author-label">Author</span>
                            <span class="author-text">Me283838</span>                        
                        </div>
                        <label for="content-container" class="message-label">Message:</label>
                        <textarea type="text" name="content-container" id="content-container" placeholder="enter post here" class="message-text">
                        </textarea>
                    </div>
                    <div class="post-button-container">
                        <button type="submit" >Reply</button>
                    </div>
                </div> -->

                 <div class="thread-navigation-buttons">
                    <div class="navigation-container-left">            
                        <a href="#first_page"><img src="images/2left.png" alt="first_page" ></a>
                        <a href="#previous_page"><img src="images/1left.png" alt="previous_page"></a>
                    </div>
                    <div class="navigation-container-right">
                        <a href="#next_page"><img src="images/2right.png" alt="next_page"></a>
                        <a href="#last_page"><img src="images/1right.png" alt="last_page"></a>
                    </div>
                </div>
            </div>
    </form>
</body>
</html>