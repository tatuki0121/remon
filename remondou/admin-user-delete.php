<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>
<?php
if (isset($_SESSION['admin']) ) {
    $pdo = new PDO($connect, USER, PASS);
    $user_id='';
echo '<link rel="stylesheet" href="css/admin-delete.css">';
echo '<body>';
echo '<h1>ユーザー一覧</h1>';
echo '<hr>';
echo '<table>';
    echo '<tr>';
        echo '<th>ユーザーID</th>';
        echo '<th>メールアドレス</th>';
        echo '<th>登録日</th>';
        echo '<th>更新日</th>';
        echo '<th>削除</th>';
    echo '</tr>';
    
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

    echo '</table>';
    echo '<form action="admin-top.php">';
    echo '<input type="submit" value="管理者トップに戻る">';
    echo '</form>';
    echo '</body>';
}else{
    echo 'ログインされていません';
}
?>