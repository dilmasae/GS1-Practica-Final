var $j = jQuery.noConflict();
var path = plugin_params.plugin_dir_url;
var div_wait = "<div id=\"wait_div\"><span class=\"wait_span\">"
var img = "</span><br><img src='"+path+"images/ajax-loader.gif'/></div>"

function submit_signup_form() {
  //document.getElementById("create_account_div").innerHTML =div_wait+img ;
  $form = $j("#create_account_form");

  var selected_lunch = new Array();
  $j("#lunch_openings input:checkbox:checked").each(function() {
       selected_lunch.push($j(this).val());
  });
  var lunch_openings = selected_lunch.join();

  var selected_dinner = new Array();
  $j("#dinner_openings input:checkbox:checked").each(function() {
       selected_dinner.push($j(this).val());
  });
  var dinner_openings = selected_dinner.join();

  var lunch_field = document.createElement("input");
  lunch_field.setAttribute("type", "text");
  lunch_field.setAttribute("name", "lunch_opened_days");
  lunch_field.setAttribute("value", lunch_openings);

  var dinner_field = document.createElement("input");
  dinner_field.setAttribute("type", "text");
  dinner_field.setAttribute("name", "dinner_opened_days");
  dinner_field.setAttribute("value", dinner_openings);

  $form.append(lunch_field);
  $form.append(dinner_field);

  $j.ajax({
    url: path+'local_registration.php',
    type: 'POST',
    dataType: 'html',
    data: $form.serialize(),
    success: function(data){
      result = JSON.parse(data);
      element = document.getElementById("create_account_div");
      element.innerHTML =div_wait+result.msg+img ;
      send_to_sign_up(JSON.parse(result.params), result.reg_id)
    }
  });

}

function send_to_sign_up(params, reg_id){
  $j.ajax({
    url: path+'send_registration.php',
    type: 'POST',
    dataType: 'html',
    data: ({
      reg_id: reg_id,
      params: params
    }),
    success: function(data){
      result = JSON.parse(data);
      element = document.getElementById("create_account_div");
      if(result.code == 201) {
        setTimeout(get_restaurant_info(result.gol_token, result.issue),5000);
        element.innerHTML =div_wait+result.msg+img ;
      }
      else if(result.code == 404) {
        element.innerHTML =result.msg ;
        first_child = document.getElementById("welcome_div");
        var errors = document.createElement("span");
        errors.setAttribute("class", "errors");
        var text = document.createTextNode("Error code 404");
        errors.appendChild(text);
        element.insertBefore(errors,first_child);
      }
      else{
        element.innerHTML =result.msg ;
        keys = Object.keys(result.errors)
        keys.forEach(function(element){
          document.getElementById(""+element).innerHTML =result.errors[element] ;
        });
      }
    }
  });
}

function get_restaurant_info(gol_token, issue){
   $j.ajax({
    url: path+'get_restaurant_info.php',
    timeout:120000,
    type: 'POST',
    data: ({
      gol_token: gol_token,
      issue: issue
    }),
    success: function(data){
      console.log(data)
      location.reload();
    }
  });
}

function get_restaurant_info_from_referal_key(){
  $form = $j("#enter_key");
  $j.ajax({
    url: path+'get_restaurant_info_from_referal.php',
    type: 'POST',
    data: $form.serialize(),
    success: function(data){
      console.log(data);
      location.reload();
    }
  });
}

function change_password_form(){
  $form = $j("#change_password_form");
  $j.ajax({
    url: path+'update_password.php',
    type: 'POST',
    dataType: 'html',
    data: $form.serialize(),
    success: function(data){
      console.log(data);
      //result = JSON.parse(data);
    }
  });
}
