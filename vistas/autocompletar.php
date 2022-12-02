<?php

include_once 'database.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT name FROM product WHERE name LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['name']);
            }
        }
        return $res;
    }

}

?>