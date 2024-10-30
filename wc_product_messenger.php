<?php

add_action( 'woocommerce_before_add_to_cart_form', 'cspd_messenger_wc_single_product', 20 );

function cspd_messenger_wc_single_product() { ?>

    <?php add_thickbox(); ?>

    <?php

      if (get_option('cspd_wc_messenger_btn','blue') == "blue") { ?>
      	

    <a href="https://www.facebook.com/plugins/page.php?href=<?php echo urlencode(get_option('cspd_messenger_fb_page_url')); ?>&tabs=messages&width=290&height=330&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=<?php echo get_option('cspd_messenger_fb_appid'); ?>&?TB_iframe=true&width=260&height=330" class="thickbox"><button id="cspd_wc_messenger_btn" style="display: inline-block;background: #437bbd;color: #fff;padding: 6px;border-radius: 2px;"><img style="width: 25px;display: inline;vertical-align: middle;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/icon3.png" ?>"> <?php echo get_option('cspd_wc_messenger_btn_txt','Send Us Message'); ?></button></a>


    <?php  } else if (get_option('cspd_wc_messenger_btn','blue') == "white") { ?>

    <a href="https://www.facebook.com/plugins/page.php?href=<?php echo urlencode(get_option('cspd_messenger_fb_page_url')); ?>&tabs=messages&width=290&height=330&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=<?php echo get_option('cspd_messenger_fb_appid'); ?>&?TB_iframe=true&width=260&height=330" class="thickbox"><button id="cspd_wc_messenger_btn" style="display: inline-block;background: #fff;color: #777;padding: 6px;border-radius: 2px;border: solid 2px #777;"><img style="width: 25px;display: inline;vertical-align: middle;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/messanger.png" ?>"> <?php echo get_option('cspd_wc_messenger_btn_txt','Send Us Message'); ?></button></a>


    <?php  }

    ?>


<?php }