<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);
//if (isset($_SESSION['user']) ) {
    if(isset($_POST['del'])){
        
        $user_id = $_POST['user_id'];

        $sql = $pdo->prepare('DELETE FROM user WHERE user_id = ? ');
        $sql2 = $pdo->prepare('DELETE FROM purchase WHERE user_id = ?');
        $sql3 = $pdo->prepare('SELECT purchase_id FROM purchase WHERE user_id = ?');
        $sql4 = $pdo->prepare('DELETE FROM purchase_detail WHERE ');
        $sql->execute([$user_id]);
        $sql2->execute([$user_id]);
        $sql3->execute([$user_id]);
        $data1=$sql3->fetchAll();
        $sql4->execute([]);

        echo $user_id,"を削除しました<br>";
    }
//}
?>
<h1>ユーザー一覧</h1>
<hr>
<table>
    <tr>
        <th>ユーザーID</th>
        <th>メールアドレス</th>
        <th>削除</th>
    </tr>
    <?php
    
    foreach ($pdo->query('select * from user') as $row) {
        
        echo '<tr>';
        echo '<td>', $row['user_id'], '</td>';
        echo '<td>', $row['mail'], '</td>';
        echo '<td><form action="user-delete.php" method="post">
        <input type="hidden" name="user_id" value="',$row['user_id'],'">
        <input type="submit" name="del" value="削除">
        </form></td>';
        echo '</tr>';
    }
    ?>

</table>
</body>