<?php 
    session_start(); 
    ob_start();
    require_once('includes/authentication.inc.php');
    require_once('config.php');
    require_once('includes/page.inc.php');
    ob_end_clean();
    
    // Redirect the user to the login page if they're not logged in
    if( isLoggedIn() == 0 )
    {
        header('Location: login.php');
    }
    
    displayHeader('Networks', 'networks');
?>
        <p>
            <table border="1">
                <tr>
                    <td><b>NETWORK</b></td>
                    <td><b>DESCRIPTION</b></td>
                    <td><b>PRIMARY ADMIN</b></td>
                </tr>
                <?php
                    
                    // Setup DB connection
                    $dbcon = mysql_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD);
                    if( !$dbcon )
                    {
                        die('ERROR: could not connect to database: ' . mysql_error());
                    }
                    
                    mysql_select_db($DATABASE_NAME, $dbcon);
                    
                    $tablename = $DATABASE_TABLE_PREFIX . "Networks";
                    
                    // Allow for pagination
                    if( !isset($_GET['page']) )
                    {
                        $page = 0;
                    } else {
                        $page = $_GET['page'];
                    }
                    $bottom_limit = ($page * 25);
                    $top_limit = $bottom_limit + 24;
                                       
                    
                    $query = "SELECT * FROM $tablename ORDER BY netid LIMIT $bottom_limit, $top_limit";
                    $result = mysql_query($query);
                    
                    //
                    // TODO: Add counter and insert pagination
                    //
                    if(mysql_num_rows($result))
                    {
                        while ($row = mysql_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td><a href=\"viewNetwork.php?id=" . $row['netid'] . "\">" . $row['netid'] . "</a></td>";
                            echo "<td>" . $row['desc'] . "</td>";

                            // Build link to admin1
                            $admin_tablename = $DATABASE_TABLE_PREFIX . 'Users';
                            $admin_query = "SELECT * FROM $admin_tablename WHERE username='" . $row['admin1'] . "'";
                            $admin_result = mysql_query($admin_query);

                            if (mysql_num_rows($admin_result) == 1)
                            {
                                $admin_row = mysql_fetch_array($admin_result);
                                echo "<td><a href=\"viewUser.php?uid=" . $admin_row['uid'] . "\">" . $admin_row['fname'] . " " . $admin_row['lname'] . "</a></td>";
                            } else {
                                echo "<td><i>No Admin!</i></td>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan=\"3\" align=\"center\">NO NETWORKS IN SYSTEM</td></tr>";
                    }
                    
                    mysql_close($dbcon);
                ?>
            </table>
        </p>
<?php

    displayFooter();
?>
