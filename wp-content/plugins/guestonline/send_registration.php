<?php
require('include_instabook.php');

$reg_id = $_POST["reg_id"];

error_log("reg_id : ".$reg_id);
  
$values = array("registration" => $_POST["params"]);
 
$args = array(
    'body' => $values,
    'timeout' => '20',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array(),
    'cookies' => array()
);

$response = wp_remote_post( $signup_url.'/api/v1/gol/partner/RnAC8Na', $args );

if (is_array($response) && $response["response"]["code"] == 201){
  $authentication_token = json_decode($response["body"]) -> {'authentication_token'};
  $id = json_decode($response["body"]) -> {'id'};
  $gol_token = json_decode($response["body"]) -> {'gol_token'};
  $issue = json_decode($response["body"]) -> {'issue'};

  $data = array('auth_token' => $authentication_token, 
                'id_registration' => $id, 
                'gol_token' => $gol_token, 
                'issue' => $issue
               );
  $where = array( 'ID' => $reg_id );

  $wpdb->update( $wp_reg_table, $data, $where);

  $msg =  "We have validated your account, we are now creating your restaurant !" ;

  $result = array('code' => $response["response"]["code"], 'gol_token' => $gol_token, 'issue' => $issue, 'msg' => $msg);

  echo json_encode($result);

}
else{
  if (is_wp_error($response) != 1){
  //print_r($response);
    $errors = json_decode($response["body"])->{'error'} ;
    $restaurant_name =  $_POST["params"]["restaurant_name"];
    $name =  $_POST["params"]["name"];
    $firstname =  $_POST["params"]["firstname"];
    $email =  $_POST["params"]["email"];
    $phone =  $_POST["params"]["phone"];
    $address =  $_POST["params"]["address"];
    $city =  $_POST["params"]["city"];
    $post_code =  $_POST["params"]["post_code"];
    $capacity =  $_POST["params"]["capacity"];

    ob_start();
    include 'form_page.php';
    $content = ob_get_clean();
    #$content = include('form_page.php');
    $result = array('code' => $response["response"]["code"], 'msg' => $content, 'errors' => $errors);
    echo json_encode($result);
  }
  else{
    print_r($response);
  }
}


?>
