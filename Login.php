<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$is_invalid = false;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $conn = require __DIR__ . "/database.php";
    $email = $conn -> real_escape_string($_POST['email']);
    $sql = "SELECT * FROM `user` WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    if($user)
    {
        if(password_verify($_POST['password'], $user['passwordHash']))
        {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('location: loginSuccess.php');
            exit;
        }
        else
        {
            $is_invalid = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.html">Home</a>
        <a href="#">Meet the team</a>
    </nav>
    <form method="POST">
        <?php if($is_invalid): ?>
            <em>Email or password is incorrect</em>
        <?php endif; ?>
        <br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br><br>
        <button type="submit">Login</button><br><br>
        <a href="signup.html">Sign up</a>
        <a href="forgetPassword.html">Forgot password</a>
    </form>
    <div class="color"></div>
    <div class="color2"></div>
</body>
</html>