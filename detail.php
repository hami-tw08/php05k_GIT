<?php
$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");//sschk有効化に必須！
// session_start();//sschk有効化に必須！
// sschk();//守りたいページにssチェック！（funcsに組み込んでいる）
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM test_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<form method="POST" action="update.php" enctype="multipart/form-data">
    <div class="jumbotron">
        <fieldset>
            <legend>サブスクユーザー登録情報</legend>
            <label>氏名： <input type="text" name="name" value="<?=$row["name"]?>"></label><br>
            <label>好きな花： <textarea name="favorite" rows="4" cols="40"><?=$row["favorite"]?></textarea></label><br>
            <label>誕生日：<input type="text" name="birthday" value="<?=$row["birthday"]?>"></label><br>
            <label>電話番号：<input type="text" name="tel" value="<?=$row["tel"]?>"></label><br>
            <label>mail：<input type="text" name="mail" value="<?=$row["mail"]?>"></label><br>
            <label>郵便番号：<input type="text" name="postalcode" value="<?=$row["postalcode"]?>"></label><br>
            <label>住所：<input type="text" name="address" value="<?=$row["address"]?>"></label><br>
            <input type="submit" value="送信">
            <input type="hidden" name="id" value="<?=$id?>">
        </fieldset>
    </div>
</form>

</body>
</html>
