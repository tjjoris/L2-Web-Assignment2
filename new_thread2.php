
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width
    , initial-scale=1.0">
    <title>Post a Thread</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php
require_once "new_thread_script.php";
require_once "start_session.php";
if (isset($_SESSION['thread_id'])) {
    $thread_id = $_SESSION['thread_id'];
} else {
    $thread_id = NULL;
}

// if (isset($_POST)){
//     if $_SESSION['last_page'] == "threads_main";
// }


require_once "sidebar.php";
?>


    <!-- <form action="submit-new-thread.php" method="POST" enctype="text/plain"> -->
        <!-- <header>
            <img class="logo" src="images/ourLogo.png" alt="logo">
            <div class="search-box">
                <img src="images/search.png">
                <input type="text" placeholder="Search">
            </div>
            <a class="navBtn" href="#"><button class="navBtn">Sign In</button></a>
            <a class="navBtn" href="#"><button class="navBtn">Sign Up</button></a>
        </header>
        <div class="container"> -->
            <!-- <div class="left-bar">
                <div class="left-link">
                    <div class="new-threadBtn">
                        <form action="new_thread.php" method="POST" enctype="text/plain">
                            <a class="left-bar-Btn" href="new_thread.html"><button class="left-bar-Btn">Post A Thread</button></a>
                        </form>
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
            </div> -->
            <div class="main">
                <label class="title">New Topic</label><br>
                <form action="submit-new-thread.php" method="POST">
                    <div class="thread">
                        <div class="post" class="first-post">
                            <div class="thread-title-container">
                                <label for="writepost-title" class="title-label">Title:</label>
                                <input type="text" name="threadtitle" id="writepost-title"  class="writepost-text">
                            </div>
                            <div class="post-content">
                                <label for="content-content" class="message-label">Message:</label>
                                <textarea type="text" name="content-container" id="content-content" class="message-text">
                                </textarea>
                            </div>
                            <div class="post-button-container">
                                <button type="submit" class="T-Btn">Post</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    <!-- </form> -->
</body>
</html>