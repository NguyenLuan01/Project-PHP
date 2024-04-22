<?php

class comment{
    public function __construct()
    {
    }
    function  insertComment($mahh,$makh,$nd,$sosao){
        $db = new connect();
        $date =new  DateTime('now');
        $datacreate = $date->format("Y-m-d");
        $query = "insert into binhluan1 values (null,$mahh,$makh,'$datacreate','$nd',$sosao)";
        echo $query;
        $db->exec($query);
    }
    function countComment($mahh){
        $db = new connect();
        $select = "SELECT COUNT(mabl) FROM binhluan1 WHERE mahh=$mahh";
        echo $select;
        $result = $db->getinstance($select);
        return $result[0];
    }
    function GetCommentAll($mahh){
        $db = new connect();
        $select = "SELECT khachhang1.username, binhluan1.ngaybl, binhluan1.noidung ,binhluan1.sosao FROM khachhang1,binhluan1 WHERE khachhang1.makh=binhluan1.makh AND binhluan1.mahh=$mahh";
        $result = $db->getlist($select);
        return $result;
    }
    function CalCmt($mahh){
        $db = new connect();
        $select = "SELECT mahh, COUNT(mabl) as slbl , SUM(sosao) as tongsao FROM binhluan1 WHERE mahh=$mahh GROUP BY mahh";
        $result = $db->getinstance($select);
        return $result;
    }
}