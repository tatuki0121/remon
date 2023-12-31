<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'kounyu-kanryo.css'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);
/*
if(empty($_POST['stock'])){
    echo '<P>申し訳ございません。<br>商品の在庫が無くなってしまいました。購入することはできません。<br>入荷をお待ちください!!!</p>';
    echo '<form action="top.php" method="POST">';
    echo '<p><input type="submit" value="トップ画面へ"></p>';
}else{
    echo ' <p>購入完了しました。ありがとうございます！</p>';
    echo '<form action="top.php" method="POST">';
    echo '<p><input type="submit" value="トップ画面へ"></p>';
}
*/
$shohin = [];
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
        if ($stock > 0 || $stock == 0) {

            $updateSql = 'update shohin set stock = ? where shohin_id = ?';
            $sql2 = $pdo->prepare($updateSql);
            $sql2->bindValue(1, intval($stock), PDO::PARAM_INT);
            $sql2->bindValue(2, intval($id), PDO::PARAM_INT);
            $sql2->execute();
            $shohin_id = $row['shohin_id'];
            $number = $item['stock'];
            $price = $row['price'] * $item['stock'];
            
            //購入詳細テーブルに購入IDと商品ID、数量、金額を追加
            $sql3 = $pdo->prepare("INSERT INTO purchase_detail (purchase_id, shohin_id, number, price) VALUES (?, ?, ?, ?)");
            $sql3->execute([$purchase_id, $shohin_id, $number, $price]);
            unset($_SESSION['item'][$shohin_id]);
            $shohin[]=$row['name'];
        }else{
            echo '<P>申し訳ございません。<br>「',$row['name'],'」の在庫が不足しています。購入することはできません。<br>入荷をお待ちください!!!</p>';
        }
    }
}
}else if(isset($_POST['nowbuy2'])){
    $sql->bindValue(1, intval($_POST['shohin_id']), PDO::PARAM_INT);
    $sql->execute();
    $rows = $sql->fetchAll();
    foreach ($rows as $row) {
        $stock = $row['stock'] - $_POST['stock'];
        if ($stock > 0 || $stock == 0) {
            $updateSql = 'update shohin set stock = ? where shohin_id = ?';
            $sql = $pdo->prepare($updateSql);
            $sql->bindValue(1, intval($stock), PDO::PARAM_INT);
            $sql->bindValue(2, intval($_POST['shohin_id']), PDO::PARAM_INT);
            $sql->execute();
            $shohin_id = $row['shohin_id'];
            $number = $row['stock'];
            $price = $row['price'] * $row['stock'];
            
            //購入詳細テーブルに購入IDと商品ID、数量、金額を追加
            $sql3 = $pdo->prepare("INSERT INTO purchase_detail (purchase_id, shohin_id, number, price) VALUES (?, ?, ?, ?)");
            $sql3->execute([$purchase_id, $shohin_id, $number, $price]);
            $shohin[]=$row['name'];
        }else{
            echo '<P>申し訳ございません。<br>「',$row['name'],'」の在庫が不足しています。購入することはできません。<br>入荷をお待ちください!!!</p>';
        }
    }
}
if(count($shohin)>0){
    echo ' <p>購入完了しました。ありがとうございます！</br>';
    echo 'お買い上げ商品は、下記となります</p>';
    foreach($shohin as $value){
        echo '<p>', $value, '</p>';
    }
}
echo '<form action="top.php" method="POST">';
echo '<p><input type="submit" value="トップ画面へ"></p>';
echo '</form>'
?>

<link rel="stylesheet" href="css/kounyu-kanryou.css">
<?php require 'footer.php'; ?>
