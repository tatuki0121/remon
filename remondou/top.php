<?php require 'db-connect.php'; ?>
<?php $css = 'top.css'; ?>
<?php $script = '
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(\'.slider\').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
    </script>
    ';
?>
<?php require 'nav.php'; ?>


</head>

<body>
    <div class="slider">
        <img src="image/remondo.jpeg" width="400" height="200" alt="">
        <img src="image/hachimitu.jpeg" width="400" height="350" alt="">
        <img src="image/shioremon.jpeg" width="400" height="350" alt="">
    </div>
    <h2 class="title is-4 mt-6">製品情報</h2>
    <ul class="seihin-image">>
        <li><img src="image/3.jpeg" width="300" height="150" alt=""></li>
        <li><img src="image/5.jpeg" width="300" height="150" alt=""></li>
        <li><img src="image/7.jpeg" width="300" height="150" alt=""></li>
        <li><img src="image/9.jpeg" width="300" height="150" alt=""></li>
    </ul>
    <div class="products-btn">
        <a href="https://aso2201365.vivian.jp/system_test/remondou/shohinitirankensaku.php">
            <img src="image/products_btn.jpeg" alt="">
        </a>
    </div>
    <h2 class="title is-4">こだわり</h2>
    <div class="exp1">これが、イマドキのレモンサワー。</div>
    <div class="exp2">お家で楽しめる、こだわりのおいしさ。</div>
    <p class="custom-image"><img src="image/ninki.jpeg" width="350" height="250" alt=""></p>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
    <div class="page-top">
        ページトップへ戻る
    </div>
    <script src="script/top.js"></script>
    <?php require 'footer.php'; ?>
</body>

</html>