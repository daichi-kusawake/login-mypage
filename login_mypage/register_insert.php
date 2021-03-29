<?php
mb_internal_encoding("utf8");

//DB接続
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

//プリペアードステートメントでSQL文の型を作成する。
$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

//bindValueメソッドでパラメータをセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);

//executeでクエリを実行
$stmt->execute();

//DB切断
$pdo = NULL;

//DB切断
$pdo = NULL;



header('Location:after_register.html');

?>