<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Google Visualization API Sample
    </title>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.1', {packages:["charteditor"]});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
        
        // Prepare the data
        var data = google.visualization.arrayToDataTable([
          ['parameter', 'value', 'interval', 'time'],
          ['cpu utilization',10,10,10],
          ['cpu utilization',30,5,10],
          ['cpu utilization',20,10,10],
          ['cpu utilization',70,5,10],
          ['Jessica', 22, 22, 26],
          ['Aaron', 20, 3, 1],
          ['Margareth', 23, 42, 8],
          ['Miranda', 22, 33, 6]
        ]);
      
        // Define a slider control for the Age column.
        var slider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'control1',
          'options': {
            'filterColumnLabel': 'interval',
          'ui': {'labelStacking': 'vertical'}
          }
        });
      
        // Define a category picker control for the Gender column
        var categoryPicker = new google.visualization.ControlWrapper({
          'controlType': 'parameter',
          'containerId': 'control2',
          'options': {
            'filterColumnLabel': 'value',
            'ui': {
            'labelStacking': 'vertical',
              'allowTyping': false,
              'allowMultiple': false
            }
          }
        });
      
        // Define a Pie chart
        var pie = new google.visualization.ChartWrapper({
          'chartType': 'Linechart',
          'containerId': 'chart1',
          'options': {
            'width': 300,
            'height': 300,
            'legend': 'none',
            'title': 'Donuts eaten per person',
            'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
            'pieSliceText': 'label'
          },
          // Instruct the piechart to use colums 0 (Name) and 3 (Donuts Eaten)
          // from the 'data' DataTable.
          'view': {'columns': [0, 3]}
        });
      
        // Define a table
        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'chart2',
          'options': {
            'width': '300px'
          }
        });
      
        // Create a dashboard
        new google.visualization.Dashboard(document.getElementById('dashboard')).
            // Establish bindings, declaring the both the slider and the category
            // picker will drive both charts.
            bind([slider, categoryPicker], [Line, table]).
            // Draw the entire dashboard.
            draw(data);
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="dashboard">
      <table>
        <tr style='vertical-align: top'>
          <td style='width: 300px; font-size: 0.9em;'>
            <div id="control1"></div>
            <div id="control2"></div>
            <div id="control3"></div>
          </td>
          <td style='width: 600px'>
            <div style="float: left;" id="chart1"></div>
            <div style="float: left;" id="chart2"></div>
            <div style="float: left;" id="chart3"></div>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
​