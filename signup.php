<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Sign Up</title>
    </head> 
    <body>
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="userName" placeholder="Full Name...">
            <input type="text" name="userEmail" placeholder="Email...">
            <input type="text" name="userUserName" placeholder="Username...">
            <input type="password" name="userPassword" placeholder="Password...">
            <input type="password" name="userPassworRepeat" placeholder="Repeat Password...">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </body>
</html>