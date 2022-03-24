<?php

require_once "../include/const.php";
$id = $_POST['id'];
$myWish = $_POST['myWish'];
$memo = $_POST['memo'];

//データベース接続
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = 'UPDATE wishes SET my_wish = :MY_WISH, memo = :MEMO WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':MY_WISH', $myWish);
    $stmt->bindParam(':MEMO', $memo);
    $stmt->execute();
    header("Location: index.php");
} catch (PDOException $e) {
    echo '更新できません。';
    exit;
}

?>
