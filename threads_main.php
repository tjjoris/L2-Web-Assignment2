<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    //get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

//create a new mysqli connection
$conn=new mysqli($host,$user,$pass,$db);
//if sqli connection error print error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
//else, you are connected.
else {

}

?>
<form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button>
</body>
</html>