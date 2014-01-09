<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $woocommerce;
$checkout = $woocommerce->checkout();
?>
<div id="return-date" class="clearfix">
	<div class="fields clearfix">
	<?php foreach ($checkout->checkout_fields['return_date'] as $key => $field) : ?>
		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
	<?php endforeach; ?>
	</div>
	<footer class="footer clearfix">
		<p class="left">
			<a class="accordion-btn btn clear-return-date-btn" data-id="billing-address"><?php _e("I’ll arrange a return delivery date later", THEME_NAME); ?></a>
		</p>
		<a class="accordion-btn orange-btn right" data-id="billing-address"><?php _e("Proceed to Step 3", THEME_NAME); ?></a>
	</footer>
</div>
