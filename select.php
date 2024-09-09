<?php
//エラー表示
ini_set("display_errors", 1);

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=horibook_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute(); //実行

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍ブックマーク表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/select.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="jumbotron">
    <legend class="legend">書籍一覧</legend>
    <table>
  <tr>
    <th> 書籍名</th>
    <th> URL </th>
    <th> コメント </th>
<a href=""></a>
  </tr>

<?php foreach($values as $v){ ?>
    <tr>
      <td><?=$v["bname"]?></td>
      <td><a href="<?=$v["burl"]?>"></a><?=$v["burl"]?></td>
      <td><?=$v["comment"]?></td>
    </tr>
<?php } ?>



    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>