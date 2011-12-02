<?php

/*
 * authentication.inc.php
 * 
 * A set of functions allowing for authentication system abstraction. Users are
 * currently authorized via database. Assuming the functions are named the same 
 * way and return the data in the same format, other versions can be written.
 * 
 * Written by Sean Callaway (seancallaway@gmail.com)
 */

require_once('config.php');


/*
 * isLoggedIn() - Determines if the user is logged in
 * 
 * Returns 0 if the user is not logged in. Otherwise, returns non-zero.
 */
function isLoggedIn()
{
    // See if session variable has been set.
    if ( isset($_SESSION['uid']) )
    {
        // Check for valid session variable.
        if($_SESSION['uid'] > -1)
        {
            return 1;
        }
    }
    
    return 0;
}

/*
 * tryLogin() - Attempt to verify user login information
 * 
 * Returns the MySQL row if the login is successful. Will return NULL if the 
 * login is not successful.
 */
function tryLogin($username, $password)
{
    global $DATABASE_HOST, $DATABASE_NAME, $DATABASE_PASSWORD,
            $DATABASE_USER, $DATABASE_TABLE_PREFIX;

    // Create connection to the database and die if connection cannot be setup.
    $dbcon = mysql_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD);
    if( !$dbcon )
    {
        die('Could not connect to database: ' . mysql_error() );
    }
    
    mysql_select_db($DATABASE_NAME, $dbcon);
    
    // Prepend the global table prefix to the user table name
    $usertable = $DATABASE_TABLE_PREFIX . 'Users';

    // Hash the password in preperation for comparison with the stored hash.
    $passhash = sha1($password);
    
    
    // Generate SQL query and execute
    $sqlquery = "SELECT * FROM $usertable WHERE username='$username'AND password='$passhash'";
    $result = mysql_query($sqlquery);
    
    // Count the number of rows returned. If one was returned, then the login is valid.
    $rowcount = mysql_num_rows($result);
    if ( $rowcount == 1)
    {
        // Get the UID from the row and return it.
        $row = mysql_fetch_array($result);
        mysql_close($dbcon);
        return $row;
    }
    
    mysql_close($dbcon);
    return NULL;
}
?>
