<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link  https://makewebbetter.com/
 * @since 1.0.0
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/admin
 */
class Mwb_Woocommerce_One_Click_Checkout_Admin {


	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @var   string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook The plugin page slug.
	 */
	public function mwocc_admin_enqueue_styles( $hook ) {
		$screen = get_current_screen();
		if ( isset( $screen->id ) && 'makewebbetter_page_mwb_woocommerce_one_click_checkout_menu' === $screen->id ) {

			wp_enqueue_style( 'mwb-mwocc-select2-css', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/select-2/mwb-woocommerce-one-click-checkout-select2.css', array(), time(), 'all' );

			wp_enqueue_style( 'mwb-mwocc-meterial-css', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-components-web.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'mwb-mwocc-meterial-css2', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-components-v5.0-web.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'mwb-mwocc-meterial-lite', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-lite.min.css', array(), time(), 'all' );

			wp_enqueue_style( 'mwb-mwocc-meterial-icons-css', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/icon.css', array(), time(), 'all' );

			wp_enqueue_style( $this->plugin_name . '-admin-global', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/css/mwb-woocommerce-one-click-checkout-admin-global.css', array( 'mwb-mwocc-meterial-icons-css' ), time(), 'all' );

			wp_enqueue_style( $this->plugin_name, MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/css/mwb-woocommerce-one-click-checkout-admin.scss', array(), $this->version, 'all' );
			wp_enqueue_style( 'mwb-admin-min-css', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/css/mwb-admin.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'mwb-datatable-css', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/datatables/media/css/jquery.dataTables.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'wp-color-picker' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook The plugin page slug.
	 */
	public function mwocc_admin_enqueue_scripts( $hook ) {

		$screen = get_current_screen();
		if ( isset( $screen->id ) && 'makewebbetter_page_mwb_woocommerce_one_click_checkout_menu' === $screen->id ) {
			wp_enqueue_script( 'mwb-mwocc-select2', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/select-2/mwb-woocommerce-one-click-checkout-select2.js', array( 'jquery' ), time(), false );

			wp_enqueue_script( 'mwb-mwocc-metarial-js', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-components-web.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwocc-metarial-js2', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-components-v5.0-web.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwocc-metarial-lite', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/material-design/material-lite.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwocc-datatable', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/datatables.net/js/jquery.dataTables.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwocc-datatable-btn', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/datatables.net/buttons/dataTables.buttons.min.js', array(), time(), false );
			wp_enqueue_script( 'mwb-mwocc-datatable-btn-2', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'package/lib/datatables.net/buttons/buttons.html5.min.js', array(), time(), false );
			wp_register_script( $this->plugin_name . 'admin-js', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/js/mwb-woocommerce-one-click-checkout-admin.js', array( 'jquery', 'wp-color-picker', 'mwb-mwocc-select2', 'mwb-mwocc-metarial-js', 'mwb-mwocc-metarial-js2', 'mwb-mwocc-metarial-lite' ), $this->version, false );
			wp_localize_script(
				$this->plugin_name . 'admin-js',
				'mwocc_admin_param',
				array(
					'ajaxurl'                    => admin_url( 'admin-ajax.php' ),
					'mwb_standard_nonce'         => wp_create_nonce( 'ajax-nonce' ),
					'reloadurl'                  => admin_url( 'admin.php?page=mwb_woocommerce_one_click_checkout_menu' ),
					'mwocc_gen_tab_enable'       => get_option( 'mwocc_radio_switch_demo' ),
					'mwocc_admin_param_location' => ( admin_url( 'admin.php' ) . '?page=mwb_woocommerce_one_click_checkout_menu&mwocc_tab=mwb-woocommerce-one-click-checkout-general' ),
				)
			);
			wp_enqueue_script( $this->plugin_name . 'admin-js' );
			wp_enqueue_script( 'mwb-admin-min-js', MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/js/mwb-admin.min.js', array(), time(), false );
		}
	}

	/**
	 * Adding settings menu for MWB Woocommerce One Click Checkout.
	 *
	 * @since 1.0.0
	 */
	public function mwocc_options_page() {
		global $submenu;
		if ( empty( $GLOBALS['admin_page_hooks']['mwb-plugins'] ) ) {
			add_menu_page( __( 'MakeWebBetter', 'mwb-woocommerce-one-click-checkout' ), __( 'MakeWebBetter', 'mwb-woocommerce-one-click-checkout' ), 'manage_options', 'mwb-plugins', array( $this, 'mwocc_plugins_listing_page' ), MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_URL . 'admin/image/MWB_Grey-01.svg', 15 );
			$mwocc_menus =
			// desc - filter for trial.
			apply_filters( 'mwb_add_plugins_menus_array', array() );
			if ( is_array( $mwocc_menus ) && ! empty( $mwocc_menus ) ) {
				foreach ( $mwocc_menus as $mwocc_key => $mwocc_value ) {
					add_submenu_page( 'mwb-plugins', $mwocc_value['name'], $mwocc_value['name'], 'manage_options', $mwocc_value['menu_link'], array( $mwocc_value['instance'], $mwocc_value['function'] ) );
				}
			}
		}
	}

	/**
	 * Removing default submenu of parent menu in backend dashboard
	 *
	 * @since 1.0.0
	 */
	public function mwocc_remove_default_submenu() {
		global $submenu;
		if ( is_array( $submenu ) && array_key_exists( 'mwb-plugins', $submenu ) ) {
			if ( isset( $submenu['mwb-plugins'][0] ) ) {
				unset( $submenu['mwb-plugins'][0] );
			}
		}
	}


	/**
	 * MWB Woocommerce One Click Checkout mwocc_admin_submenu_page.
	 *
	 * @since 1.0.0
	 * @param array $menus Marketplace menus.
	 */
	public function mwocc_admin_submenu_page( $menus = array() ) {
		$menus[] = array(
			'name'      => __( 'MWB Woocommerce One Click Checkout', 'mwb-woocommerce-one-click-checkout' ),
			'slug'      => 'mwb_woocommerce_one_click_checkout_menu',
			'menu_link' => 'mwb_woocommerce_one_click_checkout_menu',
			'instance'  => $this,
			'function'  => 'mwocc_options_menu_html',
		);
		return $menus;
	}

	/**
	 * MWB Woocommerce One Click Checkout mwocc_plugins_listing_page.
	 *
	 * @since 1.0.0
	 */
	public function mwocc_plugins_listing_page() {
		$active_marketplaces =
		// desc - filter for trial.
		apply_filters( 'mwb_add_plugins_menus_array', array() );
		if ( is_array( $active_marketplaces ) && ! empty( $active_marketplaces ) ) {
			include MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'admin/partials/welcome.php';
		}
	}

	/**
	 * MWB Woocommerce One Click Checkout admin menu page.
	 *
	 * @since 1.0.0
	 */
	public function mwocc_options_menu_html() {

		include_once MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'admin/partials/mwb-woocommerce-one-click-checkout-admin-dashboard.php';
	}

	/**
	 * Developer_admin_hooks_listing
	 *
	 * @name mwocc_developer_admin_hooks_listing
	 */
	public function mwocc_developer_admin_hooks_listing() {
		$admin_hooks = array();
		$val         = self::mwocc_developer_hooks_function( MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'admin/' );
		if ( ! empty( $val['hooks'] ) ) {
			$admin_hooks[] = $val['hooks'];
			unset( $val['hooks'] );
		}
		$data = array();
		foreach ( $val['files'] as $v ) {
			if ( 'css' !== $v && 'js' !== $v && 'images' !== $v ) {
				$helo = self::mwocc_developer_hooks_function( MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'admin/' . $v . '/' );
				if ( ! empty( $helo['hooks'] ) ) {
					$admin_hooks[] = $helo['hooks'];
					unset( $helo['hooks'] );
				}
				if ( ! empty( $helo ) ) {
					$data[] = $helo;
				}
			}
		}
		return $admin_hooks;
	}

	/**
	 * Developer_public_hooks_listing
	 */
	public function mwocc_developer_public_hooks_listing() {

		$public_hooks = array();
		$val          = self::mwocc_developer_hooks_function( MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'public/' );

		if ( ! empty( $val['hooks'] ) ) {
			$public_hooks[] = $val['hooks'];
			unset( $val['hooks'] );
		}
		$data = array();
		foreach ( $val['files'] as $v ) {
			if ( 'css' !== $v && 'js' !== $v && 'images' !== $v ) {
				$helo = self::mwocc_developer_hooks_function( MWB_WOOCOMMERCE_ONE_CLICK_CHECKOUT_DIR_PATH . 'public/' . $v . '/' );
				if ( ! empty( $helo['hooks'] ) ) {
					$public_hooks[] = $helo['hooks'];
					unset( $helo['hooks'] );
				}
				if ( ! empty( $helo ) ) {
					$data[] = $helo;
				}
			}
		}
		return $public_hooks;
	}
	/**
	 * Developer_hooks_function
	 *
	 * @name mwocc_developer_hooks_function
	 * @param string $path Path of the file.
	 */
	public function mwocc_developer_hooks_function( $path ) {
		$all_hooks = array();
		$scan      = scandir( $path );
		$response  = array();
		foreach ( $scan as $file ) {
			if ( strpos( $file, '.php' ) ) {
				$myfile = file( $path . $file );
				foreach ( $myfile as $key => $lines ) {
					if ( preg_match( '/do_action/i', $lines ) && ! strpos( $lines, 'str_replace' ) && ! strpos( $lines, 'preg_match' ) ) {
						$all_hooks[ $key ]['action_hook'] = $lines;
						$all_hooks[ $key ]['desc']        = $myfile[ $key - 1 ];
					}
					if ( preg_match( '/apply_filters/i', $lines ) && ! strpos( $lines, 'str_replace' ) && ! strpos( $lines, 'preg_match' ) ) {
						$all_hooks[ $key ]['filter_hook'] = $lines;
						$all_hooks[ $key ]['desc']        = $myfile[ $key - 1 ];
					}
				}
			} elseif ( strpos( $file, '.' ) == '' && strpos( $file, '.' ) !== 0 ) {
				$response['files'][] = $file;
			}
		}
		if ( ! empty( $all_hooks ) ) {
			$response['hooks'] = $all_hooks;
		}
		return $response;
	}

	/**
	 * This function is used to save product option settings data.
	 *
	 * @return void
	 */
	public function mwocc_product_option_setting() {

		global $mwocc_mwb_mwocc_obj;
		$mwb_mwocc_gen_flag = false;

		if ( isset( $_POST['mwb_woo_one_click_checkout_product_option_nonce'] ) ) {
			$mwb_woo_one_click_checkout_product_option_nonce = ! empty( $_POST['mwb_woo_one_click_checkout_product_option_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['mwb_woo_one_click_checkout_product_option_nonce'] ) ) : '';
			if ( wp_verify_nonce( $mwb_woo_one_click_checkout_product_option_nonce, 'mwb-woo-one-click-product-nonce' ) ) {
				if ( isset( $_POST['mwb_woo_one_click_checkout_product_option_setting_submit'] ) ) {

					$mwb_woo_one_click_checkout_product_settings = ! empty( $_POST['mwb_woo_one_click_checkout_product_settings'] ) ? ( is_array( $_POST['mwb_woo_one_click_checkout_product_settings'] ) ? map_deep( wp_unslash( $_POST['mwb_woo_one_click_checkout_product_settings'] ), 'sanitize_text_field' ) : sanitize_text_field( wp_unslash( $_POST['mwb_woo_one_click_checkout_product_settings'] ) ) ) : array();
					update_option( 'mwb_woo_one_click_checkout_product_settings', $mwb_woo_one_click_checkout_product_settings );
					$mwb_mwocc_gen_flag = true;
				}
			}
		}
		if ( $mwb_mwocc_gen_flag ) {
			$mwb_mwocc_error_text = esc_html__( 'Settings saved !', 'mwb-woocommerce-one-click-checkout' );
			$mwocc_mwb_mwocc_obj->mwocc_plug_admin_notice( $mwb_mwocc_error_text, 'success' );
		}
	}

	/**
	 * MWB Woocommerce One Click Checkout admin menu page.
	 *
	 * @since 1.0.0
	 * @param array $mwocc_settings_general Settings fields.
	 */
	public function mwocc_admin_general_settings_page( $mwocc_settings_general ) {

		$mwocc_settings_general = array(
			array(
				'title'       => __( 'Enable plugin', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'radio-switch',
				'description' => __( 'Enable plugin to start the functionality.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_enable_one_click_checkout',
				'value'       => get_option( 'mwb_mwocc_enable_one_click_checkout' ),
				'class'       => 'mwocc-radio-switch-class',
				'options'     => array(
					'yes' => __( 'YES', 'mwb-woocommerce-one-click-checkout' ),
					'no'  => __( 'NO', 'mwb-woocommerce-one-click-checkout' ),
				),
			),

			array(
				'title'       => __( 'Show Checkout Button On Shop Page', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'checkbox',
				'description' => __( 'Show One-Click Checkout Button on Shop Page.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_show_chekout_button_shop_page',
				'value'       => get_option( 'mwb_mwocc_show_chekout_button_shop_page', '1' ),
				'class'       => 'mwocc-checkbox-class',
				'placeholder' => __( 'Checkbox Demo', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Show Checkout Button On Single Page', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'checkbox',
				'description' => __( 'Show One-Click Checkout Button On Single Page.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_show_chekout_button_single_page',
				'value'       => get_option( 'mwb_mwocc_show_chekout_button_single_page' ),
				'class'       => 'mwocc-checkbox-class',
				'placeholder' => __( 'Checkbox Demo', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Select Checkout Button Background Color', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'text',
				'description' => __( 'Select One-Click Checkout Button Background Color', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_checkout_button_back_color',
				'value'       => get_option( 'mwb_mwocc_checkout_button_back_color' ),
				'class'       => 'mwocc-text-class',
				'placeholder' => __( 'Text Demo', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Select Checkout Button Text Color', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'text',
				'description' => __( 'Select One-Click Checkout Button Text Color', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_checkout_button_text_color',
				'value'       => get_option( 'mwb_mwocc_checkout_button_text_color' ),
				'class'       => 'mwocc-text-class',
				'placeholder' => __( 'Text Demo', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Enter Checkout Button Name', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'text',
				'description' => __( 'Enter One-Click Checkout Button Text.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_mwocc_checkout_button_name',
				'value'       => ! empty( get_option( 'mwb_mwocc_checkout_button_name' ) ) ? get_option( 'mwb_mwocc_checkout_button_name' ) : __( 'Buy Now', 'mwb-woocommerce-one-click-checkout' ),
				'class'       => 'mwocc-text-class',
				'placeholder' => __( 'Enter Button Name', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Select Time Frame For Cookies Save Data', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwb_select_and_text',
				'type'        => 'select_and_text',
				'description' => __( 'Select Time Frame to save customer data within estimated time.', 'mwb-woocommerce-one-click-checkout' ),
				'value'       => array(
					array(
						'type'        => 'text',
						'id'          => 'mwb_woo_one_click_checkout_cookie_time',
						'value'       => get_option( 'mwb_woo_one_click_checkout_cookie_time' ),
						'class'       => 'mwocc-text-class',
						'placeholder' => __( 'Enter Number', 'mwb-woocommerce-one-click-checkout' ),
					),
					array(
						'type'    => 'select',
						'id'      => 'mwb_woo_one_click_checkout_cookie_method',
						'value'   => get_option( 'mwb_woo_one_click_checkout_cookie_method' ),
						'class'   => 'mwocc-select-class',
						'options' => array(
							''      => __( 'Select option', 'mwb-woocommerce-one-click-checkout' ),
							'day'   => __( 'Days', 'mwb-woocommerce-one-click-checkout' ),
							'week'  => __( 'Weeks', 'mwb-woocommerce-one-click-checkout' ),
							'month' => __( 'Months', 'mwb-woocommerce-one-click-checkout' ),
							'year'  => __( 'Years', 'mwb-woocommerce-one-click-checkout' ),
						),
					),
				),
			),

			array(
				'type'        => 'button',
				'id'          => 'mwocc_general_button',
				'button_text' => __( 'Save Changes', 'mwb-woocommerce-one-click-checkout' ),
				'class'       => 'mwocc-button-class',
			),
		);
		return $mwocc_settings_general;
	}

	/**
	 * MWB Woocommerce One Click Checkout admin menu page.
	 *
	 * @since 1.0.0
	 * @param array $mwocc_settings_template Settings fields.
	 */
	public function mwocc_admin_template_settings_page( $mwocc_settings_template ) {
		$mwocc_settings_template = array(
			array(
				'title'       => __( 'Text Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'text',
				'description' => __( 'This is text field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_text_demo',
				'value'       => '',
				'class'       => 'mwocc-text-class',
				'placeholder' => __( 'Text Demo', 'mwb-woocommerce-one-click-checkout' ),
			),
			array(
				'title'       => __( 'Number Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'number',
				'description' => __( 'This is number field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_number_demo',
				'value'       => '',
				'class'       => 'mwocc-number-class',
				'placeholder' => '',
			),
			array(
				'title'       => __( 'Password Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'password',
				'description' => __( 'This is password field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_password_demo',
				'value'       => '',
				'class'       => 'mwocc-password-class',
				'placeholder' => '',
			),
			array(
				'title'       => __( 'Textarea Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'textarea',
				'description' => __( 'This is textarea field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_textarea_demo',
				'value'       => '',
				'class'       => 'mwocc-textarea-class',
				'rows'        => '5',
				'cols'        => '10',
				'placeholder' => __( 'Textarea Demo', 'mwb-woocommerce-one-click-checkout' ),
			),
			array(
				'title'       => __( 'Select Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'select',
				'description' => __( 'This is select field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_select_demo',
				'value'       => '',
				'class'       => 'mwocc-select-class',
				'placeholder' => __( 'Select Demo', 'mwb-woocommerce-one-click-checkout' ),
				'options'     => array(
					''    => __( 'Select option', 'mwb-woocommerce-one-click-checkout' ),
					'INR' => __( 'Rs.', 'mwb-woocommerce-one-click-checkout' ),
					'USD' => __( '$', 'mwb-woocommerce-one-click-checkout' ),
				),
			),
			array(
				'title'       => __( 'Multiselect Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'multiselect',
				'description' => __( 'This is multiselect field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_multiselect_demo',
				'value'       => '',
				'class'       => 'mwocc-multiselect-class mwb-defaut-multiselect',
				'placeholder' => '',
				'options'     => array(
					'default' => __( 'Select currency code from options', 'mwb-woocommerce-one-click-checkout' ),
					'INR'     => __( 'Rs.', 'mwb-woocommerce-one-click-checkout' ),
					'USD'     => __( '$', 'mwb-woocommerce-one-click-checkout' ),
				),
			),
			array(
				'title'       => __( 'Checkbox Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'checkbox',
				'description' => __( 'This is checkbox field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_checkbox_demo',
				'value'       => '',
				'class'       => 'mwocc-checkbox-class',
				'placeholder' => __( 'Checkbox Demo', 'mwb-woocommerce-one-click-checkout' ),
			),

			array(
				'title'       => __( 'Radio Field Demo', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'radio',
				'description' => __( 'This is radio field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_radio_demo',
				'value'       => '',
				'class'       => 'mwocc-radio-class',
				'placeholder' => __( 'Radio Demo', 'mwb-woocommerce-one-click-checkout' ),
				'options'     => array(
					'yes' => __( 'YES', 'mwb-woocommerce-one-click-checkout' ),
					'no'  => __( 'NO', 'mwb-woocommerce-one-click-checkout' ),
				),
			),
			array(
				'title'       => __( 'Enable', 'mwb-woocommerce-one-click-checkout' ),
				'type'        => 'radio-switch',
				'description' => __( 'This is switch field demo follow same structure for further use.', 'mwb-woocommerce-one-click-checkout' ),
				'id'          => 'mwocc_radio_switch_demo',
				'value'       => '',
				'class'       => 'mwocc-radio-switch-class',
				'options'     => array(
					'yes' => __( 'YES', 'mwb-woocommerce-one-click-checkout' ),
					'no'  => __( 'NO', 'mwb-woocommerce-one-click-checkout' ),
				),
			),

			array(
				'type'        => 'button',
				'id'          => 'mwocc_button_demo',
				'button_text' => __( 'Button Demo', 'mwb-woocommerce-one-click-checkout' ),
				'class'       => 'mwocc-button-class',
			),
		);
		return $mwocc_settings_template;
	}

	/**
	 * MWB Woocommerce One Click Checkout save tab settings.
	 *
	 * @since 1.0.0
	 */
	public function mwocc_admin_save_tab_settings() {
		global $mwocc_mwb_mwocc_obj;
		if ( isset( $_POST['mwocc_general_button'] ) && ( ! empty( $_POST['mwb_tabs_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mwb_tabs_nonce'] ) ), 'admin_save_data' ) ) ) {
			$mwb_mwocc_gen_flag     = false;
			$mwocc_genaral_settings =
			// desc - filter for trial.
			apply_filters( 'mwocc_general_settings_array', array() );
			$mwocc_button_index = array_search( 'submit', array_column( $mwocc_genaral_settings, 'type' ) );
			if ( isset( $mwocc_button_index ) && ( null == $mwocc_button_index || '' == $mwocc_button_index ) ) {
				$mwocc_button_index = array_search( 'button', array_column( $mwocc_genaral_settings, 'type' ) );
			}
			if ( isset( $mwocc_button_index ) && '' !== $mwocc_button_index ) {
				unset( $mwocc_genaral_settings[ $mwocc_button_index ] );
				if ( is_array( $mwocc_genaral_settings ) && ! empty( $mwocc_genaral_settings ) ) {
					foreach ( $mwocc_genaral_settings as $mwocc_genaral_setting ) {
						if ( isset( $mwocc_genaral_setting['id'] ) && '' !== $mwocc_genaral_setting['id'] ) {
							if ( 'select_and_text' === $mwocc_genaral_setting['type'] ) {
								foreach ( $mwocc_genaral_setting['value'] as $sub_mwocc_genaral_setting ) {
									if ( isset( $_POST[ $sub_mwocc_genaral_setting['id'] ] ) ) {
										update_option( $sub_mwocc_genaral_setting['id'], is_array( $_POST[ $sub_mwocc_genaral_setting['id'] ] ) ? map_deep( wp_unslash( $_POST[ $sub_mwocc_genaral_setting['id'] ] ), 'sanitize_text_field' ) : sanitize_text_field( wp_unslash( $_POST[ $sub_mwocc_genaral_setting['id'] ] ) ) );
									} else {
										update_option( $sub_mwocc_genaral_setting['id'], '' );
									}
								}
								continue;
							}
							if ( isset( $_POST[ $mwocc_genaral_setting['id'] ] ) ) {
								update_option( $mwocc_genaral_setting['id'], is_array( $_POST[ $mwocc_genaral_setting['id'] ] ) ? map_deep( wp_unslash( $_POST[ $mwocc_genaral_setting['id'] ] ), 'sanitize_text_field' ) : sanitize_text_field( wp_unslash( $_POST[ $mwocc_genaral_setting['id'] ] ) ) );
							} else {
								update_option( $mwocc_genaral_setting['id'], '' );
							}
						} else {
							$mwb_mwocc_gen_flag = true;
						}
					}
				}
				if ( $mwb_mwocc_gen_flag ) {
					$mwb_mwocc_error_text = esc_html__( 'Id of some field is missing', 'mwb-woocommerce-one-click-checkout' );
					$mwocc_mwb_mwocc_obj->mwocc_plug_admin_notice( $mwb_mwocc_error_text, 'error' );
				} else {
					$mwb_mwocc_error_text = esc_html__( 'Settings saved !', 'mwb-woocommerce-one-click-checkout' );
					$mwocc_mwb_mwocc_obj->mwocc_plug_admin_notice( $mwb_mwocc_error_text, 'success' );
				}
			}
		}
	}

	/**
	 * Sanitation for an array
	 *
	 * @param mixed $mwb_input_array for array value.
	 *
	 * @return array
	 */
	public function mwocc_sanitize_array( $mwb_input_array ) {
		foreach ( $mwb_input_array as $key => $value ) {
			$key   = sanitize_text_field( $key );
			$value = sanitize_text_field( $value );
		}
		return $mwb_input_array;
	}
}
