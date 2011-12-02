<?php

/*
 * Generates the XHTML portion of the page up to the content
 * 
 * $title is displayed after 'phpNetManager | ' in the browser title portion
 * $active is the link in the menu marked as 'active'
 */
function displayHeader($title, $active)
{
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    echo '<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">';
    echo '<head>';
    echo '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    echo '  <title>phpNetManager | ' . $title . '</title>';
    echo '  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />';
    echo '  <!--[if IE 6]><link rel="stylesheet" href="css/style.ie6.css" type="text/css" media="screen" /><![endif]-->';
    echo '  <!--[if IE 7]><link rel="stylesheet" href="css/style.ie7.css" type="text/css" media="screen" /><![endif]-->';
    echo '  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />';
    echo '  <script type="text/javascript" src="js/jquery.js"></script>';
    echo '  <script type="text/javascript" src="js/script.js"></script>';
    echo '</head>';
    echo '<body>';
    echo '<div id="main">';
    echo '  <div class="sheet">';
    echo '  <div class="sheet-tl"></div>';
    echo '  <div class="sheet-tr"></div>';
    echo '  <div class="sheet-bl"></div>';
    echo '  <div class="sheet-br"></div>';
    echo '  <div class="sheet-tc"></div>';
    echo '  <div class="sheet-bc"></div>';
    echo '  <div class="sheet-cl"></div>';
    echo '  <div class="sheet-cr"></div>';
    echo '  <div class="sheet-cc"></div>';
    echo '  <div class="sheet-body">';
    echo '      <div class="header">';
    echo '          <div class="header-clip">';
    echo '              <div class="header-center">';
    echo '                  <div class="header-jpeg"></div>';
    echo '              </div>';
    echo '          </div>';
    echo '          <div class="logo">';
    echo '              <h1 class="logo-name"><a href="./main.php">phpNetManager</a></h1>';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="cleared reset-box"></div>';
    echo '      <div class="nav">';
    echo '          <div class="nav-l"></div>';
    echo '          <div class="nav-r"></div>';
    echo '          <div class="nav-outer">';
    echo '              <ul class="hmenu">';
    
    switch(strtolower($active))
    {
        case 'home':
            echo '                  <li><a href="main.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
            break;
        case 'networks':
            echo '                  <li><a href="main.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
            break;
        case 'devices':
            echo '                  <li><a href="main.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
            break;
        case 'users':
            echo '                  <li><a href="main.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
            break;
        case 'help':
            echo '                  <li><a href="main.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
            break;
        default:
            echo '                  <li><a href="main.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a></li>';
            echo '                  <li><a href="networks.php"><span class="l"></span><span class="r"></span><span class="t">Networks</span></a></li>';
            echo '                  <li><a href="devices.php"><span class="l"></span><span class="r"></span><span class="t">Devices</span></a></li>';
            echo '                  <li><a href="users.php"><span class="l"></span><span class="r"></span><span class="t">Users</span></a></li>';
            echo '                  <li><a href="help.php"><span class="l"></span><span class="r"></span><span class="t">Help</span></a></li>';
    }
    
    echo '		</ul>';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="cleared reset-box"></div>';
    echo '      <div class="content-layout">';
    echo '          <div class="content-layout-row">';
    echo '              <div class="layout-cell content">';
    echo '                  <div class="post">';
    echo '                      <div class="post-body">';
    echo '                          <div class="post-inner article">';
    echo '                              <div class="postmetadataheader">';
    echo '                                  <h2 class="postheader">' . $title . '</h2>';
    echo '                                  <div class="cleared"></div>';
    echo '                              </div>';
    echo '                              <div class="postcontent">';
}

/*
 * Generates the XHTML lower portion of the page
 */
function displayFooter()
{
    echo '                              </div>';
    echo '                              <div class="cleared"></div>';
    echo '                          </div>';
    echo '                          <div class="cleared"></div>';
    echo '                      </div>';
    echo '                  </div>';
    echo '                  <div class="cleared"></div>';
    echo '              </div>';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="cleared"></div>';
    echo '      <div class="footer">';
    echo '          <div class="footer-t"></div>';
    echo '          <div class="footer-body">';
    echo '              <div class="footer-text">';
    echo '                  <p><a href="main.php">Home</a> | Powered by <a href="#">phpNetManager</a></p>';
    echo '                  <p>Copyright © 2011. All Rights Reserved.</p>';
    echo '              </div>';
    echo '              <div class="cleared"></div>';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="cleared"></div>';
    echo '  </div>';
    echo '</div>';
    echo '<div class="cleared"></div>';
    echo '<p class="page-footer"></p>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

?>