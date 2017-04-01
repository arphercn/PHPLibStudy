<?php
namespace web\tests;
 
require_once __DIR__ . "/../lib/join.php";
// require_once __DIR__ . "/../vendor/autoload.php";
require_once "My_DbUnit_ArrayDataSet.php";
 
use PHPUnit_Extensions_Database_TestCase;
use web\lib\Join;
use web\lib\Mysql;
use \PDO;

class Join2Test extends PHPUnit_Extensions_Database_TestCase
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


    /**
    * test insert one row
    */
    public function testOneInsert()
    {
        $dbObj = new Mysql();
        $dbObj->connect();
        $dbObj->insert('user', [
            'username' => 'cccc',
            'password' => '123456',
        ]);

        // table rows num Assertions
        $this->assertEquals(3, $this->getConnection()->getRowCount('user'), "Inserting failed");
        // Asserting the State of Multiple Tables
        $queryTable = $this->getConnection()->createQueryTable('user', "SELECT * FROM user");
        $arrayDateSet = new My_DbUnit_ArrayDataSet(['user' => [
                ['id' => 1, 'username' => 'admin', 'password' => '123456'],
                ['id' => 2, 'username' => 'bbbb', 'password' => '123456'],
                ['id' => 3, 'username' => 'cccc', 'password' => '123456'],
            ],
        ]);
        $expectedTable = $arrayDateSet->getTable("user");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }


}