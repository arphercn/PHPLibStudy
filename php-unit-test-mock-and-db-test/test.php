<?php
//https://iyaozhen.com/php-unit-test-mock-and-db-test.html
namespace web;

require_once 'lib/Join.php';

use web\lib\Join;
use web\lib\Mysql;

$join = new Join(new Mysql());
$link = $join->db->connect();  
    var_dump($link);

$arr = $join->signIn('dddd', '123456');
var_dump($arr);
