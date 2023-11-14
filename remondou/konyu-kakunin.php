<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from shohin where shohin_id=?');
    $sql->execute([$_GET['id']]);
    foreach($sql as $row){
        echo '<p><img alt="image" src=', $row['image'], 'weight="300" height="300"></p>';
        echo '<form action="kounyu-kakunin.php" method="post">';
        echo '<p>商品名：', $row['name'], '</p>';
        echo '<p>容量：', $row['volume'], '<p>';
        echo '<p>価格：', $row['price'], '</p>';
        echo '<p>数量：', $_POST['stock'], '</p>';
        echo '<input type="hidden" name="name" value="', $row['name'], '">';
        echo '<input type="hidden" name="volume" value="', $row['volume'], '">';
        echo '<input type="hidden" name="price" value="', $row['price'], '">';
        echo '<input type="hidden" name="stock" value="', $_POST['stock'], '">';
        echo '</form>';
        echo '<form action="shohinitirankensaku.php" method="post">';
        echo '<p><input type="submit" value="商品一覧検索画面に戻る"></p>';
        echo '</form>';
        echo '<form action="kounyu-kanryou.php" method="post">';
        echo '<p><input type="submit" value="購入する"></p>';
        echo '</form>';
    }
?>
<?php require 'footer.php'; ?>