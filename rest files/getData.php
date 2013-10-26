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
         $parameter=$_POST['parameter'];
         if($parameter==1)
         {
             $MetricName="CPUUtilization";
             $unit="Percent";
         }
         elseif ($parameter==2) {
         $MetricName="DiskReadBytes";
         $unit="Bytes";
         }
         elseif ($parameter==3) {
         $MetricName="DiskReadOps";
         $unit="Count";
         }
         elseif ($parameter==4) {
         $MetricName="DiskWriteBytes";
         $unit="Bytes";
         }
         elseif ($parameter==5) {
         $MetricName="NetworkIn";
         $unit="Bytes";
         }
         elseif ($parameter==6) {
         $MetricName="NetworkOut";
         $unit="Bytes";
         }
         elseif ($parameter==7) {
         $MetricName="StatusCheckFailed";
         $unit="Count";
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
     

      
   
         
$table = array();
$table['cols'] = array(
	/* define your DataTable columns here
	 * each column gets its own array
	 * syntax of the arrays is:
	 * label => column label
	 * type => data type of column (string, number, date, datetime, boolean)
	 */
	// I assumed your first column is a "string" type
	// and your second column is a "number" type
	// but you can change them if they are not
    array('label' => 'time', 'type' => 'string'),
	array('label' => 'data', 'type' => 'number')
);

$rows = array();
$i=0;
foreach($d as $p) {
    $temp = array();
	// each column needs to have data inserted via the $temp array
	$temp[] = array('v' => $d[$i][0]);
	$temp[] = array('v' => (int) $d[$i][1]); // typecast all numbers to the appropriate type (int or float) as needed - otherwise they are input as strings
	
	// insert the temp array into $rows
    $rows[] = array('c' => $temp);
    $i++;
}

// populate the table with rows of data
$table['rows'] = $rows;

// encode the table as JSON
$jsonTable = json_encode($table);

// set up header; first two prevent IE from caching queries
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

// return the JSON data
echo $jsonTable;
          
?>
          