<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (empty($_POST['name']))
{
    die('Name is required');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    die('Email is not valid');
}

if (strlen($_POST['password']) < 8)
{
    die('Password must be atleast 8 characters');
}
elseif(!preg_match('/[a-z]/i', $_POST['password']))
{
    die('Password must contain atleast one letter');
}
elseif(!preg_match('/[0-9]/', $_POST['password']))
{
    die('Password must contain atleast one number');
}
elseif($_POST['password'] != $_POST['passwordConfirmation'])
{
    die('Password must match');
}

$name = $_POST['name'];
$email = $_POST['email'];
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$conn = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, passwordHash) VALUE ( ?, ?, ?)";

$stmt = $conn->stmt_init();
if(! $stmt->prepare($sql))
{
    die('SQL error: ' . $conn->error);
}
$stmt->bind_param('sss',$name, $email, $passwordHash);

try {
    if ($stmt->execute())
    {
        header('Location: signupSuccess.php');
        exit;
    }
} catch (mysqli_sql_exception) {
    if($conn->errno == 1062)
    {
        die('email already exist, try to login instead');
    }
}
?>