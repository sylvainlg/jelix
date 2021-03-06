<?php
/**
* @package     testapp
* @subpackage  jelix_tests module
* @author      Laurent Jouanneau
* @contributor
* @copyright   2010-2012 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/


class restcontrollerTest extends jUnitTestCase {

    function setUp() {
        self::initClassicRequest(TESTAPP_URL.'index.php');
        jApp::pushCurrentModule('jelix_tests');
        parent::setUp();
    }

    function tearDown() {
        jApp::popCurrentModule();
    }

    function testRestGET() {
        $http = new jHttp(TESTAPP_HOST);
        $http->get(jApp::config()->urlengine['basePath'].'rest.php/test/rest');
        $this->assertEquals(200, $http->getStatus());

        $this->assertEquals('this is a GET response. resturl='.jApp::config()->urlengine['basePath'].'rest.php/test/rest', $http->getContent());
    }

    function testRestPUT() {
        $http = new jHttp(TESTAPP_HOST);
        $http->put(jApp::config()->urlengine['basePath'].'rest.php/test/rest', array('foo'=>'bar'));
        $this->assertEquals(200, $http->getStatus());

        $this->assertEquals('this is a PUT response. module=jelix_tests action=myrest: foo=bar', $http->getContent());
    }

    function testRestPOST() {
        $http = new jHttp(TESTAPP_HOST);
        $http->post(jApp::config()->urlengine['basePath'].'rest.php/test/rest', array('foo'=>'bar'));
        $this->assertEquals(200, $http->getStatus());

        $this->assertEquals('this is a POST response. module=jelix_tests action=myrest: foo=bar', $http->getContent());
    }

    function testRestDELETE() {
        $http = new jHttp(TESTAPP_HOST);
        $http->delete(jApp::config()->urlengine['basePath'].'rest.php/test/rest');
        $this->assertEquals(200, $http->getStatus());

        $this->assertEquals('this is a DELETE response', $http->getContent());
    }


}

