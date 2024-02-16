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

 class StoicaToolkit{
 	public function __construct(){
 		require_once('stoica-toolkit-functions.php');
 	}
 }

 $StoicaToolkit = new StoicaToolkit();