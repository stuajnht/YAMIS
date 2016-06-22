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
 * @version 3
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
    
    /**
     * Checking that all required folders are in the correct location and can
     * be found
     * 
     * @dataProvider providerTestInitSetFolder
     */
    public function testInitSetFolder($folderName) {
        $this->assertTrue($this->kernel->initSetFolder($folderName));
    }
    
    public function providerTestInitSetFolder() {
        return array(
            array('docs'),
        );
    }
    
    /**
     * Checking that all folders that can be found have the correct paths set,
     * or for a NULL to be returned if the folder cannot be found
     * 
     * @depends testInitSetFolder
     * @dataProvider providerTestInitGetFolder
     * 
     * @param string $folderName The name of the folder to get the path of
     * @param string $expectedPath The expected path that should be returned
     */
    public function testInitGetFolder($folderName, $expectedPath) {
        $this->kernel->initSetFolder($folderName);
        
        $returnedPath = $this->kernel->initGetFolder($folderName);
        
        // Non-existant keys should return NULL
        if ($expectedPath === NULL) {
            $this->assertNull($returnedPath);
        } else {
            $this->assertEquals($expectedPath, $returnedPath);
        }
    }
    
    public function providerTestInitGetFolder() {
        return array(
            array('not-here', NULL),
            // The ../app is needed here, as there's an app folder in the tests too
            array('../app', realpath('../../app')),
            array('docs', realpath('../../docs')),
            array('public', realpath('../../public')),
            array('vendor', realpath('../../vendor')),
        );
    }
}
