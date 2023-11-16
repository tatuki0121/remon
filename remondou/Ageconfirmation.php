<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>年齢確認画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<img id="logo" src="img/Lemon1.png">
<img id="satomi" src="img/satomi.png">
<script src="js/script.js"></script>
    <div class="container">
        <div class="keikoku">
            <h3>年齢確認が必要です</h3>
        </div>
        <br> <!-- Add a line break here -->
        <p class="question">あなたは20歳以上ですか？</p>
        
        <div class="button-container">
            <form method="post">
                <input type="submit" name="answer" value="Yes" class="button-yes">
                <input type="submit" name="answer" value="No" class="button-no">
            </form>
        </div>
    </div>
</body>
</html>
