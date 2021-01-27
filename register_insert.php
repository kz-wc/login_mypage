<?php
  mb_internal_encoding("utf8");

  $pdo = new PDO("mysql:dbname=lesson2; host=localhost;", "root", "");

  $stmt = $pdo -> prepare('INSERT INTO registration (name, mail, password, profile_photo, comments) VALUES(?,?,?,?,?)');
  $stmt -> bindValue(1,$_POST['name']);
  $stmt -> bindValue(2,$_POST['mail']);
  $stmt -> bindValue(3,$_POST['password']);
  $stmt -> bindValue(4,$_POST['path_filename']);
  $stmt -> bindValue(5,$_POST['comments']);

  $stmt -> execute();
  $pdo = NULL;

  header('Location: http://localhost/MyPage/login_mypage/after_register.php');
