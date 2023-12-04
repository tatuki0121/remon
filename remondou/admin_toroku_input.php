<?php require 'db-connect.php'; ?>
<?php $css = 'admin_toroku_input.css'; ?>
<?php require 'admin-header.php'; ?>
<div class="h2">商品登録</div>
<hr>
<div class="center">
    <form action="admin_toroku_output.php" method="post" onsubmit="return validateForm()">
        <p>商品名：<input type="text" name="name" required></p>
        <p>内容量：<input type="number" name="capa" id="capa" required></p>
        <form action="admin_toroku_output.php" method="post" onsubmit="return validateForm()">
            <p>商品名：<input type="text" name="name" required></p>
            <p>内容量：<input type="number" name="capa" id="capa" required></p>
            <div class="select-container"> <!-- 新しく追加したdiv -->
                度数：
                <select name="dosu" id="dosu" required>
                    <option value="1">3</option>
                    <option value="2">5</option>
                    <option value="3">7</option>
                    <option value="4">9</option>
                    <option value="5">25</option>
                </select>

            </div>
            <p>価格：<input type="number" name="price" id="price" required></p>
            <p>在庫数量：<input type="number" name="suryo" id="suryo" required></p>
            <p>商品画像：<input type="file" name="img" required></p>
            <p>商品説明：<textarea name="exp" required></textarea></p>
            <input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
            <input type="submit" value="登録">
        </form>



        <script>
            function validateForm() {
                var capa = document.getElementById("capa").value;
                var dosu = document.getElementById("dosu").value;
                var price = document.getElementById("price").value;
                var suryo = document.getElementById("suryo").value;

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