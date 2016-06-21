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

namespace YAMIS;

/**
 * Main class that processes all of the requests that come through to this site,
 * along with some core functions
 *
 * @access public
 * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 * @since 0.1.0
 * @version 2
 */
class Kernel {
    /**
     * Current version of YAMIS
     * 
     * This is the currently version of YAMIS, and should be updated whenever
     * a new version is created!
     * 
     * This may not be the version that is currently installed, but rather the
     * version of the codebase that is on the server
     * 
     * @access private
     * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
     * @since 0.1.0
     * @see Kernel::getVersion()
     */
    private $version = '0.1.0';
    
    /**
     * Gets the current version of YAMIS
     * 
     * This may not be the version that is currently installed, but rather the
     * version of the codebase that is on the server
     * 
     * @access public
     * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
     * @since 0.1.0
     * @see Kernel::$version
     * @version 1
     * 
     * @return string The version of the YAMIS codebase
     */
    public function getVersion() {
        return $this->version;
    }
    
    /**
     * Initialising variables and classes that may be needed throughout the
     * running of YAMIS
     * 
     * @access public
     * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
     * @since 0.1.0
     * @version 1
     * 
     * @return bool Were all of the needed items initialised correctly
     */
    public function init() {
        return TRUE;
    }
}
