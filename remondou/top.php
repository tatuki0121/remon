<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'nav.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>檸檬堂販売サイト</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="css/top.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
    </script>
</head>

<body>
    <div class="slider">
        <img src="test.img/test1.jpg" width="500" height="300" alt="">
        <img src="test.img/test2.jpg" width="500" height="300" alt="">
        <img src="test.img/test3.jpg" width="500" height="300" alt="">
    </div>
    <div class="heading">
        <h2>製品情報</h2>
    </div>
    <ul>
        <li><img src="test.img/test1.jpg" width="300" height="200" alt=""></li>
        <li><img src="test.img/test2.jpg" width="300" height="200" alt=""></li>
        <li><img src="test.img/test3.jpg" width="300" height="200" alt=""></li>
    </ul>
    <h2>こだわり</h2>
    <p>これが、イマドキのレモンサワー。</p>
    <p>お家で楽しめる、こだわりのおいしさ。</p>
    <p><img src="test.img/test1.jpg" width="300" height="200" alt=""></p>
    <p>～画像説明～</p>
</body>

</html>