<?php
require_once"../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//    POSTされた値を取り出す処理(idを取り出す)
    $sql = 'SELECT id as wish_id FROM wishes ';
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $details = $prepare->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'データベースに接続できません。';
    echo $e->getMessage();
    exit;
}

//もしidが空だったらリダイレクト
//$id = $_GET['id'];
//if (empty($id)) {
//    header("Location: index.php");
//    exit;
//}

//作業中（なんか違う）idがあったら変数に入れて詳細画面表示に使う
if ($prepare->execute(array($_GET['id']))) {
    $myWish = $_GET['my_wish'];
    $memo = $_GET['memo'];
} else {
    echo "対象のデータがありません。";
}

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
    <h1>My Wish</h1>
    <h2>My Wish</h2>
<!--    詳細表示作業中　GET？迷走中-->
<!--    --><?php //echo $myWish; ?>
<!--    <h2>Memo</h2>-->
<!--    --><?php //echo $memo; ?>

</body>
</html>
