<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;
$frmvid =  $atts['id'];


if(isset($frmvid)){

  $frmvid = intval($frmvid); // Assuming id is an integer
$query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
$vformdata = $wpdb->get_results($wpdb->prepare($query, $frmvid), OBJECT);

  // $vformdata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id='".$frmvid."'", OBJECT );
  foreach ( $vformdata as $keyone=>$valueone ) {

    if($vformdata[$keyone]->status=='true'){

      	$mainbody = $vformdata[$keyone]->formbody;
        $mainbody = stripslashes($mainbody);
        $mainbody = html_entity_decode($mainbody);
        $mainbody = str_replace('disabled=""',"",$mainbody);
        $mainbody = str_replace('<div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div>',"",$mainbody);
        $mainbody = str_replace('<div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div>',"",$mainbody);        
        $mainbody = str_replace('vform-group-active',"",$mainbody);
        $mainbody = str_replace('vform-group',"vform-group-vform",$mainbody);

        $sectype = $valueone->security_type==null ? '1': $valueone->security_type;
        $key1 = $valueone->rec_site_key==null ? '': $valueone->rec_site_key;
        $key11 = $valueone->hcap_site_key==null ? '': $valueone->hcap_site_key;

        if($key11!='' && $key11!=null && $sectype=='2'){
          echo '<script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
          <script type="text/javascript">
          var yourFunction = function () {
              var widgetID = hcaptcha.render("captcha-1", { sitekey: "'.$key11.'" });
          };
          </script>';
      }

      if($key1!='' && $key1!=null && $sectype=='1'){
          echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
      }

    }

  }



  function vformget_client_ip() {
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
      $ipaddress = 'UNKNOWN';
  return $ipaddress;
  }
  $ip = vformget_client_ip();

  $browser = $_SERVER['HTTP_USER_AGENT'];
?>
<style>
  .vform-group-vform{
      padding: 10px;
      float: left;
      width: 100%;
      transition: .5s ease;
      position: relative;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> input, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> select {
      height: 40px;
      width: 100%;
      max-width: 100%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> textarea{
    width:100%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> input[type="radio"], #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> input[type="checkbox"] {
      border: 1px solid #ccc;
      background-color: #fff;
      width: 14px;
      height: 14px;
      min-width: 14px;
      margin: 0 10px 0 3px;
      display: inline-block;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform .primary-input{
    width: 100%!important;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-termscondition > input {
      max-width: 20px!important;
      height: 20px;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.size-small{
      width:33%!important;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.size-medium{
      width:65%!important;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.size-large{
      width:100%!important;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-simple .vform-first-name, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-combo-middle-last .vform-first-name{
      width: 100%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-first-last .vform-middle-name, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-simple .vform-middle-name, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-simple .vform-last-name{
    display:none;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-first-last .vform-first-name, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-first-last .vform-last-name{
    width:48%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-combo-middle-last .vform-middle-name, #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform.format-selected-combo-middle-last .vform-last-name{
      width: 48%;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-main-submit {
      font-size: 16px;
      background: #ddd;
      border: none;
      padding: 8px 20px;
      color: #000;
      cursor: pointer;
      display: inline-block;
      text-align: center;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-address p {
      margin: 5px;
      float: left;
      width: 100%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform .primary-input[name="state_name[]"] {
      max-width: 57%;
      float: left;
      margin-bottom: 2%;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .vform-group-vform .primary-input[name="zip_code[]"] {
      max-width: 40%;
      float: right;
  }

  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?>  .vform-address p:nth-child(6),#vformgroup<?php echo esc_html_e($frmvid,'vform'); ?>  .vform-address p:nth-child(8) {
      display: none;
  }
  #vformgroup<?php echo esc_html_e($frmvid,'vform'); ?> .primary-input:focus {
      outline: none;
  }

  .vform-group-vform input[type=color], .vform-group-vform input[type=date], .vform-group-vform input[type=datetime-local], .vform-group-vform input[type=datetime], .vform-group-vform input[type=email], .vform-group-vform input[type=month], .vform-group-vform input[type=number], .vform-group-vform input[type=password], .vform-group-vform input[type=search], .vform-group-vform input[type=tel], .vform-group-vform input[type=text], .vform-group-vform input[type=time], .vform-group-vform input[type=url], .vform-group-vform input[type=week], select, textarea{
      height: 40px;
      width: 100%;
      max-width: 100%;
      border-radius: 4px;
      border: 1px solid #8c8f94;
      padding: 0 24px 0 8px;
  }
  .vform-group-vform ul.primary-input {
      margin: 0;
      padding: 0px;
      list-style: none;
  }
  .vform-group-vform textarea{
    height: 100px;
  }
  .validate_vform{
    color:red;
    font-size:18px;
    display:none;
  }
  .vfrm-loader {
    position: relative;
    top: -71px;
    left: 0;
    color: orange;
    display: none;
    width: 100%;
    /* display: flex; */
    justify-content: center;
    cursor: no-drop;
  }
  .myallinone-vform {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
  }
</style>
<style>

.dot-spinner {
  --uib-size: 2.8rem;
  --uib-speed: .9s;
  --uib-color: #183153;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  height: var(--uib-size);
  width: var(--uib-size);
}

.dot-spinner__dot {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  height: 100%;
  width: 100%;
}

.dot-spinner__dot::before {
  content: '';
  height: 20%;
  width: 20%;
  border-radius: 50%;
  background-color: var(--uib-color);
  transform: scale(0);
  opacity: 0.5;
  animation: pulse0112 calc(var(--uib-speed) * 1.111) ease-in-out infinite;
  box-shadow: 0 0 20px rgba(18, 31, 53, 0.3);
}

.dot-spinner__dot:nth-child(2) {
  transform: rotate(45deg);
}

.dot-spinner__dot:nth-child(2)::before {
  animation-delay: calc(var(--uib-speed) * -0.875);
}

.dot-spinner__dot:nth-child(3) {
  transform: rotate(90deg);
}

.dot-spinner__dot:nth-child(3)::before {
  animation-delay: calc(var(--uib-speed) * -0.75);
}

.dot-spinner__dot:nth-child(4) {
  transform: rotate(135deg);
}

.dot-spinner__dot:nth-child(4)::before {
  animation-delay: calc(var(--uib-speed) * -0.625);
}

.dot-spinner__dot:nth-child(5) {
  transform: rotate(180deg);
}

.dot-spinner__dot:nth-child(5)::before {
  animation-delay: calc(var(--uib-speed) * -0.5);
}

.dot-spinner__dot:nth-child(6) {
  transform: rotate(225deg);
}

.dot-spinner__dot:nth-child(6)::before {
  animation-delay: calc(var(--uib-speed) * -0.375);
}

.dot-spinner__dot:nth-child(7) {
  transform: rotate(270deg);
}

.dot-spinner__dot:nth-child(7)::before {
  animation-delay: calc(var(--uib-speed) * -0.25);
}

.dot-spinner__dot:nth-child(8) {
  transform: rotate(315deg);
}

.dot-spinner__dot:nth-child(8)::before {
  animation-delay: calc(var(--uib-speed) * -0.125);
}

@keyframes pulse0112 {
  0%,
  100% {
    transform: scale(0);
    opacity: 0.5;
  }

  50% {
    transform: scale(1);
    opacity: 1;
  }
}

</style>
<form class="myallinone-vform" data-id="<?php echo esc_html_e($frmvid,'vform'); ?>" id="vformgroup<?php echo esc_html_e($frmvid,'vform'); ?>">
<?php echo html_entity_decode(esc_html($mainbody,'vform')); ?>
<input type='hidden' name="formid" value="<?php echo esc_html_e($frmvid,'vform'); ?>" />
<input type="hidden" name="ip" value="<?php echo esc_html_e($ip,'vform');?>">
<input type="hidden" name="browser" value="<?php echo esc_html_e($browser,'vform'); ?>">
<input type="hidden" name="currentdate" value="<?php echo esc_html_e(date("F j, Y, g:i a"),'vform'); ?>">
<input type="hidden" name="timezone" value="<?php echo esc_html_e(date_default_timezone_get(),'vform'); ?>">
<input id="currentdate_part2" type="hidden" name="currentdate_part2" value="">

<?php wp_nonce_field('myvformfrontsave','vfm-nonce'); ?>
</form>

<div class="vfrm-loader">
  <div class="dot-spinner">
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
      <div class="dot-spinner__dot"></div>
  </div>
</div>

<div class="confirmation_vform"></div>
<div class="validate_vform">*Form Fields Are Required!</div>
<script>
  jQuery(function($){
    $(document).ready(function(){

        var userdata1 = new Date();
        var countalltime;
        function chkusertime(Christmas){
            var diffMs = (Christmas - userdata1);
            var diffDays = Math.floor(diffMs / 86400000);
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000);
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);
            var seconds = Math.round(diffMs / (1000) % 60);
            countalltime = {
              "days":diffDays,
              "hours":diffHrs,
              "minute":diffMins,
              "second":seconds
            };
          }

        $('#currentdate_part2').val(new Date());

        function sanitizeInput(input) {
          return input.replace(/<[^>]*>/g, '');
        }

        $('.myallinone-vform [type="submit"]').click(function(e){

          var valid = false;

          if (jQuery('.h-captcha').length) {
            var hcaptchaResponse = document.querySelector('.h-captcha textarea[name="h-captcha-response"]').value;
            if (hcaptchaResponse === '') {
                e.preventDefault();
                alert('Please complete the hCaptcha.');
                valid = false;
            } else {
              valid = true;
            }
          } else {
            valid = true;
          }

          if($('.myallinone-vform')[0].checkValidity() && valid){

              $('.validate_vform').hide();

              e.preventDefault();

                var userdata2 = new Date();
                chkusertime(userdata2);
                var vformfrmid ='<?php echo esc_html_e($frmvid,'vform'); ?>';

                var thfrid = '#vformgroup'+vformfrmid;
                $('.vfrm-loader').css('display','flex');
                  $(this).attr('disabled','true');
                  countalltime = JSON.stringify(countalltime);

                   // Sanitize all form inputs
                   $(thfrid).find(':input').each(function() {
                      $(this).val(sanitizeInput($(this).val()));
                    });
                    
                  var postdata = "action=myvformfrontsave&param=save_vform&vfid="+vformfrmid+"&usertimetakes="+countalltime+"&"+$(thfrid).serialize();
                  // console.log(postdata);
                  jQuery.post(ajax_object,postdata,function(response){

                    var data = jQuery.parseJSON(response);
                    if(data.status==1){
                    // console.log(data);
                    $('.vfrm-loader').hide();


                    var res1 = data.confirmation;
                    var res2 = data.confirmation_value;
                    var Title = $('<textarea />').html(res2).text();

                        switch (res1) {
                          case 'message':
                          $('.confirmation_vform').html(Title);
                          $('.myallinone-vform').remove();
                            break;
                        case 'page':
                          window.location.href="/"+res2;
                          break;
                        case 'redirect':
                          window.location.href=res2;
                          break;
                          case 'redirect_2':
                            var inserted_id = data.inserted_id;
                          window.location.href=res2+'?id='+inserted_id;
                          break;
                          default:
                          $('.confirmation_vform').html('Thanks For your Response!');
                          $('.myallinone-vform').remove();
                        }

                    }else{
                      alert('!Oops Something went Wrong.');
                    }
                  });

          }else{

            $('.validate_vform').show();

          }

        });

        
        var vformfrmid ='<?php echo esc_html_e($frmvid,'vform'); ?>';
        var postdata = "action=myvformconversion&param=save_vform&vfid="+vformfrmid+"&ip="+$('[name="ip"]').val();

        jQuery.post(ajax_object,postdata,function(response){

          var data = jQuery.parseJSON(response);
          if(data.status==1){
            // console.log(data);
          }
        });





    });
  });
</script>
<?php
}
?>
