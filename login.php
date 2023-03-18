<?php 
session_start();
require 'functions.php';

if( isset($_COOKIE['id']) && isset($_COOKIE['data'])){
    $id = $_COOKIE['id'];
    $data = $_COOKIE['data'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_fetch_assoc($result)){
    if($data === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}
}


if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}



if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result)===1){ 
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"] = true;

            if(isset($_POST["remember"])){
                setcookie("id", $row['id_user'], time()+60);
                setcookie("data",hash('sha256',$row['username']),time()+60); //samarkan username menjadi kata 'data'
                
            }

            header("Location:index.php");
            exit;
        }
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php if(isset($error)==true): ?>
<p style="color:red;font-style:italic;">Username/Password Salah</p>
<?php endif; ?>

<h1>Login Administrator</h1>

<form actions="" method="post">
  <ul>
    <li>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username">
    </li>
    <li>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password">
    </li>
    <li>
        <label for="remember">Remember me</label>
        <input type="checkbox" name="remember" id="remember">
    </li>
    <li>
      <button type="submit" name="login">Login</button>
    </li>
  </ul>
</form>
</body>
</html>