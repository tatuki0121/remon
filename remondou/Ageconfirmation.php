<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>年齢確認画面</title>
    <link rel="stylesheet" href="css/nenrei.css">
</head>

<body>
    <img id="logo" src="image/Lemon.png">
    <img id="satomi" src="image/satomi.png">
    <script src="js/script.js"></script>
    <div class="container">
        <div class="keikoku">
            <h3>年齢確認が必要です</h3>
        </div>
        <br> <!-- Add a line break here -->
        <p class="question">あなたは20歳以上ですか？</p>
        
        <div class="button-container">
            <form method="post" id="ageForm">
                <input type="submit" name="answer" value="Yes" class="button-yes" onclick="submitForm('login-1.php')">
                <input type="button" value="No" class="button-no" onclick="goBack()">
            </form>
        </div>
    </div>

    <script>
        function submitForm(action) {
            document.getElementById('ageForm').action = action;
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
