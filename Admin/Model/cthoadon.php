<?php
class cthoadon{
    public function __construct()
    {
    }
    function  getAllcthoadon(){
        $db = new connect();
        $select ="select * from cthoadon1";
        return $db->getlist($select);
    }
}