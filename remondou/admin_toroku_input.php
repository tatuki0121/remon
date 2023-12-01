<?php require 'db-connect.php'; ?>
<?php $css = 'admin_toroku_input.css'; ?>
<?php require 'admin-header.php'; ?>
<div class="h2">商品登録</div>
<hr>
<div class="center">
    <form action="admin_toroku_output.php" method="post">
        <p>商品名：<input type="text" name="name" required></p>
        <p>内容量：<input type="number" name="capa" required></p>
        <p>度数：<input type="number" name="dosu" required></p>
        <p>価格：<input type="number" name="price" required></p>
        <p>在庫数量：<input type="number" name="suryo" required></p>
        <p>商品画像：<input type="file" name="img" required></p>
        <p>商品説明：<textarea name="exp" required></textarea></p>
        <input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
        <input type="submit" value="登録">
    </form>
</div>
</body>

</html>