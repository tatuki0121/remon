<?php require 'db-connect.php'; ?>
<?php $css = 'kounyu-kakunin.css'; ?>
<?php require 'nav.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from shohin where shohin_id=?');
    $sql->execute([$id]);
    if(!empty($_POST['stock'])){
    foreach($sql as $row){
        echo '<div id="shohin">';
        echo '<p>', '<img src="image/', $row['image'], '"width="100" height="100"></p>';
        echo '<form action="kounyu-kanryou.php" method="post">';
        echo '<p>商品名：', $row['name'], '</p>';
        echo '<p>容量：', $row['volume'], '<p>';
        echo '<p>価格：', $row['price'], '</p>';
        echo '<p>数量：', $_POST['stock'], '</p>';
        echo '</div>';
        echo '<input type="hidden" name="shohin_id" value="', $row['shohin_id'], '">';
        echo '<input type="hidden" name="stock" value="', $_POST['stock'], '">';
        echo '<div id="button">';
        echo '<input type="submit" name="nowbuy2" value="購入する">';
        echo '</form>';
        echo '<form action="shohinitirankensaku.php" method="post">';
        echo '<input type="submit" value="商品一覧検索画面に戻る">';
        echo '</form>';
        echo '</div>';
    }
    }else if(empty($_POST['stock'])){
        echo '<p id="margin">申し訳ございません</p>';
        echo '<p>商品の在庫がありません。購入することはできません。</p>';
        echo '<p>入荷をお待ちください。</p>';
        echo '<div id="button">';
        echo '<form action = "shohinitirankensaku.php">';
        echo '<input type = "submit" value = "商品一覧に戻る">';
        echo '</form>';
        echo '<form action = "top.php">';
        echo '<input type = "submit" value = " トップ画面に戻る">';
        echo '</form>';
    }
?>
<?php require 'footer.php'; ?>
