<style>
  #adminmenumain{
    display:none;
  }
  #wpcontent, #wpfooter {
    margin-left: 0px;
}
</style>
<?php

if ( isset($_GET['id']) ) {
  $id = $_GET['id'];  // Get the raw input

  // Check for <script> or any script tags in the input
  if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
      // If found, exit the condition or display an error message
      wp_die('Invalid input detected.');
  }

  // Proceed with normal logic if no <script> tag found
  $id = sanitize_text_field( $id ); // Sanitize the input
  $id = esc_html( $id );
}

        


    $frmvidedit = $id;

    // echo esc_html($frmvidedit); 

    $frmvidedit = intval($frmvidedit); // Assuming id is an integer
    $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
    $vformdataedit = $wpdb->get_results($wpdb->prepare($query, $frmvidedit), OBJECT);

    // $vformdataedit = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  WHERE id='".$frmvidedit."'", OBJECT );
    foreach ( $vformdataedit as $keyoneedit=>$valueoneedit ) {
        $vfm_formname = $vformdataedit[$keyoneedit]->formname;
        $vfm_formdescription = $vformdataedit[$keyoneedit]->formdescription;
        $vfm_formbody = $vformdataedit[$keyoneedit]->formbody;
        $vfm_status = $vformdataedit[$keyoneedit]->status;
        $vfm_confimation = $vformdataedit[$keyoneedit]->confirmation;
        $vfm_confimation_value = $vformdataedit[$keyoneedit]->confirmation_value;

        $vf_notifito = $vformdataedit[$keyoneedit]->notification_mode;
        $vf_sendto = $vformdataedit[$keyoneedit]->send_to;
        $vf_emailsubject = $vformdataedit[$keyoneedit]->email_subject;
        $vf_fromname = $vformdataedit[$keyoneedit]->from_name;
        $vf_fromemail = $vformdataedit[$keyoneedit]->from_email;
        $vf_replyto = $vformdataedit[$keyoneedit]->reply_to;
        $vf_message = $vformdataedit[$keyoneedit]->message;
    }

?>
<div id="showmyvform" >

      <!-- form Builder -->

      <?php include VFORM_PLUGIN_PATH."inc/admin/form/builder.php"; ?>

      <!-- form Builder -->

      <!-- notifi -->
      <div class="container_vf">
        <div class="tabs_vf">
          <label class="tab_vf" for="radio-1">Issue<span class="notification_vf">1</span></label>
          <span class="glider_vf"></span>
        </div>
      </div>

      <div id="toast-container" class="toast-top-right">
          <div id="toast-type" class="toast" aria-live="assertive" style="">
            <div id="snackbar">Notification Save!</div>
          </div>
        </div>
      <!-- notifi -->

      <!-- form settings -->
      
      <?php include VFORM_PLUGIN_PATH."inc/admin/form/settings.php"; ?>
      
      <link rel="stylesheet" id="formsettingcss" href="<?php echo VFORM_PLUGIN_URL."assets/css/form-settings.css"; ?>" >

      <!-- form settings -->

      <!-- form save -->

      <form id="vform-userform">
          <input type="hidden" name="editid" value="<?php echo esc_html_e($id,'vform'); ?>" >
          <input type="hidden" name="formname" value="<?php echo esc_html_e($vfm_formname,'vform'); ?>">
          <input type="hidden" name="formdescription" value="<?php echo esc_html_e($vfm_formdescription,'vform'); ?>">
          <input type="hidden" name="formbody" >

          <input type="hidden" name="notification_mode" value="<?php echo esc_html_e($vf_notifito,'vform'); ?>">

          <input type="hidden" name="formstatus" value="<?php echo esc_html_e($vfm_status ,'vform'); ?>">
      </form>

      <!-- form save -->
      
      <input type="hidden" name="vformeditmode" value="">
      <script>

      var highestBatchId = 0;

      jQuery('#vform-mainfields .vform-group').each(function() {
          var batchId = parseInt(jQuery(this).attr('data-batchid'), 10);
          if (batchId > highestBatchId) {
              highestBatchId = batchId;
          }
      });


        // var maxget = jQuery('#vform-mainfields .vform-group').length;
        // console.log(maxget);
        jQuery('[name="vformeditmode"]').val(highestBatchId+1);


        jQuery(function($){

          $(document).ready(function(){
            
            var emstup = [];
            var url = new URL(window.location);
            var geturlval = url.searchParams.get('setting');
            if(geturlval==1){

              $('#maincontsetting').show();
              $('#leftPanel').css('left','-560px');
              $('#rightPanel').css('right','-560px');

              $('#settingleft').css('left','0px');
              $('#vform-mainfields').hide();

              $('#vformbuild').removeClass('isActive');
              $('#tooglevformsetting').addClass('isActive');

                // smart tags
                // $('.makesmarttagpos').html('<li class="heading">Available Fields</li>');
            $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{admin_email}">{admin_email}</li>');

                $(".vform-group").each(function(){
                  
                    var firstElementWithName = $(this).find('[name]').first();
                    var getprid = $(this).data('batchid');
                    var strfrm = $(this).data('type');
                    var labletext = $(this).children('label').text();
                    labletext = labletext.replace('*','');
                    if(strfrm!='' && strfrm!=undefined && strfrm!='submit'){
                      emstup.push('{'+strfrm+'_id="'+getprid+'"}');
                      $('.makesmarttagpos').append('<li class="clickmergevform" data-field={'+firstElementWithName.attr('name')+'}>'+strfrm+' ('+labletext+')'+'</li>');
                    }
                });
                $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{admin_email}">{admin_email}</li>');


                var getstepval = url.searchParams.get('step');
                
                if(getstepval!=''){
                  $('.modules-contentvf').hide();
                  $('.vfsettingslink').removeClass('active');

                  $('.modules-contentvf[data-id="'+getstepval+'"]').show();
                  $('.vfsettingslink[data-id="'+getstepval+'"]').addClass('active');

                  if(getstepval=='2' || getstepval=='6'){
                    $('.btn-save').hide();
                  }
                }

                $('.vform-mainproperties').hide();
            }

           

          });

        });
      </script>

</div>
