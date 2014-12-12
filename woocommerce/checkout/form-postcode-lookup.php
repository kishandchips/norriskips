<?php
/**
 * WooCommerce Address Validation
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Address Validation to newer
 * versions in the future. If you wish to customize WooCommerce Address Validation for your
 * needs please refer to http://docs.woothemes.com/document/address-validation/ for more information.
 *
 * @package     WC-Address-Validation/Templates/Postcode-Lookup
 * @author      SkyVerge
 * @copyright   Copyright (c) 2013-2014, SkyVerge, Inc.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $woocommerce;
?>
<div class="wc_address_validation_postcode_lookup" id="<?php echo esc_attr( 'wc_address_validation_postcode_lookup_' . $address_type ); ?>">
<p class="form-row form-row-first">
<input type="text" class="input-text" name="wc_address_validation_postcode_lookup_postcode" placeholder="<?php _e( 'Enter Postcode', WC_Address_Validation::TEXT_DOMAIN ); ?>" value="<?php echo $woocommerce->customer->get_shipping_postcode(); ?>" <?php if($address_type == 'shipping') echo 'disabled'; ?> />
</p>

<p class="form-row form-row-last">
<a href="#" class="button no-margin"><?php _e( 'Find Address', WC_Address_Validation::TEXT_DOMAIN ); ?></a>
</p>

<div class="clear"></div>

<p class="form-row message notes">
<select name="wc_address_validation_postcode_lookup_postcode_results" class="wc_address_validation_chosen select <?php echo esc_attr( $address_type ); ?>"></select>
</p>
<hr/></div>
<?php

