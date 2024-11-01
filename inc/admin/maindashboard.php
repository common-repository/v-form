<div class="frm_wrap" id="vformadmin">

    <div id="frm_top_bar" class="frm_nav_bar">
        <a href="admin.php?page=vform" width="40" class="frm-header-logo">
        <img width="40" src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/vform-icon.svg">
        </a>

        <div class="frm_top_left">
            <h1>
                Vform </h1>
        </div>
        <ul class="frm_form_nav"></ul>
        <div id="frm-publishing"><a href="javascript:void(0)" class="button button-primary frm-button-primary frm-trigger-new-form-modal createmyvform">
                <img width="10" src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/plus.svg">

                 Add New</a>

        </div>
    </div>
    <div class="wrap">

        <form id="posts-filter">
            <table class="wp-list-table widefat fixed striped toplevel_page_formidable">
                <thead>
                    <tr>
                        <th scope="col" id="id" class="manage-column column-id sortable desc"><a
                                href="javascript:void(0)"><span>No.</span><span
                                    class="sorting-indicator"></span></a></th>
                        <th scope="col" id="name" class="manage-column column-name column-primary sortable desc"><a
                                href="javascript:void(0)"><span>Form
                                    Title</span><span class="sorting-indicator"></span></a></th>
                        <th scope="col" id="entries" class="manage-column column-entries">Entries</th>

                        <th scope="col" id="views" class="manage-column column-entries">Views</th>
                        <th scope="col" id="conversion" class="manage-column column-entries">Conversion</th>
                       
                        <th scope="col" id="shortcode" class="manage-column column-shortcode">Shortcode 
                            <a href="https://wordpress.com/support/wordpress-editor/blocks/shortcode-block/" target="_blank"><svg class="adjstsvg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" viewBox="0 0 30 30"><path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z"></path></svg></a></th>
                        <th scope="col" id="created_at" class="manage-column column-created_at sortable desc"><a
                                href="javascript:void(0)"><span>Last Update</span><span
                                    class="sorting-indicator"></span></a></th>
                    </tr>
                </thead>

                <tbody id="the-list">

                <?php
                    $vffrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform  ORDER by id DESC", OBJECT );

                    $views = $wpdb->get_results( "SELECT formid, COUNT(DISTINCT ip) AS distinct_ip_count FROM {$wpdb->prefix}vform_fields GROUP BY formid", OBJECT );

                    
                    $aab = $wpdb->get_results("SELECT 
                            formid,
                            submission_count,
                            distinct_ip_count,
                            (submission_count / distinct_ip_count) * 100 AS conversion_rate
                        FROM (
                            SELECT
                                f.formid,
                                (SELECT COUNT(DISTINCT u.ip COLLATE utf8mb4_general_ci)
                                FROM `{$wpdb->prefix}vform_userinput` u
                                WHERE u.formid = f.formid
                                AND u.ip IN (SELECT ip COLLATE utf8mb4_general_ci
                                                FROM `{$wpdb->prefix}vform_fields` f2
                                                WHERE f2.formid = f.formid
                                            )) AS submission_count,
                                (SELECT COUNT(DISTINCT f3.ip COLLATE utf8mb4_general_ci)
                                FROM `{$wpdb->prefix}vform_fields` f3
                                WHERE f3.formid = f.formid
                                ) AS distinct_ip_count
                            FROM
                                {$wpdb->prefix}vform_fields f
                            GROUP BY
                                f.formid
                        ) AS subquery", OBJECT );


                    if(count($vffrm)==0){
                        echo "<tr><td colspan='7' style='text-align:center; font-weight:bold; text-decoration:underline;'><a class='createmyvform' href='javascript:void(0)'>Create Your Vform now</a></td></tr>";
                    }

                    foreach ( $vffrm as $keyfrm=>$valuefrm ) {
                      $date = strtotime($vffrm[$keyfrm]->datesubmit);
                      $formattedDate = date('F j, Y', $date);
                      $mainid = $vffrm[$keyfrm]->id;


                      $form_id = intval($vffrm[$keyfrm]->id); // Assuming formid is an integer
                    $query = "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = %d";
                    $sb = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);

                    //   $sb = $wpdb->get_results( "SELECT count(*) as cnt FROM {$wpdb->prefix}vform_userinput WHERE formid = '".$vffrm[$keyfrm]->id."'", OBJECT );

                    $vf_view = 0;
                    foreach ($views as $v => $b) {
                        if($b->formid==$vffrm[$keyfrm]->id){
                                $vf_view = $b->distinct_ip_count;
                        }
                    }

                    $vf_conversion = 0;
                    foreach ($aab as $v => $b) {
                        if($b->formid==$vffrm[$keyfrm]->id){
                            $vf_conversion = $b->conversion_rate;
                        }
                    }




                     
                  ?>
                    <tr id="item-action-2">
                        <td class="id column-id" data-colname="ID"><?php echo $keyfrm+1; ?></td>
                        <td class="name column-name post-title page-title column-title column-primary"
                            data-colname="Form Title">
                            <strong><a href="admin.php?page=vform&id=<?php echo $mainid; ?>"
                                    class="row-title"><?php echo $vffrm[$keyfrm]->formname; ?></a></strong>
                                    <?php echo $vffrm[$keyfrm]->formdescription; ?>
                            <div class="row-actions"><span class="frm_edit"><a
                            href="admin.php?page=vform&id=<?php echo $mainid; ?>">Edit</a>
                                    | </span><span class="frm_settings"><a
                                        href="admin.php?page=vform_entries&select=<?php echo $mainid; ?>">Entries</a> |
                                </span><span class="duplicate"><a
                                        href="javascript:void(0)" data-id="<?php echo $mainid; ?>"
                                        class="frm-trash-link clonevform">Duplicate Form</a> | </span><span class="trash"><a
                                        data-id="<?php echo $mainid; ?>"
                                        href="javascript:void(0)"
                                        class="frm-trash-link delvform" data-id="<?php echo $mainid; ?>">Delete</a> </span></div><button type="button"
                                class="toggle-row"><span class="screen-reader-text">Show more details</span></button>
                        </td>
                        <td class="entries column-entries" data-colname="Entries"><a
                                href="admin.php?page=vform_entries&select=<?php echo $mainid; ?>">                     
                                <?php echo $sb[0]->cnt; ?></a>
                        </td>

                        <td class="entries column-entries" data-colname="Key"><?php echo $vf_view; ?></td>
                        <td class="entries column-entries" data-colname="Key"><?php echo round($vf_conversion, 2); ?>%</td>
                        
                        <td class="shortcode column-shortcode" data-colname="Actions">
                            <div>[vform id="<?php echo $mainid; ?>"] </div>
                        </td>
                        <td class="created_at column-created_at" data-colname="Date"><abbr><?php echo $formattedDate; ?></abbr></td>
                    </tr>
                    <?php
                    }
                  ?>

                </tbody>

                <tfoot>
                    <tr>
                        <th scope="col" class="manage-column column-name column-primary sortable desc"></th>
                        <th scope="col" class="manage-column column-entries"></th>
                        <th scope="col" class="manage-column column-id sortable desc"></th>
                        <th scope="col" class="manage-column column-form_key sortable desc"></th>
                        <th scope="col" class="manage-column column-shortcode"></th>
                        <th scope="col" class="manage-column column-created_at sortable desc"></th>
                    </tr>
                </tfoot>
            </table>
        </form>


        <div class="frm-admin-footer-links">
            <span class="frm-admin-footer-links-text">Feel free to support ❤	</span>

            <div class="frm-admin-footer-links-nav">
                <a href="https://paypal.me/VikasRatudi" class='vform-donate' target="_blank">Donate</a>
                <!-- <span>/</span> -->
                <!-- <a href="javascript:void(0)" target="_blank"> Send a Test Email</a> -->
                            <!-- <span>/</span> -->
                    <!-- <a href="https://formidableforms.com/lite-upgrade/" target="_blank">Upgrade</a> -->
                    </div>
        </div>

    </div>
</div>