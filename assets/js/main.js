     
     // FB plugin code

     /* window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo get_option('cspd_messenger_fb_appid'); ?>',
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));*/

      //  End FB Plugin

    var width = "280px";
    var height = "355px";
    


  document.getElementById("cspd_messenger_btn").addEventListener("click", function(){ 

    if (window.innerWidth < 500) {
      
          
    } else {
      
           
    }
    // console.log(width+" : "+height);


    if (document.getElementById("cspd_messenger_container").style.display == "none") {

          document.getElementById("cspd_messenger_container").style.display = "block";

              setTimeout(function() {
       
            document.getElementById("cspd_messenger_container").style.width = width;
            document.getElementById("cspd_messenger_container").style.height = height;
            document.getElementById("cspd_messenger_container").style.visibility = "visible";
            document.getElementById("cspd_messenger_container").style.opacity = "1";
              }, 100);
    }

    else if (document.getElementById("cspd_messenger_container").style.display == "block") {
               document.getElementById("cspd_messenger_container").style.width = "0px";
               document.getElementById("cspd_messenger_container").style.height = "0px";
               document.getElementById("cspd_messenger_container").style.visibility = "hidden";
               document.getElementById("cspd_messenger_container").style.opacity = "0";
              

              setTimeout(function() {
              document.getElementById("cspd_messenger_container").style.display = "none";
          }, 300);}
         

   });





  document.getElementById("cspd_close_messanger").addEventListener("click", function(){ 
     
       
             document.getElementById("cspd_messenger_container").style.width = "0px";
             document.getElementById("cspd_messenger_container").style.height = "0px";
             document.getElementById("cspd_messenger_container").style.visibility = "hidden";
             document.getElementById("cspd_messenger_container").style.opacity = "0";
              

              setTimeout(function() {
              document.getElementById("cspd_messenger_container").style.display = "none";
          }, 300);
   });



window.fbAsyncInit = function() {
        FB.init({
          appId      : cspd_fb_app_id,
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      