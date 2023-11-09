<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>
<h1>ユーザー一覧</h1>
<hr>
<table>
    <tr>
        <th>ユーザーID</th>
        <th>メールアドレス</th>
        <th>パスワード</th>
    </tr>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    
    foreach ($pdo->query('select * from user') as $row) {
        
        echo '<tr>';
        echo '<td>', $row['user_id'], '</td>';
        echo '<td>', $row['mail'], '</td>';
        echo '<td>', $row['pass'], '</td>';
        echo '</tr>';
    }
?>

</table>
</body>