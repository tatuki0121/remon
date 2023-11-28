<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>
<link rel="stylesheet" href="css/admin-delete.css">


<h1>商品削除</h1>
<hr>
<table>
    <tr>
        <th>商品ID</th>
        <th>商品名</th>
        <th>商品説明</th>
        <th>内容量</th>
        <th>度数</th>
        <th>価格</th>
        <th>在庫数量</th>
        <th>商品画像</th>

    </tr>
    <?php
$pdo = new PDO($connect, USER, PASS);

$shohin_id = $_POST['shohin_id']; 


$stmt = $pdo->prepare('SELECT * FROM shohin WHERE shohin_id = ?');
$stmt->execute([$shohin_id]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {

    echo '<tr>';
    echo '<td>', $row['shohin_id'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['exp'], '</td>';
    echo '<td>', $row['volume'], '</td>';
    echo '<td>', $row['alcohol'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '<td>', $row['stock'], '</td>';
    echo '<td>', $row['image'], '</td>';
    echo '</tr>';

}
?>
</table>
上記の情報を削除しますか？<br>



<input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
<input type="button" onclick="location.href='admin-shohindeletekanyo.php?shohin_id=<?= $shohin_id ?>'" value="削除">