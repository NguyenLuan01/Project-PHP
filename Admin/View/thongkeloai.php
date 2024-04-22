 
        <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
         var data = new google.visualization.DataTable();
         var tenloai = new Array();
         var soluongban =  new Array();
         var rows  = new Array();
         var datahh = 0;
         var slban=0;

         <?php
         $hh = new hanghoa();
         $result = $hh->getThongke_loai();
         while($set = $result->fetch()){
             $tenloai = $set['tenloai'];
             $soluong = $set['soluong'];
             echo "tenloai.push('".$tenloai."');";
             echo "soluongban.push('".$soluong."');";
         }
         ?>
         //tao dong
         for(var i = 0;i <tenloai.length;i++){
             datahh = tenloai[i];
             slban = parseInt(soluongban[i]);
             rows.push([datahh,slban]);
         }
         // tao cot trong datatable
         data.addColumn('string',"Tên Loại");
         data.addColumn('number',"Số lượng bán");
         data.addRows(rows);
         //option
         var option = {
             title : 'Thống kê loại hàng hoá được yêu thích',
             width:600,
             height:400,
             backgroundColor:'#ffffff',
             colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
             is3D:true
         };
           var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
           chart.draw(data,option);
	 }
                   
    </script>
        <div class="thongke">
        <div style=" width:50%;  float: left;"   id="chart_div">dfsf</div>
        <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>    
      </div>
 
 