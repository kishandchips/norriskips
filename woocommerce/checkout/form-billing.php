<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$visible_fields = array();
$hidden_fields = array();
foreach($checkout->checkout_fields['billing'] as $key => $field) {
	if(in_array($key, array('billing_email', 'billing_phone'))) {
		$visible_fields[$key] = $field;
	} else {
		$hidden_fields[$key] = $field;
	}
}
?>
<div id="billing-address">
	
	<div class="fields clearfix">
		<div class="billing_address">
			<?php do_action('woocommerce_before_checkout_billing_form', $checkout ); ?>

			<?php foreach ($hidden_fields as $key => $field) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

		</div>

		<?php foreach ($visible_fields as $key => $field) : ?>
		
			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

		<?php endforeach; ?>

		<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

			<?php if ( $checkout->enable_guest_checkout ) : ?>

				<p class="form-row form-row-wide">
					<input class="input-checkbox" id="createaccount" <?php checked($checkout->get_value('createaccount'), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

			<div class="create-account">

				<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

				<?php foreach ($checkout->checkout_fields['account'] as $key => $field) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>

				<div class="clear"></div>

			</div>

			<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

		<?php endif; ?>

	</div>
	<footer class="footer clearfix">

		<?php
			if ( empty( $_POST ) ) :

				$billtoshipping = (get_option('woocommerce_ship_to_same_address')=='yes') ? 1 : 0;
				$billtoshipping = apply_filters('woocommerce_billtoshipping_default', $billtoshipping);

			else :

				$billtoshipping = $checkout->get_value('billtoshipping');

			endif;
		?>

		<p class="left" id="billtoshipping">
			<input id="billtoshipping-checkbox" class="input-checkbox" <?php checked($billtoshipping, 1); ?> type="checkbox" name="billtoshipping" value="1" />
			<label for="billtoshipping-checkbox" class="checkbox">&nbsp;&nbsp;<?php _e( 'Bill to delivery address?', 'woocommerce' ); ?></label>
		</p>
		<a class="accordion-btn orange-btn right" data-id="order-notes"><?php _e("Proceed to notes", THEME_NAME); ?></a>
	</footer>
</div>