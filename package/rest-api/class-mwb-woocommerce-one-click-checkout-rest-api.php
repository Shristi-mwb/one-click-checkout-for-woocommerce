<?php
/**
 * The file that defines the core plugin api class
 *
 * A class definition that includes api's endpoints and functions used across the plugin
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/package/rest-api/version1
 */

/**
 * The core plugin  api class.
 *
 * This is used to define internationalization, api-specific hooks, and
 * endpoints for plugin.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/package/rest-api/version1
 * @author     makewebbetter <webmaster@makewebbetter.com>
 */
class Mwb_Woocommerce_One_Click_Checkout_Rest_Api {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin api.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the merthods, and set the hooks for the api and
	 *
	 * @since    1.0.0
	 * @param   string $plugin_name    Name of the plugin.
	 * @param   string $version        Version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Define endpoints for the plugin.
	 *
	 * Uses the Mwb_Woocommerce_One_Click_Checkout_Rest_Api class in order to create the endpoint
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function mwocc_add_endpoint() {
		register_rest_route(
			'mwocc-route/v1',
			'/mwocc-dummy-data/',
			array(
				'methods'  => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'mwocc_default_callback' ),
				'permission_callback' => array( $this, 'mwocc_default_permission_check' ),
			)
		);
	}


	/**
	 * Begins validation process of api endpoint.
	 *
	 * @param   Array $request    All information related with the api request containing in this array.
	 * @return  Array   $result   return rest response to server from where the endpoint hits.
	 * @since    1.0.0
	 */
	public function mwocc_default_permission_check( $request ) {

		// Add rest api validation for each request.
		$result = true;
		return $result;
	}


	/**
	 * Begins execution of api endpoint.
	 *
	 * @param   Array $request    All information related with the api request containing in this array.
	 * @return  Array   $mwb_mwocc_response   return rest response to server from where the endpoint hits.
	 * @since    1.0.0
	 */
	public function mwocc_default_callback( $request ) {

		require_once MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'package/rest-api/version1/class-mwb-woocommerce-one-click-checkout-api-process.php';
		$mwb_mwocc_api_obj = new Mwb_Woocommerce_One_Click_Checkout_Api_Process();
		$mwb_mwocc_resultsdata = $mwb_mwocc_api_obj->mwocc_default_process( $request );
		if ( is_array( $mwb_mwocc_resultsdata ) && isset( $mwb_mwocc_resultsdata['status'] ) && 200 == $mwb_mwocc_resultsdata['status'] ) {
			unset( $mwb_mwocc_resultsdata['status'] );
			$mwb_mwocc_response = new WP_REST_Response( $mwb_mwocc_resultsdata, 200 );
		} else {
			$mwb_mwocc_response = new WP_Error( $mwb_mwocc_resultsdata );
		}
		return $mwb_mwocc_response;
	}
}
