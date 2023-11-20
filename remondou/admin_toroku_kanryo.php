<?php
session_start();

// セッション変数からデータを取得
$name = $_SESSION['name'];
$capa = $_SESSION['capa'];
$dosu = $_SESSION['dosu'];
$price = $_SESSION['price'];
$suryo = $_SESSION['suryo'];
$img = $_SESSION['img'];
$exp = $_SESSION['exp'];

require 'db-connect.php';
require 'admin-header.php';

$pdo = new PDO($connect, USER, PASS);
// 商品の登録に必要なデータを取得
$shohin_name = $_POST['shohin_name'];
$price = $_POST['price'];

// データベースに商品を登録するクエリ
$stmt = $pdo->prepare('INSERT INTO shohin (name, exp, volume, alcohol, price, stock, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$name, $exp, $volume, $alcohol, $price, $stock, $img]);

if ($stmt->rowCount() > 0) {
    // 登録が成功した場合のメッセージを表示
    echo "商品登録が完了しました";

    // 商品一覧ページにリダイレクト
    header("Location: admin-shohinitiran.php");
    exit(); // リダイレクト後にコードが続かないように終了
} else {
    echo "商品登録に失敗しました。";
}
?>

<h1>商品登録</h1>
<hr>
商品登録完了しました。
<form action="admin-shohinitiran.php" method="post">
    <input type="submit" name="admin-shohinitiran.php" value="商品一覧に戻る">
</form>