<?php
class  hoadon{
    public function __construct()
    {
    }
    function  insertOrder($makh){
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format("Y-m-d");
        $query = "INSERT INTO hoadon1 VALUES(Null,$makh,'$datecreate',0)";

        $db->exec($query);

        //sau khi insertr lay ra ma hoa don vuea chen vao
        $int = $db->getinstance("SELECT masohd FROM `hoadon1` order by masohd desc limit 1");
        return $int[0];
    }
    function insertDetailHoadon($masohd,$mahh,$soluong,$thanhtien){
        $db =new connect();
        $query ="insert into cthoadon1 values($masohd,$mahh,$soluong,$thanhtien,0)";
        $db->exec($query);
    }
    function updateOrderTotal($sohd,$tongtien){
        $db=new connect();
        $query="update hoadon1 set tongtien=$tongtien where masohd=$sohd";
        $db->exec($query);
    }
    //phuong thuc lay thong tin tu bang hoa don va bang khach hang
    function  getOrder($idhd){
        $db = new connect();
        $select = "select b.masohd,a.tenkh,a.diachi,a.sodienthoai,b.ngaydat,a.email from khachhang1 a inner join
    hoadon1 b on a.makh=b.makh where b.masohd=$idhd";
        $result=$db->getinstance($select);
        return $result;

    }
    function getOrderDetail($idhd)
    {
        $db =new connect();
        $select = "select a.tenhh,a.dongia,b.soluongmua,b.thanhtien from hanghoa a inner join
    cthoadon1 b on a.mahh=b.mahh where b.masohd=$idhd";
        return $db->getlist($select);
    }
}