<?php
  mb_internal_encoding("utf8");
  session_start();

  try{
    $pdo = new PDO("mysql:dbname=lesson2;host=localhost;","root","");
  } catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスできません。<br>しばらくしてから再度ログインしてください。</p><a href='http://localhost/Mypage/login_mypage/login.php'>ログイン画面へ</a>");
  }


  $stmt = $pdo -> prepare("UPDATE registration SET name = ?, mail = ?, password = ?, comments = ? WHERE id = ? ");

  $stmt -> bindValue(1,$_POST['name']);
  $stmt -> bindValue(2,$_POST['mail']);
  $stmt -> bindValue(3,$_POST['password']);
  $stmt -> bindValue(4,$_POST['comments']);
  $stmt -> bindValue(5,$_POST['id']);

  $stmt -> execute();


  $stmt = $pdo -> prepare("SELECT * FROM registration WHERE id = ?");

  $stmt -> bindValue(1,$_POST['id']);

  $stmt -> execute();
  $pdo = NULL;

  $_SESSION['user_information'] = $stmt -> fetch();

  header("Location: http://localhost/MyPage/login_mypage/mypage.php");