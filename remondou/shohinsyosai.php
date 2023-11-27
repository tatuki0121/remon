<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
echo '<link rel="stylesheet" href="css/shohinsyosai.css">';
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from shohin where shohin_id=?');
$sql->execute([$_GET['id']]);
foreach($sql as $row){
    echo '<div id="syosai">';
    echo '<p>', '<img src="image/', $row['image'], '"width="100" height="100"></p>';
    echo '<form action="kounyu.php?id=',$row['shohin_id'], '" method="post">';
    echo '<p>', $row['name'], '</p>';
    echo '<p>', $row['volume'], 'ml  ￥', $row['price'], '  ';

    // プルダウンメニューの作成
    echo '<label for="shohin">数量:</label>';
    echo '<select id="shohin" name="stock">';
    $stock = 10;
    if($row['stock']<10){
        $stock = $row['stock'];
    }
    for($b=1;$b<=$stock;$b++){
        echo '<option value="', $b, '">', $b, '</option>';
    }
    echo '</select></p>';
    echo '</div>';
    echo '<div id="button">';
    echo '<input type="submit" name="nowbuy" value="今すぐ買う">';
    echo '<input type="submit" name="cart-in" value="カートに入れる">';
    echo '</form>';
    echo '</div>';
}

?>
<?php require 'footer.php'; ?>