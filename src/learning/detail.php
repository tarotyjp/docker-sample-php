<?php
require_once"../include/const.php";

// データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // （理解度メモ）エミュレーションの理解がイマイチ。
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

//  POSTされた値を取り出す処理
$sql = 'select * from wishes';
$stmt = $dbh->query($sql);
$wishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Wish詳細</title>
</head>
<body>
    <h1>New Wish</h1>
    <h2>My Wish</h2>
<!--    --><?php //echo ['my_wish']; ?>
    <h2>Memo</h2>
<!--    --><?php //echo ['memo']; ?><!--</>-->
</body>
</html>
