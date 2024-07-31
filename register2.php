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
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pword = $_POST['pword'];
    if (isset($_POST)) {
        $matching_name="SELECT * FROM logins WHERE uname='$uname'";
        $matching_email="SELECT * FROM logins WHERE email='$email'";
        $result_name=$conn->query($matching_name);
        $result_email=$conn->query($matching_email);
        if($result_name->num_rows>0){
            echo "<br>name is taken";
        }
        if ($result_email->num_rows>0){
            echo "<br>emamil is taken";
        }
        $insert_query="INSERT INTO logins (uname, email, password) 
        VALUES ('$uname', '$email', '$pword')";
        if (($result_name->num_rows<=0) && ($result_email->num_rows<=0)){
            $conn->query($insert_query);
        }
        echo "<br>post detected";
        // $uname = $_POST['uname'];
        // $password = $_POST['pword'];
        // $sql="SELECT * FROM logins WHERE uname='$uname' and password='$password'";
        // $result=$conn->query($sql);
        // if($result->num_rows>0){
        //     echo "<br>valid logon";
        // }
    }
}
?>