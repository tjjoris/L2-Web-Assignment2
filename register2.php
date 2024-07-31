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
    $uname_unsanitized = $_POST['uname'];
    $email_unsanitized = $_POST['email'];
    $pword_unsanitized = $_POST['pword'];
    $uname =  $conn->real_escape_string($uname_unsanitized);
    $email =  $conn->real_escape_string($email_unsanitized);
    $pword =  $conn->real_escape_string($pword_unsanitized);

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
        $hash = password_hash($pword, PASSWORD_DEFAULT);
        echo "$hash";
        $insert_query="INSERT INTO logins (uname, email, password) 
        VALUES ('$uname', '$email', '$hash')";
        if (($result_name->num_rows<=0) && ($result_email->num_rows<=0)){
            echo password_hash($pword, PASSWORD_DEFAULT);
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