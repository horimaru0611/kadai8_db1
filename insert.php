<?php
//エラー表示
ini_set("display_errors", 1);

//1. POSTデータ取得
$bname   = $_POST["bname"];
$burl  = $_POST["burl"];
$comment = $_POST["comment"];


//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=horibook_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBError:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bname,burl,comment,indate)VALUES(:bname, :burl, :comment, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bname', $bname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':burl', $burl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit();
}
?>
