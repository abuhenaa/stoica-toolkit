<?php
/**
 * Plugin Name: Stoica Toolkit
 * Plugin URI: https://stoicaabogados.es
 * Description: Stoica Toolkit Functionality
 * Version: 1.0
 * Author: Abu Hena
 */

 /**
  * Main class of the plugin
  */
define('STOICA_DIR_PATH', plugin_dir_path(__FILE__));
define('STOICA_DIR_URL', plugin_dir_url(__FILE__));
 class StoicaToolkit{
 	public function __construct(){
 		require_once STOICA_DIR_PATH .'inc/functions.php';
 	}
 }

 $StoicaToolkit = new StoicaToolkit();