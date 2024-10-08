<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="kittensite.css">
</head>
<body>
    
<div class="wrapper" id="register-container">

<?php


//get login variables, these are requred for script to run, and will only be called once.
require_once "login_file.php";

//if connection error send error message.
if ($conn->connect_error){
    echo "failed to connect to db".$conn->connect_error;
}
//connected to db successfully. now to begin the registration process.
else {
    //message saying connected to db.
    //in order to prevent hackers from using malicious scripts the 
    //variables need to be sanitized.
    //store unsanitized variables sent via form post.
    //unsanitized user name
    $uname_unsanitized = $_POST['uname'];
    //unsanitizeid email
    $email_unsanitized = $_POST['email'];
    //unsanitized password
    $pword_unsanitized = $_POST['pword'];
    //sanitize variables
    //sanitized user name
    $uname =  $conn->real_escape_string($uname_unsanitized);
    //sanitized email
    $email =  $conn->real_escape_string($email_unsanitized);
    //sanitized password.
    $pword =  $conn->real_escape_string($pword_unsanitized);

    //post exists continue.
    if (isset($_POST)) {
        //query to check if a user name exists in logins database.
        $matching_name="SELECT * FROM logins WHERE uname='$uname'";
        //query to check if an email exists in logins database.
        $matching_email="SELECT * FROM logins WHERE email='$email'";
        //run user name exists query
        $result_name=$conn->query($matching_name);
        //run email exists query.
        $result_email=$conn->query($matching_email);
        //user name rows is greater than 0, user name is taken.
        $show_signup = FALSE;
        if($result_name->num_rows>0){
            echo "<br>Name is taken.";
            $show_signup = TRUE;            
        }
        //email row is greater than 0, email is taken.
        if ($result_email->num_rows>0){
            echo "<br>Email is taken.";
            $show_signup = TRUE;
        }
        //show signup link because name or password is taken
        if ($show_signup) {
            echo "<p>Need an Account? <a href='register_page.php'>Signup</a></p>";
        }
        //hash sanitized password so it cannot be read if database is compramised.
        $hash = password_hash($pword, PASSWORD_DEFAULT);
        //hash is printed for no particluar reason.
        
        //if user name is not taken, and email is not taken.
        if (($result_name->num_rows<=0) && ($result_email->num_rows<=0)){
            //query to insert into logins, sanitized user name, sanitized email and hashed password.
            $insert_query="INSERT INTO logins (uname, email, password) 
            VALUES ('$uname', '$email', '$hash')";
            //query to insert into logins.
            $conn->query($insert_query);
            echo "<br> successfully registered";
            header ("Location: index.php");
        }
    }
}
?>
</div>

</body>
</html>