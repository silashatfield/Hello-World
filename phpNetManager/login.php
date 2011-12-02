<?php 
    session_start(); 
    ob_start();
    require('includes/authentication.inc.php');
    ob_end_clean();
    
    // Redirect the user to the home page if they're already logged in
    if( isLoggedIn() == 1 )
    {
        header('Location: index.php');
    }
    
    // Handle processing logins via POST method
    if ( $_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Retrieve variables from POST
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        
        // Prevent SQL Injection
        $uname = stripslashes($uname);
        $pword = stripslashes($pword);
        
        $userRow = tryLogin($uname, $pword);
        if ($userRow <> NULL)
        {
            // Login is vaild, set session vaiables and redirect to home
            $_SESSION['uid'] = $userRow['uid'];
            $_SESSION['fname'] = $userRow['fname'];
            Header('Location: main.php');
        } else {
            // Invalid login, set flag and allow page to load
            $badLogin = 1;
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>phpNetManager | Login</title>
    </head>
    <body>
        <h1>Login to phpNetManager</h1>
        <?php
            // Display error message for bad logins
            if(isset($badLogin))
            {
                echo '<p><font color="#ff0000"><i>Invalid Username or Password</i></font></p>';
            }
        ?>
        <form action="login.php" method="post">
            <b>Username:</b><input type="text" name="uname" /><br />
            <b>Password:</b><input type="password" name="pword" /><br />
            <input type="submit" name="Login" />
        </form>
    </body>
</html>
