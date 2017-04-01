<?php  
      
    require_once 'Mysql.php';  
    require_once 'mysqlconfig.php';  
      
    $db = new mysql();  
    $link = $db->connect();  
    var_dump($link);  
      
      
    $sql='SELECT * FROM goods';  
    $rows = $db->fetchAll($sql);  
    var_dump($rows);

    $sql='SELECT * FROM goods WHERE name="cat"';  
    $row = $db->fetchOne($sql);  
    var_dump($row);

    $row = $db->exists('user',['username'=>'aaaa','password'=>123456]);  
    var_dump($row);
    $row = $db->insert('user',['username'=>'bbbb','password'=>123456]);  
    var_dump($row);

