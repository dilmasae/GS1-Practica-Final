<?php
require('include_instabook.php');

$gol_token = $_POST["gol_token"];
$password = $_POST["password"];

error_log("gol_token : ".$gol_token);

$values = array("gol_token" => $gol_token, 'password' => $password);

$args = array(
  'body' => $values,
  'timeout' => '20',
  'redirection' => '5',
  'httpversion' => '1.0',
  'sslverify' => false,
  'blocking' => true,
  'headers' => array(),
  'cookies' => array()
);

$response = array() ;
$response = wp_remote_post($guestonline_url.'/registrations/v1/update_password', $args);

#print_r($args);
#print_r($response);

if ($response["response"]["code"] == 201){
  $result = array('response_code' => $response["response"]["code"]);
  echo json_encode($result);
}
else{
  echo "Error";
}

?>
