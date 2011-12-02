<?php 
    session_start(); 
    ob_start();
    require('includes/authentication.inc.php');
    require_once('includes/page.inc.php');
    ob_end_clean();
    
    // Redirect the user to the login page if they're not logged in
    if( isLoggedIn() == 0 )
    {
        header('Location: login.php');
    }
    
    displayHeader('Help', 'help');
?>

<p>This page not implemented.</p>

<?php displayFooter(); ?>
