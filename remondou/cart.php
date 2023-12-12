<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css ='cart.css'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
if(!empty($_SESSION['item'])){
    if(!empty($_SESSION['item'])){
        $cnt = 0;
        $sql=$pdo->prepare('select * from shohin where shohin_id=?');
        
        foreach($_SESSION['item'] as $id=>$item){
            $sql->execute([$id]);
            $row = $sql->fetch();
            if( $cnt % 4 == 0 ){
                echo '<div class="columns is-desktop">';
            }
            
            //echo '<form action="cart.php" method="post">';
            echo '<div class="column">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">',$row['name'],'</p>
                    </header>
                    <div class="card-image">
                        <figure class="image">
                        <img src="image/', $row['image'], '">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content"><p>', $row['name'], '</p><p>個数：', $item['stock'], '</p>
                            <br>
                            ', $row['exp'],'<br><br><p><a href="cart-delete.php?id=', $id, '">削除</a></p>
                        </div>
                    </div>
                </div>
            </div>';
            //echo '</form>';
            $cnt++;
            if( $cnt % 4 == 0 ){
                echo '</div>';
            }
           
        }
        echo '</div>';
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