<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Your Password?</h2>
    <form method="POST" action="send_reset_link.php">
        <label>Email:</label><br>
        <input type="email" name="email" required autocomplete="off"><br><br>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>
