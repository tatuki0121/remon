<?php require 'db-connect.php'; ?>
<?php require 'nav.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from shohin where shohin_id=?');
    $sql->execute([$id]);
    foreach($sql as $row){
        echo '<div class="base">';
        echo '<p>', '<img src="image/', $row['image'], '"width="100" height="100"></p>';
        echo '<form action="kounyu-kanryou.php" method="post">';
        echo '<p>商品名：', $row['name'], '</p>';
        echo '<p>容量：', $row['volume'], '<p>';
        echo '<p>価格：', $row['price'], '</p>';
        echo '<p>数量：', $_POST['stock'], '</p>';
        echo '<input type="hidden" name="shohin_id" value="', $row['shohin_id'], '">';
        echo '<input type="hidden" name="stock" value="', $_POST['stock'], '">';
        echo '<p><input type="submit" name="nowbuy2" value="購入する"></p>';
        echo '</form>';
        echo '<form action="shohinitirankensaku.php" method="post">';
        echo '<input type="submit" value="商品一覧検索画面に戻る">';
        echo '</form>';
        echo '</div>';
    }
?>
<?php require 'footer.php'; ?>
