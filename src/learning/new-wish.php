<?php


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Wish</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>New Wish</h1>
  <form method="POST" action="index.php">
    <span class="item">My Wish:</span><br>
    <input type="text" class="txt" name="myWish"
    placeholder="例）旅行に行く"><br>
    <span class="item">Memo:</span><br>
    <textarea name="memo" id="memo" cols="20" rows="10"
    placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる "></textarea>
    <br>
    <input class="btn" type="submit" value="Wishを追加">
  </form>
</body>
</html>
