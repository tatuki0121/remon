<?php session_start();?>
<?php require 'db-connect.php';?>
<?php $css = 'admin-update-kanryo.css'; ?>
<?php require 'admin-header.php';?>
<?php
$name = $_SESSION['shohin']['name'];
$capa = $_SESSION['shohin']['capa'];
$dosu = $_SESSION['shohin']['dosu'];
$price = $_SESSION['shohin']['price'];
$suryo = $_SESSION['shohin']['suryo'];
$img = $_SESSION['shohin']['img'];
$exp = $_SESSION['shohin']['exp'];

$shohin_id = $_SESSION['shohin']['id'];

$pdo = new PDO($connect, USER, PASS);


$stmt = $pdo->prepare('update shohin set name=?, exp = ?, volume = ?, alcohol = ?, price = ?, stock = ?, image = ? where shohin_id = ?');
$stmt->execute([$name, $exp, $capa, $dosu, $price, $suryo, $img, $shohin_id]);
?>


<div class="h1">商品更新</div>
<hr>

<?php
if ($stmt->rowCount() > 0) {
    
    echo "<p>商品更新が完了しました</p>";
} else {
    echo "<p>商品更新に失敗しました。</p>";
}
unset($_SESSION['shohin']);
?>
<form action="admin-shohinitiran.php" method="post">
    <p><input type="submit" name="admin-shohinitiran.php" value="商品一覧に戻る"></p>
</form>
