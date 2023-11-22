<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檸檬堂販売サイト</title>
    <link rel="stylesheet" href="css/admin_toroku_input.css">
</head>

<body>
    <h2>商品登録</h2>
    <hr>
    <div class="center">
        <form action="admin_toroku_output.php" method="post">
            <p>商品名：<input type="text" name="name" required></p>
            <p>内容量：<input type="number" name="capa" required></p>
            <p>度数：<input type="number" name="dosu" required></p>
            <p>価格：<input type="number" name="price" required></p>
            <p>在庫数量：<input type="number" name="suryo" required></p>
            <p>商品画像：<input type="file" name="img" required></p>
            <p>商品説明：<input type="text" name="exp" required></p>
            <input type="button" onclick="location.href='adimin-shohinitiran.php'" value="戻る">
            <input type="submit" value="登録">
        </form>
    </div>
</body>

</html>