<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link  https://makewebbetter.com/
 * @since 1.0.0
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {

	exit(); // Exit if accessed directly.
}

global $mwocc_mwb_mwocc_obj;
$mwocc_active_tab   = isset( $_GET['mwocc_tab'] ) ? sanitize_key( $_GET['mwocc_tab'] ) : 'mwb-woocommerce-one-click-checkout-general';
$mwocc_default_tabs = $mwocc_mwb_mwocc_obj->mwocc_plug_default_tabs();
?>
<header>
	<?php
		// desc - This hook is used for trial.
		do_action( 'mwb_mwocc_settings_saved_notice' );
	?>
	<div class="mwb-header-container mwb-bg-white mwb-r-8">
		<h1 class="mwb-header-title"><?php echo esc_attr( strtoupper( str_replace( '-', ' ', $mwocc_mwb_mwocc_obj->mwocc_get_plugin_name() ) ) ); ?></h1>
		<a href="https://docs.makewebbetter.com/" target="_blank" class="mwb-link"><?php esc_html_e( 'Documentation', 'mwb-woocommerce-one-click-checkout' ); ?></a>
		<span>|</span>
		<a href="https://makewebbetter.com/contact-us/" target="_blank" class="mwb-link"><?php esc_html_e( 'Support', 'mwb-woocommerce-one-click-checkout' ); ?></a>
	</div>
</header>
<main class="mwb-main mwb-bg-white mwb-r-8">
	<nav class="mwb-navbar">
		<ul class="mwb-navbar__items">
			<?php
			if ( is_array( $mwocc_default_tabs ) && ! empty( $mwocc_default_tabs ) ) {
				foreach ( $mwocc_default_tabs as $mwocc_tab_key => $mwocc_default_tabs ) {
					$mwocc_tab_classes = 'mwb-link ';
					if ( ! empty( $mwocc_active_tab ) && $mwocc_active_tab === $mwocc_tab_key ) {
						$mwocc_tab_classes .= 'active';
					}
					?>
					<li>
						<a id="<?php echo esc_attr( $mwocc_tab_key ); ?>" href="<?php echo esc_url( admin_url( 'admin.php?page=mwb_woocommerce_one_click_checkout_menu' ) . '&mwocc_tab=' . esc_attr( $mwocc_tab_key ) ); ?>" class="<?php echo esc_attr( $mwocc_tab_classes ); ?>"><?php echo esc_html( $mwocc_default_tabs['title'] ); ?></a>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</nav>
	<section class="mwb-section">
		<div>
			<?php
				// desc - This hook is used for trial.
				do_action( 'mwb_mwocc_before_general_settings_form' );
				// if submenu is directly clicked on woocommerce.
			if ( empty( $mwocc_active_tab ) ) {
				$mwocc_active_tab = 'mwb_mwocc_plug_general';
			}

				// look for the path based on the tab id in the admin templates.
				$mwocc_default_tabs     = $mwocc_mwb_mwocc_obj->mwocc_plug_default_tabs();
				$mwocc_tab_content_path = $mwocc_default_tabs[ $mwocc_active_tab ]['file_path'];
				$mwocc_mwb_mwocc_obj->mwocc_plug_load_template( $mwocc_tab_content_path );
				// desc - This hook is used for trial.
				do_action( 'mwb_mwocc_after_general_settings_form' );
			?>
		</div>
	</section>
