<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?> <?php _e("Delivered to", THEME_NAME); ?> <?php echo $woocommerce->customer->get_shipping_postcode(); ?>  <a class="change-postcode-btn"><?php _e("Change Postcode", THEME_NAME); ?></a></p>

	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>