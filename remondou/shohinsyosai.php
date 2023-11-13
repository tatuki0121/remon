<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from shohin where shohin_id=?');
$sql->execute([$_GET['id']]);
foreach($sql as $row){
    echo '<p><img alt="image" src=', $row['image'], 'weight="300" height="300"></p>';
    echo '<form action="shohinsyosai.php" method="post">';
    echo '<p>', $row['name'], '</p>';
    echo '<p>', $row['volume'], 'ml  ￥', $row['price'], '  ';

    // プルダウンメニューの作成
    echo '<label for="shohin">数量:</label>';
    echo '<select id="shohin" name="shohin">';
    $stock = 10;
    if($row['stock']<10){
        $stock = $row['stock'];
    }
    for($b=1;$b<=$stock;$b++){
        echo '<option value="', $b, '">', $b, '</option>';
    }
    echo '</select></p>';
    echo '</form>';
    echo '<form action="kounyu-kanryou.php" method="post">';
    echo '<p><input type="submit" value="今すぐ買う"></p>';
    echo '</form>';
    echo '<form action="cart-in.php" method="post">';
    echo '<p><input type="submit" value="カートに入れる"></p>';
    echo '</form>';
}
?>
<?php require 'footer.php'; ?>