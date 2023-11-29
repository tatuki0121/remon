<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檸檬堂販売サイト</title>
    <link rel="stylesheet" href="css/admin_toroku_output.css">
</head>

<body>
    <h2>商品登録</h2>
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
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['capa'] = $_POST['capa'];
        $_SESSION['dosu'] = $_POST['dosu'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['suryo'] = $_POST['suryo'];
        $_SESSION['img'] = $_POST['img'];
        $_SESSION['exp'] = $_POST['exp'];
        ?>
    </table>
    <p>上記情報を登録しますか？</p>
    <div class="button-container">
        <button class="custom-button" onclick="location.href='admin_toroku_input.php'">戻る</button>
        <button class="custom-button" onclick="location.href='admin_toroku_kanryo.php'">登録</button>
    </div>
</body>

</html>