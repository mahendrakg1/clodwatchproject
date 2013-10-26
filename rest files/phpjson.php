<html>
    <head>
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

      $response1 = $cw->get_metric_statistics($Namespace, $MetricName, $start_time, $end_time, $period, $Statistics, $unit, $opts);

      $response = array();
      $data = array();
      $i = 0;
//get the individual parameter and timestamp 
      foreach ($response1->body->GetMetricStatisticsResult->Datapoints->member as $point) {
    // Create an array with all results with the timestamp as the key and the statistic as the valu
            $time = date('H:i', strtotime($point->Timestamp));
         $response[$i]['time']  = $time;; 
         $response[$i]['title']=(int) $point->Average[0];
          $data['posts'][$i] = $response[$i];
         $i=$i+1;  
            
          }
          print_r(json_encode($data));
      $json_string = json_encode($data);

       $file = 'results.json';
       file_put_contents($file, $json_string);

       ?>
    <head>
    <body></body>
</html>