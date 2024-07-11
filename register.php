<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    register test
</body>
</html>

<?php 
// function post() {
    echo "you have registered " . $_POST['fname'];
// }
 ?>


<!-- not sure what i'm doing here yet -->

<!-- 
 <?php
 /*
include 'connect.php';

if (isset($_POST['signup'])){
    $firstName=$_Post['fname']
    $pword=$_Post['pword'];
    $pword=md5($pword);

    $checkEmail="SELECT * From users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists!";
    }
    else {
        $insertQuery="INERT INTO users(fname, pword)
        Values ('$fname', '$pword');"
        if ($conn ->query($insertQuery)==TRUE){
            header("location: index.php");
        }
        else{
            echo "Error:".$conn->error;
        }
    }
}

if (isset($_POST['signIn'])){
    $fname=$_POST['fname'];
    $pword=$_POST['pword'];
    $pword=md5($pword);

    $sql="SELECT * FROM users WHERE fname='$fname' and pword='$pword';"
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['fname']=$row['fname'];
        header("Location: homepage.php");
        exit();
    }
    else{
        echo "Not found, incorrect name or password"
    }
}
    */
?> 
-->
