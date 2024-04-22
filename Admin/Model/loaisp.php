<?php
class loaisp{
    public function __construct()
    {
    }
    function getLoaisp(){
        $db = new connect();
        $select ="select * from loai";
        return $db->getlist($select);
    }
    function getLoaispId($ma){
        $db = new connect();
        $select ="select * from loai where maloai='$ma'";
        return $db->getinstance($select);
    }
    function delLoaisp($ma){
        $db = new connect();
        $select = "DELETE FROM loai WHERE maloai=$ma";
        return $db->exec($select);
    }

    function updateloaisp($maloai,$tenloai,$idmenu)
    {
        $db=new connect();
        $query="update loai set tenloai='$tenloai',idmenu=$idmenu where maloai=$maloai";
       return $db->exec($query);
    }
    function addloaisp($maloai,$tenloai,$idmenu){
        $db  = new connect();
        $query= "INSERT INTO loai VALUES ('NULL','$tenloai','$idmenu')";
        return $db->exec($query);
    }
    function insertWcsv($maloai,$tenloai,$idmenu){
        $db = new connect();
        $query= "INSERT INTO loai VALUES ($maloai,'$tenloai',$idmenu)";
       $db->exec($query);
    }
}