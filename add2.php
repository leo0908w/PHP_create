<?php

$account = $_POST['account'];
$password = $_POST['password'];
$newPassword = password_hash($password, PASSWORD_DEFAULT);
try {
    $pdo = new PDO("mysql:host=localhost;dbname=iii", "root", "12345678");
    $stmt = $pdo ->
        prepare("INSERT INTO member(account,password) VALUES (?,?)");
    $stmt -> bindParam(1, $account);
    $stmt -> bindParam(2, $newPassword);

    if ($stmt -> execute()) {
        // 以下進行檔案上傳之處理
        $newid = $pdo -> lastInsertId();
        $upload = $_FILES['upload'];    // 上傳檔案的資訊 -> 陣列
        if ($upload['error'] == 0){
            if (copy($upload['tmp_name'], "upload/icon_{$newid}.jpg")){
                echo 'OK2';
            } else {
                echo 'Copy Fail';
            }
        } else {
            echo 'Upload Fail:' . $upload['error'];
        }
    } else {
        echo "xx";
    }

} catch (Exception $e) {
    die("Server Busy");
}
