<?php

//セッションの開始
session_start();

//ログイン状態であればmypage.phpに遷移する
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
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
         <link rel ="stylesheet" type="text/css" href="login.css">
    </head>

    <body>
        <!--ヘッダー部-->
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="login"><a href="register.php">新規登録</a></div>
        </header>

        <!--メイン部-->
        <main>
            <!--ログイン情報を入力してmypage.phpにPOST送信する-->
            <form action="mypage.php" method="post">
                <div class="from_contents">

                    <!--メールアドレスを入力-->
                    <div class="mail">
                        <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" value="<?php echo $_COOKIE['mail'];?>" name="mail">
                    </div>

                    <!--パスワードを入力-->
                    <div class="password">
                        <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" value="<?php echo $_COOKIE['password'];?>" name="password">
                    </div>

                </div>

                <!--ログインをキープするを押しているか確認-->
                <div class="login_check">
                    <label>
                        <input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep" 
                        <?php
                        if(isset($_COOKIE['login_keep'])){
                            echo "checked='checked'";
                        }
                        ?>>
                        ログイン状態を保持する
                    </label>
                </div>

                <!--ログインボタン-->
                <div class="loginbutton">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
                
            </form>
        </main>

        <!--フッター部-->
        <footer>
            ©︎2021 InterNous.inc All rights reserved
        </footer> 
    </body>
</html>