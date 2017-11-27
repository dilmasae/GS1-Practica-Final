<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function create_table_registration() {

    global $table_prefix, $wpdb;
    $wp_reg_table = $table_prefix . "registration";
	$sql0 =  "CREATE TABLE  " . $wp_reg_table . " (
	id INT NOT NULL auto_increment,
	id_registration INT NOT NULL,
	restaurant_name VARCHAR( 100 ) NOT NULL ,
	phone VARCHAR( 100 ) ,
	country_code VARCHAR( 50 ) ,
	time_zone VARCHAR( 50 ),
	name VARCHAR( 50 ) ,
	firstname VARCHAR( 50 ) ,
	email VARCHAR( 50 ) NOT NULL ,
	city VARCHAR( 50 )  ,
	address VARCHAR( 100 ) ,
	post_code VARCHAR( 50 ) ,
	locale VARCHAR( 50 ) ,
	capacity INT  ,
	lunch_opened_days VARCHAR( 50 ) ,
	dinner_opened_days VARCHAR( 50 ) , 
  gol_token VARCHAR( 50 ), 
	auth_token VARCHAR( 50 ), 
	issue VARCHAR( 50 ), 
	restaurant_id INT, 
	referal_key VARCHAR (50), 
	ip_address VARCHAR (50), 
	PRIMARY KEY id (id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;" ;
    
    if ($wpdb->get_var("show tables like '$wp_reg_table'") != $wp_reg_table) {
        require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
        dbDelta($sql0);
    }
}

function remove_table_registration(){
  global $table_prefix, $wpdb;
  $wp_reg_table = $table_prefix . "registration";
  $sql = "DROP TABLE ". $wp_reg_table;
	$wpdb->query($sql);
}

?>
