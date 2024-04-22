<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php?action=thongke&act=baocao" style="margin-top: 100px">
    <input hidden value="thongke" name="action">
    <input hidden value="baocao" name="act">
    <select class="form-control mb-3" name="year" aria-label="Default select example">
        <option selected value="2023">chọn năm báo cáo</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
    </select>
    <select class="form-control mb-3" name="month" aria-label="Default select example">
        <option selected value="3">chọn tháng báo cáo</option>
        <option value="1">Tháng Một</option>
        <option value="2">Tháng Hai</option>
        <option value="3">Tháng Ba</option>
        <option value="4">Tháng Tư</option>
        <option value="5">Tháng Năm</option>
        <option value="6">Tháng Sáu</option>
        <option value="7">Tháng Bảy</option>
        <option value="8">Tháng Tám</option>
        <option value="9">Tháng Chín</option>
        <option value="10">Tháng Mười</option>
        <option value="11">Tháng Mười Một</option>
        <option value="12">Tháng Mười Hai</option>
    </select>
    <button class="form-control" style="width: 50%">submit</button>
</form>
</body>
</html>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
         var data = new google.visualization.DataTable();
         var tenhh = new Array();
         var soluongban =  new Array();
         var rows  = new Array();
         var datahh = 0;
         var slban=0;

         <?php
         if(isset($_GET['month'])){
             $month = $_GET['month'];
             $year = $_GET['year'];
         }
         $hh = new hanghoa();
         $result = $hh->getBaocao($month,$year);
         while($set = $result->fetch()){
             $tenhh = $set['tenhh'];
             $soluong = $set['soluong'];
             echo "tenhh.push('".$tenhh."');";
             echo "soluongban.push('".$soluong."');";
         }
         ?>
         //tao dong
         for(var i = 0;i <tenhh.length;i++){
             datahh = tenhh[i];
             slban = parseInt(soluongban[i]);
             rows.push([datahh,slban]);
         }
         // tao cot trong datatable
         data.addColumn('string',"Hàng Hoá");
         data.addColumn('number',"Số lượng bán");
         data.addRows(rows);
         //option
         var option = {
             title : 'Thống kê số lượng hàng đã được bán trong tháng <?php echo $month?> của năm <?php echo $year?>',
             width:600,
             height:400,
             backgroundColor:'#ffffff',
             colors:['#3fa78b'],
             is3D:true
         };
           var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
           chart.draw(data,option);
	 }
                   
    </script>
        <div class="thongke">
        <div style=" width:50%;  float: left;"   id="chart_div">dfsf</div>
        <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>    
      </div>
 
 