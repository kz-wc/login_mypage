<?php
  session_start();
  if(isset($_SESSION['user_information']['id'])){
    header("Location: http://localhost/MyPage/login_mypage/mypage.php");
  }
$mail = "";
$password = "";
if(isset($_COOKIE['mail'])){
  $mail = $_COOKIE['mail'];
  $password = $_COOKIE['password'];
}
?>

<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ログイン</title>
  <style>
    @import url('./protype.css');
    @import url('./login.css');
  </style>
</head>
<body>
<?php
  include('./header.php');
?>

<main>
  <div class="main-block">
    <div class="error_message">
      <span>メールアドレスまたはパスワードが間違っています。</span>
    </div>
    <form method="POST" action="mypage.php">
      <div class="data_entry">
      <p>メールアドレス</p>
        <input class="form_text" type="text" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $mail; ?>"required>
      </div>
      <div class="data_entry">
      <p>パスワード</p>
        <input class="form_text" type="password" name="password" pattern="/^[a-zA-Z0-9]{6,8}+$/" value="<?php echo $password; ?>"required>
      </div>
      <div class="data_entry">
        <label><input class="checkbox" type="checkbox" name="keep_login" value="keep_login"
        <?php if(isset($_COOKIE['keep_login'])){
          echo "checked='checked'";
        } ?>>ログイン状態を保持する</label>
      </div>
      <input class="button submit" type="submit" value="ログイン">
    </form>
  </div>
</main>

<?php
  include('./footer.php');
?>
</body>
</html>