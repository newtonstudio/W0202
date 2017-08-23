<div class="container">
      <div class="starter-template">

      		<div id="chart_div" style="width: 100%; height: 500px;"></div>

          <button onclick="addSeries()">Add Series</button>

      		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      var output = <?=!empty($outputList)?json_encode($outputList):'[]'?>;
      var data;
      var options;
      var chart;

      function drawChart() {

        data = google.visualization.arrayToDataTable(output);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        
        chart.draw(data, options);
      }

      function addSeries(){

        var newoutput = [];
        if(output.length > 0) {
          for(var i=0; i < output.length; i++){

            var tmp = [];
            for(var j=0; j < output[i].length; j++) {
                tmp.push(output[i][j]);
            }

            if(i==0) {
              tmp.push("Sample");
            } else {
              tmp.push(Math.round(Math.random()*100000));
            }

            newoutput.push(tmp);

          }

        }

        data = google.visualization.arrayToDataTable(newoutput);

        chart.draw(data, options);

        console.log(newoutput);



      }


    </script>

      </div>
</div>