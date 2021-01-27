<?php
  mb_internal_encoding("utf8");
  session_start();

  if( empty($_SESSION['id']) ){

    try{
      $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");
    } catch(PDOException $e){
      die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスできません。<br>しばらくしてから再度ログインしてください。</p><a href='http://localhost/Mypage/login_mypage/login.php'>ログイン画面へ</a>");
    }

    if( !empty($_POST)){
    $stmt = $pdo -> prepare("SELECT * FROM registration WHERE mail = ? && password = ?");
    $stmt -> bindValue(1, $_POST['mail'], );
    $stmt -> bindValue(2, $_POST['password'], );

    $stmt -> execute();
    $pdo = NULL;

    $_SESSION['user_information'] = $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    if( empty($_SESSION['user_information']) ){
      header("Location: http://localhost/MyPage/login_mypage/login_error.php");
    }

    if( !empty($_POST['keep_login']) ){
      $_SESSION['keep_login'] = $_POST['keep_login'];
    }
  }

  if( !empty($_SESSION['user_information']['id']) && !empty($_SESSION['keep_login']) ){
    setcookie('mail', $_SESSION['user_information']['mail'], time()+60*60*24*7);
    setcookie('password', $_SESSION['user_information']['password'], time()+60*60*24*7);
    setcookie('keep_login', $_SESSION['keep_login'], time()+60*60*24*7);
  } else if( empty($_SESSION{'keep_login'}) ){
    setcookie('mail', "", time()-1);
    setcookie('password', "", time()-1);
    setcookie('keep_login', "", time()-1);
  }
?>
<!DOCTYPE html>
  <html lang="ja">
<head>
  <meta charset="utf-8">
  <title>会員情報</title>
  <style>
    @import url('./protype.css');
    @import url('./mypage.css');
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
      <a id="logout" href="http://localhost/MyPage/login_mypage/log_out.php">ログアウト</a>
    </div>
    <div class="main-block__body">
      <p><?php echo $_SESSION['user_information']['name']."さん こんにちは" ?></p>
      <div class="profile">
        <div id="profile_left">
        <img class ="profile_photo" src="<?php echo $_SESSION['user_information']['profile_photo'] ?>">
        </div>
        <div id="profile_right">
          <div>
          <p><span class="break_line">氏名 : </span><span class="break_line"><?php echo $_SESSION['user_information']['name']?></span></p>
          </div>
          <div>
          <p><span class="break_line">メール : </span><span class="break_line"><?php echo $_SESSION['user_information']['mail']?></span></p>
          </div>
          <div>
          <p><span class="break_line">パスワード : </span><span class="break_line"><?php echo $_SESSION['user_information']['password']?></span></p>
          </div>
        </div>
      </div>
      <div>
        <p><?php echo $_SESSION['user_information']['comments']?></p>
      </div>
      <form method="POST" action="mypage_hensyu.php">
        <input class="button submit" type="submit" value="編集する">
        <input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
      </form>
    </div>
  </div>
</main>

</div>

<?php
  include('./footer.php');
?>


</body>
</html>