<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- the container to register -->
    <div id="register-container">
        <form method="post" action="register.php">
            <div>
            <label name="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            </div>
            <div>
            <label name="pword">Password</label>
            <input type="text" name="pword" id="pword">
            </div>
            <div>
                <button name="submit" id="submit">register</button>
            </div>
        </form>
    </div>

    <!-- the container to connect -->
    <div id="connect-container">
        <form method="post" action="connect.php">
            <div>
            <label name="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            </div>
            <div>
            <label name="pword">Password</label>
            <input type="text" name="pword" id="pword">
            </div>
            <div>
                <button name="submit" id="submit">connect</button>
            </div>
        </form>
    </div>
</body>
</html>