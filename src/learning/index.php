<?php
// データベース設定
define('DB_DSN', 'mysql:host=localhost;dbname=wish_list;charset=utf8');
define('DB_USER', 'leaning_php');
define('DB_PASSWORD', 'root');

// データベース接続
// try catch構文はエラーメッセージの表示定義がわからず一旦使わず保留
    $dbh = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
?>


<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Wish List</h1>
    <a href="new-wish.php">Wishを追加する</a>
    <div>
    <?php
    // なんかおかしいと思いつつひとまず書いたコード
        $myWish = $_POST["myWish"];
        $memo = $_POST["memo"];
        echo $myWish,$memo;
    ?>
    </div>


</body>
</html>
