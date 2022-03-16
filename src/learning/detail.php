<?php
require_once"../include/const.php";
//require_once"index.php";
//idを取得
$id = $_GET['id'];

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //    POSTされた値を取り出す処理(idを取り出す)
    $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'データベースに接続できません。'.$e->getMessage();
    exit;
}


//（なんか違う）行を取り出す作業中
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $id = $row['id'];
   $myWish = $row['my_wish'];
   $memo = $row['memo'];
} else {
    echo '対象データがありません。';
    exit;
//    header("Location: index.php");
//    exit;
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
<!--詳細画面表示作業中-->
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <p><?php echo $myWish ; ?></p><br>
    <p><?php echo $memo; ?></p><br>
<?php } ?>
</body>
</html>
