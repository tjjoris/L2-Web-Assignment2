
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

require_once "login_file.php";

require_once "start_session.php";

require_once "sidebar.php";


echo "<div class='main'>";
echo "<div class='all-threads'>";

//check if session is set
if (!isset($_SESSION)){
    echo "session is not set";
}
else {
    $main_threads_page_number = 0;
    if ((!isset($_SESSION['main_threads_page_number'])) && (empty($_SESSION['main_threads_page_number']))){
        // echo "main_threads_page_number in session not set";
    } 
    else {
        $main_threads_page_number = $_SESSION['main_threads_page_number'];
    }

    
    echo $main_threads_page_number;


    if ((!isset($_SESSION['show_threads'])) && (empty($_SESSION['show_threads'])))
    {
        echo "_SESSION show threads empty";
    }
    else {
        $result_set = $_SESSION['show_threads'];

        // echo "showing threads";

        $count = 0;
        foreach ($result_set as $row) {
            // echo $main_threads_page_number;
            $current_thread_id = $row['id'];
            echo $count;
            echo "test";
            if (($count >= $main_threads_page_number) && ($count < $main_threads_page_number + 10)) {
                // }
                // for ($i = 2; $i < min(21, count($row)); $i++) {
                //     // $rows[$i]['id']
                //     echo $row[$i]['id'];
                    // $current_thread_id = $row[$i]['id'];
                
                    // echo $row['id'];

                //create a new mysqli connection
                // $conn = new mysqli($host,$user,$pass,$db,$port);

                //if sqli connection error print error message.
                if ($conn->connect_error){
                    echo "error here";
                    echo "failed to connect to db".$conn->connect_error;
                }
                //else, you are connected.
                else {
        
                    $qry_one_thread="SELECT threads.id AS id, thread_name, posts.post_time AS post_time, logins.uname AS uname FROM threads LEFT JOIN posts ON posts.thread_id = threads.id LEFT JOIN logins ON logins.id = posts.login_id WHERE threads.id = $current_thread_id";

                    //run query to get posts
                    $result_set = mysqli_query($conn, $qry_one_thread);
                    $first_record = mysqli_fetch_assoc($result_set);

                    $thread_id = $first_record['id'];
                    $thread_name = $first_record['thread_name'];
                    $post_time = $first_record['post_time'];
                    $uname = $first_record['uname'];

            
                    echo <<<_END
                    <div class="main-thread">
                        <a href="thread_redirect.php?thread_id=$thread_id">
                        <div class="user-profile">
                            <img src="images/userIcon.png">
                            <div>
                                <p>$uname / author</p>
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
            }
            $count ++;
        }
    }
}
echo <<<_END
                <div class='thread-navigation-buttons'>
                    <div class='navigation-container-left'>            
                        <a href='show_previous_10_threads.php'><img src='images/2left.png' alt='first_page' ></a>
                        <a href='show_previous_10_threads.php'><img src='images/1left.png' alt='previous_page'></a>
                    </div>
                    <div class='navigation-container-right'>
                        <a href='show_next_10_threads.php'><img src='images/2right.png' alt='next_page'></a> 
                        <a href='show_next_10_threads.php'><img src='images/1right.png' alt='last_page'></a>
                    </div>
                </div>
_END;
?>
</div>
</div>
</body>
</html>