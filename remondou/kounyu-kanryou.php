<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from shohin where shohin_id = ?');
$sql->bindValue(1, intval($_POST['shohin_id']), PDO::PARAM_INT);
$sql->execute();
$rows = $sql->fetchAll();

foreach ($rows as $row) {
    $stock = $row['stock'] - $_SESSION['item'][$row['shohin_id']]['stock'];

    if ($stock > 0) {

        $updateSql = 'update shohin set stock = ? where shohin_id = ?';
        $sql = $pdo->prepare($updateSql);
        $sql->bindValue(1, intval($stock), PDO::PARAM_INT);
        $sql->bindValue(2, intval($_POST['shohin_id']), PDO::PARAM_INT);
        $sql->execute();
    }
}
?>

<form action="top.php" method="POST">
    <p>購入完了しました。ありがとうございます！</p>
    <input type="submit" value="トップ画面へ">
</form>
<?php require 'footer.php'; ?>
