<?php

/*
 * YAMIS - Yet Another Management Information System
 * Copyright (C) 2016 Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * This is the main file that is loaded by pretty much all web requests, as
 * they are redirected via .htaccess to open this file
 * 
 * This is more an initial bootstrap to check that a number of required folders
 * are in place, and that we are not going through an initial installation or
 * an update of some sort. If it is, then stop running this script and redirect
 * the browser to the relevant install.php or upgrade.php files in this directory
 *
 * @access public
 * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 * @since 0.1.0
 * @version 1
 */

/**
 * Seeing if this is an initial installation
 * 
 * By default, there will not be a config directory in the parent folder, which
 * means that no installation has yet taken place. Therefore, this script should
 * be stopped and the browser redirected to the install.php file instead
 */
if (!file_exists('../config')) {
    die(<<<'EOT'
Config directory missing, starting installation&hellip;
EOT
    );
}

/**
 * We know that an YAMIS has already been installed onto this web server, so
 * we can start the autoloader to gain access to any installed packages and
 * namespaces
 */
require '../vendor/autoload.php';

/**
 * Loading the main Kernel
 * 
 * It's not being started fully yet, just using it to get the current version
 * number of YAMIS to see if an upgrade should be performed
 */
$kernel = new YAMIS\Kernel();

/**
 * Seeing if an upgrade to YAMIS needs to be installed
 * 
 * Inside the config directory, there will be a file with the current YAMIS
 * version as its file name (e.g. 0.1.0.lock). If this file is of a different
 * number to the current YAMIS version, then an upgrade should be installed
 */
if (!file_exists('../config/' . $kernel->getVersion() . '.lock')) {
    die(<<<'EOT'
Upgrade needs to be performed&hellip;
EOT
    );
}

?>

<!DOCTYPE html>
<!--
 * YAMIS - Yet Another Management Information System
 * Copyright (C) 2016 Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        // Git should merge this file with the --no-ff option
        ?>
    </body>
</html>
