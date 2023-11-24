<?php
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

$pdo = new PDO($connect, USER, PASS);

// データベースに商品を登録するクエリ
$stmt = $pdo->prepare('UPDATE shohin SET name = ?, exp = ?, volume = ?, alcohol = ?, price = ?, stock = ?, image = ? WHERE some_column = ?');

$stmt->execute([$name, $exp, $capa, $dosu, $price, $suryo, $img]);
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