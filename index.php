<?php
/**
 * @package codespeedy_facebook_messenger_wp_plugin_with_woo_support
 * @version 1.0
 */
/*
Plugin Name: CodeSpeedy Facebook Messenger WordPress Plugin With Woo Support
Plugin URI: http://wordpress.org/plugins/codespeedy-facebook-messenger-wordpress-plugin-with-woo-support/
Description: This plugin can add message box on bottom right corner and add a button on WooCommere single product to let customers contact with your Facebook page.
Author: CodeSpeedy
Version: 1.0
Author URI: https://www.codespeedy.com/
*/
add_action("admin_menu", "cspd_fb_messenger_menu");
function cspd_fb_messenger_menu() {

    add_menu_page(
        //'wpcf7',
        'Messenger',
        'Messenger',
        'administrator',
        'cspd-fb-messenger',
        'cspd_fb_messenger_settings',
        plugin_dir_url( __FILE__ ).'assets/img/icon22.png' );


    
}
add_action('admin_init', 'cspd_wp_wc_messenger_options');
function cspd_wp_wc_messenger_options() {

    register_setting('cspd_messenger_option_group', 'cspd_messenger_fb_appid');
    register_setting('cspd_messenger_option_group', 'cspd_messenger_fb_page_url');

    register_setting('cspd_messenger_option_group', 'cspd_enable_bottom_right_messenger');
    register_setting('cspd_messenger_option_group', 'cspd_enable_wc_product_messenger');
    register_setting('cspd_messenger_option_group', 'cspd_bottom_right_messenger_icon');
    register_setting('cspd_messenger_option_group', 'cspd_bottom_right_messenger_border_clr');

    register_setting('cspd_messenger_option_group', 'cspd_wc_messenger_btn');
    register_setting('cspd_messenger_option_group', 'cspd_wc_messenger_btn');
    register_setting('cspd_messenger_option_group', 'cspd_wc_messenger_btn_txt');

    
}


function cspd_fb_messenger_settings() { 
     wp_enqueue_style( 'cspd_fb_inline_style' );

     $cspd_fb_inline_style = '
       tr{transition: 0.4s;}
       tr:hover {background: #ccc;}';

     wp_add_inline_style( 'cspd_fb_inline_style', $cspd_fb_inline_style );
    ?>
<h1>Facebook Messenger Settings</h1>
<?php settings_errors(); ?>

<form class="save_cspd_msticky_music_form" action="options.php" method="post">

       <?php settings_fields('cspd_messenger_option_group');
       do_settings_sections('cspd_messenger_option_group'); 
       ?>


<table class="form-table">

<tr>
<td scope="row">
  <h3>Configuration</h3>
</td>
<td></td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_messenger_fb_appid">Facebook App ID</label></td>
<td>
      <input style="width: 100%;" type="text" name="cspd_messenger_fb_appid" id="cspd_messenger_fb_appid" value="<?php echo get_option('cspd_messenger_fb_appid'); ?>" > <?php //echo get_option('cspd_messenger_fb_appid','checked'); ?>
</td>
<td>Create your Facebook app and put the App ID here</td>
</tr>


<tr>
<td scope="row"><label for="cspd_messenger_fb_page_url">Facebook Page URL</label></td>
<td>
      <input style="width: 100%;" type="text" name="cspd_messenger_fb_page_url" id="cspd_messenger_fb_page_url" value="<?php echo get_option('cspd_messenger_fb_page_url'); ?>" > <?php //echo get_option('cspd_messenger_fb_page_url','checked'); ?>
</td>
<td></td>
</tr>




<tr>
<td scope="row">
  <h3>Bottom right messenger for all pages</h3>
</td>
<td></td>
<td></td>
</tr>



<tr>
<td scope="row"><label for="cspd_enable_bottom_right_messenger">Enable Bottom Right Messenger</label></td>
<td>
      <input type="checkbox" name="cspd_enable_bottom_right_messenger" id="cspd_enable_bottom_right_messenger" value="checked" <?php echo get_option('cspd_enable_bottom_right_messenger'); ?> > <?php //echo get_option('cspd_enable_bottom_right_messenger','checked'); ?>
</td>
<td></td>
</tr>

<?php

wp_enqueue_style( 'wp-color-picker');
wp_enqueue_script( 'wp-color-picker');

$wpclrpkr = "

  (function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('#cspd_bottom_right_messenger_border_clr').wpColorPicker();
    });
     
})( jQuery );

";

wp_add_inline_script( 'wp-color-picker', $wpclrpkr );
?>

<tr>
<td scope="row"><label for="cspd_bottom_right_messenger_border_clr">Container box border color</label></td>
<td>
      <input type="text" name="cspd_bottom_right_messenger_border_clr" id="cspd_bottom_right_messenger_border_clr" value="<?php echo get_option('cspd_bottom_right_messenger_border_clr','#777'); ?>" > <?php //echo get_option('cspd_bottom_right_messenger_border_clr','checked'); ?>
</td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_bottom_right_messenger_icon">Bottom right messenger icon</label></td>
<td>
      <div style="padding: 6px;background: #ccc;">
         <input type="radio" name="cspd_bottom_right_messenger_icon" value="blue" <?php if(get_option('cspd_bottom_right_messenger_icon','blue') == "blue") {echo "checked";} ?>><img style="width: 35px; vertical-align: middle;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/messanger.png" ?>"> <br>
         <input type="radio" name="cspd_bottom_right_messenger_icon" value="white" <?php if(get_option('cspd_bottom_right_messenger_icon','blue') == "white") {echo "checked";} ?>><img style="width: 35px; vertical-align: middle;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/icon-blue-line.png" ?>">
         <?php //echo get_option('cspd_bottom_right_messenger_icon','blue'); ?>
      </div>
</td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_enable_wc_product_messenger">
  <h3>Messenger Button on WooCommerce Product</h3>
</label></td>
<td></td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_enable_wc_product_messenger">Enable Messenger Button On WooCommerce Product Page</label></td>
<td>
      <input type="checkbox" name="cspd_enable_wc_product_messenger" id="cspd_enable_wc_product_messenger" value="checked" <?php echo get_option('cspd_enable_wc_product_messenger'); ?> > <?php //echo get_option('cspd_enable_wc_product_messenger','checked'); ?>
</td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_wc_messenger_btn">Choose the messenger button of WooCommerce product page</label></td>
<td>
      <div style="padding: 6px;background: #ccc;">
         <input type="radio" name="cspd_wc_messenger_btn" value="blue" <?php if(get_option('cspd_wc_messenger_btn','blue') == "blue") {echo "checked";} ?>><img style="vertical-align: middle;width: 130px;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/btn-blue.png" ?>"> <br><br>
         <input type="radio" name="cspd_wc_messenger_btn" value="white" <?php if(get_option('cspd_wc_messenger_btn','blue') == "white") {echo "checked";} ?>><img style="vertical-align: middle;width: 130px;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/btn-white.png" ?>">
         <?php //echo get_option('cspd_wc_messenger_btn','blue'); ?>
      </div>
</td>
<td></td>
</tr>


<tr>
<td scope="row"><label for="cspd_wc_messenger_btn_txt">WooCommerce Messenger Button Text</label></td>
<td>
      <input type="text" name="cspd_wc_messenger_btn_txt" id="cspd_wc_messenger_btn_txt" value="<?php echo get_option('cspd_wc_messenger_btn_txt','Send Us Message'); ?>" >
</td>
<td></td>
</tr>


</table>

 <?php submit_button('Save Settings'); ?>

</form>
<?php
}


// Option save success notice
function cspd_fb_messenger_settings_change( $data ) {

    $message = null;
    $type = null;

    if ( null != $data ) {

        if ( false === get_option( 'myOption' ) ) {

            add_option( 'myOption', $data );
            $type = 'updated';
            $message = __( 'Successfully saved', 'my-text-domain' );

        } else {

            update_option( 'myOption', $data );
            $type = 'updated';
            $message = __( 'Successfully updated', 'my-text-domain' );

        }

    } else {

        $type = 'error';
        $message = __( 'Data can not be empty', 'my-text-domain' );

    }

    add_settings_error(
        'myUniqueIdentifier',
        esc_attr( 'settings_updated' ),
        $message,
        $type
    );

}


if (get_option('cspd_enable_bottom_right_messenger') == 'checked') {
   include( plugin_dir_path( __FILE__ ) . 'bottom_right_messenger.php');
}

if (get_option('cspd_enable_wc_product_messenger') == "checked") {
   include( plugin_dir_path( __FILE__ ) . 'wc_product_messenger.php');
}
