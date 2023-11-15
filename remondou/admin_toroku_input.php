<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>檸檬堂販売サイト</title>
</head>

<body>
    <h2>商品登録</h2>
    <hr>

    <?php
    // フォームがサブミットされたかどうかを確認
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 入力が空でないかを確認
        if (empty($_POST['name']) || empty($_POST['capa']) || empty($_POST['dosu']) || empty($_POST['price']) || empty($_POST['suryo']) || empty($_FILES['img']['name']) || empty($_POST['exp'])) {
            echo "すべての項目を入力してください。";
        } else {
            // フォームのデータを `admin_toroku_output.php` に送信
            $name = $_POST['name'];
            $capa = $_POST['capa'];
            $dosu = $_POST['dosu'];
            $price = $_POST['price'];
            $suryo = $_POST['suryo'];
            $img = $_FILES['img']['name'];
            $exp = $_POST['exp'];

            // データを `admin_toroku_output.php` に送信
            echo "フォームが正常に送信されました。";
            header("Location: admin_toroku_output.php?name=$name&capa=$capa&dosu=$dosu&price=$price&suryo=$suryo&img=$img&exp=$exp");
            exit();
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <p>商品名：<input type="text" name="name"></p>
        <p>内容量：<input type="number" name="capa"></p>
        <p>度数：<input type="number" name="dosu"></p>
        <p>価格：<input type="number" name="price"></p>
        <p>在庫数量：<input type="number" name="suryo"></p>
        <p>商品画像：<input type="file" name="img"></p>
        <p>商品説明：<input type="text" name="exp"></p>
        <input type="button" onclick="location.href='adimin-shohinitiran.php'" value="戻る">
        <input type="submit" value="登録">
    </form>
</body>

</html>