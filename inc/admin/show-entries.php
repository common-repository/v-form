<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;

if ( isset($_GET['id']) ) {
    $id = $_GET['id'];  // Get the raw input
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        // If found, exit the condition or display an error message
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id ); // Sanitize the input
    $id = esc_html( $id );
  }
  

$getid = $id;

if($getid!=''){

    // $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id='".$getid."'", OBJECT );   

    $id = intval($getid); // Assuming `id` is an integer
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id = %d";
    $fetfrm = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


    foreach ( $fetfrm as $v=>$f ) {
        $ip = $f->ip;
        $browser = $f->browser;
        $currentdate = $f->currentdate;

        $tmtake = stripslashes($f->usertimetakes);
        $objvform = json_decode(html_entity_decode(esc_html($tmtake)), true);
        $fulltimetkvform =$objvform['minute'] . " Minute " . $objvform['second']." Seconds";

    }


?>
<div id="form_show_entry_page" class="frm_wrap frm_single_entry_page">

    <div id="frm-publishing">			
        <a href="admin.php?page=vform_entries" class="button button-secondary frm-button-secondary">
            Back to Entries			
        </a>
    </div>

    <div>

        <div class="columns-2">

            <div id="post-body-content" class="frm-fields">

                <div class="wrap frm-with-margin frm_form_fields">
                    <div class="postbox">


                        <table cellspacing="0" class="frm-alt-table">
                            <tbody>
                               <?php
                               
                                foreach ( $fetfrm as $v=>$f ) {
                                    $dataArray = json_decode($f->maindatabody);
                                    // print_r($dataArray);
                                    foreach ($dataArray as $key => $value) {
                                        if (!empty($value)) {
                                            
                                            $parts = explode('__', $key);
                                                
                                            if($parts[1]){
                                                $subParts = explode('~', $parts[1]);
                                            }else{
                                                $subParts = $parts;
                                            }
                                            $header = str_replace('~', ' ', $subParts);

                                            $valueString = implode(' ', $value);

                                            echo '<tr><th>' . implode(" ",$header) . '</th><td>' . $valueString . '</td></tr>';


                                        }
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="frm-right-panel">


                <div class="frm_with_icons">
                    <h3>
                        Entry Details </h3>
                    <div class="inside">

                        <div class="misc-pub-section">
                            <svg fill="#000000" width="20" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M266.815 537.708c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.775 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zM266.815 679.347c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.775 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zM266.815 820.988c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.775 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zm182.77 0c0 22.62-18.34 40.96-40.96 40.96s-40.96-18.34-40.96-40.96 18.34-40.96 40.96-40.96 40.96 18.34 40.96 40.96zM228.18 81.918v153.6c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48v-153.6c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48zm528.09 0v153.6c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48v-153.6c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"/><path d="M890.877 137.517c33.931 0 61.44 27.509 61.44 61.44v703.375c0 33.931-27.509 61.44-61.44 61.44h-757.76c-33.931 0-61.44-27.509-61.44-61.44V198.957c0-33.931 27.509-61.44 61.44-61.44h757.76zm-757.76 40.96c-11.309 0-20.48 9.171-20.48 20.48v703.375c0 11.309 9.171 20.48 20.48 20.48h757.76c11.309 0 20.48-9.171 20.48-20.48V198.957c0-11.309-9.171-20.48-20.48-20.48h-757.76z"/><path d="M575.03 338.288c0-33.93-27.51-61.44-61.44-61.44s-61.44 27.51-61.44 61.44c0 33.93 27.51 61.44 61.44 61.44s61.44-27.51 61.44-61.44zm40.96 0c0 56.551-45.849 102.4-102.4 102.4s-102.4-45.849-102.4-102.4c0-56.551 45.849-102.4 102.4-102.4s102.4 45.849 102.4 102.4z"/></svg> <span id="timestamp">
                                Submitted: <b><?php echo $currentdate; ?></b> </span>
                        </div>
                        <div class="misc-pub-section">
                        <svg fill="#000000" width="20" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><path d="M24,12a1,1,0,0,1-2,0A10.011,10.011,0,0,0,12,2a1,1,0,0,1,0-2A12.013,12.013,0,0,1,24,12Zm-8,1a1,1,0,0,0,0-2H13.723A2,2,0,0,0,13,10.277V7a1,1,0,0,0-2,0v3.277A1.994,1.994,0,1,0,13.723,13ZM1.827,6.784a1,1,0,1,0,1,1A1,1,0,0,0,1.827,6.784ZM2,12a1,1,0,1,0-1,1A1,1,0,0,0,2,12ZM12,22a1,1,0,1,0,1,1A1,1,0,0,0,12,22ZM4.221,3.207a1,1,0,1,0,1,1A1,1,0,0,0,4.221,3.207ZM7.779.841a1,1,0,1,0,1,1A1,1,0,0,0,7.779.841ZM1.827,15.216a1,1,0,1,0,1,1A1,1,0,0,0,1.827,15.216Zm2.394,3.577a1,1,0,1,0,1,1A1,1,0,0,0,4.221,18.793Zm3.558,2.366a1,1,0,1,0,1,1A1,1,0,0,0,7.779,21.159Zm14.394-5.943a1,1,0,1,0,1,1A1,1,0,0,0,22.173,15.216Zm-2.394,3.577a1,1,0,1,0,1,1A1,1,0,0,0,19.779,18.793Zm-3.558,2.366a1,1,0,1,0,1,1A1,1,0,0,0,16.221,21.159Z"/></svg>
                            <span id="timestamp">
                                User Time Take: <b><?php echo $fulltimetkvform; ?></b> </span>
                        </div>

                    </div>
                </div>

                <div class="frm_with_icons">
                    <h3>User Information</h3>
                    <div class="inside">

                        <div class="misc-pub-section">
                        <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11L11 13L15 9M19 10.2C19 14.1764 15.5 17.4 12 21C8.5 17.4 5 14.1764 5 10.2C5 6.22355 8.13401 3 12 3C15.866 3 19 6.22355 19 10.2Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg> IP Address: <b><?php echo $ip; ?></b>
                        </div>

                        <div class="misc-pub-section">
                        <svg width="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-256.000000, -671.000000)" fill="#000000">
                                    <path d="M265,675 C264.448,675 264,675.448 264,676 C264,676.553 264.448,677 265,677 C265.552,677 266,676.553 266,676 C266,675.448 265.552,675 265,675 L265,675 Z M269,675 C268.448,675 268,675.448 268,676 C268,676.553 268.448,677 269,677 C269.552,677 270,676.553 270,676 C270,675.448 269.552,675 269,675 L269,675 Z M286,679 L258,679 L258,675 C258,673.896 258.896,673 260,673 L284,673 C285.104,673 286,673.896 286,675 L286,679 L286,679 Z M286,699 C286,700.104 285.104,701 284,701 L260,701 C258.896,701 258,700.104 258,699 L258,681 L286,681 L286,699 L286,699 Z M284,671 L260,671 C257.791,671 256,672.791 256,675 L256,699 C256,701.209 257.791,703 260,703 L284,703 C286.209,703 288,701.209 288,699 L288,675 C288,672.791 286.209,671 284,671 L284,671 Z M261,675 C260.448,675 260,675.448 260,676 C260,676.553 260.448,677 261,677 C261.552,677 262,676.553 262,676 C262,675.448 261.552,675 261,675 L261,675 Z" id="browser" sketch:type="MSShapeGroup">

                        </path>
                                </g>
                            </g>
                        </svg> Browser/OS: <b><?php echo $browser; ?></b>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="frm-admin-footer-links">
        <span class="frm-admin-footer-links-text">Feel free to support ❤</span>
        <div class="frm-admin-footer-links-nav">
                <a href="https://paypal.me/VikasRatudi" class='vform-donate' target="_blank">Donate</a>
        </div>
    </div>


</div>

<?php  } ?>