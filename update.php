<?php
//1. POSTデータ取得
$name       = $_POST["name"];
$favorite   = $_POST["favorite"];
$birthday   = $_POST["birthday"];
$tel        = $_POST["tel"];
$mail       = $_POST["mail"];
$postalcode = $_POST["postalcode"];
$address    = $_POST["address"];
$id         = $_POST["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE test_user_table SET name=:name,favorite=:favorite,birthday=:birthday,tel=:tel,mail=:mail,postalcode=:postalcode,address=:address WHERE id=:id");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':favorite',   $favorite,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birthday',   $birthday,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tel',   $tel,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail',   $mail,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':postalcode',   $postalcode,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address',  $address,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
