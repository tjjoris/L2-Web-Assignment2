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
        <form method="post" action="register2.php">
            <div>
            <label name="uname">User Name</label>
            <input type="text" name="uname" id="uname">
            </div>
            <div>
            <label name="email">Email</label>
            <input type="text" name="email" id="email">
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
        <form method="post" action="connect2.php">
            <div>
            <label name="uname">User Name</label>
            <input type="text" name="uname" id="uname">
            </div>
            <div>
            <label name="email">Email</label>
            <input type="text" name="email" id="email">
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