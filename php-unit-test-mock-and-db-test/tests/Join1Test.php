<?php
namespace web\tests;
 
require_once __DIR__ . "/../lib/join.php";
require_once __DIR__ . "/../vendor/autoload.php";
 
use PHPUnit_Framework_TestCase;
use web\lib\Join;

class Join1Test extends PHPUnit_Framework_TestCase
{
    public function testSignIn()
    {
        // class mock
        $db = $this->getMockBuilder('web\lib\Mysql')
            ->disableOriginalConstructor()
            ->setMethods(['insert', 'exists'])
            ->getMock();
        // function mock
        $db->method('insert')
            ->willReturn(true);
        // mock method multiple calls with different arguments
        $map = [
            ['user', ['username' => 'admin'], true],
            [$this->anything(), $this->anything(), false],
        ];
        $db->method('exists')
            ->will($this->returnValueMap($map));
 
        $join = new Join($db);
        $this->assertEquals(['code' => 0, 'msg' => 'user has exists'], $join->signIn('admin', '123456'));
        $this->assertEquals(['code' => 1, 'msg' => 'success'], $join->signIn('zzzz', '123456'));
    }
}