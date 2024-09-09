<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
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

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
  <fieldset>
    <legend class="legend">書籍ブックマーク</legend>
    
  <table class="table">
                <tr>
                    <th class="item">書籍名</th>
                    <td class="body"><input type="text" name="bname" id="name"></td>
                </tr>
                <tr>
                    <th class="item">書籍URL</th>
                    <td class="body"><input type="url" name="burl" id="mail"></td>
                </tr>
                
                <tr>
                    <th class="item">書籍コメント</th>
                    <td class="body"><textarea name="comment" id="comment"></textarea></td>
                </tr>
            </table>
            <button type="submit" class="submit">送信</button>
            </fieldset>

  </div>
</form>
<!-- Main[End] -->


</body>
</html>
