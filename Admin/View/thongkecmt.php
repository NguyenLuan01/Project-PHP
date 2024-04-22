 
        <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
         var data = new google.visualization.DataTable();
         var tenhh = new Array();
         var soluotbl =  new Array();
         var rows  = new Array();
         var datahh = 0;
         var slcmt=0;

         <?php
         $hh = new hanghoa();
         $result = $hh->getThongke_bl();
         while($set = $result->fetch()){
             $tenhh = $set['tenhh'];
             $soluotbl = $set['soluotbl'];
             echo "tenhh.push('".$tenhh."');";
             echo "soluotbl.push('".$soluotbl."');";
         }
         ?>
         //tao dong
         for(var i = 0;i <tenhh.length;i++){
             datahh = tenhh[i];
             slcmt = parseInt(soluotbl[i]);
             rows.push([datahh,slcmt]);
         }
         // tao cot trong datatable
         data.addColumn('string',"Tên sản phẩm");
         data.addColumn('number',"Số lượt bình luận");
         data.addRows(rows);
         //option
         var option = {
             title : 'Thống kê sản phẩm nhiều lượt bình luận',
             width:500,
             height:600,
             backgroundColor:'#c1c1c1',
             colors:['#d04646'],

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
 
 