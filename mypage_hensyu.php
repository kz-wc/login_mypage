<?php
  mb_internal_encoding("utf8");
  session_start();

  if( empty($_POST['from_mypage']) ){
    header("Location: http://localhost/MyPage/login_mypage/login_error.php");
  }
?>
<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>会員情報ー編集</title>
  <style>
    @import url('./protype.css');
    @import url('./mypage_hensyu.css');
  </style>
</head>
<body>

<?php
  include('./header.php');
?>

<main>
  <div class="main-block">
    <div class="h2_and_logout">
      <h2>会員情報</h2>
    </div>
    <form class="main-block__body" method="POST" action="./mypage_update.php">
      <p><?php echo $_SESSION['user_information']['name']."さん こんにちは" ?></p>
      <div class="profile">
        <div id="profile_left">
        <img class ="profile_photo" src="<?php echo $_SESSION['user_information']['profile_photo'] ?>">
        </div>
        <div id="profile_right">
          <div>
          <p>氏名 : &emsp;&emsp;&emsp;<input class="form_text" type="text" name="name" value="<?php echo $_SESSION['user_information']['name']?>" required></p>
          </div>
          <div>
          <p>メール : &emsp;&emsp;<input class="form_text" type="text" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['user_information']['mail']?>" required> </p>
          </div>
          <div>
          <p>パスワード : <input class="form_text" type="password" name="password" pattern="/^[a-zA-Z0-9]{6,8}+$/" value="<?php echo $_SESSION['user_information']['password']?>" required></p>
          </div>
        </div>
      </div>
      <div class="textarea">
        <textarea name="comments"><?php echo $_SESSION['user_information']['comments']?></textarea>
      </div>
      <input class="button submit" type="submit" value="この内容に変更する">
      <input type="hidden" name="id" value="<?php echo $_SESSION['user_information']['id']?>">
    </form>
  </div>
</main>

</div>

<?php
  include('./footer.php');
?>


</body>
</html>