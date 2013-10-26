<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
    <head>
        <script type="text/javascript" src="jquery-2.0.3.js"></script> 
        <!--Load the AJAX API-->

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            var xmlhttp;
         function loadXMLDoc( v)
            {
            alert(v);
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, $MetricName, $start_time, $end_time, $period, $Statistics, $unit, $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

       function cmp($a, $b) {
             return strtotime($a[0]) - strtotime($b[0]);
     }

//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, $MetricName, "-7 day", "now", 86400, $Statistics, "Percent", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'CPU UTILIZATION PER WEEK',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
            function loadXMLDoc1()
            {
              
            
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", $start_time, $end_time, $period, $Statistics, "Bytes", $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

       

//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", "-7 day", "now", 86400, $Statistics, "Bytes", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'disk bytes');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'disk read bytes',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
                 function loadXMLDoc1()
            {
                alert("gh");
            
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", $start_time, $end_time, $period, $Statistics, "Bytes", $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

       

//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", "-7 day", "now", 86400, $Statistics, "Bytes", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'disk bytes');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'disk read bytes',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
                 function loadXMLDoc1()
            {
                
            
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", $start_time, $end_time, $period, $Statistics, "Bytes", $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

       

//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", "-7 day", "now", 86400, $Statistics, "Bytes", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'disk bytes');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'disk read bytes',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
            function loadXMLDoc1()
            {
               
            
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", $start_time, $end_time, $period, $Statistics, "Bytes", $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

       

//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, "DiskReadBytes", "-7 day", "now", 86400, $Statistics, "Bytes", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'disk bytes');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'DISKREAD IN BYTES BEFORE ONE DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "disk read in bytes"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'DISKREAD IN BYTES BEFORE ONE WEEK',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "disk read in bytes"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
                
                function loadXMLDoc3()
            {
           
           google.load("visualization", "1", {packages:["charteditor"], callback: drawChart});
                // Load the Visualization API and the piechart package.
      

                // Set a callback to run when the Google Visualization API is loaded.
                google.setOnLoadCallback(drawChart);
                
                document.getElementById()

          <?php
            date_default_timezone_set('UTC');
            require_once('aws-sdk-for-php/sdk.class.php');
            require_once('enterdata.php');
            try {
    //connecting with the cloud watch
                  $cw = new AmazonCloudWatch(array('key' => $key, 'secret' => $secret));
                }
//if there are errors in the secrete and access key
            catch (Exception $e) {
               echo 'Caught exception: ', $e->getMessage(), "\n";
                 }

              $response = $cw->get_metric_statistics($Namespace, $MetricName, $start_time, $end_time, $period, $Statistics, $unit, $opts);

              $p = array();
              $d = array();
                $i = 0;
          //get the individual parameter and timestamp 
            foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
             // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
            $d[$i][0] = $time;
            $d[$i][1] = (int) $point->Average[0];
            $i++;
       }

      
//sort the data according to the date
       usort($d, "cmp");

// Sort by key while maintaining association in order to have an oldest->newest sorted dataset
      $response = $cw->get_metric_statistics($Namespace, $MetricName, "-7 day", "now", 86400, $Statistics, "Percent", $opts);


       $d1 = array();
       $i = 0;
      foreach ($response->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
               $time = date('y-m-d', strtotime($point->Timestamp));
               $d1[$i][0] = $time;
               $d1[$i][1] = (int) $point->Average[0];
               $i++;
         }

       usort($d1, "cmp");
       $i = 0;
     foreach ($d1 as $p) {
         $d1[$i][0] = date("d-m", strtotime($d1[$i][0]));
           $i++;
         }
       ?>
                var js_array = <? echo json_encode($d); ?>;
                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                var js_array1 = <? echo json_encode($d1); ?>;
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'time');
                    data.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 23; i++)
                    {
                        data.addRows([
                            [js_array[i][0], js_array[i][1]],
                        ]);
                    }
                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'date');
                    data1.addColumn('number', 'cpu utilization');
                    for (var i = 0; i < 7; i++)
                    {
                        data1.addRows([
                            [js_array1[i][0], js_array1[i][1]],
                        ]);
                    }

                    // Set chart options
                    var options = {'title': 'CPU UTILIZATION PER DAY',
                        'width': 400,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "time in h:m"}
                    };
                    var options2 = {'title': 'CPU UTILIZATION PER WEEK',
                        'width': 500,
                        'height': 300,
                        'vAxis': {title: "Cpu Utilization in percent"},
                        'hAxis': {title: "date in d:m"}
                    };

                    // Instantiate and draw our chart, passing in some options.

                    var chart3 = new google.visualization.LineChart(document.getElementById('graph'));
                    chart3.draw(data, options);
                    var chart3 = new google.visualization.LineChart(document.getElementById('graph1'));
                    chart3.draw(data1, options2);

                }
                }
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
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
                
            <div class="row">
                <div class="span2">
                    <ul class="nav nav-list" >
                        <li onclick="loadXMLDoc(1)"><a href="#">Cpu Utilization</a></li>
                        <li onclick="loadXMLDoc(2)" ><a href="#">DiskReadBytes</a></li>
                        <li  onclick="loadXMLDoc2()"><a href="#">DiskReadOps</a></li>
                         <li onclick="loadXMLDoc3()"><a href="#">DiskWriteBytes</a></li>
                         <li onclick="loadXMLDoc3()"><a href="#">NetworkIn</a></li>
                         <lionclick="loadXMLDoc3()"><a href="#">NetworkOut</a></li>
                        
                    </ul>

                </div>
                <div id="graph" class="span5">

                </div>
                <div id="graph1" class="span5">

                </div>
            </div>



        </div>

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>
