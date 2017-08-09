like.php
<?php
 session_start();
 require('dbconnect.php') ; //ログインチェック



	//前提：$_GET['tweet_id']でlikeしたいtweet_idが取得できる
if(isset($_SESSION['login_member_id'])){

	//Insert文
	//演習：ログインしている人が指定したtweet_idのつぶやきをlikeした情報を保存するINSERT文を作成しましょう。


	$sql = 'INSERT INTO `likes` SET `tweet_id`='.$_GET['tweet_id'].',`member_id`='. $_SESSION['login_member_id'];

	// $sql = sprinft('INSERT INTO `likes` SET `tweet_id`=%d,`member_id`=%d, $_GET['tweet_id'], $_SESSION['login_member_id']');
	                                 

	$record=array($_SESSION['login_member_id'],$_GET['tweet_id']);

    $stmt=$dbh->prepare($sql);
   $stmt->execute();

   


   }


//トップページに戻る
header("location: index.php");
exit();
?>

