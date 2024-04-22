<?php

class  connect
{
    var ?PDO $db = null;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=onishop';
        $user = 'root';
        $pass = ''; //$pass = ";
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (Throwable) {
            echo "that bai roi";
        }

    }

    public function getlist($select): bool|PDOStatement
    {
        return $this->db->query($select);
    }

    public function getinstance($select)
    {
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;

    }

    function exec($query)
    {
        return $this->db->exec($query);
    }

}