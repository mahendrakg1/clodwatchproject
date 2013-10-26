<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
         <script type="text/javascript" src="jquery-2.0.3.js"></script> 
        <!--Load the AJAX API-->

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            
           
         
         function loadgraph(v,statics,interval,timerange)
         {
             
           google.load("visualization", "1", {packages:["corechart"], callback:drawChart}); 
      function drawChart() {
          var dataString = { 'parameter': v,'static':statics,'interval':interval,'timerange':timerange}
           
        var jsonData = $.ajax({
            type: "POST",
            url: "getData.php",
            data: dataString,
            dataType:"json",
            async: false
            }).responseText;
            
            if(v==1)
                {
                    tit="CPU UTILIZATION CHART";
                }
              if(v==2)
                  {
                      tit="DISKREAD BYTES CHART";
                  }
                  if(v==3)
                      {
                          tit="DISKWRITE BYTE CHART";
                      }
 
        var options = {
            
            title: tit,
            backgroundColor: '#E4E4E4'
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
            $("#period").hide();
            $("#loading").hide();
            $("#time").hide();
            
            
            
            
             $("#cpu").click(function()
             {
                 
               $("#info").show();
                 
                 id=1; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                   $("#period").hide();
                  $("#loading").hide();
                  $("#time").hide();
            
              
                 
             });
             $("#diskread").click(function()
             {
                 
                 id=2; 
                 $("#info").show();
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                   $("#period").hide();
                  $("#loading").hide();
                  $("#time").hide();
            
                
                 
                 
             });
             $("#diskreadop").click(function()
             {
             
                 id=3; 
                  $("#info").show();
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                   $("#period").hide();
                   $("#loading").hide();
                  $("#time").hide();
            
                
                 
             });
              $("#diskwrite").click(function()
             {
                 
                 id=4; 
                  $('#cpu').css('color','black');
                   $("#info").show();
                  $("#select").val('selected');
                   $("#period").hide();
                  $("#loading").hide();
                  $("#time").hide();
            
               
                 
             });
             
              $("#networkin").click(function()
             {
                
                 id=5; 
                  $("#info").show();
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                   $("#period").hide();
                  $("#loading").hide();
                   $("#time").hide();
            
              
                 
             });
             
              $("#networkout").click(function()
             {
                 
                  $("#info").show();
                 id=6; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                  $("#period").hide();
                  $("#loading").hide();
                   $("#time").hide();
            
                 
             });
             
              $("#statusfail").click(function()
             {
                
                  $("#info").show();
                 id=7; 
                  $('#cpu').css('color','black'); 
                  $("#select").val('selected');
                   $("#period").hide();
                   $("#loading").hide();
                    $("#time").hide();
            
              
                 
             });
             
              $('#select').change(function () {
                
                
                static=this.value;
                $("#period").show();
                $("#loading").hide();
                 $("#time").hide();
               
               
              });
              
              
              $('#select2').change(function () {
                
            
               time=this.value
                $("#time").show();
                 $("#loading").hide();
               
               
              });
              $('#select3').change(function () {
                
            
                $("#loading").show();
              loadgraph(id,static,time,this.value);
               
               
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
                
                <div class="span3" id="info" style="margin-top: -1%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Statics: </label> 
                        <select id="select"  >
                            <option value="selected">select option-</option>             
                            <option value="Minimum">Minimum</option>
                            <option value="Average">Average</option>
                            <option value="Maximum">Maximum</option>
                            <option value="Sum">Sum</option>
                          </select>                 
                        
                    </h1>
                </div>
                <div class="span3" id="period" style="margin-top: -1%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Period: </label> 
                        <select id="select2"  >
                            <option value="sel">select option-</option>  
                            <option value=60>1 Min</option>  
                            <option value=180>3 Min</option>  
                            <option value=300>5 Min</option>
                            <option value=900>15 Min</option>
                            <option value=3600>1 Hour</option>
                            <option value=21600>12 Hour</option>
                            <option value=86400>1 Day</option>
                          </select>                 
                        
                    </h1>
                </div>
                 <div class="span3" id="time" style="margin-top: -0%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Time range: </label> 
                        <select id="select3"  >
                            <option value="sel">select option-</option>  
                            <option value="-1 Hour">1 hour</option>  
                            <option value="-3 Hour">3 hour</option>  
                            <option value="-6 Hour">6 hour</option>
                            <option value="-12 Hour">12 hour</option>
                            <option value="-1 Day">24 hour</option>
                            <option value="-7 Days">1 week</option>
                            <option value="-14 Days">2 week</option>
                            
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
