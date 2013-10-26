<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
         <script type="text/javascript" src="jquery-2.0.3.js"></script> 
        <!--Load the AJAX API-->

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            
           
         
         function loadgraph(v)
         {
             
           google.load("visualization", "1", {packages:["corechart"], callback:drawChart}); 
      function drawChart() {
          var dataString = { 'parameter': v}
           
        var jsonData = $.ajax({
            type: "POST",
            url: "getData.php",
            data: dataString,
            dataType:"json",
            async: false
            }).responseText;
 
        var options = {
            title: 'Your Chart Title'
        };
       
        
        var data = new google.visualization.DataTable(jsonData);         
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        
        chart.draw(data, options);
        $("#loading").hide();
        
         }
     }
     
       $(document).ready(function()
            {
            $("#info").hide();
            $("#loading").hide();
             $("#cpu").click(function()
             {
                 $("#info").show();
                 $("#loading").show();
                 id=1; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
             $("#diskread").click(function()
             {
                 $("#loading").show();
                 id=2; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
                 
             });
             $("#diskreadop").click(function()
             {
                 $("#loading").show();
                 id=3; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
              $("#diskwrite").click(function()
             {
                 $("#loading").show();
                 id=4; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
             
              $("#networkin").click(function()
             {
                 $("#loading").show();
                 id=5; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
             
              $("#networkout").click(function()
             {
                 $("#loading").show();
                 id=6; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
             
              $("#statusfail").click(function()
             {
                 $("#loading").show();
                 id=7; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                 loadgraph(id);
                 
             });
             
             
             
             
            });
     
     
     
     
</script>
        </script>
    
       
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <div class="container">
            <h1><a href="#">CLOUD WATCH GRAPH</a></h1>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Downloads</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                
            <div class="row"  >
                <div class="span2">
                    <ul class="nav nav-list">
                        <li ><a href="#">      </a></li>
                        <li id="cpu"><a href="#">Cpu Utilization</a></button>
                        <li id="diskread"><a href="#">DiskReadBytes</a></li>
                        <li id="diskreadop"><a href="#">DiskReadOps</a></li>
                         <li id="diskwrite"><a href="#">DiskWriteBytes</a></li>
                         <li id="networkin"><a href="#">NetworkIn</a></li>
                         <li id="networkout"><a href="#">NetworkOut</a></li>
                        <li id="statusfail"><a href="#">StatusCheckFailed</a></li>
                       
                    </ul>

                </div>
                
                <div class="span4" id="info" style="margin-top: -1%;margin-left: 10%;" >
                    <h1>  <label for="select">Select Statics: </label> 
                        <select id="select"  >
                            <option value="selected">select option-</option>             
                            <option value="Minimum">Minimum</option>
                            <option value="Average">Average</option>
                            <option value="Maximum">Maximum</option>
                          </select>                 
                        
                    </h1>
                </div>
                
                
            </div>
                
            </div>

         <div id="chart_div"></div>
         <div id="loading" style="margin-top: 5%; margin-left: 35%">
                        <img src="load1.gif" />
                   </div>
        
        

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>
