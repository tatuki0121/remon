<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>


<h1>商品一覧</h1>
<hr>
<form action="admin-toroku_input.php" method="post">
    <input type="submit" name="top" value="商品登録">
</form>

<table>
    <tr>
        <th>商品ID</th>
        <th>商品名</th>
        <th>商品説明</th>
        <th>内容量</th>
        <th>度数</th>
        <th>価格</th>
        <th>在庫数量</th>
        <th>商品画像</th>
        <th>操作</th>
    </tr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    
    foreach ($pdo->query('select * from shohin') as $row) {
        
        echo '<tr>';
        echo '<td>', $row['shohin_id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['exp'], '</td>';
        echo '<td>', $row['volume'], '</td>';
        echo '<td>', $row['alcohol'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>', $row['stock'], '</td>';
        echo '<td>', $row['image'], '</td>';
        echo '<td><form action="admin-shohinkousin.php" method="post">
        <input type="submit" name="del" value="更新">
        </form></td>';
        echo '<td><form action="admin-shohindeletekakunin.php" method="post">
        <input type="submit" name="del" value="削除">
        </form></td>';
        echo '</tr>';
    }

    ?>

</table>
<form action="admin-top.php" method="post">
    <input type="submit" name="top" value="管理者トップに戻る">
</form>

</body>