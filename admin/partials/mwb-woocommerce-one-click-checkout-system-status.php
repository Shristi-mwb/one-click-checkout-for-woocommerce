<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the html for system status.
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
// Template for showing information about system status.
global $mwocc_mwb_mwocc_obj;
$mwocc_default_status    = $mwocc_mwb_mwocc_obj->mwocc_plug_system_status();
$mwocc_wordpress_details = is_array( $mwocc_default_status['wp'] ) && ! empty( $mwocc_default_status['wp'] ) ? $mwocc_default_status['wp'] : array();
$mwocc_php_details       = is_array( $mwocc_default_status['php'] ) && ! empty( $mwocc_default_status['php'] ) ? $mwocc_default_status['php'] : array();
?>
<div class="mwb-mwocc-table-wrap">
	<div class="mwb-col-wrap">
		<div id="mwb-mwocc-table-inner-container" class="table-responsive mdc-data-table">
			<div class="mdc-data-table__table-container">
				<table class="mwb-mwocc-table mdc-data-table__table mwb-table" id="mwb-mwocc-wp">
					<thead>
						<tr>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'WP Variables', 'mwb-woocommerce-one-click-checkout' ); ?></th>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'WP Values', 'mwb-woocommerce-one-click-checkout' ); ?></th>
						</tr>
					</thead>
					<tbody class="mdc-data-table__content">
						<?php if ( is_array( $mwocc_wordpress_details ) && ! empty( $mwocc_wordpress_details ) ) { ?>
							<?php foreach ( $mwocc_wordpress_details as $wp_key => $wp_value ) { ?>
								<?php if ( isset( $wp_key ) && 'wp_users' != $wp_key ) { ?>
									<tr class="mdc-data-table__row">
										<td class="mdc-data-table__cell"><?php echo esc_html( $wp_key ); ?></td>
										<td class="mdc-data-table__cell"><?php echo esc_html( $wp_value ); ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="mwb-col-wrap">
		<div id="mwb-mwocc-table-inner-container" class="table-responsive mdc-data-table">
			<div class="mdc-data-table__table-container">
				<table class="mwb-mwocc-table mdc-data-table__table mwb-table" id="mwb-mwocc-sys">
					<thead>
						<tr>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'System Variables', 'mwb-woocommerce-one-click-checkout' ); ?></th>
							<th class="mdc-data-table__header-cell"><?php esc_html_e( 'System Values', 'mwb-woocommerce-one-click-checkout' ); ?></th>
						</tr>
					</thead>
					<tbody class="mdc-data-table__content">
						<?php if ( is_array( $mwocc_php_details ) && ! empty( $mwocc_php_details ) ) { ?>
							<?php foreach ( $mwocc_php_details as $php_key => $php_value ) { ?>
								<tr class="mdc-data-table__row">
									<td class="mdc-data-table__cell"><?php echo esc_html( $php_key ); ?></td>
									<td class="mdc-data-table__cell"><?php echo esc_html( $php_value ); ?></td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
