<?php   
require_once 'admin_login_file.php';

try {
    $pdo = new PDO($attr, $usr, $pass, $opts);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
$query = "SELECT" * FROM logins;
$result = $pdo->qurey($query);
echo $result;
?>