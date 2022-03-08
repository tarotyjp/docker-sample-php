<?php
// データベース設定
define('DB_DSN', 'mysql:dbname=learning_php;host=db;charset=utf8');
define('DB_USER', 'learning_php');
define('DB_PASSWORD', 'learning_php');

// データベース接続
// try catch構文はエラーメッセージの表示定義がわからず一旦使わず保留
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

    // 値を受け取りDBに保存する作業中
    if(!empty($_POST['myWish'])){
        try{
            $sql  = 'INSERT INTO wishs(my_wish,memo) VALUES(:NEWWISH,:MEMO)';
            $stmt = $dbh->prepare($sql);

            $stmt->bindParam(':NEWWISH', $_POST['myWish'], PDO::PARAM_STR);
            $stmt->bindParam(':MEMO', $_POST['memo'], PDO::PARAM_STR);
            $stmt->execute();

            header('location: http://localhost:8080/');
            exit();
            } catch (PDOException $e) {
                echo 'データベースにアクセスできません！'.$e->getMessage();
            }
        }
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
    // なんかおかしいと思いつつちょっと直したコード
        echo $_POST['myWish'];
        echo $_POST['memo'];
    ?>

</body>
</html>
