<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'kounyu-kanryo.css'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);
$user_id = $_SESSION['user']['user_id'];
$torokubi = date("Y-m-d");
// 購入テーブルにユーザーIDと登録日を追加
$sql = $pdo->prepare("INSERT INTO purchase (user_id, torokubi) VALUES (?, ?)");
$sql->execute([$user_id, $torokubi]);
$purchase_id = $pdo->lastInsertId();
$sql = $pdo->prepare('select * from shohin where shohin_id = ?');
if(isset($_POST['cartbuy'])){
foreach($_SESSION['item'] as $id => $item){

    $sql->bindValue(1, $id, PDO::PARAM_INT);
    $sql->execute();
    $rows = $sql->fetchAll();

    foreach ($rows as $row) {
        $stock = $row['stock'] - $item['stock'];

        if ($stock > 0) {

            $updateSql = 'update shohin set stock = ? where shohin_id = ?';
            $sql2 = $pdo->prepare($updateSql);
            $sql2->bindValue(1, intval($stock), PDO::PARAM_INT);
            $sql2->bindValue(2, intval($id), PDO::PARAM_INT);
            $sql2->execute();
        }
        $shohin_id = $row['shohin_id'];
        $number = $item['stock'];
        $price = $row['price'] * $item['stock'];
        
        //購入詳細テーブルに購入IDと商品ID、数量、金額を追加
        $sql3 = $pdo->prepare("INSERT INTO purchase_detail (purchase_id, shohin_id, number, price) VALUES (?, ?, ?, ?)");
        $sql3->execute([$purchase_id, $shohin_id, $number, $price]);
        unset($_SESSION['item'][$shohin_id]);
    }
}
}else if(isset($_POST['nowbuy2'])){
    $sql->bindValue(1, intval($_POST['shohin_id']), PDO::PARAM_INT);
    $sql->execute();
    $rows = $sql->fetchAll();
    foreach ($rows as $row) {
        $stock = $row['stock'] - $_POST['stock'];
        if ($stock > 0) {
            $updateSql = 'update shohin set stock = ? where shohin_id = ?';
            $sql = $pdo->prepare($updateSql);
            $sql->bindValue(1, intval($stock), PDO::PARAM_INT);
            $sql->bindValue(2, intval($_POST['shohin_id']), PDO::PARAM_INT);
            $sql->execute();
        }
    }
}
?>
<link rel="stylesheet" href="css/kounyu-kanryou.css">
<form action="top.php" method="POST">
    <p>購入完了しました。ありがとうございます！</p>
    <p><input type="submit" value="トップ画面へ"></p>
</form>
<?php require 'footer.php'; ?>
