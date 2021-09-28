<?php
/**
 * Fired during plugin activation
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Mwb_Woocommerce_One_Click_Checkout_Api_Process' ) ) {

	/**
	 * The plugin API class.
	 *
	 * This is used to define the functions and data manipulation for custom endpoints.
	 *
	 * @since      1.0.0
	 * @package    Hydroshop_Api_Management
	 * @subpackage Hydroshop_Api_Management/includes
	 * @author     MakeWebBetter <makewebbetter.com>
	 */
	class Mwb_Woocommerce_One_Click_Checkout_Api_Process {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

		}

		/**
		 * Define the function to process data for custom endpoint.
		 *
		 * @since    1.0.0
		 * @param   Array $mwocc_request  data of requesting headers and other information.
		 * @return  Array $mwb_mwocc_rest_response    returns processed data and status of operations.
		 */
		public function mwocc_default_process( $mwocc_request ) {
			$mwb_mwocc_rest_response = array();

			// Write your custom code here.

			$mwb_mwocc_rest_response['status'] = 200;
			$mwb_mwocc_rest_response['data'] = $mwocc_request->get_headers();
			return $mwb_mwocc_rest_response;
		}
	}
}
