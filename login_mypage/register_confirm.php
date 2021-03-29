<?php

//文字コードを設定
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルのディレクトリパスを取得。
$original_pic_name =$_FILES['picture']['name'];
$path_filename ='./image/'.$original_pic_name;

//仮保存の画像ファイルを、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
         <!--文字コードをセット-->
         <meta charset="utf-8">
         <!--タイトル-->
         <title>マイページ登録</title>
         <!--CSS-->
         <link rel ="stylesheet" type="text/css" href="register_confirm.css">
    </head>

    <body>
        <!--ヘッダー部-->
        <header>
            <img src="image/4eachblog_logo.jpg">
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>
        
        <!--メイン部-->
        <main>
            <!--登録する情報を表示する-->
            <div class="confirm">

                <div class="form_contents">

                    <h2>会員登録 確認</h2>

                    <p>こちらの内容で登録しても宜しいでしょうか？</p>

                    <!--氏名-->
                    <div class="name">
                        氏名：<?php echo $_POST['name']; ?>
                    </div>

                    <!--メール-->
                    <div class="mail">
                        メール：<?php echo $_POST['mail']; ?>
                    </div>

                    <!--パスワード-->
                    <div class="password">
                        パスワード<?php echo $_POST['password']; ?>
                    </div>

                    <!--プロフィール写真-->
                    <div class="picture">
                        プロフィール写真：<?php echo $original_pic_name; ?>
                    </div>

                    <!--コメント-->
                    <div class="comments">
                       コメント：<?php echo $_POST['comments']; ?>
                    </div>

                </div>

                <!--２つのボタン操作-->

                <div class="buttons">
                    <!--情報入力画面に戻る-->
                    <div class="return_button">
                        <a href="register.php">戻って修正する</a>
                    </div>


                    <!--postをnameに格納して、register_insert.phpに引き渡す-->
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="submit" class="submit_button" value="登録する"/>
                            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                            <input type="hidden" value="<?php echo $original_pic_name; ?>" name="picture">
                            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                        </form>
                    </div>

                </div>
            
            </div>
        </main>

        <!--フッター部-->
        <footer>
            ©︎2021 InterNous.inc All rights reserved
        </footer>
    </body>
</html>