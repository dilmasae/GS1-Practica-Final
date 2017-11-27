<?php
require('include_instabook.php');

$gol_token = $_POST["gol_token"];
$issue = $_POST["issue"];

error_log("gol_token : ".$gol_token);

$values = array("gol_token" => $gol_token, 'issue_id' => $issue);

$args = array(
  'body' => $values,
  'timeout' => '30',
  'redirection' => '5',
  'sslverify' => false,
  'httpversion' => '1.0',
  'blocking' => true,
  'headers' => array(),
  'cookies' => array()
);

sleep(30);

$response = array() ;
$retry = 0 ;
do {
  $retry++;
  $response = wp_remote_get($guestonline_url.'/registrations/v1/restaurant_infos', $args);
} while ((is_wp_error($response) == 1 || $response['response']['code'] != 200) && $retry < 10);

#print_r($response);

if (is_wp_error($response) != 1 && $response["response"]["code"] == 200){
  $restaurant_id = json_decode($response["body"]) -> {'restaurant_id'};
  $referal_key = json_decode($response["body"]) -> {'referal_key'};

  $data = array('restaurant_id' => $restaurant_id, 
    'referal_key' => $referal_key, 
  );
  $where = array( 'gol_token' => $gol_token );

  $wpdb->update( $wp_reg_table, $data, $where);

  $registration_row = $wpdb->get_row( "SELECT * FROM $wp_reg_table WHERE gol_token = '$gol_token'" );

  $restaurant_name = $registration_row->restaurant_name ;
  instabook_set_referal_key($referal_key) ;

  include("restaurant_info_page.php");

}
else{
  echo "Error";
}

?>
