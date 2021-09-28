<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Makewebbetter_Onboarding
 * @subpackage Makewebbetter_Onboarding/admin/onboarding
 */

global $pagenow, $mwocc_mwb_mwocc_obj;
if ( empty( $pagenow ) || 'plugins.php' != $pagenow ) {
	return false;
}
$mwb_plugin_name                  = ! empty( explode( '/', plugin_basename( __FILE__ ) ) ) ? explode( '/', plugin_basename( __FILE__ ) )[0] : '';
$mwb_plugin_deactivation_id       = $mwb_plugin_name . '-no_thanks_deactive';
$mwb_plugin_onboarding_popup_id   = $mwb_plugin_name . '-onboarding_popup';
$mwocc_onboarding_form_deactivate =
// desc - filter for trial.
apply_filters( 'mwb_mwocc_deactivation_form_fields', array() );

?>
<?php if ( ! empty( $mwocc_onboarding_form_deactivate ) ) : ?>
	<div id="<?php echo esc_attr( $mwb_plugin_onboarding_popup_id ); ?>" class="mdc-dialog mdc-dialog--scrollable <? echo 
	//desc - filter for trial.
	apply_filters('mwb_stand_dialog_classes', 'mwb-woocommerce-one-click-checkout' )?>">
		<div class="mwb-mwocc-on-boarding-wrapper-background mdc-dialog__container">
			<div class="mwb-mwocc-on-boarding-wrapper mdc-dialog__surface" role="alertdialog" aria-modal="true" aria-labelledby="my-dialog-title" aria-describedby="my-dialog-content">
				<div class="mdc-dialog__content">
					<div class="mwb-mwocc-on-boarding-close-btn">
						<a href="#">
							<span class="mwocc-close-form material-icons mwb-mwocc-close-icon mdc-dialog__button" data-mdc-dialog-action="close">clear</span>
						</a>
					</div>

					<h3 class="mwb-mwocc-on-boarding-heading mdc-dialog__title"></h3>
					<p class="mwb-mwocc-on-boarding-desc"><?php esc_html_e( 'May we have a little info about why you are deactivating?', 'mwb-woocommerce-one-click-checkout' ); ?></p>
					<form action="#" method="post" class="mwb-mwocc-on-boarding-form">
						<?php
						$mwocc_onboarding_deactive_html = $mwocc_mwb_mwocc_obj->mwocc_plug_generate_html( $mwocc_onboarding_form_deactivate );
						echo esc_html( $mwocc_onboarding_deactive_html );
						?>
						<div class="mwb-mwocc-on-boarding-form-btn__wrapper mdc-dialog__actions">
							<div class="mwb-mwocc-on-boarding-form-submit mwb-mwocc-on-boarding-form-verify ">
								<input type="submit" class="mwb-mwocc-on-boarding-submit mwb-on-boarding-verify mdc-button mdc-button--raised" value="Send Us">
							</div>
							<div class="mwb-mwocc-on-boarding-form-no_thanks">
								<a href="#" id="<?php echo esc_attr( $mwb_plugin_deactivation_id ); ?>" class="<? echo 
								//desc - filter for trial.
								apply_filters('mwb_stand_no_thank_classes', 'mwb-woocommerce-one-click-checkout-no_thanks' )?> mdc-button"><?php esc_html_e( 'Skip and Deactivate Now', 'mwb-woocommerce-one-click-checkout' ); ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="mdc-dialog__scrim"></div>
	</div>
<?php endif; ?>
