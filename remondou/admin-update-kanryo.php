<?php
session_start();
require 'db-connect.php';
require 'admin-header.php';

// セッション変数からデータを取得
$name = $_SESSION['name'];
$capa = $_SESSION['capa'];
$dosu = $_SESSION['dosu'];
$price = $_SESSION['price'];
$suryo = $_SESSION['suryo'];
$img = $_SESSION['img'];
$exp = $_SESSION['exp'];

$shohin_id = $_SESSION['id'];

$pdo = new PDO($connect, USER, PASS);

// データベースに商品を登録するクエリ
$stmt = $pdo->prepare('update shohin set name=?, exp = ?, volume = ?, alcohol = ?, price = ?, stock = ?, image = ? where shohin_id = ?');
$stmt->execute([$name, $exp, $capa, $dosu, $price, $suryo, $img, $shohin_id]);
?>

<h1>商品更新</h1>
<hr>

<?php
if ($stmt->rowCount() > 0) {
    // 登録が成功した場合のメッセージを表示
    echo "商品更新が完了しました";
} else {
    echo "商品更新に失敗しました。";
}
?>
<form action="admin-shohinitiran.php" method="post">
    <input type="submit" name="admin-shohinitiran.php" value="商品一覧に戻る">
</form>
