<?php   
$servername = "localhost";
$username = "assign2admin";
$password = "password";
$data = "web_assign2";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$data", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$query = "SELECT * FROM logins WHERE uname = 'ab'";
$report = $conn->query($query);
// echo $report->fetch();
// echo htmlspecialchars($report['uname']);
$result = $report->fetch(PDO::FETCH_ASSOC);
print_r($result);



// require_once 'admin_login_file.php';
// echo $attr;
// try {
//     // $pdo = new PDO($attr, $usr, $pass, $opts);
//     $pdo = new PDO("mysql:host=localhost;dbname=web_assign2", "root", "");
// }
// catch (PDOException $e){
//     // throw new PDOException($e->getMessage(), (int)$e->getCode());
// }
// echo $attr;// . "<br>" . $usr . "<br>" . $pass . "<br>" $opts;
// print_r $pdo;
// $query = "SELECT * FROM logins";
// $result = $pdo->qurey($query);
// echo $result;
?>