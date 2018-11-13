<?php

/*
Plugin Name: Caravan RMA
Description: Caravan RMA
Author: Caravan Globals
Version: 1.0
Author URI: https://www.caravancanopy.com
Text Domain: caravan-rma
*/


if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}


function checkTable() {
	if (!function_exists('maybe_create_table')) {
	    require_once ABSPATH . 'wp-admin/install-helper.php';
	}

	global $wpdb;
	
	$rma_table = $wpdb->prefix . "rma_request";
	$sql = "CREATE TABLE IF NOT EXISTS $rma_table ( ID int(10) NOT NULL AUTO_INCREMENT, uid varchar(255) NOT NULL, RMA_num int(10) NOT NULL, RMA_reason varchar(255) NOT NULL, RMA_details text NOT NULL, status varchar(10) NOT NULL DEFAULT 'Pending', date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (ID) ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
	maybe_create_table($rma_table, $sql);
}
register_activation_hook( __FILE__, 'checkTable' );


// RMA request page
function rma_admin_menu() {
    add_menu_page( 'Request RMA page', 'RMA Tool', 'manage_options', 'rma_request', 'rma_admin_page', 'dashicons-welcome-write-blog' );
    // add_submenu_page('rma_request', '페이지 상단제목', '자식 메뉴1', 'manage_options', 'myplugin-1', 'admin_page');
    // add_submenu_page('rma_request', '페이지 상단제목', '자식 메뉴2', 'manage_options', 'myplugin-2', 'admin_page');
}

add_action( 'admin_menu', 'rma_admin_menu' );

function rma_admin_page() {
    include plugin_dir_path( __FILE__ ) . "includes/rma_admin.php";
}

function rma_form( $atts ){
	include plugin_dir_path( __FILE__ ) . "includes/rma_form.php";
}
add_shortcode( 'rma_request', 'rma_form' );

?>
