<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
  
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages': ['charteditor']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
        
       
      var jsonData = $.ajax({
          url: "getData.php",
          dataType:"json",
          async: false
          }).responseText;
          
          
        alert(jsonData);
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
       var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
      // Instantiate and draw our chart, passing in some options.
      var chart3 = new google.visualization.LineChart(document.getElementById('chart_div'));
                    chart3.draw(data, options);
    }
    

    </script>
  </head>

  <body>
      
    <div id="chart_div"></div>
  </body>
</html>