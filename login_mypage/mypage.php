
<?php 

//文字コードの設定
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

//プリペアードステートメント(予めSQL文を作成する)
$stmt = $pdo->prepare("select * from login_mypage where mail=? && password=?");
//パラメータをセットする
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);
//クエリを実行
$stmt->execute();


//DB切断
$pdo = NULL;

//DBからデータを取得し、sessionに代入
while($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
}

//画像ファイルのディレクトリパスを作成
$image_path="./image/".$_SESSION['picture'];

//データ取得出来たか判定、空の場合はエラー画面へリダイレクト
if(empty($_SESSION['mail'])){
    header("Location:http://localhost/login_mypage/login_error.php");
}

//ログイン状態を保持するにチェックが入っていた場合、セッションにlogin_keepの値を代入
if(!empty($_POST['login_keep'])){
    $_SESSION['login_keep']=$_POST['login_keep'];
}

//ログインに成功しているかつセッションのlogin_keepが空ではの場合、cookieにデータをセット（期限１週間）
if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);

}else if(empty($_SESSION['login_keep'])){
    //ログイン保持するをチェックしていない場合はcookieデータを削除
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('login_keep','',time()-1);
}
?>



<!DOCTYPE html>
<html lang="ja">

    <head>
         <!--文字コードをセット-->
         <meta charset="utf-8">
         <!--タイトル-->
         <title>マイページ登録</title>
         <!--CSS-->
         <link rel ="stylesheet" type="text/css" href="mypage.css">
    </head>

    <body>
        <!--ヘッダー部-->
        <header>
            <img src="image/4eachblog_logo.jpg">
            <div class="login"><a href="log_out.php">ログアウト</a></div>
        </header>

        <!--メイン部-->
        <main>


            <div class="confirm">
                <!--DBから取得し、sessionに格納した情報を出力-->
                <div class="form_contents">
                    <h2>会員登録</h2>

                    <p>こんにちは！<?php echo $_SESSION['name'];?></p>

                    <!--セッション情報を出力-->
                    <div class="output">
                        <!--画像を出力-->
                        <div class="profile_pic">
                            <img src="<?php echo $image_path;?>">
                        </div>
                        <!--文字情報を出力-->
                        <div class="basic_info">
                            <!--セッションの名前を出力-->
                            <p>氏名：<?php echo $_SESSION['name']; ?></p>
                            <!--セッションのメールを出力-->
                            <p>メール：<?php echo $_SESSION['mail']; ?></p>
                            <!--セッションのパスワードを出力-->
                            <p>パスワード：<?php echo $_SESSION['password'];?></p>
                        </div>
                    </div>
                     <!--セッションのコメントを出力-->
                     <div class="comments">
                        <?php echo $_SESSION['comments']; ?>
                     </div>
                     

                    <form action="mypage_hensyu.php" method="post" class="form_center">
                        <!--他から編集画面へのアクセス拒否-->
                        <input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
                        <!--編集するボタン-->
                        <div class="hensyu">
                            <input type="submit" class="submit_button" size="35" value="編集する">
                        </div>
                    </form>

                </div>
            </div>
        </main>

        <!--フッター部-->
        <footer>
            ©︎2021 InterNous.inc All rights reserved
        </footer>

    </body>
</html>