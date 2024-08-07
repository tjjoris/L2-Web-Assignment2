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
//query to show 1 of each thread ordered by most recent.
else {
        $qry_all_threads = "
SELECT 
    threads.id AS id, 
    threads.thread_name AS thread_name, 
    threads.last_post_time AS last_post_time, 
    logins.uname AS uname 
FROM 
    threads 
LEFT JOIN 
    (SELECT 
        thread_id, 
        MAX(post_time) AS post_time 
     FROM 
        posts 
     GROUP BY 
        thread_id) max_posts 
ON 
    threads.id = max_posts.thread_id 
LEFT JOIN 
    posts 
ON 
    posts.thread_id = max_posts.thread_id 
    AND posts.post_time = max_posts.post_time 
LEFT JOIN 
    logins 
ON 
    logins.id = posts.login_id 
ORDER BY 
    threads.last_post_time DESC;
";

        //run query to get posts
        $result_set = mysqli_query($conn, $qry_all_threads);

        // Fetch and display the data
        while ($row = mysqli_fetch_assoc($result_set)) {
            $thread_name = $row['thread_name'];
            $op_name = $row['uname'];
            $post_time = $row['last_post_time'];
            $thread_id = $row['id'];
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
</body>
</html>