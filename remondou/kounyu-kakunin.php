<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from shohin where shohin_id=?');
    $sql->execute([$id]);
    foreach($sql as $row){
        echo '<p><img alt="image" src="image/', $row['image'], '"weight="100" height="100"></p>';
        echo '<form action="kounyu-kakunin.php" method="post">';
        echo '<p>商品名：', $row['name'], '</p>';
        echo '<p>容量：', $row['volume'], '<p>';
        echo '<p>価格：', $row['price'], '</p>';
        echo '<p>数量：', $_SESSION['item'][$row['shohin_id']]['stock'], '</p>';
        echo '</form>';
        echo '<form action="shohinitirankensaku.php" method="post">';
        echo '<p><input type="submit" value="商品一覧検索画面に戻る"></p>';
        echo '</form>';
        echo '<form action="kounyu-kanryou.php" method="post">';
        echo '<input type="hidden" name="shohin_id" value="', $row['shohin_id'], '">';
        echo '<input type="hidden" name="stock" value="', $_SESSION['item'][$row['shohin_id']]['stock'], '">';
        echo '<p><input type="submit" value="購入する"></p>';
        echo '</form>';
    }
?>
<?php require 'footer.php'; ?>
