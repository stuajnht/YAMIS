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

namespace YAMISTests;

use YAMIS\Kernel;

/**
 * Testing the functions available to the YAMIS Kernel
 *
 * @access public
 * @author Jonathan Hart (stuajnht) <stuajnht@users.noreply.github.com>
 * @since 0.1.0
 * @version 2
 */
class KernelTest extends \PHPUnit_Framework_TestCase {
    /**
     * Variable to hold an instance of the Kernel class
     */
    protected $kernel;
    
    public function setUp() {
        $this->kernel = new Kernel();
    }
    
    public function tearDown() {
        $this->kernel = NULL;
    }
    
    /**
     * Checking the version of the codebase matches the currently testing version
     */
    public function testGetVersion() {
        $kernelVersion = $this->kernel->getVersion();

        $this->assertEquals($kernelVersion, '0.1.0');
    }
    
    /**
     * Making sure that the Kernel will initialise correctly
     */
    public function testKernelInit() {
        $this->assertTrue($this->kernel->init());
    }
}
