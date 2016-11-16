<?php

$account = $_POST['account'];
$password = $_POST['password'];
$newPassword = password_hash($password, PASSWORD_DEFAULT);
try {
    $pdo = new PDO("mysql:host=localhost;dbname=iii", "root", "12345678");
    $stmt = $pdo ->
        prepare("INSERT INTO member(account,password) VALUE (?,?)");
    $stmt -> bindParam(1, $account);
    $stmt -> bindParam(2, $newPassword);

    if ($stmt -> execute()) {
        echo "ok";
    } else {
        echo "xx";
    }

} catch (Exception $e) {
    die("Server Busy");
}
