<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html field for general tab.
 *
 * @link       https://makewebbetter.com/
 * @since      1.0.0
 *
 * @package    Mwb_Woocommerce_One_Click_Checkout
 * @subpackage Mwb_Woocommerce_One_Click_Checkout/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $mwocc_mwb_mwocc_obj;
$mwocc_genaral_settings =
// desc - filter for trial.
apply_filters( 'mwocc_general_settings_array', array() );
?>
<!--  template file for admin settings. -->
<form action="" method="POST" class="mwb-mwocc-gen-section-form">
	<div class="mwocc-secion-wrap">
		<?php
		$mwocc_general_html = $mwocc_mwb_mwocc_obj->mwocc_plug_generate_html( $mwocc_genaral_settings );
		echo esc_html( $mwocc_general_html );
		wp_nonce_field( 'admin_save_data', 'mwb_tabs_nonce' );
		?>
	</div>
</form>
