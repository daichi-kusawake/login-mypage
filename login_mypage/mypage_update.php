<?php

//文字コードを設定
mb_internal_encoding("utf8");

//セッションを開始
session_start();

try{
    //DBに接続できなければエラーメッセージを表示
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

}catch(PDOException $e){

    //エラー処理
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

//プリペアードステートメント(予めSQL文を作成する)　指定したidのカラムを変更する
$stmt = $pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=? where id=?");

//bindValueメソッドでパラメータをセット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_POST['id']);

//executeでクエリを実行
$stmt->execute();

//プリペアードステートメント(予めSQL文を作成する) 変更したデータを抽出
$stmt = $pdo->prepare("select * from login_mypage where id=?");

//bindValueメソッドでパラメータをセットする
$stmt->bindValue(1,$_POST['id']);

//クエリを実行
$stmt->execute();

//DB切断
$pdo = NULL;

//DBからデータを取得し、sessionに代入
while($row = $stmt->fetch()){
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['comments'] = $row['comments'];
}

header("Location:http://localhost/login_mypage/mypage.php");

?>