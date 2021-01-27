<?php
  $name = "";
  $mail = "";
  $password = "";
  $profile_photo = "";
  $comments = "";
  if($_POST){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $profile_photo = $_POST['profile_photo'];
    $comments = $_POST['comments'];
  }
?>
<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>会員登録</title>
  <style>
    @import url('./protype.css');
    @import url('./register.css');
  </style>
</head>
<body>

<?php
  include('./header.php');
?>

<main>
  <div class="main-block">
    <h2>会員登録</h2>
    <form method="POST" action="register_confirm.php" enctype="multipart/form-data">
      <div>
      <p><div class="required">必須</div>氏名</p>
        <input class="form_text" type="text" name="name" value="<?php echo $name; ?>" required>
      </div>
      <div>
      <p><div class="required">必須</div>メールアドレス</p>
        <input class="form_text" type="text" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $mail; ?>"required>
      </div>
      <div>
      <p><div class="required">必須</div>パスワード</p>
        <input class="form_text" type="password" id="password" name="password" pattern="/^[a-zA-Z0-9]{6,8}+$/" value="<?php echo $password; ?>"required>
      </div>
      <div>
      <p><div class="required">必須</div>パスワード確認</p>
        <input class="form_text" type="password" id="confirm" name="password" value="<?php echo $password; ?>" oninput="confirmPassword(this)" required>
      </div>
      <div>
      <p>プロフィール写真</p>
        <input type="hidden" name="max_file_size" value="1000000">
        <input type="file" name="profile_photo" value="<?php echo $profile_photo; ?>">
      </div>
      <div>
      <p>コメント</p>
        <textarea cols="35" row="7" name="comments"><?php echo $comments;?></textarea>
      </div>
      <input class="button submit" type="submit" value="登録する">
    </form>
  </div>
</main>

</div>

<?php
  include('./footer.php');
?>

<script type="text/javascript" src="./js/register_ConfPassword.js"></script>

</body>
</html>