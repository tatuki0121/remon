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
        <img src="test.img/test1.jpg" width="500" height="400" alt="">
        <img src="test.img/test2.jpg" width="500" height="400" alt="">
        <img src="test.img/test3.jpg" width="500" height="400" alt="">
    </div>
    <h2 class="item_info">製品情報</h2>
    <ul>
        <li><img src="test.img/test1.jpg" width="300" height="200" alt=""></li>
        <li><img src="test.img/test2.jpg" width="300" height="200" alt=""></li>
        <li><img src="test.img/test3.jpg" width="300" height="200" alt=""></li>
    </ul>
    <p>
    <h2>こだわり</h2>
    </p>
    <div class="exp">これが、イマドキのレモンサワー。</div>
    <div class="exp">お家で楽しめる、こだわりのおいしさ。</div>
    <p><img src="test.img/test1.jpg" width="350" height="250" alt=""></p>
    <div class="exp">～画像説明～</div>
    <p>
    <h2>ムービー</h2>
    </p>
    <div style="text-align: center;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/1IeAtQiSPMc?si=da3KJ3R9CwDtjT7w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>