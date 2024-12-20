<?php
ob_start();

//these are the login variables, instead of using them here, we get them from login_file.php.
// $host="localhost";
// $user="root";
// $pass="";
// $db="web_assign2";

//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

//create a new mysqli connection
// $conn=new mysqli($host,$user,$pass,$db);
//if sqli connection error print error message.
if ($conn->connect_error){
}
//else, you are connected.
else {
    //connected
    //check if POST exists, post is needed to get inputed variables in form.
    if (isset($_POST)) {
        //uname = user name from POST.
        $uname = $_POST['uname'];
        //password = password from POST.
        $password = $_POST['pword'];
        //un_temp = the sanitized user name
        $un_temp =  $conn->real_escape_string($uname);
        //pw_temp = the sanitized password
        $pw_temp =  $conn->real_escape_string($password);
        //query to find the login name which matches the login name from POST.
        $query = "SELECT * FROM logins WHERE uname='$un_temp'";
        //the result set from the query.
        $result_set = mysqli_query($conn, $query);
        if ($result_set->num_rows<=0) {
            
            Header("Location: index.php");
            die ("username not found");
        }
        else {
            //get the result from the query.
            $result = mysqli_fetch_assoc($result_set);
            //get the value of the password attribute form the result.
            $pw = $result['password'];
            //use password_verify() to verify if the passed password matches the hashed password in the DB.
            if (password_verify(str_replace("'", "", $pw_temp), $pw)) {
                //valid login
                session_start();
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['login_id'] = $result['id'];
                header ("Location: threads_main3.php");
                exit();
            }
            //couldn't login, print invalid user name/password combo.
            else {
                die ("Invalid username/password combination");
            }  
        }      
    }
}
?>
<form action="threads_main.php" method="POST" enctype="text/plain">
    <button type="submit" >Threads</button>
</form>
