<?php
 
namespace web\tests;
 
require_once __DIR__ . "/../lib/Mysql.php";
require_once "My_DbUnit_ArrayDataSet.php";
 
use web\lib\Mysql;
use \PDO;
use PHPUnit_Extensions_Database_TestCase;
 
class Join3Test extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * connect Database
     *
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    public function getConnection()
    {
        $db = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "root");
 
        return $this->createDefaultDBConnection($db, "test");
    }
 
    /**
     * Set up fixture
     *
     * @return \PHPUnit_Extensions_Database_DataSet_XmlDataSet
     */
    public function getDataSet()
    {
        return $this->createXMLDataSet("user.xml");
    }
 
    public function testConnect()
    {
        $dbObj = new Mysql();
        $this->assertNotFalse($dbObj->connect());
    }
 
    /**
     * test exists func
     */
    public function testExists()
    {
        $dbObj = new Mysql();
        $dbObj->connect();
        $result = $dbObj->exists('user', [
            'username' => 'admin',
            'password' => '123456',
        ]);
        $this->assertNotFalse($result);
        $result = $dbObj->exists('user', [
            'username' => true,
            'password' => null,
        ]);
        $this->assertFalse($result);
    }
}