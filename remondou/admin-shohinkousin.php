<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>

    <?php
    $shohin_id = $_POST['shohin_id'];
    
    ?>
    <h2>商品更新</h2>
    <hr>
<div class = "center">
    <form action="admin-update-output.php" method="post">
        <input type="hidden" name="shohin_id" value="<?= $shohin_id ?>">
        <p>商品名：<input type="text" name="name" required></p>
        <p>内容量：<input type="number" name="capa" required></p>
        <p>度数：<input type="number" name="dosu" required></p>
        <p>価格：<input type="number" name="price" required></p>
        <p>在庫数量：<input type="number" name="suryo" required></p>
        <p>商品画像：<input type="file" name="img" required></p>
        <p>商品説明：<input type="text" name="exp" required></p>
        <input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
        <input type="submit" value="更新">
    </form>
</div>
</body>

</html>