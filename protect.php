<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST['logout'])) {
  unset($_SESSION['user']);
}

// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}

// (D) SESSION DISTROY AFTER USER INACTIVE FOR 5 MINUTES

// if (time() - $_SESSION['timestamp'] > 300) { 
//   echo "<script>alert('5 Minutes over!');</script>";
//   unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
//   $_SESSION['logged_in'] = false;
//   header("Location:index.php"); 
//   exit;
// } else {
//   $_SESSION['timestamp'] = time(); 
// }

?>



<html>

<head>
  <style>
    .home {
      z-index: 3;
      position: fixed;
      width: 60px;
      height: 60px;
      top: 15px;
      left: 15px;
      background-color: #c9ffef;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 0px 0px 3px #999;
    }

    .upload {
      z-index: 3;
      position: fixed;
      width: 60px;
      height: 60px;
      top: 85px;
      left: 15px;
      background-color: #c9ffef;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 0px 0px 3px #999;
    }

    .exit {
      z-index: 3;
      position: fixed;
      width: 60px;
      height: 60px;
      top: 155px;
      left: 15px;
      background-color: #c9ffef;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 0px 0px 3px #999;
    }

    .list {
      z-index: 3;
      position: fixed;
      width: 60px;
      height: 60px;
      top: 225px;
      left: 15px;
      background-color: #c9ffef;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 0px 0px 3px #999;
    }

    .my-float {
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</body>

</html>