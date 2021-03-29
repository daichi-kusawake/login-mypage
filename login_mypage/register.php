<!DOCTYPE html>
<html lang="ja">
    <head>
         <!--文字コードをセット-->
         <meta charset="utf-8">
         <!--タイトル-->
         <title>マイページ登録</title>
         <!--CSS-->
         <link rel ="stylesheet" type="text/css" href="register.css">
    </head>

    <body>
        <header>
            <img src="image/4eachblog_logo.jpg">
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>

        <main>
            
            <!--会員情報を入力　POST通信でregister_confirm.phpに送信する-->
            <form action="register_confirm.php" method="post" enctype="multipart/form-data">

                <div class="form_contents">
                    <h2>会員登録</h2>

                    <div class="name">
                        <div class="hissu">必須</div>
                        <label>氏名</label><br>
                        <input type="text" class="formbox" size="40" name="name" required>
                    </div>

                    <div class="mail">
                        <div class="hissu">必須</div>
                        <label>メールアドレス</label><br>
                        <input type="text" class="formbox" size="40" name="mail" pattern="^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$" required>
                    </div>
                    <!--^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$-->
                    <!--^[a-z0-9._%+-]+@[a-z0-9.-]+¥.[a-z]{2,3}$-->

                    <div class="password">
                        <div class="hissu">必須</div>
                        <label>パスワード（半角英数字6文字以上）</label><br>
                        <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                    </div>

                    <div class="password">
                        <div class="hissu">必須</div>
                        <label>パスワード 確認</label><br>
                        <!--ConfirmPassword関数を呼んで 判定する-->
                        <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
                    </div>


                    <div class="picuture">
                        <label>　プロフィール写真</label><br>
                        <input type="hidden" name="max_file_size" value="1000000"/>
                        <input type="file" size="40" name="picture"> 
                    </div>

                    <div class="comments">
                        <label>コメント</label><br>
                        <textarea name="comments" cols="40" rows="5"></textarea>
                    </div>

                    <div class="toroku">
                        <input type="submit" class="submit_button" size="35" value="登録する">
                    </div>

                </div>
            </form>          
        </main>

        <footer>
            ©︎2021 InterNous.inc All rights reserved
        </footer>

        <!--パスワードが一致するか判定する関数(JS)-->
        <script>
            function ConfirmPassword(confirm){
                var input1 = password.value;
                var input2 = confirm.value;
                
                if(input1!=input2){
                    confirm.setCustomValidity("パスワードが一致しません。");
                }else{
                    confirm.setCustomValidity('');
                }
            }

        </script>
    </body>
</html>
