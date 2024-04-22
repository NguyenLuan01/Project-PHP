 
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
         var soluongton =  new Array();
         var rows  = new Array();
         var datahh = 0;
         var slton=0;

         <?php
         $hh = new hanghoa();
         $result = $hh->getsoluongton();
         while($set = $result->fetch()){
             $tenhh = $set['tenhh'];
             $soluongton = $set['tonkho'];
             echo "tenhh.push('".$tenhh."');";
             echo "soluongton.push('".$soluongton."');";
         }
         ?>
         //tao dong
         for(var i = 0;i <tenhh.length;i++){
             datahh = tenhh[i];
             slton = parseInt(soluongton[i]);
             rows.push([datahh,slton]);
         }
         // tao cot trong datatable
         data.addColumn('string',"Hàng Hoá");
         data.addColumn('number',"Số lượng tồn");
         data.addRows(rows);
         //option
         var option = {
             title : 'Thống kê số lượng hàng tồn',
             width:1200,
             height:500,
             backgroundColor:'#ffffff',
             colors:['#4666a2'],
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
 
 