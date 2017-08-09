<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeedSNS</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/form.css" rel="stylesheet">
    <link href="../assets/css/timeline.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <!--
      designフォルダ内では2つパスの位置を戻ってからcssにアクセスしていることに注意！
     -->
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html"><span class="strong-title"><i class="fa fa-twitter-square"></i> Seed SNS</span></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 content-margin-top">
        <div class="well">
          ご登録ありがとうございます。 <br>
          下記ボタンよりログインして下さい。
        </div>
        <a href="../login.html" class="btn btn-default">ログイン</a>
      </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-3.1.1.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <?php
    session_start();

    if (!empty($_POST)){
      //中身が空ではなかったら、POST送信する
   require('../dbconnect.php');

  

   $sql= 'INSERT INTO `members` SET `nick_name`=?,
                                     `email`=?,
                                     `password`=?,
                                     `picture_path`=?,
                                     `created`=NOW() ';
  //?をつける理由：ｓｑｌのサニータイズのため、ユーザは何か変な入力したら、可笑しくなることを防ぐため

   $data=array($_SESSION['join']['nick_name'],$_SESSION['join']['email'],sha1($_SESSION['join']['password']),
    $_SESSION['join']['picture_path']);
   $stmt=$dbh->prepare($sql);
   $stmt->execute($data);
//$_SESSIONの情報削除
   //削除する理由：削除しなければ、前の登録者が残っている
   unset($_SESSION['join']);
   //例）


 }

 
 ?>
  </body>
</html>

