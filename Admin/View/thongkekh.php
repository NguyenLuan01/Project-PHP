 
        <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
         var data = new google.visualization.DataTable();
         var tenkh = new Array();
         var tongtien =  new Array();
         var rows  = new Array();
         var datahh = 0;
         var ttmua=0;

         <?php
         $hh = new hanghoa();
         $result = $hh->getThongke_kh();
         while($set = $result->fetch()){
             $tenkh = $set['tenkh'];
             $tongtien = $set['tongtien'];
             echo "tenkh.push('".$tenkh."');";
             echo "tongtien.push('".$tongtien."');";
         }
         ?>
         //tao dong
         for(var i = 0;i <tenkh.length;i++){
             datahh = tenkh[i];
             ttmua = parseInt(tongtien[i]);
             rows.push([datahh,ttmua]);
         }
         // tao cot trong datatable
         data.addColumn('string',"Tên khách hàng");
         data.addColumn('number',"Tổng Tiền khách chi");
         data.addRows(rows);
         //option
         var option = {
             title : 'Thống kê khách hàng tiềm năng',
             width:700,
             height:200,
             backgroundColor:'#ffffff',
             colors:['#9251c7'],
             is3D:true
         };
           var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
           chart.draw(data,option);
	 }
                   
    </script>
        <div class="thongke">
        <div style=" width:50%;  float: left;"   id="chart_div">dfsf</div>
        <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>    
      </div>
 
 