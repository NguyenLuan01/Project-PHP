<?php
class  hanghoa{
    function __construct()
    {
    }
    function getListHangHoaAllPage($start,$limit){
        $db = new connect();
        if(isset($_SESSION['sx'])){
            $select = 'select * from hanghoa ORDER BY hanghoa.dongia '.$_SESSION['sx'].'  limit '.$start .','.$limit ;

        } else{
            $select = 'select * from hanghoa limit '.$start .','.$limit ;

        }
        $results = $db->getlist($select);

        return $results;
    }
    function  getsale()
    {
        $db  = new connect();
        $select = "select * from hanghoa  where giamgia>0 limit 4";
        return $db->getlist($select);
    }
    function  getslt($mahh)
    {
        $db  = new connect();
        $select = "SELECT soluongton FROM `hanghoa` WHERE mahh=$mahh";
        return $db->getinstance($select);
    }
    function  getslm($mahh)
    {
        $db  = new connect();
        $select = "SELECT SUM(cthoadon1.soluongmua) as tongsoluong , mahh FROM `cthoadon1` WHERE mahh=$mahh GROUP BY mahh";
        return $db->getinstance($select);
    }

    function  getSaleAll()
    {
        $db  = new connect();
        if(isset($_SESSION['sx'])) {

            $select = 'select * from hanghoa where giamgia>0 ORDER BY hanghoa.dongia ' . $_SESSION['sx'] . '';
        } else
        {
            $select = 'select * from hanghoa where giamgia>0';

        }
        return $db->getlist($select);
    }

    function  getLoai($v)
    {
        $db  = new connect();
        if(isset($_SESSION['sx'])){
            $select = 'select * from hanghoa where maloai='.$v.' ORDER BY hanghoa.dongia '.$_SESSION['sx'].'';

        } else{
            $select = 'select * from hanghoa where maloai='.$v.'';

        }
        return $db->getlist($select);
    }

    function  getAll()
    {
        $db  = new connect();
        if(isset($_SESSION['sx'])) {

            $select = 'select * from hanghoa ORDER BY hanghoa.dongia ' . $_SESSION['sx'] . '';
        } else{
            $select = 'select * from hanghoa';

        }
        return $db->getlist($select);
    }
    function  gethanghoaID($id){
        $db = new connect();
        $select = "SELECT * FROM hanghoa where mahh=$id";
        return $db->getinstance($select);
    }
    function  getHHmaloai($maloai){
        $db = new connect();
        $select = "SELECT hinh FROM hanghoa where maloai=$maloai";
        return $db->getlist($select);
    }
    function getTimkiemhh($timkiem){
        $timkiem=strtolower($timkiem);
        $db = new connect();
        $select = "select * from hanghoa where tenhh like '%$timkiem%' ";
        return $db->getlist($select);
    }
}