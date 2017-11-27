<?php include("header.php"); ?>

    <div id="referal_body_div" class="div_border">
      <p><?php _e('If you already have a Guestonline account, please fill the form below to activate your Guestonline widget', 'guestonline');?></p>
      <form action="" method="POST" id="enter_key">
        <table class="form_table">
          <tboby>
          <tr>
            <th><label for="label_key"><?php _e('Referal Key'); ?></label></th>
            <td><input type="text" name="referal_key" value="<?php echo esc_attr( get_option('instabook_referal_key') ); ?>"></input> </td>
          </tr>
          <tr>
            <th><label for="gol_token"><?php _e('Guestonline Token'); ?></label></th>
            <td> <input name="gol_token" type="text"/></td>
          </tr>
          </tboby>
        </table>
        <p>
        <input type="button" class="button button-primary" value="<?php echo __('Save Changes', 'instabook');?>" onclick="get_restaurant_info_from_referal_key();" />
        </p>
      </form>
    </div>
    <div id="gol_token_help" class="div_border">
      <div class="">
        <h3><?php _e('Where to find your referal key and your Guestonline Token', 'guestonline');?></h3>
        <p><?php _e('- Your referal key and your guestonline token are available in the module section of your Guestonline backoffice', 'guestonline') ; ?></p>
        <p><?php _e('- You can have more information about how to activate your plugin in our ', 'guestonline') ; ?><a href="https://tableonline.zendesk.com/hc/fr/articles/208097716" target="_blank">FAQ</a></p>
        </ul>
      </div>
    </div>
