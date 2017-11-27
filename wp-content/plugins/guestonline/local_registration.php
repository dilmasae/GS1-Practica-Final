<?php

require('include_instabook.php');

$wpdb->show_errors = TRUE;
$wpdb->suppress_errors = FALSE;


$wpdb->insert( $wp_reg_table, $_POST);

$reg_id = $wpdb->insert_id ;

$msg =  "We are taking your registration into account please wait" ;

$result = array('params' => json_encode($_POST), 'msg' => $msg, 'reg_id' => $reg_id);

echo json_encode($result);
?>

