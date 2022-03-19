<?php
require_once"../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //idを取得
    $id = $_GET['id'];

    //    GETされた値を取り出す処理(idを取り出す)
    $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'データベースに接続できません。'.$e->getMessage();
    exit;
}
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
<form method="POST" action="detail.php">
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <span class="item">My Wish:</span><br>
    <label>
        <input type="text" class="txt" name="myWish" value="<?php echo $row['my_wish']; ?>">
    </label>
    <span class="item">Memo:</span><br>
        <label><textarea name="memo" id="memo" cols="20" rows="10"><?php echo $row['memo']; ?></textarea></label>
<?php } ?>
</form>　
    <a href="index.php" class="btn-style">変更</a>
</body>
</html>
