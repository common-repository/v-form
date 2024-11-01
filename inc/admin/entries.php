<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;


if ( isset($_GET['select']) ) {
    $id = $_GET['select'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }

  if ( isset($_GET['frm_action']) ) {
    $frm_action = $_GET['frm_action'];
  
    if ( strpos($frm_action, '<script>') !== false || strpos($frm_action, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $frm_action = sanitize_text_field( $frm_action );
    $frm_action = esc_html( $frm_action );
  }
  


if($frm_action=='show'){
    include VFORM_PLUGIN_PATH."inc/admin/show-entries.php";
}else{

?>
    <div class="wrap" id="vform_entries">

    <?php

        $chk = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform", OBJECT );  

       if(count($chk)==0){
        echo '<b class="createfirst">Create your Vform for getting entries</b>';
       }else{

    ?>

        <form id="posts-filter" method="get">

            <input type="hidden" name="page" value="vform_entries">
                <div class="clear"></div>
                <div class="tablenav top">

                    <div class="alignleft actions bulkactions">
                    </div>
                    <?php 
                        $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform ORDER BY id DESC", OBJECT );   
                    ?>
                    <div class="alignleft actions"> <select name="select"
                            id="form" fdprocessedid="xa3c2b">
                            <option value="">- View all forms -</option>
                            <?php 
                            foreach ( $fetfrm as $v=>$f ) {

                                $count = $wpdb->get_var(
                                    $wpdb->prepare(
                                        "SELECT COUNT(*) FROM {$wpdb->prefix}vform_userinput WHERE formid = %d",
                                        $f->id
                                    )
                                );
                                
                                if ($count == null) {
                                    $count = 0;
                                }



                                    $sel = $id == $f->id ? 'selected' : '';
                                    echo '<option '. $sel .' value="'.$f->id.'">'.$f->formname.' | Entries ('.$count.')</option>';
                                }
                            ?>
                        </select>
                        <input type="submit" id="post-query-submit" class="button filter_action action" value="Filter"
                            fdprocessedid="ptu12"></div>
                    <!-- <div class="tablenav-pages"><span class="displaying-num">44 items</span>
                        <span class="pagination-links"><span class="tablenav-pages-navspan button disabled"
                                aria-hidden="true">«</span>
                            <span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
                            <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current
                                    Page</label><input class="current-page" id="current-page-selector" type="text" name="paged"
                                    value="1" size="1" aria-describedby="table-paging" fdprocessedid="kjz0t"> of <span
                                    class="total-pages">3</span></span>
                            <a class="button next-page"
                                href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;paged=2"><span
                                    class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
                            <a class="button last-page"
                                href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;paged=3"><span
                                    class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
                    </div> -->
                    <br class="clear">
                </div>
                <table class="wp-list-table widefat fixed striped formidable_page_formidable-entries">
                    <thead>
                        <tr>
                            <th scope="col" id="0_id" class="manage-column column-0_id column-primary sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=id&amp;order=asc"><span>S. No</span><span
                                        class="sorting-indicator"></span></a></th>
                            <th scope="col" id="0_item_key" class="manage-column column-0_item_key hidden sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=item_key&amp;order=asc"><span>Entry
                                        Key</span><span class="sorting-indicator"></span></a></th>
                            <th scope="col" id="0_form_id" class="manage-column column-0_form_id">Form</th>
                            <th scope="col" id="0_name" class="manage-column column-0_name">Entry Name</th>
                            <th scope="col" id="0_user_id" class="manage-column column-0_user_id">Email</th>
                            <th scope="col" id="0_is_draft" class="manage-column column-0_is_draft sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=is_draft&amp;order=asc"><span>Entry
                                        Time Take</span><span class="sorting-indicator"></span></a></th>
                            <th scope="col" id="0_created_at" class="manage-column column-0_created_at sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=created_at&amp;order=asc"><span>Entry
                                        creation date</span><span class="sorting-indicator"></span></a></th>
                            <!-- <th scope="col" id="0_updated_at" class="manage-column column-0_updated_at sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=updated_at&amp;order=asc"><span>Entry
                                        update date</span><span class="sorting-indicator"></span></a></th> -->
                            <th scope="col" id="0_ip" class="manage-column column-0_ip sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=ip&amp;order=asc"><span>IP</span><span
                                        class="sorting-indicator"></span></a></th>
                        </tr>
                    </thead>

                    <tbody id="the-list">

                    <?php

                        function getValueByKeyword($array, $keyword) {
                            foreach ($array as $key => $value) {
                                $parts = explode('__', $key);
                                if (count($parts) > 1 && $parts[0] === $keyword) {
                                    return $value;
                                }
                            }
                            return null;
                        }


                        $getvfid = $id;
                        if($getvfid!=''){
                            $setdata = "WHERE formid='".$getvfid."'";
                        }else{
                            $setdata = '';
                        }
                        // $vformdata2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput ".$setdata." ORDER BY id DESC", OBJECT );

                        $query = "SELECT * FROM {$wpdb->prefix}vform_userinput %s ORDER BY id DESC";
                        $prepared_query = $wpdb->prepare($query, $setdata);
                        $vformdata2 = $wpdb->get_results($prepared_query, OBJECT);

                        foreach ( $vformdata2 as $keyone2=>$valueone2 ) {
                            // echo "<pre>";
                            // print_r($valueone2);

                            $dataObject = json_decode($valueone2->maindatabody);
                            // print_r($dataObject);

                            $fname = getValueByKeyword($dataObject, 'name');
                            $firstname = $fname[0];
                            $lastname = $fname[2];

                            $getemail = getValueByKeyword($dataObject, 'email');

                            $email = $getemail[0];
                            
                            $ip = $valueone2->ip;
                            $entrydate = $valueone2->currentdate; 

                            $form_id = intval($valueone2->formid); // Assuming formid is an integer
                            $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
                            $mainform = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);


                            // $mainform = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id='$valueone2->formid'", OBJECT );
                            foreach ( $mainform as $k=>$v ) {
                                $formname = $v->formname;
                            }

                            $tmtake = stripslashes($valueone2->usertimetakes);
                            $objvform = json_decode(html_entity_decode(esc_html($tmtake)), true);
                            $fulltimetkvform =$objvform['minute'] . " Minute " . $objvform['second']." Seconds";


                    ?>

                        <tr id="item-action-44">
                            <td class="0_id column-0_id column-primary" data-colname="ID"><a
                                    href="?page=formidable-entries&amp;frm_action=show&amp;id=44" class="row-title"><?php echo $keyone2+1; ?></a>
                                <div class="row-actions"><span class="view"><a
                                            href="?page=vform_entries&frm_action=show&id=<?php echo $valueone2->id; ?>">View</a> |
                                    </span><span class="delete"><a
                                            href="javascript:void(0)" data-id="<?php echo $valueone2->id; ?>" class="makemyentrydel" >Delete</a></span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button>
                            </td>
                            <td class="0_item_key column-0_item_key frm_hidden" data-colname="Entry Key"></td>
                            <td class="0_form_id column-0_form_id" data-colname="Form"><a
                                    href="?page=vform_entries&frm_action=show&id=<?php echo $valueone2->id; ?>"><?php echo $formname; ?></a></td>
                            <td class="0_name column-0_name" data-colname="Entry Name"><?php echo $firstname.' '.$lastname; ?></td>
                            <td class="0_user_id column-0_user_id" data-colname="Created By"><?php echo $email; ?></td>
                            <td class="0_is_draft column-0_is_draft" data-colname="Entry Status"><span
                                    class="frm-entry-status frm-entry-status-0"><?php echo $fulltimetkvform; ?></span></td>
                            <td class="0_created_at column-0_created_at" data-colname="Entry creation date"><abbr
                                    title="<?php echo $entrydate; ?>"><?php echo $entrydate; ?></abbr></td>
                            <!-- <td class="0_updated_at column-0_updated_at" data-colname="Entry update date"><abbr
                                    title="May 15, 2024 at 5:16:52 AM">May 15, 2024 at 5:16 am</abbr></td> -->
                            <td class="0_ip column-0_ip" data-colname="IP"><?php echo $ip; ?></td>
                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="col" class="manage-column column-0_id column-primary sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=id&amp;order=asc"><span>S. No.</span><span
                                        class="sorting-indicator"></span></a></th>
                            <th scope="col" class="manage-column column-0_item_key hidden sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=item_key&amp;order=asc"><span>Entry
                                        Key</span><span class="sorting-indicator"></span></a></th>
                            <th scope="col" class="manage-column column-0_form_id">Form</th>
                            <th scope="col" class="manage-column column-0_name">Entry Name</th>
                            <th scope="col" class="manage-column column-0_user_id">Email</th>
                            <th scope="col" class="manage-column column-0_is_draft sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=is_draft&amp;order=asc"><span>Entry
                                        Time Take</span><span class="sorting-indicator"></span></a></th>
                            <th scope="col" class="manage-column column-0_created_at sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=created_at&amp;order=asc"><span>Entry
                                        creation date</span><span class="sorting-indicator"></span></a></th>
                            <!-- <th scope="col" class="manage-column column-0_updated_at sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=updated_at&amp;order=asc"><span>Entry
                                        update date</span><span class="sorting-indicator"></span></a></th> -->
                            <th scope="col" class="manage-column column-0_ip sortable desc"><a
                                    href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;orderby=ip&amp;order=asc"><span>IP</span><span
                                        class="sorting-indicator"></span></a></th>
                        </tr>
                    </tfoot>
                </table>

                <div class="tablenav bottom">

                    <div class="alignleft actions bulkactions">
                    </div>
                    <!-- <div class="tablenav-pages"><span class="displaying-num">44 items</span>
                        <span class="pagination-links"><span class="tablenav-pages-navspan button disabled"
                                aria-hidden="true">«</span>
                            <span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
                            <span class="screen-reader-text">Current Page</span><span id="table-paging" class="paging-input">1
                                of <span class="total-pages">3</span></span>
                            <a class="button next-page"
                                href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;paged=2"><span
                                    class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
                            <a class="button last-page"
                                href="https://simplicitycoachingllc.com/wp-admin/admin.php?page=formidable-entries&amp;paged=3"><span
                                    class="screen-reader-text">Last page</span><span aria-hidden="true">»</span></a></span>
                    </div> -->
                    <br class="clear">
                </div>
        </form>

        <?php } ?>

        <div class="frm-admin-footer-links">
            <span class="frm-admin-footer-links-text">Feel free to support ❤</span>
            <div class="frm-admin-footer-links-nav">
                <a href="https://paypal.me/VikasRatudi" class='vform-donate' target="_blank">Donate</a>
            </div>
        </div>

    </div>

<?php } ?>