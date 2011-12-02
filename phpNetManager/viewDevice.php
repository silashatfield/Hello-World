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
    
    if( !isset($_GET['id']))
    {
        header('Location: devices.php');
    }
    
    displayHeader('View Device', 'devices');
?>

        <p>
            <table border="1">
                <tr>
                    <td><b>HOSTNAME</b></td>
                    <td><b>DOMAIN</b></td>
                    <td><b>DESCRIPTION</b></td>
                    <td><b>TYPE</b></td>
                    <td><b>IP ADDRESSES</b></td>
                    <td><b>NOTES</b></td>
                </tr>
                <?php
                    $dbcon = mysql_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD);
                    if( !$dbcon )
                    {
                        die('ERROR: Could not connect to DB:' . mysql_error());
                    }
                    
                    mysql_select_db($DATABASE_NAME, $dbcon);
                    $tablename = $DATABASE_TABLE_PREFIX . 'Devices';
                    
                    $query = "SELECT * FROM $tablename WHERE device_id='" . $_GET['id'] . "'";
                    $result = mysql_query($query);
                    
                    if( mysql_num_rows($result) == 1 )
                    {
                        $row = mysql_fetch_array($result);
                        echo "<tr>";
                        echo "<td>" . $row['hostname'] . "</td>";
                        echo "<td>" . $row['domain'] . "</td>";
                        echo "<td>" . $row['desc'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['ipaddr1'] . "<br />" . $row['ipaddr2'] . "</td>";
                        echo "<td>" . $row['notes'] . "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tc>";
                        echo "<td rowspan=\"6\"><i>Invalid Device ID</i></td>";
                        echo "</tc>";
                    }
                    
                    mysql_close($dbcon);
                ?>
            </table>
        </p>
<?
    displayFooter();
?>  
