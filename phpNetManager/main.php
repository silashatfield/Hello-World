<?php 
    session_start(); 
    ob_start();
    require_once('includes/authentication.inc.php');
    require_once('includes/page.inc.php');
    ob_end_clean();
    
    // Redirect the user to the login page if they're not logged in
    if( isLoggedIn() == 0 )
    {
        header('Location: login.php');
    }

    displayHeader('Home', 'home');
?>

<p>Welcome to phpNetManager.</p>

<?php    
    displayFooter();
?>

