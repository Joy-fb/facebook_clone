<?php
session_start();
$conn = new mysqli("localhost", "root", "", "facebook_clone");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email_phone = $_POST['email_phone'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email_phone='$email_phone' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $_SESSION['user'] = $email_phone;
        echo "<h2>Login Successful!</h2> Welcome " . $email_phone . "<br><a href='index.php'>Logout</a>";
    } else {
        echo "<h2>Wrong Email or Password!</h2> <a href='login.php'>Try Again</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 20px; border-radius: 8px; width: 300px; }
        input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #1877f2; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2 style="color:#1877f2; text-align:center;">facebook Login</h2>
        <form method="POST">
            <input type="text" name="email_phone" placeholder="Email or Phone" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <p style="text-align:center;">Create new account? <a href="index.php">Sign Up</a></p>
    </div>
</body>
</html>
Compose
