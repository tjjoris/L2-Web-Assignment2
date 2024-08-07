
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


require_once "sidebar.php";
?>

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
</body>
</html>