<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="images">

	<?php
		$attachment_count   = count( $product->get_gallery_attachment_ids() );
		$attachment_ids = $product->get_gallery_attachment_ids();

		if ( $attachment_ids ) {
	        $loop = 0;

	        foreach ( $attachment_ids as $attachment_id ) {
	        	if($loop == 0){
					$image_link = wp_get_attachment_url( $attachment_id );
					$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				
					if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					} else {
						$gallery = '';
					}

					$classes = 'woocommerce-main-image zoom';
					
					echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="image" data-id="%s" ><a href="%s" itemprop="image" class="'.$classes.'"  rel="prettyPhoto' . $gallery . '">%s</a></div>', $attachment_id, $image_link, $image ), $post->ID );
					$loop++;
				}
			} 
		}
	?>

	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
