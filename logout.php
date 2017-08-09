<?php

session_start();

//SESSION変数を扱う時は絶対書く

//セッション情報の破棄（削除）
$SESSION=array();//中身の空っぽの配列で上書き

//セッションを呼び出すために使うクッキー情報の削除
//自分専用のSESSEIONにアクセスするID


if(ini_get("session.use_cookies")){
	$params=session_get_cookie_params();
	//	クッキーの有効期限を過去にセットすると、すでに無効な状態にできるので、
	//削除と同じ状態でにできる。42000秒前との意味。42000でなくてもよい。
	setcookie(session_name(),'',time()-42000,
		$params['path'],$params['domain'],$params['secuer'],$params['httponly']);
}

//セッション情報を完全に消滅させる
session_destroy();

//index.phpに戻る（ログインチェックのため）
header('Location: index.php');//できているかのチェックのため暫定でlogin.phpに設定


?>