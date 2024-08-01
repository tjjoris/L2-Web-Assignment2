<?php
class New_thread_class {
    function __construct(){
        echo "new thread";

        echo <<<_END
            <form action="thread.php" method="POST" enctype="text/plain">
            <div class="thread-title-container">
            <label for="thread-title">Title:</label>
            <input type="text" name="thread-title" id="thread-title">
            </div>
            
            <button type="submit" >Threads</button>
            </form>
        _END;


    }

}

?>
