<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$available_methods = $woocommerce->shipping->get_available_shipping_methods();
?>
<div id="order_review">
	<h3 class="title dark-blue"><?php _e("My Booking Details", THEME_NAME); ?></h3>
	<table class="shop_table">

		<tbody>
			<?php
				do_action( 'woocommerce_review_order_before_cart_contents' );

				if (sizeof($woocommerce->cart->get_cart())>0) :
					foreach ($woocommerce->cart->get_cart() as $cart_item_key => $values) :
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
											<span class="price"><?php echo apply_filters( 'woocommerce_checkout_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key ); ?></span>
											</p>
										<p class="no-margin tiny"><?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">Remove</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?></p>
									</td>
								</tr>
			<?php		endif;
					endforeach;
				endif;

				do_action( 'woocommerce_review_order_after_cart_contents' );
			?>

			<?php if($delivery_date = $woocommerce->session->get('delivery_date')): ?>
			<tr>
				<th><?php _e("Delivered on", THEME_NAME); ?></th>
				<td>
					<h6 class="no-margin">
						<span class="date"><?php echo date('l d F', strtotime($delivery_date)); ?></span>
						<?php if($delivery_time = $woocommerce->session->get('delivery_time')): ?>
						<br /><span class="time normal"><?php echo $delivery_time; ?> <?php //if((int) $delivery_time > 12) ? "pm" : "am"; ?></span>
						<?php endif; ?>
						<p class="tiny">
							<a class="accordion-btn" id="delivery-date"><?php _e("Change Date", THEME_NAME); ?></a>
						</p>
					</h6>
				</td>
			</tr>
			<?php endif; ?>
		</tbody>

		<tfoot>
			<tr class="cart-subtotal">
				<th><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></th>
				<td><?php echo $woocommerce->cart->get_cart_subtotal(); ?></td>
			</tr>

			<?php if ( $woocommerce->cart->get_discounts_before_tax() ) : ?>

			<tr class="discount">
				<th><?php _e( 'Cart Discount', 'woocommerce' ); ?></th>
				<td>-<?php echo $woocommerce->cart->get_discounts_before_tax(); ?></td>
			</tr>

			<?php endif; ?>

			<?php if ( $woocommerce->cart->needs_shipping() && $woocommerce->cart->show_shipping() ) : ?>

				<?php do_action('woocommerce_review_order_before_shipping'); ?>

				<tr class="shipping">
					<th><?php _e( 'Delivery', 'woocommerce' ); ?></th>
					<td><?php woocommerce_get_template( 'cart/shipping-methods.php', array( 'available_methods' => $available_methods ) ); ?></td>
				</tr>

				<?php do_action('woocommerce_review_order_after_shipping'); ?>

			<?php endif; ?>

			<?php foreach ( $woocommerce->cart->get_fees() as $fee ) : ?>

				<tr class="fee fee-<?php echo $fee->id ?>">
					<th><?php echo $fee->name ?></th>
					<td><?php
						if ( $woocommerce->cart->tax_display_cart == 'excl' )
							echo woocommerce_price( $fee->amount );
						else
							echo woocommerce_price( $fee->amount + $fee->tax );
					?></td>
				</tr>

			<?php endforeach; ?>

			<?php
				// Show the tax row if showing prices exlcusive of tax only
				if ( $woocommerce->cart->tax_display_cart == 'excl' ) {
					foreach ( $woocommerce->cart->get_tax_totals() as $code => $tax ) {
						echo '<tr class="tax-rate tax-rate-' . $code . '">
							<th>' . $tax->label . '</th>
							<td>' . $tax->formatted_amount . '</td>
						</tr>';
					}
				}
			?>

			<?php if ( $woocommerce->cart->get_discounts_after_tax() ) : ?>

			<tr class="discount">
				<th><?php _e( 'Order Discount', 'woocommerce' ); ?></th>
				<td>-<?php echo $woocommerce->cart->get_discounts_after_tax(); ?></td>
			</tr>

			<?php endif; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<tr class="total">
				<th><strong><?php _e( 'Order Total', 'woocommerce' ); ?></strong></th>
				<td>
					<strong><?php echo $woocommerce->cart->get_total(); ?></strong>
					<?php
						// If prices are tax inclusive, show taxes here
						if ( $woocommerce->cart->tax_display_cart == 'incl' ) {
							$tax_string_array = array();

							foreach ( $woocommerce->cart->get_tax_totals() as $code => $tax ) {
								$tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
							}

							if ( ! empty( $tax_string_array ) ) {
								?><small class="includes_tax"><?php printf( __( '(Includes %s)', 'woocommerce' ), implode( ', ', $tax_string_array ) ); ?></small><?php
							}
						}
					?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

		</tfoot>
		
	</table>

</div>
