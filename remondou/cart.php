<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css ='cart.css'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
if(!empty($_SESSION['item'])){
    if(!empty($_SESSION['item'])){
        $sql=$pdo->prepare('select * from shohin where shohin_id=?');
        foreach($_SESSION['item'] as $id=>$item){
            $sql->execute([$id]);
            $row = $sql->fetch();
            echo '<form action="cart.php" method="post">';
            echo '<div id="cart">';
            echo '<p><img src="image/', $row['image'], '" width="100" height="100"></p>';
            echo '<p>', $row['name'], '</p>';
            echo '<p>個数：', $item['stock'], '</p>';
            echo '<p><a href="cart-delete.php?id=', $id, '">削除</a></p>';
            echo '</div>';
            echo '</form>';
        }
        echo '<form action ="kounyu-kanryou.php" method ="post">';
        echo '<div id="button">';
        echo '<input type = "submit"  name="cartbuy" value = "購入する">';
        echo '</div>';
        echo '</form>';
        
    }
}else{
    echo '<div id="cartno">';
    echo 'カートに商品がありません。';
    echo '</div>';
}
?>
<?php require 'footer.php'; ?>
