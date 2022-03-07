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
    My Wish:<br>
    <input type="text" class="txt" name="myWish"
    placeholder="例）旅行に行く"><br>
    Memo:<br>
    <textarea name="memo" id="" cols="20" rows="10">
    </textarea>
    <br>
    <!-- <input type="textarea" class="txt" name="memo" placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる"><br> -->
    <input type="submit" value="Wishを追加">
  </form>
</body>
</html>
