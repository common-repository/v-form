

<?php
defined('ABSPATH') || die("Nice try");
  global $wpdb;


  if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }



  $url_id = $id;
    if($url_id==''){
        include VFORM_PLUGIN_PATH."inc/admin/maindashboard.php";
    }else{
        include VFORM_PLUGIN_PATH."inc/admin/editmode.php";
    }

?>


<?php 
  $chkadv = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vfsubscr", OBJECT );
  foreach ( $chkadv as $keychkadv=>$valuechkadv ) {
      $getval = $chkadv[$keychkadv]->subscription;
    }
?>
<div id="vform-getsubscription" <?php echo $getval==1?'style="display:none;"':''; ?> >
  <div class="subscr-vform">
      <img class="vflgimg" src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/vform-icon.svg">
      <h3>Welcome to Vform World first FREE wordpress plugin with all feature lifetime.</h3>
      <form action="javascript:void(0)" id="mysubmitemail-vform">     
        <input type="submit" value="Unlock my FREE Vform now" id="sendmyvfrm-eml">
      </form>
  </div>
</div>