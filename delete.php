<?php

 session_start();
 require('dbconnect.php') ; //ログインチェック

if(isset($_SESSION['login_member_id'])){

	//指定されたtweet_idが、ログインユーザー本人のものかチェック（宿題：指定されたtweet_id、ログインユーザーidでデーター取得）

	$sql = 'SELECT * FROM `tweets` Where `member_id`=? and `tweet_id`=?';

	$data=array($_SESSION['login_member_id'],$_GET['tweet_id']);

    $stmt=$dbh->prepare($sql);
   $stmt->execute($data);

   //該当データが1件もない場合は、$recordに falseが代入される
   $record = $stmt->fetch(PDO::FETCH_ASSOC);
if($record != false){
   	//本人のものであれば、削除処理（論理削除）

   	//練習問題
   	//論理削除のSQL文を作成し、実行
   	//UPDATE文でdelete_flag=1に変更（指定されたtweet_idのみ）
   	$sql='UPDATE `tweets` SET `delete_flag`=1 WHERE `tweet_id` =?';
   	$data=array($_GET['tweet_id']);
   	//SQL文実行」
   	$stmt=$dbh->prepare($sql);
   $stmt->execute($data);


   }



}
//トップページに戻る
header("location: index.php");
?>