<?php
require_once './aws-sdk-for-php-master/sdk.class.php';
require_once './aws-sdk-for-php-master/services/ec2.class.php';
require_once './aws-sdk-for-php-master/utilities/credential.class.php';
require_once './aws-sdk-for-php-master/utilities/credentials.class.php';

/*
 $config = array();
 $config['key'] = 
 $config['secret'] = 
 $name=null;
 
 * 
 */

  CFCredentials::set(array(
      '@default' => array(
          'key' => 'AKIAJRMQ3BUULEVUEDMA',
          'secret' => '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',
          'default_cache_config' => '/home/neev/PhpPrject/MyWww',
          'certificate_authority' => FALSE
      )
  ));
 
 

$ec2Client=  new AmazonEC2();
$ec2Client->set_region(AmazonEC2::REGION_APAC_SE1);




//createKey($ec2Client);

/*function createKey($ec2Client)
{
//describe_instance($ec2Client);
$response = $ec2Client->create_key_pair('phpkey');
 
if (isset($response->body->keyMaterial))
{
    file_put_contents($response->body->keyName . '.pem', (string) $response->body->keyMaterial);
}
}
*/

describe_instance($ec2Client);


function describe_instance($ec2Client)
{
$response = $ec2Client->describe_instances((array( "Filter" => array(
  array("Name"=>"instance-state-code", "Value" => "80")))));
$ar=$response->body->reservationSet->item;
foreach($ar as $inst)
{    $arr=$inst->instancesSet->item;
              
    $instanceId=$arr->instanceId;
    $imageId=$arr->imageId;
    $instanceState=$arr->name;
    
    $instanceType=$arr->instanceType;
    $publicip=$arr->dnsName ;
    $privateip=$arr->privateDnsName ;
    
    echo "hi ";
    
   //  $response1 = $ec2Client->describe_instance_attribute($instance,'instanceType');
   //  $response2 = $ec2Client->describe_instance_attribute($instance,'instanceState');
// $instance=$response->body->reservationSet->item[0]->instancesSet->item->instanceId;
echo $instanceId."\t";
echo $imageId."\t";
echo $instanceState."\t";
echo $instanceType."\t";
echo $publicip."\t";
echo $privateip."\t";
//echo($response1->body->instanceType->value);
//print_r($response2->body);
echo "\n";

}
}

//$ec2Client=  new AmazonEC2();





/*function launch_Instance($ec2Client)
{
$response = $ec2Client -> authorize_security_group_ingress(
    array('GroupName' => 'php2013', 
        'IpPermissions' => array( 
            array('IpProtocol' => 'tcp', 
            'FromPort' => '80', 
            'ToPort' => '80', 
            'IpRanges' => array( 
                array('CidrIp' => '10.132.161.151'),
                )
            )
        )
    )
);


$response = $ec2Client->create_key_pair('phpkey');
(string) $private_key = $response->body->keyMaterial;
echo "the private key is:". (string) $private_key;


$response = $ec2Client -> run_instances(
	'ami-3f108f3e', 1, 1, 
	array(
		'InstanceType' => 't1.micro',
		'KeyName' => 'phpkey', 
		'SecurityGroup' => 'php2013'));

$response = $ec2Client->run_instances('ami-84db39ed', 1, 1, array(
    'InstanceType' => 't1.micro',
    'SecurityGroup' => 'php2013'
));

}

*/

?>