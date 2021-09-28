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

global $mwocc_mwb_mwocc_obj;
$mwocc_onboarding_form_fields =
// desc - filter for trial.
apply_filters( 'mwb_mwocc_on_boarding_form_fields', array() );
?>

<?php if ( ! empty( $mwocc_onboarding_form_fields ) ) : ?>
	<div class="mdc-dialog mdc-dialog--scrollable <? echo 
	//desc - filter for trial.
	apply_filters('mwb_stand_dialog_classes', 'mwb-woocommerce-one-click-checkout' )?>">
		<div class="mwb-mwocc-on-boarding-wrapper-background mdc-dialog__container">
			<div class="mwb-mwocc-on-boarding-wrapper mdc-dialog__surface" role="alertdialog" aria-modal="true" aria-labelledby="my-dialog-title" aria-describedby="my-dialog-content">
				<div class="mdc-dialog__content">
					<div class="mwb-mwocc-on-boarding-close-btn">
						<a href="#"><span class="mwocc-close-form material-icons mwb-mwocc-close-icon mdc-dialog__button" data-mdc-dialog-action="close">clear</span></a>
					</div>
					<h3 class="mwb-mwocc-on-boarding-heading mdc-dialog__title"><?php esc_html_e( 'Welcome to MakeWebBetter', 'mwb-woocommerce-one-click-checkout' ); ?> </h3>
					<p class="mwb-mwocc-on-boarding-desc"><?php esc_html_e( 'We love making new friends! Subscribe below and we promise to keep you up-to-date with our latest new plugins, updates, awesome deals and a few special offers.', 'mwb-woocommerce-one-click-checkout' ); ?></p>

					<form action="#" method="post" class="mwb-mwocc-on-boarding-form">
						<?php
						$mwocc_onboarding_html = $mwocc_mwb_mwocc_obj->mwocc_plug_generate_html( $mwocc_onboarding_form_fields );
						echo esc_html( $mwocc_onboarding_html );
						?>
						<div class="mwb-mwocc-on-boarding-form-btn__wrapper mdc-dialog__actions">
							<div class="mwb-mwocc-on-boarding-form-submit mwb-mwocc-on-boarding-form-verify ">
								<input type="submit" class="mwb-mwocc-on-boarding-submit mwb-on-boarding-verify mdc-button mdc-button--raised" value="Send Us">
							</div>
							<div class="mwb-mwocc-on-boarding-form-no_thanks">
								<a href="#" class="mwb-mwocc-on-boarding-no_thanks mdc-button" data-mdc-dialog-action="discard"><?php esc_html_e( 'Skip For Now', 'mwb-woocommerce-one-click-checkout' ); ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="mdc-dialog__scrim"></div>
	</div>
<?php endif; ?>
