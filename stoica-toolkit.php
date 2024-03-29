<?php
/**
 * Plugin Name: Stoica Toolkit
 * Plugin URI: https://stoicaabogados.es
 * Description: Stoica Toolkit Functionality
 * Version: 1.0
 * Author: Abu Hena
 * Text Domain: stoica-toolkit
 */

 /**
  * Main class of the plugin
  */
define('STOICA_DIR_PATH', plugin_dir_path(__FILE__));
define('STOICA_DIR_URL', plugin_dir_url(__FILE__));
 class StoicaToolkit{

	/**
	 * Plugin version
	 */
	const VERSION = '1.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the addon.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.16.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

 	public function __construct(){
 		require_once STOICA_DIR_PATH .'inc/functions.php';
 		require_once STOICA_DIR_PATH .'inc/widgets/wp-footer-address-widget.php';

		//if compatible then init elementor
		if( $this->is_compatible()){
			add_action('elementor/init', [$this, 'init']);
		}
 	}

	public function is_compatible(){

		//check if elementor is activated
		if( ! did_action( 'elementor/loaded' )){
			add_action('admin_notices', [$this, 'sa_elementor_required_notice']);
			return;
		}

		return true;
		
	}

	public function sa_elementor_required_notice(){
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'stoica-toolkit' ),
			'<strong>' . esc_html__( 'Stoica Toolkit', 'stoica-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'stoica-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function init(){

		add_action( 'elementor/widgets/register', [ $this, 'sa_register_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'sa_add_elementor_widget_categories' ]);

	}

	public function sa_register_widgets($widgets_manager ){

		require_once STOICA_DIR_PATH .'inc/widgets/service-widget.php';
		require_once STOICA_DIR_PATH .'inc/widgets/stoica-icon-grid.php';
		require_once STOICA_DIR_PATH .'inc/widgets/testimonial.php';
		require_once STOICA_DIR_PATH .'inc/widgets/image-navigator.php';
		require_once STOICA_DIR_PATH .'inc/widgets/accordion.php';		
		require_once STOICA_DIR_PATH .'inc/widgets/header-breadcrumb.php';
		require_once STOICA_DIR_PATH .'inc/widgets/image-slider-with-info.php';


		$widgets_manager->register( new ServiceWidget() );
		$widgets_manager->register( new StoicaIconGrid() );
		$widgets_manager->register( new StoicaTestimonial() );
		$widgets_manager->register( new ImageNavigator() );
		$widgets_manager->register( new StoicaAccordion() );
		$widgets_manager->register( new HeaderBreadcrumb() );
		$widgets_manager->register( new StoicaImageSliderWithInfo() );
		
	}

	public function sa_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'stoica',
			[
				'title' => esc_html__( 'Stoica Abogados', 'stoica-toolkit' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}	
 }

 $StoicaToolkit = new StoicaToolkit();