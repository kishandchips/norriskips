<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$checkout = WC()->checkout();
?>
<div id="order-notes" class="">
	<div class="fields clearfix">
	<?php foreach ($checkout->checkout_fields['order_notes'] as $key => $field) : ?>
		<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
	<?php endforeach; ?>
	</div>
	<footer class="footer clearfix">
		<a class="accordion-btn orange-btn right" data-id="payment"><?php _e("Proceed to Step 6", THEME_NAME); ?></a>
	</footer>
</div>
