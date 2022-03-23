<?php

require_once "../include/const.php";
$id = $_POST['id'];
$myWish = $_POST['myWish'];
$memo = $_POST['memo'];
$submit = $_POST['submit'];

//データベース接続
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = 'UPDATE wishes SET my_wish = :MY_WISH, memo = :MEMO WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->bindParam(':MY_WISH', $myWish);
    $stmt->bindParam(':MEMO', $memo);
    $stmt->execute();
} catch (PDOException $e) {
    echo '更新できません。';
    exit;
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish更新完了</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<p>Wishを編集しました</p>
<a href="index.php" class="btn-style">一覧画面へ戻る</a>

</body>
</html>
