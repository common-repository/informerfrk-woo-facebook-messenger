<?php
function cspd_messenger_contact() {
    wp_enqueue_style('cspd_messenger_wc_css',  plugin_dir_url( __FILE__ ) . 'assets/css/main.css', array(), '0.1.0', 'all');
    wp_enqueue_script('cspd_messenger_wc_script',  plugin_dir_url( __FILE__ ) . 'assets/js/main.js', array(), '0.1.0', 'all');


     $inline_cspd_messenger_wc_script = '
       var cspd_fb_app_id = "'.get_option('cspd_messenger_fb_appid').'";
     ';
     
     wp_add_inline_script( 'cspd_messenger_wc_script', $inline_cspd_messenger_wc_script );
    ?>


  <div id="cspd_messenger_container" style="display:none;border: solid 2px <?php echo get_option('cspd_bottom_right_messenger_border_clr','#777'); ?>;">
    <span id="cspd_close_messanger">X</span>
    <div class="fb-page" 
         data-href="<?php echo get_option('cspd_messenger_fb_page_url'); ?>" 
         data-tabs="messages" 
         data-width="280" 
         data-height="330" 
         data-small-header="true" 
         data-hide-cta="true" 
         data-hide-cover="true"
         >
      <div class="fb-xfbml-parse-ignore">
        <blockquote></blockquote>
      </div>
    </div>

  </div>


    <div id="cspd_messenger_btn">
      <?php
      if (get_option('cspd_bottom_right_messenger_icon','blue') == "blue") { ?>
          <img style="border: solid 2px #437bbd;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/messanger.png" ?>">
      <?php } else if (get_option('cspd_bottom_right_messenger_icon','blue') == "white") { ?>
          <img style="border: solid 2px #437bbd;width: 45px;height: 42px;" style="background: #ffffff;" src="<?php echo plugin_dir_url( __FILE__ )."assets/img/icon-blue-line.png" ?>">
      <?php }
      ?>
      
    </div>

    <?php
}

add_action('wp_footer', 'cspd_messenger_contact');