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
        <a href="Login.html">Login</a>
        <a href="#">Meet the team</a>
    </nav>
    <form action="register.php" method="post">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>

        <label for="passwordConfirmation">Retype Password</label><br>
        <input type="password" name="passwordConfirmation" id="passwordConfirmation"><br><br>

        <button type="submit">Sign up</button><br><br>
        <a href="Login.html">Login</a>
        <a href="forgetPassword.html">Forgot password</a>
    </form>
    <div class="color"></div>
    <div class="color2"></div>
</body>
</html>