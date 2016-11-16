<?php
$account = $_POST['account'];
$password = $_POST['password'];
$newPassword = password_hash($password, PASSWORD_DEFAULT);
try {
    $pdo = new PDO("mysql:host=localhost;dbname=iii","root","12345678");
    $sql = "SELECT * FROM member WHERE account = '{$account}'";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbpassword =  $result['password'];
    if (password_verify($password, $dbpassword)){
        echo 'OK';
    }else{
        echo 'XX';
    }


} catch (Exception $e) {
    die("Server Busy");
}
