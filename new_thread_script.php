<?php
class New_thread_class {
    function __construct(){
        echo "new thread";

        echo <<<_END
            <form action="thread.php" method="POST" enctype="text/plain">
            
            <button type="submit" >Threads</button>
            </form>
        _END;


    }

}

?>
