<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php $css = 'admin-shohinitiran.css'; ?>
<?php require 'admin-header.php'; ?>

<?php
$shohin_id = $_POST['shohin_id'];
//
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from shohin where shohin_id = ?');
$sql->execute([$shohin_id]);
$row = $sql->fetch();
?>
<h2>商品更新</h2>
<hr>
<div class="center">
    <form action="admin-update-output.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="shohin_id" value="<?= $shohin_id ?>">
        <p>商品名：<input type="text" name="name" value="<?= $row['name'] ?>" required></p>
        <div class="select-container"> <!-- 新しく追加したdiv -->
            内容量：
            <select name="capa" id="capa" required>
                <option value="300">300</option>
                <option value="350">350</option>
                <option value="500">500</option>
            </select>

        </div>
        <div class="select-container"> <!-- 新しく追加したdiv -->
            度数：
            <select name="dosu" id="dosu" required>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="7">7</option>
                <option value="9">9</option>
                <option value="25">25</option>
            </select>

        </div>
        <p>価格：<input type="number" name="price" value="<?= $row['price'] ?>" required></p>
        <p>在庫数量：<input type="number" name="suryo" value="<?= $row['stock'] ?>" required></p>
        <p>商品画像：<input type="file" name="img" value="<?= $row['image'] ?>" required></p>
        <p>商品説明：<input type="text" name="exp" value="<?= $row['exp'] ?>" required></p>
        <input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
        <input type="submit" value="更新">
    </form>


    <script>
        function validateForm() {
            var capa = document.getElementById("capa").value;
            var dosu = document.getElementById("dosu").value;
            var price = document.getElementsByName("price")[0].value; // "price" の要素を取得する際に注意
            var suryo = document.getElementsByName("suryo")[0].value; // "suryo" の要素を取得する際に注意

            // capa、price、suryoが負でないか確認
            if (capa < 0 || price < 0 || suryo < 0) {
                alert("内容量、価格、在庫数量は負の値を設定できません。");
                return false;
            }

            // 必要に応じて他のバリデーションロジックを追加

            // すべてのバリデーションが成功した場合、フォームの送信を許可するためにtrueを返す
            return true;
        }
    </script>

</div>
</body>

</html>