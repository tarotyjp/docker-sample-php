<?php

require_once "../include/const.php";

//データベース接続
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SQLの処理";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(バインドする内容);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'データベースに接続できません。';
    exit;
}
//
//メモ
//completeカラムを作ってデフォルトで０
//完了ボタンを押したらcompleteカラムが１に変更
//もしカラムが０の時　index.phpの＄Wishを表示
//カラムが１の時は非表示（if else）
?>

