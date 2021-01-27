<?php
  mb_internal_encoding("utf8");

  $temp_pic_name = $_FILES['profile_photo']['tmp_name'];
  $original_pic_name = $_FILES['profile_photo']['name'];
  $path_filename = './image/'.$original_pic_name;
  if( $path_filename == './image/' ){
    $path_filename = './image/no_image.jpg';
  }

  move_uploaded_file($temp_pic_name, $path_filename);
?>

<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>登録内容確認</title>
  <style>
    @import url('./protype.css');
    @import url('./register_confirm.css');
  </style>
</head>
<body>

<?php
  include('./header.php');
?>

<main>
  <div class="main-block">
    <h2>会員登録 確認</h2>
    <p class="confirm_text"><span class="break_line">こちらの内容で登録しても</span><span class="break_line">よろしいでしょうか？</span></p>
    <div>
      <div class="contents_confirmed">
        <div>
        <p>氏名 : <?php echo $_POST['name']; ?></p>
        </div>
        <div>
        <p>メールアドレス : <?php echo $_POST['mail']; ?></p>
        </div>
        <div>
        <p>パスワード : <?php echo $_POST['password']; ?></p>
        </div>
        <div>
        <p>プロフィール写真 : <?php echo $original_pic_name; ?></p>
        </div>
        <div>
        <p>コメント  : <?php echo $_POST['comments']; ?></p>
        </div>
      </div>
      <div class="button_box">
        <form method="POST" action="register.php">
          <input class="button correct" type="submit" value="戻って修正する">
          <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
          <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
          <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
          <input type="hidden" value="<?php echo $_POST['profile_photo'];?>" name="profile_photo">
          <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
        </form>
        <form method="POST" action="register_insert.php">
          <input class="button submit" type="submit" value="登録する">
          <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
          <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
          <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
          <input type="hidden" value="<?php echo $path_filename; ?>" name="path_filename">
          <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
        </form>
      </div>
    </div>
  </div>
</main>

</div>

<?php
  include('./footer.php');
?>

</body>
</html>