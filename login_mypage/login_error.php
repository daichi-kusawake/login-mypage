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
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>

        <main>
            <form action="mypage.php" method="post">

                <div class="form_contents">

                    <!--エラーメッセージを表記-->
                    <div class="error_message">
                        <p>メールアドレスまたはパスワードが間違っています。</p>
                    </div>
                    
                    <!--メールアドレスを入力-->
                    <div class="mail">
                        <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" value="" name="mail">
                    </div>

                    <!--パスワードを入力-->
                    <div class="password">
                        <label>パスワード</label><br>
                        <input type="password" class="formbox" size="40" value="" name="password">
                    </div>

                    <!--ログインチェック-->
                    <div class="login_check">
                        <label>
                            <input type="checkbox" class="formbox" size="40" name="login_keep" value="login_keep">
                            ログイン状態を保持する
                        </label>
                    </div>

                    <!--ログインボタン-->
                    <div class="loginbutton">
                        <input type="submit" class="submit_button" size="35" value="ログイン">
                    </div>

                </div>
            </form>
        </main>

        <footer>
            ©︎2021 InterNous.inc All rights reserved
        </footer>

    </body>

</html>