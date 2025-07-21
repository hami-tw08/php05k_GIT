<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
    <title>データ登録</title>
</head>
<body>
    
<header>
    <nav class="navbar nabvar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
        </div>
    </nav>
</header>

<form method="POST" action="insert.php" enctype="multipart/form-data">
    <div class="jumbotron">
        <fieldset>
            <legend>サブスクユーザー登録情報</legend>
            <label>氏名： <input type="text" name="name"></label><br>
            <label>好きな花： <textarea name="favorite" rows="4" cols="40"></textarea></label><br>
            <label>誕生日：<input type="text" name="birthday"></label><br>
            <label>電話番号：<input type="text" name="tel"></label><br>
            <label>mail：<input type="text" name="mail"></label><br>
            <label>郵便番号：<input type="text" name="postalcode"></label><br>
            <label>住所：<input type="text" name="address"></label><br>
            <input type="submit" value="送信">
        </fieldset>
    </div>
</form>


</body>
</html>