<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'admin-header.php'; ?>

    <?php
    $shohin_id = $_POST['shohin_id'];
    //
    $pdo=new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from shohin where shohin_id = ?');
    $sql->execute([$shohin_id]);
    $row = $sql->fetch();
    ?>
    <h2>商品更新</h2>
    <hr>
<div class = "center">
    <form action="admin-update-output.php" method="post">
        <input type="hidden" name="shohin_id" value="<?= $shohin_id ?>">
        <p>商品名：<input type="text" name="name" value="<?= $row['name'] ?>" required></p>
        <p>内容量：<input type="number" name="capa" value="<?= $row['volume'] ?>" required></p>
        <p>度数：<input type="number" name="dosu" value="<?= $row['alcohol'] ?>" required></p>
        <p>価格：<input type="number" name="price" value="<?= $row['price'] ?>" required></p>
        <p>在庫数量：<input type="number" name="suryo" value="<?= $row['stock'] ?>" required></p>
        <p>商品画像：<input type="file" name="img" value="<?= $row['image'] ?>" required></p>
        <p>商品説明：<input type="text" name="exp" value="<?= $row['exp'] ?>" required></p>
        <input type="button" onclick="location.href='admin-shohinitiran.php'" value="戻る">
        <input type="submit" value="更新">
    </form>
</div>
</body>

</html>