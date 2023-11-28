<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>
<link rel="stylesheet" href="css/admin-shohindeletekanryo.css">

<h1>商品削除</h1>
<hr>

<?php
$pdo = new PDO($connect, USER, PASS);



    $shohin_id = $_GET['shohin_id'];
    $check_query = "SELECT COUNT(*) FROM purchase_detail WHERE shohin_id = :shohin_id";
    $check_statement = $pdo->prepare($check_query);
    $check_statement->bindParam(':shohin_id', $shohin_id, PDO::PARAM_INT);
    $check_statement->execute();
    $row_count = $check_statement->fetchColumn();
    
   
   
    if ($row_count > 0) {
        echo "すでに購入している人がいるので削除できません。";
    } else {
           
        $delete_query = "DELETE FROM shohin WHERE shohin_id = :shohin_id";
        $delete_statement = $pdo->prepare($delete_query);
        $delete_statement->bindParam(':shohin_id', $shohin_id, PDO::PARAM_INT);
        $delete_statement->execute();

        echo "商品が削除されました。";
    }
     
    


?>





<form action="admin-shohinitiran.php" method="post">
    <input type="submit" name="top" value="商品一覧に戻る">
</form>