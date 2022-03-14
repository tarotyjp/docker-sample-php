<?php
require_once "../include/const.php";

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

//  POSTされた値を取り出す処理(作業中)
$sql = 'select * from wishes';
$stmt = $dbh->query($sql);
$wishes = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Wish List</h1>
    <a href="new-wish.php">Wishを追加する</a>
    <!-- 追加したWishを表示する作業中 -->
    <table>
        <thead>
            <tr>
                <th>My Wish</th>
                <th>Memo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($wishes as $wish) { ?>
            <tr>
                <td><?php echo $wish['my_wish']; ?></td>
                <td><?php echo $wish['memo']; ?></td>
            </tr>
        <?php } ?>
        完了ボタンで項目を非表示にする（DBからは削除しない）
        <tr>
            <td>
                <button></button></td>
        </tr>
        </tbody>
    </table>



</body>
</html>
