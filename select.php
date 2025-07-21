<?php
// session_start();
include("funcs.php");
// sschk();
$pdo = db_conn();

//データ登録SQL
$stmt = $pdo->prepare("SELECT * FROM test_user_table");
$status = $stmt->execute();

//データ表示
$values ="";
if($status==false){
    sql_error($stmt);
}

//全データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録情報</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<header>
    <nav class="navbar navbar-dafault">
        <div class="container-fluid">
        <div class="navbar-header">
        <a class= "navbar-brand" href="index.php">データ登録</a>
    </nav>
</header>

<!-- <div>
    <div class="container jumbotron">
        <table>
            <?php foreach($values as $v){ ?>
            <tr>
                <td><?=$v["id"]?></td>
                <td><a href="detail.php?id=<?=$v["id"]?>"><?=$v["name"]?></a></td>
                <td><a href="delete.php?id=<?=$v["id"]?>">[削除]</a></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</div> -->

<table border="1">
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>好きな花</th>
        <th>誕生日</th>
        <th>電話番号</th>
        <th>メール</th>
        <th>郵便番号</th>
        <th>住所</th>
        <th>操作</th>
    </tr>
    <?php foreach($values as $v){ ?>
    <tr>
        <td><?= h($v["id"]) ?></td>
        <td><?= h($v["name"]) ?></td>
        <td><?= h($v["favorite"]) ?></td>
        <td><?= h($v["birthday"]) ?></td>
        <td><?= h($v["tel"]) ?></td>
        <td><?= h($v["mail"]) ?></td>
        <td><?= h($v["postalcode"]) ?></td>
        <td><?= h($v["address"]) ?></td>
        <td>
            <a href="detail.php?id=<?= h($v["id"]) ?>">[編集]</a> 
            <a href="delete.php?id=<?= h($v["id"]) ?>">[削除]</a>
        </td>
    </tr>
    <?php } ?>
</table>

<script>
    const a = '<?php echo $json; ?>';
    console.log(JSON.parse(a));
</script>
</body>
</html>