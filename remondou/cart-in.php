<?php $css ='cart-in.css'; ?>
<?php require 'nav.php'; ?>
<?php
if(!empty($_POST['stock'])){
    if(!isset($_SESSION['item'])){
        $_SESSION['item']=[];
    }
    $count=0;
    if(isset($_SESSION['item'][$id])){
        $count=$_SESSION['item'][$id]['stock'];
    }
   
    $_SESSION['item'][$id]=[
        'shohin_id'=>$id,'stock'=>$count+$_POST['stock']
    ];
    echo '<p>カートに商品を追加しました</p>';
    echo '<form action="top.php" method="post">';
    echo '<div id="button">';
    echo '<p><input type="submit" value="トップ画面へ"></p>';
    echo '</div>';
    echo '</form>';
}else{
    echo '<p id="margin">申し訳ございません</p>';
    echo '<p>商品の在庫がなく、購入することはできません。</p>';
    echo '<p>入荷をお待ちください。</p>';
    echo '<div id="button">';
    echo '<form action = "shohinitirankensaku.php">';
    echo '<input type = "submit" value = "商品一覧に戻る">';
    echo '</form>';
    echo '<form action = "top.php">';
    echo '<input type = "submit" value = " トップ画面に戻る">';
    echo '</form>';
    echo '</div>';
}
?>
<?php require 'footer.php'; ?>
