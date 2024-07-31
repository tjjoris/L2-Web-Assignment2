<?php

$host="localhost";
$user="root";
$pass="";
$db="web_assign2";
$conn=new mysqli($host,$user,$pass,$db);
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
else {
    echo "connected";
    if (isset($_POST)) {
        echo "<br>post detected";
        $uname = $_POST['uname'];
        $password = $_POST['pword'];
        // $sql="SELECT * FROM logins WHERE uname='$uname' and password='$password'";
        // $result=$conn->query($sql);
        //add if auth user and auth pw here
        // if (isset($_SERVER['PHP_AUTH_USER']) && 
        // isset($_SERVER['PHP_AUTH_PW'])) {
            // $un_temp = sanitize($conn, $_SERVER['PHP_AUTH_USER']);
            // $pw_temp = sanitize($conn, $_SERVER['PHP_AUTH_PW']);
            $un_temp = htmlentities($uname);
            $pw_temp = htmlentities($password);
            $un_temp = $uname;
            $pw_temp = $password;
            $un_temp =  $conn->real_escape_string($uname);
            $pw_temp =  $conn->real_escape_string($password);
            $query = "SELECT * FROM logins WHERE uname='$un_temp'";
            // $result = $conn->query($query);
            $result_set = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($result_set);
            $pw = $result['password'];
            if (password_verify(str_replace("'", "", $pw_temp), $pw)) {
    
            // if($result->num_rows>0){
                echo "<br>valid logon";
                echo password_hash($password, PASSWORD_DEFAULT);
                echo "<br>";
                echo password_hash("god", PASSWORD_DEFAULT);
                echo "<br>";
                echo password_hash("god", PASSWORD_DEFAULT);
            }
            else {
                echo "error, couldn't login";
                die ("Invalid username/password combination");
            }
        // }
        // else {
        //     echo "php auth user and pw not found";
        // }
        
    }
}

function sanitize($conn, $str) {
    $str = htmlentities($str);
    return $conn->quote($str);
}
?>