<?php
#require('./../../../wp-load.php');
#require_once ABSPATH . 'wp-load.php';
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

global $wpdb;
$wpdb->show_errors();
$wp_reg_table = $table_prefix . "registration";

//  ********* TO RUN ON PRODUCTION MODE  ************ //
$signup_url = "http://signup.guestonline.fr";
$guestonline_url = "http://pro.guestonline.fr";
$module_url = "http://pro.guestonline.fr/instabook/bookings/";

//  ********* TO RUN ON DOCKER with local signup and v2  ************ //
#$signup_url = "http://10.0.2.2:3000";
#$guestonline_url = "http://10.0.2.2:3001";
#$module_url = "http://10.0.2.2:3001/instabook/bookings/";

$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain( 'guestonline', false, $plugin_dir );
?>
