<?php
namespace web\lib;  
require_once 'mysqlconfig.php';
require_once 'Mysql.php';

 
class Join
{
    public $db;
 
    function __construct(Mysql $db)
    {
        $this->db = $db;
    }
 
    public function signIn($userName, $password)
    {
        if ($this->db->exists('user', ['username' => $userName])) {
            return [
                'code' => 0,
                'msg' => "user has exists",
            ];
        }
        else {
            $this->db->insert('user', [
                'username' => $userName,
                'password' => $password,
            ]);
 
            return [
                'code' => 1,
                'msg' => "success",
            ];
        }
    }
}