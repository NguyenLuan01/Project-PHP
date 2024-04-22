<?php
class hanghoa{
    public function __construct()
    {
    }
    function  gethanghoaAll(){
        $db = new connect();
        $select = 'select * from hanghoa';
        return $db->getlist($select);
    }
    function getListHangHoaAllPage($start,$limit){
        $db = new connect();
        $select = 'select * from hanghoa limit '.$start .','.$limit ;

        $results = $db->getlist($select);

        return $results;
    }

    function getHanghoaId($id){
        $db = new connect();
        $select = "select * from hanghoa where mahh=$id";
        return $db->getinstance($select);
    }
    function updatesp($id,$tenhh,$dongia,$giamgia,$hinh,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton)
    {
        $db=new connect();
        $query="update hanghoa    
        set tenhh='$tenhh',        
            dongia=$dongia,           
            giamgia=$giamgia,            
            hinh='$hinh',            
            maloai=$maloai,       
            dacbiet=$dacbiet,            
            soluotxem=$soluotxem,          
            ngaylap='$ngaylap',           
            mota='$mota',           
            soluongton=$soluongton    
        where mahh=$id";
        $db->exec($query);
    }
    function insertsp($tenhh,$dongia,$giamgia,$hinh,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton)    {
        $date=new DateTime($ngaylap);
        $ngay=$date->format("Y-m-d");
        $db=new connect();
        $query="insert into hanghoa  values (NULL,'$tenhh',$dongia,$giamgia,'$hinh',$maloai,$dacbiet,$soluotxem,'$ngay','$mota',$soluongton)";
        $db->exec($query);
    }
    function del($id){
        $db =new connect();
        $select = "DELETE FROM cthoadon1 WHERE mahh=$id";
        $db->exec($select);
        $select = "delete from hanghoa where mahh=$id";
        $db->exec($select);
    }
    function delcthoadon($id){
        $db =new connect();
        $select = "DELETE FROM cthoadon1 WHERE masohd=$id";
        $db->exec($select);
        $select = "DELETE FROM hoadon1 WHERE masohd=$id";
    }
    function delhoadon($id){
        $db =new connect();
        $select = "DELETE FROM cthoadon1 WHERE masohd=$id";
        $db->exec($select);
        $select = "DELETE FROM hoadon1 WHERE masohd=$id";
        $db->exec($select);

    }
//phuong thuc thống kế tất cả mặt hàng bán được
function getThongke_mathang(){
        $db = new connect();
        $select = "SELECT a.tenhh , SUM(b.soluongmua) as soluong FROM hanghoa a, cthoadon1 b WHERE a.mahh=b.mahh GROUP BY a.tenhh";
        return $db->getlist($select);
}
function getThongke_loai(){
        $db = new connect();
        $select = "SELECT l.tenloai, SUM(ct.soluongmua)as soluong FROM cthoadon1 ct,hanghoa hh, loai l WHERE l.maloai=hh.maloai AND ct.mahh=hh.mahh GROUP BY l.tenloai";
        return $db->getlist($select);
}
function getThongke_kh(){
        $db = new connect();
        $select = "SELECT kh.tenkh,kh.makh ,SUM(hd.tongtien) AS tongtien FROM hoadon1 hd, khachhang1 kh WHERE hd.makh=kh.makh GROUP BY kh.tenkh,kh.makh";
        return $db->getlist($select);
}
function getThongke_bl(){
        $db = new connect();
        $select = "SELECT COUNT(bl.mabl) as soluotbl, hh.tenhh FROM hanghoa hh , binhluan1 bl WHERE bl.mahh=hh.mahh GROUP BY hh.tenhh";
        return $db->getlist($select);
}
function getBaocao($m,$y){
        $db = new connect();
        $select = "SELECT a.tenhh , SUM(b.soluongmua) as soluong FROM hanghoa a, cthoadon1 b,hoadon1 c WHERE a.mahh=b.mahh AND c.masohd=b.masohd AND month(c.ngaydat)=$m AND year(c.ngaydat) = $y GROUP BY a.tenhh";
        return $db->getlist($select);
}
function getsoluongton(){
        $db = new connect();
        $select = "SELECT hh.tenhh, hh.soluongton-SUM(ct.soluongmua) as tonkho FROM hanghoa hh,cthoadon1 ct WHERE hh.mahh=ct.mahh GROUP BY hh.tenhh";
        return $db->getlist($select);
}

}