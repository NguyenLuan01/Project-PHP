<?php
class  page{
    function  findPage($count,$limit){
        $page  = (($count%$limit)==0)?$count/$limit:floor($count/$limit)+1;
        return $page;
    }
    function  findStart($limit){
        if(!isset($_GET['page'])|| $_GET['page']==1){
            $start = 0;
        }
        else{
            $start =($_GET['page']-1)*$limit;
        }
        return $start;
    }

}
