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
        $sql="SELECT * FROM logins WHERE uname='$uname' and password='$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo "<br>valid logon";
            echo password_hash($pword, PASSWORD_DEFAULT);
            echo "<br>";
            echo password_hash("god", PASSWORD_DEFAULT);
            echo "<br>";
            echo password_hash("god", PASSWORD_DEFAULT);
        }
    }
}
?>