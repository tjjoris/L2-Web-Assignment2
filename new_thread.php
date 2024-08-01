<?php
require_once "new_thread_script.php";
//$new_thread = new New_thread_class();
// class new_thread {
//     function __construct(){
//         echo "new thread";

//         echo <<<_END
//             <form action="threads_main.php" method="POST" enctype="text/plain">
//             <button type="submit" >Threads</button>
//             </form>
//         _END;


//     }

// }
echo <<<_END
<form action="submit-new-thread.php" method="POST" enctype="text/plain">
                <fieldset>
                <legend>New Topic</legend>
                <div class="thread">
                <input type="text" name="uname" id="uname">
                    <div class="post" class="first-post">
                        <div class="thread-title-container">
                            <label for="thread-title" class="title-label">Test Title:</label>
                            <input type="text" name='threadtitle' id="thread-title" placeholder="enter title here" class="title-text">
                        </div>
                        <div class="author-container">
                            <span class="author-label">Author</span>
                            <span class="author-text">Coolguy21</span>                        
                        </div>
                        <div class="post-container">
                            <label for="content-container" class="message-label">Message:</label>
                            <textarea type="text"or name="content-container" id="content-container" placeholder="enter post here" class="message-text">
                            </textarea>
                        </div>
                        <div class="post-button-container">
                            <button type="submit" >Threads</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
_END;
?>
