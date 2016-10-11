<?php  
  $nickname = htmlspecialchars($_POST['nickname']);
  $email = htmlspecialchars($_POST['email']);
  $content = htmlspecialchars($_POST['content']);
  

  // データベースへの接続
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password='';

  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8'); 
  
  // SQl文の実行
  $sql = 'INSERT INTO `survey`(`nickname`, `email`, `content`) VALUES ("'.$nickname.'", "'.$email.'", "'.$content.'")';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  
  // データベースを切断する
  $dbh = null;
?>

<!-- ?php
  $nickname = htmlspecialchars($_POST['nickname']);
  $email = htmlspecialchars($_POST['email']);
  $content = htmlspecialchars($_POST['content']);

  // １．データベースに接続する
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  // データソース名(データベースに接続するために必要な情報を記述します)
  $user = 'root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  //これは新しいデータアクセス抽象レイヤーを作って、()の中の変数はどのデータベースにも接続できますよ。という意味。
  $dbh->query('SET NAMES utf8');
  // 'SET NAMES utf8'は'SELECT * FROM `survey` WHERE code = 3';みたいにデータベースに対する命令文の一種。『query('SET NAMES utf8')』を実行することで、MySQLのデータベースに情報を格納する時の文字化けを解消できるってことらしいです。データベースハンドル
  // queryとは、データベース管理システムに対する処理要求(問い合わせ)を文字列として表したもの。データの検索や更新、削除などの命令をシステムに発行するのに使われる。検索クエリーでは、対象となるテーブルやデータの抽出条件、並べ方などを指定する。

  // ２．SQL文を実行する
  $sql = 'INSERT INTO `survey`(`nickname`,`email`,`content`) VALUES ("'.$nickname.'","'.$email.'","'.$content.'")';
  //ダブルがバリューの要素を囲ってて、シングルが中にあるのは変数だよって印だと解釈した
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  // ３．データベースを切断する
  $dbh = null;
?> -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <div>
    <h3>お問い合わせ詳細内容</h3>
    <p>ニックネーム:<?php echo $nickname; ?></p>
    <p>メールアドレス:<?php echo $email; ?></p>
    <p>お問い合わせ詳細:<?php echo $content; ?></p>
  </div>
</body>
</html>