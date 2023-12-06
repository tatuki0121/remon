<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'admin_toroku_output.css' ?>
<?php require 'admin-header.php'; ?>

<div class="h1">商品登録</div>
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
    $_SESSION['item'] = [];
    $_SESSION['item']['name'] = $_POST['name'];
    $_SESSION['item']['capa'] = $_POST['capa'];
    $_SESSION['item']['dosu'] = $_POST['dosu'];
    $_SESSION['item']['price'] = $_POST['price'];
    $_SESSION['item']['suryo'] = $_POST['suryo'];
    $_SESSION['item']['img'] = $_POST['img'];
    $_SESSION['item']['exp'] = $_POST['exp'];
    ?>
</table>
<p>上記情報を登録しますか？</p>
<div class="button-container">
    <button class="custom-button" onclick="location.href='admin_toroku_input.php'">戻る</button>
    <button class="custom-button" onclick="location.href='admin_toroku_kanryo.php'">登録</button>
</div>
</body>

</html>