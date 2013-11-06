<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
        <script type="text/javascript" src="jquery-2.0.3.js"></script> 
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            function loadgraph(v, statics, interval, timerange)
            {
                //load the google api
                google.load("visualization", "1", {packages: ["corechart"], callback: drawChart});
                function drawChart()
                {
                    var dataString = {'parameter': v, 'static': statics, 'interval': interval, 'timerange': timerange}
                    //use ajax call to get the data srom the server
                    var jsonData = $.ajax({
                        type: "POST",
                        url: "getData.php",
                        data: dataString,
                        dataType: "json",
                        async: false
                    }).responseText;
                    //intialize the values to display in the graph
                    switch (v)
                    {
                        case 1:
                            tit = "CPU UTILIZATION CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 2:
                            tit = "DISKREAD BYTES CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 3:
                            tit = "DISKREAD OPERATIONS CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 4:
                            tit = "DISKWRITE BYTE CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 5:
                            tit = "NETWORKIN BYTE CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 6:
                            tit = "NETWORKOUT BYTE CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        case 7:
                            tit = "STATUSCHECKFAILED CHART";
                            xaxis = "cpu utilization in percent";
                            yaxis = "time values";
                            break;
                        default:
                            document.write("invalid");
                    }

                    var options = {
                        title: tit,
                        'vAxis': {title: xaxis},
                        'hAxis': {title: yaxis},
                    };
                    //load the json data to the graph
                    var data = new google.visualization.DataTable(jsonData);
                    //draw the chart
                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                    $("#loading").hide();

                }
            }
            function getinstance(region)
            {
                var dataString = {'region': region}
                var jsonData = $.ajax({
                    type: "POST",
                    url: "runninginstance.php",
                    data: dataString,
                    dataType: "json",
                    async: false
                }).responseText;

                var objs = JSON.parse(jsonData);



                var select = document.getElementById("select6");
                for (var i = 0; i < objs.length; i++) {
                    var opt = objs[i];
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    select.appendChild(el);
                }
            }
            
            
            $(document).ready(function()
            {
                //set all the properties when to display or not
                $("#info").hide();
                $("#period").hide();
                $("#loading").hide();
                $("#time").hide();
                var remove;
                $('#select5').change(function()
                {
                    region = this.value;
                    document.getElementById('select6').options.length = 1;
                    //$("#select6").empty();
                    
                    $("#select6").show();
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#loading").hide();
                    $("#period").hide();
                    getinstance(region);
                });
                $('#select6').change(function()
                {
                    instance = this.value;
                    alert(region+instance);
                   
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#loading").hide();
                    $("#period").hide();

                });

               $("#cpu").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#time").show();
                    id = 1;
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#diskread").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    id = 2;
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    $("#time").show();
                    $('#cpu').css('color', 'black');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#diskreadop").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    id = 3;
                    $(remove).removeClass('active');
                    remove = this;
                    $("#time").show();
                    $(this).addClass('active');
                    $('#cpu').css('color', 'black');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#diskwrite").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    id = 4;
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    $('#cpu').css('color', 'black');
                    $("#time").show();
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#networkin").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    id = 5;
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    $("#time").show();
                    $('#cpu').css('color', 'black');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#networkout").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#time").show();
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    id = 6;
                    $('#cpu').css('color', 'black');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $("#statusfail").click(function()
                {
                    $("#select").val('selected');
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#time").show();
                    $(remove).removeClass('active');
                    remove = this;
                    $(this).addClass('active');
                    id = 7;
                    $('#cpu').css(color, 'black');
                    $("#select").val('selected');
                    $("#period").hide();
                    $("#loading").hide();
                    $("#info").hide();
                });
                $('#select').change(function()
                {
                    interval = this.value;
                    $("#select2").val('selected');
                    $("#select3").val('selected');
                    $("#loading").hide();
                    $("#period").show();
                });
                $('#select2').change(function()
                {
                    time = this.value
                    $("#select3").val('selected');
                    $("#info").show();
                    $("#loading").hide();
                    if (static != NULL)
                    {
                        //call the function to display 
                        loadgraph(id, static, time, interval);
                    }
                });
                $('#select3').change(function()
                {
                    static = this.value;
                    $("#loading").show();
                    loadgraph(id, static, time, interval);
                });
            });
        </script>
    </head>
    <body style="background-image: url('kk.jpg')">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <div class="container">
            <h1><a href="#">CLOUD WATCH GRAPH</a></h1>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="#">Aws  Service Graphs</a></li>
                            <li class="span3">
                                <div id="region"  >

                                    <select id="select5"   >
                                        <option value="selected">select Region-</option>             
                                        <option value="ap-northeast-1">ap-northeast-1</option>
                                        <option value="ap-southeast-1">ap-southeast-1</option>
                                        <option value="ap-southeast-2">ap-southeast-2</option>
                                        <option value="us-west-2">us-west-2</option>
                                        <option value="us-west-1">us-west-1</option>
                                        <option value="eu-west-1">eu-west-1</option>
                                        <option value="sa-east-1">sa-east-1</option>       
                                    </select>                 

                                    </h4>
                                </div>
                            </li>

                            <li class="span3">
                                <div id="instances">

                                    <select id="select6"   >
                                        <option value="selected">select Instance</option>             

                                    </select>                 

                                    </h4>
                                </div>
                            </li>
                            <li class="myname">             
                                <a href="#"><?php echo "<b>" . $_SESSION['name'] . "</b>"; ?></a>                   
                            </li>
                            <?php if ($_SESSION['status'] == "login") { ?> 
                                <li> <a href="signout.php">signout   </a>   </li>
                            <?php } else { ?>
                                <li> <a href="login.php">Signin   </a>   </li>
                            <?php } ?>
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

                <div class="span3" id="time" style="margin-top: -0%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Time range: </label> 
                        <select id="select" >
                            <option value="selected">select option-</option>  
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
                <div class="span3" id="period" style="margin-top: -0%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Period: </label> 
                        <select id="select2"  >
                            <option value="selected">select option-</option>  
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
                <div class="span3" id="info" style="margin-top: -0%;margin-left: 5%;" >
                    <h1>  <label for="select">Select Statics: </label> 
                        <select id="select3"  >
                            <option value="selected">select option-</option>             
                            <option value="Minimum">Minimum</option>
                            <option value="Average">Average</option>
                            <option value="Maximum">Maximum</option>
                            <option value="Sum">Sum</option>
                        </select>                 
                    </h1>
                </div>

            </div>

        </div>
        <div id="chart_div"></div>
        <div id="loading" style="margin-top: 5%; margin-left: 35%">
            <img src="load.gif" />
        </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
