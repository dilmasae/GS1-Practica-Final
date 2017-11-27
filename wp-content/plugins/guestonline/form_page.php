<?php include("header.php"); ?>

<div id="create_account_div" class="create_an_account">

<div id="referal_link_div" class="div_border">
    <input type="button" class="button button-primary" value="<?php _e('Already Guestonline client ?','guestonline'); ?>" onclick="window.location.href = '<?php echo $config_link;?>';" />
    </div>
<form id="create_account_form" class="form_style" action="" method="post">
  <input type="hidden" name="locale" value="<?php echo $locale; ?>"/>
  <input type="hidden" name="ip_address" value="<?php echo $ip; ?>"/>
  <div class="div_border" id="form_resto_div">
    <h3><?php _e('Restaurant', 'guestonline');?></h3>
    <p>
      <label><span><?php _e('Restaurant name', 'guestonline');?> : <span class="required">*</span></span></label>
      <input class="field" type="text" name="restaurant_name" placeholder="restaurant name" style="width:400px;" value="<?php echo $restaurant_name ;?>"/><span class="errors" id="restaurant_name">
    </p>
    <p>
      <span><b><?php _e('address', 'guestonline') ; ?>: <span class="required">*</span></b></span>
      <input class="field" type="text" name="address"  placeholder="street" style="width:400px;" value="<?php echo $address ;?>"/>
      <span class="errors" id="address">
    </p>
    <p style="float:left;margin-top: initial;" class="field">
      <input type="text" name="post_code" placeholder="post_code" style="width:98px;float:left;" value="<?php echo $post_code ;?>"/>
      <span class="errors" id="post_code">
      <input type="text" name="city" placeholder="city" style="width:290px;" value="<?php echo $city ;?>"/>
      <span class="errors" id="city">
    </p>
    <br>
    <p>
      <label><span><?php _e('Time zone', 'guestonline') ; ?>  : <span class="required">*</span></span></label>
        <?php include("time_zones.php"); ?>
      <span class="errors" id="time_zone">
    </p>
    <p><label><span><?php _e('Country code', 'guestonline') ; ?> : <span class="required">*</span></span></label>
      <?php include("country_code.php"); ?>
      <span class="errors" id="country_code"></p>
    <p>
      <label><span><?php _e('Phone', 'guestonline') ; ?> : <span class="required">*</span></span></label>
      <input class="phone field" type="text" name="phone" placeholder="phone" value="<?php echo $phone ;?>"/><span class="errors" id="phone">
    </p>
    <p>
      <label><span><?php _e('Capacity', 'guestonline') ; ?> : <span class="required">*</span></span></label>
      <input class="phone field" type="number" name="capacity" placeholder="restaurant capacity" value="<?php echo $capacity ;?>"/><span class="errors" id="capacity">
    </p>
    <br>
    <p><span><b><?php _e('Openings', 'guestonline');?> : <span class="required">*</span></b></span></p>
    <div id="openings_div">
      <table>
        <th style="width:20%;">
          <td><?php _e('Monday', 'guestonline');?></td>
          <td><?php _e('Tuesday', 'guestonline');?></td>
          <td><?php _e('Wednesday', 'guestonline');?></td>
          <td><?php _e('Thursday', 'guestonline');?></td>
          <td><?php _e('Friday', 'guestonline');?></td>
          <td><?php _e('Saturday', 'guestonline');?></td>
          <td><?php _e('Sunday', 'guestonline');?></td>
        </th> 
        <tr id="lunch_openings">
          <td><?php _e('lunch openings', 'guestonline');?> : </td>
          <td><input type="checkbox" class="lunch_openings" value="1" /></td>
          <td><input type="checkbox" class="lunch_openings" value="2" /></td>
          <td><input type="checkbox" class="lunch_openings" value="3" /></td>
          <td><input type="checkbox" class="lunch_openings" value="4" /></td>
          <td><input type="checkbox" class="lunch_openings" value="5" /></td>
          <td><input type="checkbox" class="lunch_openings" value="6" /></td>
          <td><input type="checkbox" class="lunch_openings" value="0" /></td>
          <td><span class="errors" id="lunch_opened_days"></span></td>
        </tr>
        <tr  id="dinner_openings">
          <td><?php _e('dinner openings', 'guestonline');?> : </td>
          <td><input type="checkbox" class="lunch_openings" value="1" /></td>
          <td><input type="checkbox" class="lunch_openings" value="2" /></td>
          <td><input type="checkbox" class="lunch_openings" value="3" /></td>
          <td><input type="checkbox" class="lunch_openings" value="4" /></td>
          <td><input type="checkbox" class="lunch_openings" value="5" /></td>
          <td><input type="checkbox" class="lunch_openings" value="6" /></td>
          <td><input type="checkbox" class="lunch_openings" value="0" /></td>
          <td><span class="errors" id="dinner_opened_days"></span></td>
        </tr>
      </table>
    </div>
    </br>
  </div>
  <div class="div_border" id="form_user_div">
    <h3><?php _e('User information', 'guestonline');?></h3>
    <p>
      <label><span><?php _e('Email', 'guestonline');?> : <span class="required">*</span></span></label>
      <input placeholder="email" class="field" type="email" name="email" value="<?php echo $email ;?>"/><span class="errors" id="email">
    </p>
    <p>
      <label><span><?php _e('Lastname', 'guestonline');?> : <span class="required">*</span></span></label>
      <input placeholder="lastname" type="text" class="field" name="name" value="<?php echo $name ;?>"/><span class="errors" id="name">
    </p>
    <p>
      <label><span><?php _e('Firstname', 'guestonline');?> : <span class="required">*</span></span></label>
      <input placeholder="firstname" class="field" type="text" name="firstname" value="<?php echo $firstname ;?>"/><span class="errors" id="firstname">
    </p>
  </div>
  <div class="div_border" id="form_submit_div">
    <div class="pull_left">
      <?php if($locale == 'fr'){ ?>
        <a href="http://www.guestonline.fr/" target="_blank"><?php _e('What is Guestonline ?','guestonline'); ?></a><br>
        <a href="https://tableonline.zendesk.com/hc/fr/articles/208097716" target="_blank"><?php _e('Guestonline FAQ','guestonline'); ?></a>
      <?php }else{ ?>
        <a href="http://www.guestonline.fr/en/" target="_blank"><?php _e('What is Guestonline ?','guestonline'); ?></a><br>
        <a href="https://tableonline.zendesk.com/hc/fr/categories/200918946-ENGLISH-FREQUENTLY-ASKED-QUESTIONS" target="_blank"><?php _e('Guestonline FAQ','guestonline'); ?></a>
      <?php } ?>
    </span>
    </div>
    <input type="button" class="button button-primary" value="<?php _e('Initialize widget','guestonline'); ?>" onclick="submit_signup_form();" />
    <div class="pull_right">
      <a href='https://geo.itunes.apple.com/us/app/guestonline-for-ipad/id499253435?mt=8' style='display:inline-block;overflow:hidden;no-repeat;width:105px;height:30px;' target='itunes_store'>
        <img style="height: 30px;width:90px" alt="Fr_generic_rgb_wo_45" src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.svg" />
      </a>
      <a href='https://play.google.com/store/apps/details?id=fr.tableonline.guestonline' target="_blank">
        <img style="height: 30px;width:90px" alt="Fr_generic_rgb_wo_45" src="https://play.google.com/intl/en_us/badges/images/apps/en-play-badge.png" />
      </a>
    </div>
  </div>
</form>
<br/>
</div>
