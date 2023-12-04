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
    <h2 class="title is-4">こだわり</h2>
    <div class="exp">これが、イマドキのレモンサワー。</div>
    <div class="exp">お家で楽しめる、こだわりのおいしさ。</div>
    <p class="custom-image"><img src="image/ninki.jpeg" width="350" height="250" alt=""></p>
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