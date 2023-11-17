<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>

<h1>商品一覧</h1>
<hr>
<table>
    <tr>
        <th>商品名</th>
        <th>商品説明</th>
        <th>内容量</th>
        <th>度数</th>
        <th>価格</th>
        <th>在庫数量</th>
        <th>商品画像</th>
    </tr>
    <?php
    echo '<tr>';
    echo '<td>', $_POST['name'], '</td>';
    echo '<td>', $_POST['capa'], '</td>';
    echo '<td>', $_POST['dosu'], '</td>';
    echo '<td>', $_POST['price'], '</td>';
    echo '<td>', $_POST['suryo'], '</td>';
    echo '<td>', $_POST['img'], '</td>';
    echo '<td>', $_POST['exp'], '</td>';
    echo '</tr>';
    ?>
</table>
<p>上記情報を登録しますか？</p>
<button onclick="location.href='admin_toroku_input.php'">戻る</button>
<button onclick="location.href='sample.html'">inserへ</button>
<form action="admin-top.php" method="post">
</form>

</body>

</html>