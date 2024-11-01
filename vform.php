<?php
/*
 * Plugin Name:       Vform
 * Plugin URI:        /
 * Description:       Lifetime free Drag & Drop Contact Form Builder for WordPress VForm.
 * Version:           3.0.2
 * Requires at least: 5.6
 * Author:            Vikas Ratudi
 * Author URI:        https://www.instagram.com/ratudi_vikas/?r=nametag
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       vform
 * Tags:              form, wordpress form, contact form, very simple form, drag drop form, allinone form, secure form, free contact form, contact form plugin, forms, form builder
*/

defined('ABSPATH') || die("You Can't Access this File Directly");

define('VFORM_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('VFORM_PLUGIN_URL',plugin_dir_url(__FILE__));
define('VFORM_PLUGIN_FILE', __FILE__);
include VFORM_PLUGIN_PATH."inc/db.php";


	add_action('wp_enqueue_scripts','vform_wp_scripts');

	function vform_wp_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'vform_dev_style', VFORM_PLUGIN_URL . 'assets/css/style.css', array(), '3.0.2', 'all' );
		wp_enqueue_script('vform_dev_script', VFORM_PLUGIN_URL."assets/js/custom.js", array(),'3.0.2',true);
		wp_localize_script('vform_dev_script','ajax_object',admin_url("admin-ajax.php"));
	}

	add_action('admin_enqueue_scripts','vform_admin_enqueue_scripts');

	function vform_admin_enqueue_scripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'vform_dev_style', VFORM_PLUGIN_URL . 'assets/css/style.css', array(), '3.0.2', 'all' );
		wp_enqueue_style('vform_dev_style2', VFORM_PLUGIN_URL."assets/css/fontawesome.css");
		wp_enqueue_script('vform_dev_script', VFORM_PLUGIN_URL."assets/js/custom.js", array(),'3.0.2',false);
		// wp_enqueue_script('vform_dev_script2', VFORM_PLUGIN_URL."assets/js/jquery-ui.min.js", array(),'3.0.2',false);
		wp_localize_script('vform_dev_script','ajax_object',admin_url("admin-ajax.php"));
	}

	//ADMIN MENU
	add_action('admin_menu','vform_plugin_menu');
	function vform_plugin_menu(){

		add_menu_page('Vform','Vform','manage_options','vform','vform_options_func',$icon_url=VFORM_PLUGIN_URL."assets/images/vform-icon1.svg",$position=null);
		add_submenu_page('vform','Entries','Entries','manage_options','vform_entries','entries_options_func');

	}

	function vform_options_func(){
		// include VFORM_PLUGIN_PATH."inc/vformadmin.php";		
		wp_enqueue_style( 'vform_dev_style1', VFORM_PLUGIN_URL . 'assets/css/admin-dashboard.css', array(), '3.0.2', 'all' );

		include VFORM_PLUGIN_PATH."inc/admin-dashboard.php";		
	}

	function entries_options_func(){
			include VFORM_PLUGIN_PATH."inc/admin/entries.php";
		wp_enqueue_style( 'vform_dev_style_entries', VFORM_PLUGIN_URL . 'assets/css/admin-entries.css', array(), '3.0.2', 'all' );

	}

	add_filter('plugin_action_links', 'vform_plugin_action_links', 10, 2); 
	function vform_plugin_action_links($links, $file) {
		static $this_plugin;

		if (!$this_plugin) {
			$this_plugin = plugin_basename(__FILE__);
		}

		// check to make sure we are on the correct plugin
		if ($file == $this_plugin) {
			// Change "Settings" to whatever you want
			$settings_text = 'Create VForm';
			// the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
			$settings_link = '<a href="' . get_admin_url(null, 'admin.php?page=vform') . '">' . $settings_text . '</a>';
			// add the link to the list
			array_unshift($links, $settings_link);
		}

		return $links;
	}

	add_filter('plugin_row_meta', 'our_plugin_row_meta', 10, 2);
	function our_plugin_row_meta($plugin_meta, $plugin_file) {
		// The plugin file of your plugin
		$this_plugin = plugin_basename(__FILE__);

		// Check if the current plugin is your plugin
		if ($plugin_file === $this_plugin) {
			// Add your "Donate" link to the plugin row meta
			$donate_link = '<a href="https://paypal.me/VikasRatudi" target="_blank">Donate</a>';
			// Insert the "Donate" link after the author and before "View Details"
			array_splice($plugin_meta, 1, 0, $donate_link);
		}

		return $plugin_meta;
	}


	add_action('init', 'vform_init');

	function vform_init(){
		add_shortcode('vform','vform_my_shortcode');
		add_shortcode('vform_userdetails','vform_userde');
	}

	function vform_userde($atts){

		$getid = $_GET['id'];

		if($getid!=''){

			
			global $wpdb;

			$getid = intval($getid); // Assuming id is an integer
			$query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id = %d";
			$fetfrm = $wpdb->get_results($wpdb->prepare($query, $getid), OBJECT);

			// $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id='".$getid."'", OBJECT );   


				echo '<style>
				#frm-alt-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
    text-align: left;
    max-width: 800px;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
}
	#frm-alt-table th{
	text-transform:capitalize;
	}
    #frm-alt-table th, #frm-alt-table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    #frm-alt-table th {
        background-color: #f2f2f2;
    }
				</style>
				<div id="vf_postbox"><table cellspacing="0" id="frm-alt-table"><tbody>';

				foreach ($fetfrm as $v => $f) {
					$dataArray = json_decode($f->maindatabody);
					foreach ($dataArray as $key => $value) {
						if (!empty($value)) {
							$parts = explode('__', $key);
							if ($parts[1]) {
								$subParts = explode('~', $parts[1]);
							} else {
								$subParts = $parts;
							}
							$header = str_replace('~', ' ', $subParts);
							$valueString = implode(' ', $value);
							echo '<tr><th>' . implode(" ", $header) . '</th><td>' . $valueString . '</td></tr>';
						}
					}
				}

				echo '</tbody></table></div>';


		}
		
	}

	// userdetails
	function vform_my_shortcode($atts){

		$atts = shortcode_atts(array(
			'id' => '',
		), $atts, 'vform');

		ob_start();
		include VFORM_PLUGIN_PATH."inc/vformstructure.php";
		return ob_get_clean();
	}

	// form save

	function vformchkretundata($vfmvl){
		if($vfmvl=='{admin_email}'){
			return $vfmvl;
		}else if(substr($vfmvl,0, 6)=='{email'){
			return $vfmvl;
		}else{
			return sanitize_email($vfmvl);
		}
	}

	add_action('wp_ajax_myvformsave','myvformsave');

	function myvformsave(){
		if($_REQUEST['param']=='save_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform';
			$data = array(
			"formname"=>sanitize_text_field($_REQUEST['formname']),
				"formdescription"=>sanitize_text_field($_REQUEST['formdescription']),
				"formbody"=>sanitize_text_field( htmlentities($_REQUEST['formbody'])),
				"confirmation"=>sanitize_text_field($_REQUEST['selectedinfo']),
				"confirmation_value"=>sanitize_text_field( htmlentities($_REQUEST['wherego'])),
				"status"=>sanitize_text_field($_REQUEST['formstatus']),
				"notification_mode"=>sanitize_text_field($_REQUEST['notification_mode']),
			);

			$edtid = sanitize_text_field($_REQUEST['editid']);
			$where = array( 'id' => $edtid);
			$wpdb->update($table, $data,$where);
			echo json_encode(array("status"=>1,"message"=>"Data update successful","id"=>esc_html($edtid)));

		}
		wp_die();

	}

	// form save

	// create form

	add_action('wp_ajax_myvformcreate','myvformcreate');

	function myvformcreate(){
		if($_REQUEST['param']=='create_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform';
			$data = array(
				"formname"=>"Untitled Form",
				"formdescription"=>"",
				"formbody"=> "&lt;div class=\&quot;form-all vform-mainfields-inside\&quot;&gt; &lt;/div&gt;",
				"confirmation"=> "message",
				"confirmation_value"=> "Thanks for contacting us! We will be in touch with you shortly.",
				"status"=> "true",
				"notification_mode"=> "1",
				"send_to"=> "",
				"email_subject"=> "New Entry",
				"from_name"=> "Admin",
				"from_email"=> "{admin_email}",
				"reply_to"=> "",
				"message"=> "{all_fields}"

			);
			$wpdb->insert($table, $data);

			$getid = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform ORDER BY id DESC LIMIT 1", OBJECT );

			foreach ( $getid as $keyid=>$valueid ) {
				$idget = $getid[$keyid]->id;
			}
			echo json_encode(array("status"=>1,"message"=>"create successful","id"=>esc_html($idget)));
		}
		wp_die();

	}

	// create form

	//for delete
	
	add_action('wp_ajax_myvformdelete','myvformdelete');

	function myvformdelete(){
		if($_REQUEST['param']=='save_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);
			echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
		}
		wp_die();

	}

	//for delete

	//clone form

	add_action('wp_ajax_myvformclone','myvformclone');

	function myvformclone(){
		if($_REQUEST['param']=='clone_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform';
			
			$id = intval($_REQUEST['id']); // Assuming id is an integer
			$query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
			$getid = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


			// $getid = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform where id='".$_REQUEST['id']."'", OBJECT );

			foreach ( $getid as $keyid=>$valueid ) {
				$data = array(
					"formname"=> $getid[$keyid]->formname.' copy',
					"formdescription"=>$getid[$keyid]->formdescription,
					"formbody"=> $getid[$keyid]->formbody,
					"confirmation"=> $getid[$keyid]->confirmation,
					"confirmation_value"=> $getid[$keyid]->confirmation_value,
					"status"=> $getid[$keyid]->status,
					"notification_mode"=> $getid[$keyid]->notification_mode,
					"send_to"=> $getid[$keyid]->send_to,
					"email_subject"=> $getid[$keyid]->email_subject,
					"from_name"=> $getid[$keyid]->from_name,
					"from_email"=> $getid[$keyid]->from_email,
					"reply_to"=> $getid[$keyid]->reply_to,
					"message"=> $getid[$keyid]->message
	
				);
			}

			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"clone successful"));

		}
		wp_die();

	}

	//clone form


	// fontend save

	add_action('wp_ajax_myvformfrontsave','myvformfrontsave');
	add_action('wp_ajax_nopriv_myvformfrontsave','myvformfrontsave');

	function vformgeneratearrformat($tags){
		if (is_array($tags)) {
			$tag = implode("~",$tags);
		}
		return sanitize_text_field($tag);
	}

	function vformgeneratearrformatemail($tags){
		// if (is_array($tags)) {
		// 			$tag = implode("~",$tags);
		// }
		return sanitize_email($tags);
	}

	function vformhtml_entity_decode($v1){
		foreach ($v1 as $key => $value) {
				$v1 .= $value[$key].",";
		}
		$v1 = rtrim($v1,",");
		return $v1;
	}

	function verify_recaptcha($recaptcha_response, $id) {
		
		global $wpdb;
		$id = intval($id); // Assuming id is an integer
		$query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
		$vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


		// $vfsec = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id = '{$id}'", OBJECT );
		foreach ( $vfsec as $key1=>$val1 ) {
			$secret_key = $val1->rec_secret_key==null ? '': $val1->rec_secret_key;
		}
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$recaptcha_response}");
		$response_body = wp_remote_retrieve_body($response);
		$result = json_decode($response_body);
	
		return $result->success;
	}

	function myvformfrontsave(){

		if(!isset($_REQUEST['vfm-nonce']) || !wp_verify_nonce($_REQUEST['vfm-nonce'],'myvformfrontsave') ){
			wp_send_json_error([
				'status'=>'0'
			]);
		}

		$valid = true;
		if($_REQUEST['recapthca']=='1'){
			$recaptcha_response = $_POST['g-recaptcha-response'];
			$is_valid = verify_recaptcha($recaptcha_response, $_REQUEST['formid']);

			if (!$is_valid) {
				$valid = false;
				wp_send_json_error([
					'status'=>'0'
				]);
			}
		}

		if($_REQUEST['param']=='save_vform' && $valid){

			$idd = 'multiplechoice'.sanitize_text_field($_REQUEST['formid']);
			$multiplechce = sanitize_text_field($_REQUEST[$idd]);

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_userinput';

			$formData = [];
			foreach ($_REQUEST as $key => $value) {
				if (!in_array($key, ['action', 'param', 'vfid', 'usertimetakes','browser','currentdate','currentdate_part2','timezone','vfm-nonce','_wp_http_referer','ip','formid','g-recaptcha-response','recapthca'])) {
					$formData[$key] = $value;
				}
			}

			$mainbodycnt = json_encode($formData);

			$data = array(
			"formid"=>sanitize_text_field($_REQUEST['formid']),

				"maindatabody"=>sanitize_text_field($mainbodycnt),
				"ip"=>sanitize_text_field($_REQUEST['ip']),
				"browser"=>sanitize_text_field($_REQUEST['browser']),
				"currentdate"=>sanitize_text_field($_REQUEST['currentdate']),
				"timezone"=>sanitize_text_field($_REQUEST['timezone']),
				"currentdate_part2"=>sanitize_text_field($_REQUEST['currentdate_part2']),
				"usertimetakes"=>sanitize_text_field($_REQUEST['usertimetakes']),
			);
			$wpdb->insert($table, $data);
			$inserted_id = $wpdb->insert_id;

			$ffmid = sanitize_text_field($_REQUEST['formid']);

			$ffmid = intval($ffmid); // Assuming id is an integer
			$query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
			$getdata = $wpdb->get_results($wpdb->prepare($query, $ffmid), OBJECT);


			// $getdata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id='".$ffmid."'", OBJECT );

					foreach ( $getdata as $keydata=>$valuedata ) {

						$vformid =  $valuedata->id;
						$data_conf1 = $valuedata->confirmation;
						$data_conf2 = $valuedata->confirmation_value;

						$mlsendinp1 = $valuedata->notification_mode;

						// $mlsendinp2 = $valuedata->send_to;
						// $mlsendinp3 = $valuedata->email_subject;
						// $mlsendinp4 = $valuedata->from_name;
						// $mlsendinp5 = $valuedata->from_email;
						// $mlsendinp6 = $valuedata->reply_to;
						// $mlsendinp7 = $valuedata->message;
					}


			if($mlsendinp1=='1'){

				function vform_set_content_type() {
					return "text/html";
				}
				add_filter( 'wp_mail_content_type','vform_set_content_type' );

				$formid = intval($vformid); // Assuming formid is an integer
				$query = "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid = %d ORDER BY id ASC";
				$getdatanotifi = $wpdb->get_results($wpdb->prepare($query, $formid), OBJECT);


			// $getdatanotifi = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid='".$vformid."' ORDER BY id ASC", OBJECT );
			$tst2 = array(); 
			foreach ( $getdatanotifi as $keydatanotifi=>$valuedatanotifi ) {

						$chkmode = $valuedatanotifi->mode;

						if($chkmode=='1'){


						$mlsendinp2 = $valuedatanotifi->send_to_email;
						$mlsendinp3 = $valuedatanotifi->subject;
						$mlsendinp4 = $valuedatanotifi->from_name;
						$mlsendinp5 = $valuedatanotifi->from_email;
						$mlsendinp6 = $valuedatanotifi->reply_to;
						$mlsendinp7 = $valuedatanotifi->message;


							$admin_email = get_option( 'admin_email' );
							if($mlsendinp2==''){
								$mlsendinp2='{admin_email}';
							}

							if($mlsendinp2=='{admin_email}'){
								$to = $admin_email;
							}else if(substr($mlsendinp2,0, 6)=='{email'){

								// foreach ($formData as $key => $value) {
								// 	if($key==$mlsendinp2){
								// 		$to = vformgeneratearrformatemail($value);
								// 	}
								// }

								foreach ($formData as $key => $value) {
									// Handle array values by converting them to a comma-separated string
									$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
									// Define the placeholder format
									$placeholder = '{' . $key . '[]' . '}';
									// Replace the placeholder with the actual value
									if($placeholder == $mlsendinp2){
										$to = str_replace($placeholder, $formattedValue, $mlsendinp2);
									}
								}

								$to = vformgeneratearrformatemail($to);


							}else{
								$to = $mlsendinp2;
							}

							$subject = $mlsendinp3;
							$message ="";
							if(substr($mlsendinp5,0, 6)=='{email'){


								// foreach ($formData as $key => $value) {
								// 	if($key==$mlsendinp5){
								// 		$to2 = vformgeneratearrformatemail($value);
								// 	}
								// }

								foreach ($formData as $key => $value) {
									// Handle array values by converting them to a comma-separated string
									$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
									// Define the placeholder format
									$placeholder = '{' . $key . '[]' . '}';
									// Replace the placeholder with the actual value
									if($placeholder == $mlsendinp5){
										$to2 = str_replace($placeholder, $formattedValue, $mlsendinp5);
									}
								}

								$to2 = vformgeneratearrformatemail($to2);
								// $a2 = str_replace(array('{', '}'), '', $mlsendinp5);
								// $to2 = vformgeneratearrformatemail($_REQUEST[$a2]);


							}else{
								$to2 = "info@".substr(get_site_url(),8);
							}
							$headers = 'From: '.$mlsendinp4.' <'.$to2.'>';

							if($mlsendinp7=='{all_fields}'){


								foreach ($formData as $key => $value) {
									$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
									$key_main = explode('__',$key);
									if(count($key_main)!=1){
										$key = $key_main[1];
									}
									$key = str_replace('~', ' ', $key);
									$message .= "$key: $formattedValue<br>";
								}

								

							}else if(strpos($mlsendinp7, '{') !== false){


								foreach ($formData as $key => $value) {
									// Handle array values by converting them to a comma-separated string
									$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
									// Define the placeholder format
									$placeholder = '{' . $key . '[]' . '}';
									// Replace the placeholder with the actual value
									$mlsendinp7 = str_replace($placeholder, $formattedValue, $mlsendinp7);
								}


									// Handle {all_fields} placeholder
									if (strpos($mlsendinp7, '{all_fields}') !== false) {
										$allFields = '';

										foreach ($formData as $key => $value) {
											$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
											$key_main = explode('__',$key);
											if(count($key_main)!=1){
												$key = $key_main[1];
											}
											$key = str_replace('~', ' ', $key);
											$allFields .= "$key: $formattedValue<br>";
										}

										$message = str_replace('{all_fields}', nl2br($allFields), $mlsendinp7);


									}else{
										
										foreach ($formData as $key => $value) {
											// Handle array values by converting them to a comma-separated string
											$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
											// Define the placeholder format
											$placeholder = '{' . $key . '[]' . '}';
											// Replace the placeholder with the actual value
											$mlsendinp7 = str_replace($placeholder, $formattedValue, $mlsendinp7);
										}

										$message = $mlsendinp7;

									}
								
								
								

							}else{

								foreach ($formData as $key => $value) {
									$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
									$key_main = explode('__',$key);
									if(count($key_main)!=1){
										$key = $key_main[1];
									}
									$key = str_replace('~', ' ', $key);
									$message .= "$key: $formattedValue<br>";
								}
								
							}
							

							$tst = wp_mail( $to, $subject, $message, $headers, array() );
							$tst2[] = array($to,$subject,$message,$headers);

							


						}
						// chkmode

					}


				}


			// echo json_encode(array("status"=>1,"message"=>"Data inserted successful","confirmation"=>esc_html($data_conf1),"confirmation_value"=>esc_html($data_conf2),"mailsent"=>esc_html($tst),"mailgo"=>esc_html($tst2),'fulldata'=>$_REQUEST  ));
			echo json_encode(array("status"=>1,"message"=>"Data inserted successful","confirmation"=>esc_html($data_conf1),"confirmation_value"=>esc_html($data_conf2),"inserted_id"=>$inserted_id,"bl"=>$formData,"mailgo"=>$tst2 ));
		}
		wp_die();

	}

	// formfront save


	
	add_action('wp_ajax_myvformsend','myvformsend');

	function myvformsend(){
		if($_REQUEST['param']=='save_vform'){

			$to = 'vforminfo@gmail.com';
			$admin_email = get_option( 'admin_email' );
			$where = substr(get_site_url(),8);
			$headers[] = 'From: Wordpress <info@'.$where.'>';
			$subject  = 'Subscription For VFORM';
			$message .= 'Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

			function vform_set_content_type(){
				return "text/html";
			}
			add_filter( 'wp_mail_content_type','vform_set_content_type' );

			$tst = wp_mail( $to, $subject, $message, $headers, array() );

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vfsubscr';
			$data = array(
			"subscription"=>1
			);
			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}


	// send test email


	
	add_action('wp_ajax_myvformsendtestemail','myvformsendtestemail');

	function myvformsendtestemail(){
		if($_REQUEST['param']=='save_vform'){

			$to = $_REQUEST['email'];
			$admin_email = get_option( 'admin_email' );
			$where = substr(get_site_url(),8);
			$headers[] = 'From: Wordpress <info@'.$where.'>';
			$subject  = 'Test email from VFORM';
			$message .= 'Hey Admin<br>
			You have receive email successfully.
			Enjoy VFORM';

			function vform_set_content_type(){
				return "text/html";
			}
			add_filter( 'wp_mail_content_type','vform_set_content_type' );

			$tst = wp_mail( $to, $subject, $message, $headers, array() );

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}


	
	// donate
	add_action('wp_ajax_myvformdonate','myvformdonate');

	function myvformdonate(){
		if($_REQUEST['param']=='save_vform'){

			$to = 'vforminfo@gmail.com';
			$admin_email = get_option( 'admin_email' );
			$where = substr(get_site_url(),8);
			$headers[] = 'From: Wordpress <info@'.$where.'>';
			$subject  = 'Donate click';
			$message .= 'Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

			function vform_set_content_type(){
				return "text/html";
			}
			add_filter( 'wp_mail_content_type','vform_set_content_type' );

			$tst = wp_mail( $to, $subject, $message, $headers, array() );

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}


	add_action('wp_ajax_myvformconversion','myvformconversion');
	add_action('wp_ajax_nopriv_myvformconversion','myvformconversion');

	function myvformconversion(){
		if($_REQUEST['param']=='save_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_fields';
			$ip = sanitize_text_field($_REQUEST['ip']);

			// Check if the IP already exists in the table
			$existing_ip = $wpdb->get_var($wpdb->prepare("SELECT ip FROM $table WHERE ip = %s", $ip));

			if (!$existing_ip) {
				// IP doesn't exist in the table, proceed with insertion
				$data = array(
					"formid" => sanitize_text_field($_REQUEST['vfid']),
					"ip" => $ip
				);
				$wpdb->insert($table, $data);
			}

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}


	//for delete entries
	
	add_action('wp_ajax_myvformentriedel','myvformentriedel');

	function myvformentriedel(){
		if($_REQUEST['param']=='del_entries'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_userinput';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);
			echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
		}
		wp_die();

	}

	//for delete entries


	// donate
	add_action('wp_ajax_myvformneedinte','myvformneedinte');

	function myvformneedinte(){
		if($_REQUEST['param']=='integrate_vform'){

			$data = sanitize_text_field($_REQUEST['data']);
			$to = 'vforminfo@gmail.com';
			$admin_email = get_option( 'admin_email' );
			$where = substr(get_site_url(),8);
			$headers[] = 'From: Wordpress <info@'.$where.'>';
			$subject  = 'Need integration';
			$message .= 'Data: '.$data.' <br> Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

			function vform_set_content_type(){
				return "text/html";
			}
			add_filter( 'wp_mail_content_type','vform_set_content_type' );

			$tst = wp_mail( $to, $subject, $message, $headers, array() );

			echo json_encode(array("status"=>1,"message"=>"Success!"));
		}
		wp_die();

	}

	// notification create
	add_action('wp_ajax_createmynotifi','createmynotifi');

	function createmynotifi(){
		if($_REQUEST['param']=='notifi_vform'){


			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_notifications';
			$data = array(
				"formid"=>sanitize_text_field($_REQUEST['formid']),
				"action_name"=>"Send Email",
				"send_to_email"=> "",
				"from_name"=> "Admin",
				"from_email"=> "{admin_email}",
				"reply_to"=> "",
				"subject"=> "New Entry",
				"message"=> "{all_fields}",
				"mode"=> "0",
				"dropdown"=> "1"

			);
			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"Success!"));
		}
		wp_die();

	}

	// notification delete
	add_action('wp_ajax_deletemynotifi','deletemynotifi');

	function deletemynotifi(){
		if($_REQUEST['param']=='notifi_vform'){


			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_notifications';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);

			echo json_encode(array("status"=>1,"message"=>"Success!"));
		}
		wp_die();

	}


	// notification save
	add_action('wp_ajax_savemynotifi','savemynotifi');

	function savemynotifi(){
		if($_REQUEST['param']=='notifi_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform_notifications';
			$data = array(
				"action_name"=>sanitize_text_field($_REQUEST['action_name']),
				"send_to_email"=>vformchkretundata($_REQUEST['email_to']),
				"from_name"=>sanitize_text_field( $_REQUEST['from_name']),
				"from_email"=>vformchkretundata($_REQUEST['from_email']),
				"subject"=>sanitize_text_field( $_REQUEST['email_subject']),
				"message"=>htmlspecialchars($_REQUEST['email_message']),
				"reply_to"=>vformchkretundata($_REQUEST['replyto']),
				"mode"=>sanitize_text_field($_REQUEST['vf_mode']),
				"dropdown"=>sanitize_text_field($_REQUEST['vf_dropdown']),
			);

			$edtid = sanitize_text_field($_REQUEST['notifiid']);
			$where = array( 'id' => $edtid);
			$wpdb->update($table, $data,$where);
			

			echo json_encode(array("status"=>1,"message"=>"Success!"));
		}
		wp_die();

	}

	// security save
	add_action('wp_ajax_savesecurity','savesecurity');

	function savesecurity(){
		if($_REQUEST['param']=='secure_vform'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'vform';
			$data = array(
				"security_type"=>sanitize_text_field( $_REQUEST['which']),
				"rec_site_key"=>sanitize_text_field( $_REQUEST['key1']),
				"rec_secret_key"=>sanitize_text_field($_REQUEST['key2']),
				"hcap_site_key"=>sanitize_text_field($_REQUEST['key11']),
				"hcap_secret_key"=>sanitize_text_field($_REQUEST['key22']),
			);

			$edtid = sanitize_text_field($_REQUEST['id']);
			$where = array( 'id' => $edtid);
			$wpdb->update($table, $data,$where);
			

			echo json_encode(array("status"=>1,"message"=>"Success!"));
		}
		wp_die();

	}
	