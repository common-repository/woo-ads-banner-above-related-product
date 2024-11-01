<?php
/**
 * Plugin Name: Woocommerce ADS Banner Above Related Product
 * Description: Helping you can adding a banner above Related Product at WooCommerce Single Product Page.
 * Version: 1.0
 * Author: Krisna Pramu Waskito
 * Author URI: https://pramuwaskito.org/
 * License: GPLv3
 */

function ADSproduct_setup()
{
//add_submenu_page
    add_menu_page(__('ADS Product', 'ADSproduct'), __('ADS Product', 'ADSproduct'), 8, basename(__FILE__), 'ADSproduct_settings', plugin_dir_url(__FILE__) . 'img/ADS-icon.png');
    register_setting('ADSproduct', 'ADSproduct-code');
}

// Display settings page
function ADSproduct_settings()
{
ADSTEXT;

    if (get_option('ADSproduct-code')) {
        echo <<<ADSTEXT
		<h5 style="padding-top: 25px;"><a target="blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=pramuwaskito@gmail.com&item_name=Donation+Woocommerce+ADS+Banner">
		<img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_donate_92x26.png" alt="paypal" style="max-width:100%;"></a>
		<br>Made with love by <a href="https://pramuwaskito.org/">Krisna Pramu Waskito</a>
		</h5>
	<p style="font-size: 14px;color: #0166cd;">
		Check your Details Product Page to see if the ADS Above Related Product is present. 
		<br>
		You can always change a new code ADS Banner Above Related Product in the form below.
	</p>
ADSTEXT;
    } else {
        echo <<<ADSTEXT
	<h2 style="padding-top: 35px;color: #46a1ff;">Woocommerce ADS Banner Above Related Product</h2>
	<p style="font-size: 14px;">Create your HTML code into the form below:</p>
ADSTEXT;
    }

    echo '<form action="options.php" method="POST">';
    settings_fields('ADSproduct');
    do_settings_sections('ADSproduct');
    echo '<textarea cols="80" rows="14" name="ADSproduct-code">' . esc_attr(get_option('ADSproduct-code')) . '</textarea>';
    submit_button();
    echo '</form>';
}

function add_ADSproduct_code()
{
    echo get_option('ADSproduct-code');
}
// Add settings page and register settings with WordPress
add_action('admin_menu', 'ADSproduct_setup');
// Show Extra Content Above Related Product @ Single Product Page
add_action( 'woocommerce_after_single_product_summary', 'add_ADSproduct_code', 12 );

