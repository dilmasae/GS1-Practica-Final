<div id="dashbord_div" class="div_border">
  <img src="<?php echo plugins_url( 'images/logo_dark.png', __FILE__ ); ?>"/>
  <span><h2><?php _e('Welcome to Guestonline', 'guestonline') ; ?></h2></span>
  <br><br>
  <p><?php _e('Congratulations, Guestonline booking widget is up and running.', 'guestonline') ; ?></p>
  <p><?php _e('here is how it looks like', 'guestonline') ; ?> : <a  target="_blank" href="<?php echo $module_url.$referal_key ; ?>"><b>live demo</b></a></p></p>
  <p><?php _e('Restaurant settings now need to be done in your Guestonline back-office.', 'guestonline') ; ?></p>
</div>
<div id="restaurant_infos" class="div_border">

  <h2>Installation : </h2>
  <p><?php _e('You\'ll find ready-to-use embedded widget in the Widget section of your Wordpress website.', 'guestonline') ; ?></p>
  <p><?php _e('or you can use the shortcodes to add your Guestonline module in any page.', 'guestonline') ; ?></p>
  <p><?php _e(' - paste <b>[guestonline_iframe]</b> in any page or post to add the iframe', 'guestonline') ; ?></p>
  <p><?php _e(' - paste <b>[guestonline_button title=\'YOUR_BUTTON_NAME\']</b> in any page or post to add the button', 'guestonline') ; ?></p>
  <p><?php _e('Still, you can use this URL:', 'guestonline') ; ?> <a  target="_blank" href="<?php echo $module_url.$referal_key ; ?>"><b><?php echo $module_url.$referal_key ; ?></b></a></p>
  <p><?php _e('Want a cool widget integration ? Add this Facebook\'Call To Action booking URL', 'guestonline') ; ?> : <a target="_blank" href="<?php echo $facebook_url ; ?>"><b><?php echo $facebook_url ; ?></b></a></p>
</div>

<div class="div_border" id="form_connect_div">
    <span class="pull_right">
      <a href='https://geo.itunes.apple.com/us/app/guestonline-for-ipad/id499253435?mt=8' style='display:inline-block;overflow:hidden;background:url(http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg) no-repeat;width:135px;height:40px;' target='itunes_store'></a>
      <a href='https://play.google.com/store/apps/details?id=fr.tableonline.guestonline' target="_blank">
        <img style="height: 40px;" alt="Fr_generic_rgb_wo_45" src="https://play.google.com/intl/en_us/badges/images/apps/en-play-badge.png"/>
      </a>
      <br>
      <?php if($locale == 'fr'){ ?>
        <a href="http://www.guestonline.fr/" target="_blank"><?php _e('What is Guestonline ?','guestonline'); ?></a><br>
        <a href="https://tableonline.zendesk.com/hc/fr/articles/208097716" target="_blank"><?php _e('Guestonline FAQ','guestonline'); ?></a>
      <?php }else{ ?>
        <a href="http://www.guestonline.fr/en/" target="_blank"><?php _e('What is Guestonline ?','guestonline'); ?></a><br>
        <a href="https://tableonline.zendesk.com/hc/fr/categories/200918946-ENGLISH-FREQUENTLY-ASKED-QUESTIONS" target="_blank"><?php _e('Guestonline FAQ','guestonline'); ?></a>
      <?php } ?>
    </span>
    <a href="<?php echo $guestonline_url; ?>/login?auth_token=<?php echo $gol_token; ?>&action=login" target="_blank" class="button button-primary"><?php _e('Connect to Guestonline', 'guestonline') ; ?></a>
<br>
    <div class="connect_pull_left">
      <p><?php _e('You will discover a complete, powerfull, free booking engine, and in the paying services area :', 'guestonline') ; ?></p>
      <ul>
        <li><?php _e('advanced settings (booking auto-validation, max seats limitations, mutiple services settings)', 'guestonline') ; ?></li>
        <li><?php _e('a professional reservation diary for restaurateurs', 'guestonline') ; ?></li>
        <li><?php _e('a private customer database solution', 'guestonline') ; ?></li>
        <li><?php _e('a marketing campaign tool', 'guestonline') ; ?></li>
      </ul>
    </div>
  </div>
<div id="password_update" class="div_border">
  <p><?php _e('You login is', 'guestonline') ; ?> : <b><?php echo $login; ?><b>
  <p><?php _e('Never received your password ? Set it here !', 'guestonline') ; ?></p>
  <form id="change_password_form">
    <input name="gol_token" type="hidden" value="<?php echo $gol_token; ?>"/>
    <input name="password" type="text"/>
    <input type="button" class="button button-primary" value="<?php _e('Change password', 'guestonline') ; ?>" onclick="change_password_form();" />
  </form>
  <p></p>
</div>

