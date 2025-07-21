<?php
// session_start();
include("funcs.php");
$pdo = db_conn();

//POSTデータ取得
$name   = $_POST["name"];
$favorite = $_POST["favorite"];
$birthday = $_POST["birthday"];
$tel      = $_POST["tel"];
$mail  = $_POST["mail"];
$postalcode = $_POST["postalcode"];
$address = $_POST["address"];

//データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO test_user_table( name, favorite, birthday, tel, mail, postalcode, address)VALUES(:name, :favorite, :birthday, :tel, :mail, :postalcode, :address)");
$stmt->bindValue(':name', $name);
$stmt->bindValue(':favorite', $favorite);
$stmt->bindValue(':birthday', $birthday);
$stmt->bindValue(':tel', $tel);
$stmt->bindValue(':mail', $mail);
$stmt->bindValue(':postalcode', $postalcode);
$stmt->bindValue(':address', $address);
$status = $stmt->execute();

//データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
