<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.8
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?><div id="order_review">
	<h3 class="title dark-blue"><?php _e("My Booking Details", THEME_NAME); ?></h3>
	<table class="shop_table">

		<tbody>
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );
				if (sizeof(WC()->cart->get_cart())>0) :
					foreach (WC()->cart->get_cart() as $cart_item_key => $values) :
						$_product = $values['data'];
						if ($_product->exists() && $values['quantity']>0) :
							?>
								<tr class="<?php esc_attr( apply_filters('woocommerce_checkout_table_item_class', 'checkout_table_item', $values, $cart_item_key ) ) ?>">
									<td class="product-thumbnail">
										<?php
											$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image('shop_catalog'), $values, $cart_item_key );

											if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
												echo $thumbnail;
											else
												printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
										?>
									</td>
									<td class="product-details">
										<h6 class="product-title no-margin"><?php echo apply_filters( 'woocommerce_checkout_product_title', $_product->get_title(), $_product ); ?></h6>
										<p class="no-margin">
											<?php if($values['quantity'] > 1): ?>
												<span class="quanity"><?php echo apply_filters( 'woocommerce_checkout_item_quantity', '<strong class="product-quantity">&times; ' . $values['quantity'] . '</strong>', $values, $cart_item_key ); ?>
											<?php endif; ?>
											<span class="price bold"><?php echo $_product->get_price_html(); ?><?php //echo apply_filters( 'woocommerce_checkout_item_subtotal', WC()->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key ); ?></span>
										</p>
										<p class="no-margin tiny"><?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">Remove</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?></p>
									</td>
								</tr>
			<?php		endif;
					endforeach;
				endif;
				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>

			<?php $order_notes = WC()->session->get('order_notes') ?>
			<tr class="order-notes">
				<th><?php _e("Type of waste", THEME_NAME); ?></th>
				<td>
					<h6 class="no-margin">
							<?php echo ucfirst($order_notes); ?>
						<p class="tiny no-margin">
							<a class="accordion-btn" data-id="order-notes"><?php _e("Change Type", THEME_NAME); ?></a>
						</p>
					</h6>
				</td>
			</tr>

			<?php if($delivery_date = WC()->session->get('delivery_date')): ?>
			<tr class="delivery-date">
				<th><?php _e("Delivered on", THEME_NAME); ?></th>
				<td>
					<h6 class="no-margin">
						<span class="date"><?php echo date('l d F', strtotime($delivery_date));?></span>
						<?php if($delivery_time = WC()->session->get('delivery_time')): ?>
						<br /><span class="time normal"><?php echo ($delivery_time == 'am') ? "<b>AM</b> (8:00-12:00)" : "PM (12:00-16:00)"; ?></span>
						<?php endif; ?>
						<p class="tiny no-margin">
							<a class="accordion-btn" data-id="delivery-date"><?php _e("Change Date", THEME_NAME); ?></a>
						</p>
					</h6>
				</td>
			</tr>
			<?php endif; ?>
			<?php if($return_date = WC()->session->get('return_date')): ?>
			<tr class="return-date">
				<th><?php _e("Collected on", THEME_NAME); ?></th>
				<td>
					<h6 class="no-margin">
						<span class="date"><?php echo date('l d F', strtotime($return_date)); ?></span>
						<?php if($return_time = WC()->session->get('return_time')): ?>
						<br /><span class="time normal"><?php echo ($delivery_time == 'am') ? "<b>AM</b> (8:00-12:00)" : "PM (12:00-16:00)"; ?></span>
						<?php endif; ?>
						<p class="tiny no-margin">
							<a class="accordion-btn" data-id="return-date"><?php _e("Change Date", THEME_NAME); ?></a>
						</p>
					</h6>
				</td>
			</tr>
			<?php endif; ?>
		</tbody>
		<tfoot>
	
		<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
	
		<?php endif; ?>

		<?php if(1 == 2 && $available_methods): ?>
				<tr class="cart-subtotal">
					<th><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></th>
					<td><?php echo WC()->cart->get_cart_subtotal(); ?></td>
				</tr>

				<?php if ( WC()->cart->get_discounts_before_tax() ) : ?>

				<tr class="discount">
					<th><?php _e( 'Cart Discount', 'woocommerce' ); ?></th>
					<td>-<?php echo WC()->cart->get_discounts_before_tax(); ?></td>
				</tr>

				<?php endif; ?>

				

				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>

					<tr class="fee fee-<?php echo $fee->id ?>">
						<th><?php echo $fee->name ?></th>
						<td><?php
							if ( WC()->cart->tax_display_cart == 'excl' )
								echo woocommerce_price( $fee->amount );
							else
								echo woocommerce_price( $fee->amount + $fee->tax );
						?></td>
					</tr>

				<?php endforeach; ?>

				<?php
					// Show the tax row if showing prices exlcusive of tax only
					if ( WC()->cart->tax_display_cart == 'excl' ) {
						foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
							echo '<tr class="tax-rate tax-rate-' . $code . '">
								<th>' . $tax->label . '</th>
								<td>' . $tax->formatted_amount . '</td>
							</tr>';
						}
					}
				?>

				<?php if ( WC()->cart->get_discounts_after_tax() ) : ?>

				<tr class="discount">
					<th><?php _e( 'Order Discount', 'woocommerce' ); ?></th>
					<td>-<?php echo WC()->cart->get_discounts_after_tax(); ?></td>
				</tr>

				<?php endif; ?>

				<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

				<tr class="total">
					<th><strong><?php _e( 'Order Total', 'woocommerce' ); ?></strong></th>
					<td>
						<strong><?php echo WC()->cart->get_total(); ?></strong>
						<?php
							// If prices are tax inclusive, show taxes here
							if ( WC()->cart->tax_display_cart == 'incl' ) {
								$tax_string_array = array();

								foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
									$tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
								}

								if ( ! empty( $tax_string_array ) ) {
									?><small class="includes_tax"><?php printf( __( '(Includes %s)', 'woocommerce' ), implode( ', ', $tax_string_array ) ); ?></small><?php
								}
							}
						?>
					</td>
				</tr>
			<?php endif; ?>
			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</tfoot>
		
	</table>
</div>