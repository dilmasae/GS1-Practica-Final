<?php
require('include_instabook.php');

$referal_key = $_POST["referal_key"];
$gol_token = $_POST["gol_token"];

$values = array("gol_token" => $gol_token, "referal_key" => $referal_key);

$args = array(
  'body' => $values,
  'timeout' => '50',
  'redirection' => '5',
  'sslverify' => false,
  'httpversion' => '1.0',
  'blocking' => true,
  'headers' => array(),
  'cookies' => array()
);

$response = array() ;
$retry = 0 ;
do {
  $retry++;
  $response = wp_remote_get($guestonline_url.'/registrations/v1/restaurant_infos_from_referal', $args);
} while ((is_wp_error($response) == 1 || $response['response']['code'] != 200) && $retry < 10);

if (is_wp_error($response) != 1 && $response["response"]["code"] == 200){
  $restaurant_id = json_decode($response["body"]) -> {'restaurant_id'};
  $restaurant_name = json_decode($response["body"]) -> {'restaurant_name'} ;
  $email = json_decode($response["body"]) -> {'email'};

  $data = array('restaurant_id' => $restaurant_id, 
                'restaurant_name' => $restaurant_name, 
                'gol_token' => $gol_token, 
                'referal_key' => $referal_key, 
                'email' => $email
               );


  $wpdb->insert( $wp_reg_table, $data);

  instabook_set_referal_key($referal_key) ;

  include("restaurant_info_page.php");

}
else{
  echo "Error";
}

?>
