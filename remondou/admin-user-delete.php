<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);
if (isset($_SESSION['admin']) ) {
    $user_id='';
    $pdo = new PDO($connect, USER, PASS);
?>
<h1>ユーザー一覧</h1>
<hr>
<table>
    <tr>
        <th>ユーザーID</th>
        <th>メールアドレス</th>
        <th>登録日</th>
        <th>更新日</th>
        <th>削除</th>
    </tr>
    <?php
    
    foreach ($pdo->query('select * from user') as $row) {
        echo '<tr>';
        echo '<td>', $row['user_id'], '</td>';
        echo '<td>', $row['mail'], '</td>';
        echo '<td>', $row['torokubi'], '</td>';
        echo '<td>', $row['kousinbi'], '</td>';
        echo '<td><form action="admin-user-delete-confir.php" method="post">';
        echo '<input type="hidden" name="user_id" value="',$row['user_id'],'">';
        echo '<input type="submit" name="del" value="削除">';
        echo '</form></td>';
        echo '</tr>';
    }
}else{
    echo 'ログインされていません';
}
    ?>

</table>
</body>