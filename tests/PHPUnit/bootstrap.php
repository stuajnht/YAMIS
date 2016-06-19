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
 * Loading the vendor/autoload.php file, so that tests can take place
 * 
 * For some reason (most likely the sub-directory for the PHPUnit tests) TravisCI
 * cannot seem to find the '../../vendor/autoload.php' file, despite it working
 * correctly when run locally on a test machine. Using a hard-coded path works,
 * but isn't ideal if other people fork this project and have to change the tests.
 * 
 * To get around this (and this is a very hacky way round it, especially as this
 * is currently being written very early on in the projects lifetime) we see if
 * there is a 'vendor' directory in the current folder. If not, go to the parent
 * folder until one is found. We can then use the path to get the autoload.php
 * file
 * 
 * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 * @since 0.0.0
 * @todo Find out the correct way to get the path to autoload.php
 */

// Setting up the main vendor/autoload.php file path
$vendorDir = 'vendor';
$vendorDirFound = FALSE;
$folderAttemptsRemaining = 10;

while (($folderAttemptsRemaining >= 0) && ($vendorDirFound == FALSE)) {
    if (file_exists($vendorDir . '/autoload.php')) {
        echo "Vendor folder found at: $vendorDir\n";
        $vendorDirFound = TRUE;
    } else {
        $vendorDir = '../' . $vendorDir;
        $folderAttemptsRemaining = $folderAttemptsRemaining - 1;
    }
}

if ($vendorDirFound) {
    echo "$vendorDir folder listing:\n";
    print_r(scandir($vendorDir));

    // Grab our autoloader
    require $vendorDir . '/autoload.php';
} else {
    die(<<<'EOT'
Unable to find the vendor autoload.php file
EOT
        );
}