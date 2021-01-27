<?php
  session_start();
  session_destroy();

  header("Location: http://localhost/MyPage/login_mypage/login.php");