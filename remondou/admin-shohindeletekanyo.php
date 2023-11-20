<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header'; ?>

<?php
$pdo = new PDO($connect, USER, PASS);



    $shohin_id = $_GET['shohin_id'];
    
    $stmt = $pdo->prepare('DELETE FROM shohin WHERE shohin_id = ?');
    $stmt->execute([$shohin_id]);
   
    if ($stmt->rowCount() > 0) {
        echo "商品が削除されました。";
    } else {
        echo "商品の削除に失敗しました。";
    }


?>



<h1>商品削除</h1>
<hr>
商品削除完了しました。
<form action="admin-shohinitiran.php" method="post">
    <input type="submit" name="top" value="商品一覧に戻る">
</form>