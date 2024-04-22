<?php
class hoadon{
    public function __construct()
    {
    }
    function  getAllhoadon(){
        $db = new connect();
        $select ="select * from hoadon1";
        return $db->getlist($select);
    }
}