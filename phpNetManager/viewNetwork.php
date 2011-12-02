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
    
    //
    // TODO: Also add validation checking here
    //
    if( !isset($_GET['id']))
    {
        header('Location: networks.php');
    }
    
    displayHeader('View Network', 'networks');
?>
        <p>
            <table border="1">
                <tr>
                    <td><b>ADDRESS</b></td>
                    <td><b>DESCRIPTION</b></td>
                    <td><b>DEVICE</b></td>
                </tr>
                <?php
                    $dbcon = mysql_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD);
                    if( !$dbcon )
                    {
                        die('ERROR: Could not connect to DB:' . mysql_error());
                    }
                    
                    mysql_select_db($DATABASE_NAME, $dbcon);
                    $tablename = $DATABASE_TABLE_PREFIX . 'IPAddresses';
                    
                    $query = "SELECT * FROM $tablename WHERE netid='" . $_GET['id'] . "' ORDER BY address";
                    $result = mysql_query($query);
                    
                    if( mysql_num_rows($result) )
                    {
                        while ($row = mysql_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            
                            // Build link to device
                            $device_tablename = $DATABASE_TABLE_PREFIX . 'Devices';
                            $device_query = "SELECT * FROM $device_tablename WHERE ipaddr1='" . $row['address'] . "' OR ipaddr2='" . $row['address'] ."'";
                            $device_result = mysql_query($device_query);

                            if (mysql_num_rows($device_result))
                            {
                                $device_row = mysql_fetch_array($device_result);
                                echo "<td><a href=\"viewDevice.php?id=" . $device_row['device_id'] . "\">" . $device_row['fqdn'] . " (" . $device_row['type'] . ")</a></td>";
                            } else {
                                echo "<td><i>No Device</i></td>";
                            }
                            
                        }
                    } else {
                        echo "<tr><td colspan=\"3\" align=\"center\"><i>NO ADDRESSES IN THIS NETWORK!</i></td></tr>";
                    }
                    
                    mysql_close($dbcon);
                ?>
            </table>
        </p>
<?php

    displayFooter();
    
?>    