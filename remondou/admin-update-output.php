<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'admin-update-output.css'; ?>
<?php require 'admin-header.php'; ?>

<div class="h1">商品一覧</div>
<hr>
<table>
    <tr>
        <th>商品名</th>
        <th>内容量</th>
        <th>度数</th>
        <th>価格</th>
        <th>在庫数量</th>
        <th>商品画像</th>
        <th>商品説明</th>
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
    $_SESSION['shohin'] = [];
    $_SESSION['shohin']['id'] = $_POST['shohin_id'];
    $_SESSION['shohin']['name'] = $_POST['name'];
    $_SESSION['shohin']['capa'] = $_POST['capa'];
    $_SESSION['shohin']['dosu'] = $_POST['dosu'];
    $_SESSION['shohin']['price'] = $_POST['price'];
    $_SESSION['shohin']['suryo'] = $_POST['suryo'];
    $_SESSION['shohin']['img'] = $_POST['img'];
    $_SESSION['shohin']['exp'] = $_POST['exp'];
    ?>
</table>
<p>上記情報を更新しますか？</p>
<div class="button-container">
    <form action="admin-shohinkousin" method="post">
        <input type="hidden" name="shohin_id" value="<?= $_POST['shohin_id'] ?>">
        <button type="submit">戻る</button>
    </form>
    <button onclick="location.href='admin-update-kanryo.php'">更新</button>
</div>
</body>

</html>