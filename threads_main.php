<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
session_start();
$_SESSION['logged_in'] = TRUE;
$_SESSION['thread_id'] = 1;

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
<!-- go to thread -->
<form action="thread.php" method="POST" enctype="text/plain">
    <button onclick="<?php echo "hello world;" ?>">show Thread</button>
</form>

<?php
// require_once "thread.php";
?>
<?php
function test1(){
    echo "test1";
}
?>

<!-- <button onclick="<?php test1(); ?>">hello world</button> -->

<!-- ne thread -->
<form action="new_thread.php" method="POST" enctype="text/plain">
    <button type="submit" >new Thread</button>
</form>

<?php 

</body>
</html>