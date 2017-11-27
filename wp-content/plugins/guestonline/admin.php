<?php
add_action( 'admin_menu', 'instabook_key_config' );
add_filter( 'plugin_action_links', 'instabook_plugin_action_links', 10, 2 );
add_action('admin_head', 'plugin_guestonline_admin_head');





function plugin_guestonline_admin_head()
{
?>
  <link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'instabook.css', __FILE__ ); ?> ">
<?php
  wp_enqueue_script('instabook',plugins_url( 'instabook.js', __FILE__ ));
  $params = array(
    'plugin_dir_url' => plugin_dir_url( __FILE__ ),
    'plugin_basename' => plugin_basename( __FILE__ ),
    'plugin_dir_path' => plugin_dir_path( __FILE__ ),
    'plugin_path' => plugins_url( __FILE__ )
  );
  wp_localize_script( 'instabook', 'plugin_params',$params );
}
//register the admin menu for instabook 
function instabook_key_config()
{
  //add_plugins_page('plugins.php', 'Instabook',  'manage_options', 'instabook-key-config', 'instabook_admin_options' );
  add_menu_page('Guestonline', 'Guestonline', 'manage_options', __FILE__, 'instabook_admin_options', plugins_url( 'guestonline/images/icon_gol_wp.png' ));
}

//config key
function instabook_admin_options()
{
  #require('./../wp-load.php');
  require ABSPATH . 'wp-load.php';
  #$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
  #require( $parse_uri[0] . 'wp-load.php' );


  global $table_prefix, $wpdb;
  $wpdb->show_errors();
  $wp_reg_table = $table_prefix . "registration";

  //  ********* TO RUN ON DOCKER with local signup and v2  ************ //
  #$signup_url = "http://10.0.2.2:3000";
  #$guestonline_url = "http://10.0.2.2:3001";
  #$module_url = "http://10.0.2.2:3001/instabook/bookings/";

  //  ********* TO RUN ON PRODUCTION MODE  ************ //
  $signup_url = "http://signup.guestonline.fr";
  $guestonline_url = "http://pro.guestonline.fr";
  $module_url = "http://pro.guestonline.fr/instabook/bookings/";
  
  $show_key_form = false;
  $plugin_path = dirname(plugin_basename(__FILE__));
  $locale = substr(get_locale(), 0, 2);
  $ip = get_client_ip() ;
  $ip_server = get_client_ip_server();

  $plugin_dir = basename(dirname(__FILE__));
  load_plugin_textdomain( 'guestonline', false, $plugin_path.'/languages/' );


  $config_link = esc_url(add_query_arg( array( 'page' => $plugin_path.'/admin.php', 'show' => 'enter-key' ), admin_url('admin.php'))); 

  if(isset( $_GET['show']) && $_GET['show'] == 'enter-key')
    $show_key_form = true;

  if($_POST['save_key_button'])
  {
    if(isset($_POST['key']))
      instabook_set_referal_key(esc_attr($_POST['key']));

  }


  $referal_key = instabook_get_referal_key();
  if(!empty($referal_key)) {
    $registration_row = $wpdb->get_row( "SELECT * FROM $wp_reg_table WHERE referal_key = '$referal_key'" );

    $restaurant_name = $registration_row->restaurant_name ;
    $gol_token = $registration_row->gol_token ;
    $facebook_url = $module_url.$registration_row->restaurant_id ."/yr3faXipsY";
    $login = $registration_row->email ;
    #echo $plugin_path.'/languages/'."<br>";
    #echo $plugin_dir.'/languages/'."<br>";
    include("restaurant_info_page.php");
  }
  else {
    #if ($show_key_form) {
      include("referal_form.php");
    #}
    #else {
    #  $errors = null ;
    #  include("form_page.php");
    #}
  }
}

// Display a Settings link on the main Plugins page
function instabook_plugin_action_links( $links, $file )
{
  if ( $file == plugin_basename( dirname(__FILE__).'/instabook.php' ) )
  {
    $links[] = '<a href="' . admin_url( 'admin.php?page=guestonline/admin.php' ) . '">'.__( 'Settings' ).'</a>';
    unset( $links['edit'] );
  }
  return $links;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}



?>
