<?php

require_once "../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //idを取得
    $id = $_GET['id'];

//    編集画面で内容を取得
    $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'データベースに接続できません。' . $e->getMessage();
    exit;
}

// 編集されたら、DBを更新する（作業中）

//    if (内容が変更されたら ) {
//        $sql = 'UPDATE wishes SET my_Wish = :MY_WISH, memo = :MEMO WHERE id = :id';
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam('']); 　　　　　　　　　　　　　<ーPOSTされたid取得するの難しい気がする…
//        $stmt->bindParam(':MY_WISH', $_POST['myWish']);
//        $stmt->bindParam(':MEMO', $_POST['memo']);
//        $stmt->execute();
//    }　else {
//        header('location: http://localhost:8080/index.php');
//}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wish</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Edit Wish</h1>
<!--フォームの中に編集前のWishとメモを表示させる-->
<form method="POST" action="edit.php">
    <?php
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <span class="item">My Wish:</span><br>
        <label>
            <input type="text" class="txt" name="myWish" value="<?php
            echo $row['my_wish']; ?>">
        </label>
        <span class="item">Memo:</span><br>
        <label><textarea name="memo" id="memo" cols="20" rows="10"><?php
                echo $row['memo']; ?></textarea></label><br>
        <?php
    } ?>
    <a href="index.php" class="btn-style">変更</a>
    <!--    編集されたら内容を更新する（作業中）-->
</form>
</body>
</html>
