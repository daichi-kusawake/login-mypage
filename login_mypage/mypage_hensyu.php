<?php 

//文字コード設定
mb_internal_encoding("utf8");

//セッションを開始
session_start();

//画像ファイルのディレクトリパスを作成
$image_path="./image/".$_SESSION['picture'];

//POST通信で乱数が送られなかった場合、login_error.phpへリダイレクト
if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
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
         <link rel ="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
        <!--ヘッダー部-->
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="login"><a href="log_out.php">ログアウト</a></div>
        </header>

        <!--メイン部-->
        <main>
            <div class="confirm">
                <!--DBから取得し、sessionに格納した情報を出力-->
                <div class="form_contents">
                    <h2>会員登録</h2>

                    <p>こんにちは！<?php echo $_SESSION['name'];?></p>

                    <form action="mypage_update.php" method="post">

                        <!--セッション情報を出力と入力-->
                        <div class="output">
                            <!--画像を出力-->
                            <div class="profile_pic">
                                <img src="<?php echo $image_path;?>">
                            </div>

                            <!--文字情報を出力と入力-->
                            <div class="basic_info">
                                <!--セッションの名前を出力と入力-->
                                <p>　　氏名　：<input type="text" class="formbox" size="30" name="name" value="<?php echo $_SESSION['name'];?> "></p>
                                <!--セッションのメールを出力と入力-->
                                <p>　メール　：<input type="text" class="formbox" size="30" name="mail" value="<?php echo $_SESSION['mail'];?>" pattern="^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$"></p>
                                <!--セッションのパスワードを出力と入力-->
                                <p>パスワード：<input type="text" class="formbox" size="30" name="password" value="<?php echo $_SESSION['password'];?>" pattern="^[a-zA-Z0-9]{6,}$"></p>
                            </div>
                        </div>
                        
                        <!--コメントを出力と入力-->
                        <div class="comments">
                            <textarea name="comments" cols="55" rows="4"><?php echo $_SESSION['comments'];?></textarea>
                        </div>

                        <!--入力内容をmypage_update.phpにPOST送信-->
                        <div class="hensyu_button">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
                            <input type="submit" class="submit_button" size="35" value="この内容に変更する">
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
