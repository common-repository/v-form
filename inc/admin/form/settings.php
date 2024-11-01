<?php 
if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }
?>
      <div class="leftPanel" id="settingleft">
        <div class="fieldsPanel">
          <div class="settingsPanel">
            <div class="">
              <ul class="settingsPanel-list">
                <li><a class="navLink active vfsettingslink" data-id="1" id="general-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-settings panelIcon" name="settings">
                          <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.5699 18.5001V14.6001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.5699 7.45V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M15.57 12.65C17.0059 12.65 18.17 11.4859 18.17 10.05C18.17 8.61401 17.0059 7.44995 15.57 7.44995C14.134 7.44995 12.97 8.61401 12.97 10.05C12.97 11.4859 14.134 12.65 15.57 12.65Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.43005 18.5V16.55" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.43005 9.4V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M8.42996 16.5501C9.8659 16.5501 11.03 15.386 11.03 13.9501C11.03 12.5142 9.8659 11.3501 8.42996 11.3501C6.99402 11.3501 5.82996 12.5142 5.82996 13.9501C5.82996 15.386 6.99402 16.5501 8.42996 16.5501Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Form Settings</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Form Settings</span></div>
                            <div class="panelDesc">Customize form status and properties</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="2" id="emails-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-email panelIcon" name="email">
                        <svg  version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512"  xml:space="preserve">
                          <g>
                            <path class="st0" d="M510.746,110.361c-2.128-10.754-6.926-20.918-13.926-29.463c-1.422-1.794-2.909-3.39-4.535-5.009
                              c-12.454-12.52-29.778-19.701-47.531-19.701H67.244c-17.951,0-34.834,7-47.539,19.708c-1.608,1.604-3.099,3.216-4.575,5.067
                              c-6.97,8.509-11.747,18.659-13.824,29.428C0.438,114.62,0,119.002,0,123.435v265.137c0,9.224,1.874,18.206,5.589,26.745
                              c3.215,7.583,8.093,14.772,14.112,20.788c1.516,1.509,3.022,2.901,4.63,4.258c12.034,9.966,27.272,15.45,42.913,15.45h377.51
                              c15.742,0,30.965-5.505,42.967-15.56c1.604-1.298,3.091-2.661,4.578-4.148c5.818-5.812,10.442-12.49,13.766-19.854l0.438-1.05
                              c3.646-8.377,5.497-17.33,5.497-26.628V123.435C512,119.06,511.578,114.649,510.746,110.361z M34.823,99.104
                              c0.951-1.392,2.165-2.821,3.714-4.382c7.689-7.685,17.886-11.914,28.706-11.914h377.51c10.915,0,21.115,4.236,28.719,11.929
                              c1.313,1.327,2.567,2.8,3.661,4.272l2.887,3.88l-201.5,175.616c-6.212,5.446-14.21,8.443-22.523,8.443
                              c-8.231,0-16.222-2.99-22.508-8.436L32.19,102.939L34.823,99.104z M26.755,390.913c-0.109-0.722-0.134-1.524-0.134-2.341V128.925
                              l156.37,136.411L28.199,400.297L26.755,390.913z M464.899,423.84c-6.052,3.492-13.022,5.344-20.145,5.344H67.244
                              c-7.127,0-14.094-1.852-20.142-5.344l-6.328-3.668l159.936-139.379l17.528,15.246c10.514,9.128,23.922,14.16,37.761,14.16
                              c13.89,0,27.32-5.032,37.827-14.16l17.521-15.253L471.228,420.18L464.899,423.84z M485.372,388.572
                              c0,0.803-0.015,1.597-0.116,2.304l-1.386,9.472L329.012,265.409l156.36-136.418V388.572z"/>
                          </g>
                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Emails</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Emails</span></div>
                            <div class="panelDesc">Send autoresponders and notifications</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="3" id="thankyou-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-checkmark panelIcon" name="checkmark">
                          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M13.8179 4.54512L13.6275 4.27845C12.8298 3.16176 11.1702 3.16176 10.3725 4.27845L10.1821 4.54512C9.76092 5.13471 9.05384 5.45043 8.33373 5.37041L7.48471 5.27608C6.21088 5.13454 5.13454 6.21088 5.27608 7.48471L5.37041 8.33373C5.45043 9.05384 5.13471 9.76092 4.54512 10.1821L4.27845 10.3725C3.16176 11.1702 3.16176 12.8298 4.27845 13.6275L4.54512 13.8179C5.13471 14.2391 5.45043 14.9462 5.37041 15.6663L5.27608 16.5153C5.13454 17.7891 6.21088 18.8655 7.48471 18.7239L8.33373 18.6296C9.05384 18.5496 9.76092 18.8653 10.1821 19.4549L10.3725 19.7215C11.1702 20.8382 12.8298 20.8382 13.6275 19.7215L13.8179 19.4549C14.2391 18.8653 14.9462 18.5496 15.6663 18.6296L16.5153 18.7239C17.7891 18.8655 18.8655 17.7891 18.7239 16.5153L18.6296 15.6663C18.5496 14.9462 18.8653 14.2391 19.4549 13.8179L19.7215 13.6275C20.8382 12.8298 20.8382 11.1702 19.7215 10.3725L19.4549 10.1821C18.8653 9.76092 18.5496 9.05384 18.6296 8.33373L18.7239 7.48471C18.8655 6.21088 17.7891 5.13454 16.5153 5.27608L15.6663 5.37041C14.9462 5.45043 14.2391 5.13471 13.8179 4.54512Z" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M9 12L10.8189 13.8189V13.8189C10.9189 13.9189 11.0811 13.9189 11.1811 13.8189V13.8189L15 10" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Thank You Page</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Thank You Page</span></div>
                            <div class="panelDesc">Show page after submission</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a></li>
                <li><a class="navLink vfsettingslink" data-id="4" id="integrations-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-puzzle panelIcon" name="puzzle">
                        <svg viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">

                          <rect id="Icons" x="-448" y="-128" width="1280" height="800" style="fill:none;"/>

                          <g id="Icons1" serif:id="Icons">

                          <g id="Strike">

                          </g>

                          <g id="H1">

                          </g>

                          <g id="H2">

                          </g>

                          <g id="H3">

                          </g>

                          <g id="list-ul">

                          </g>

                          <g id="hamburger-1">

                          </g>

                          <g id="hamburger-2">

                          </g>

                          <g id="list-ol">

                          </g>

                          <g id="list-task">

                          </g>

                          <g id="trash">

                          </g>

                          <g id="vertical-menu">

                          </g>

                          <g id="horizontal-menu">

                          </g>

                          <g id="sidebar-2">

                          </g>

                          <g id="Pen">

                          </g>

                          <g id="Pen1" serif:id="Pen">

                          </g>

                          <g id="clock">

                          </g>

                          <g id="external-link">

                          </g>

                          <g id="hr">

                          </g>

                          <g id="info">

                          </g>

                          <g id="warning">

                          </g>

                          <g id="plus-circle">

                          </g>

                          <g id="minus-circle">

                          </g>

                          <path id="caret-left" d="M-45.457,32.027l24.07,-24.07l3.009,3.008l-21.062,21.062l21.062,21.062l-3.009,3.009l-24.07,-24.071Z" style="fill-rule:nonzero;"/>

                          <g id="vue">

                          </g>

                          <g id="cog">

                          </g>

                          <g id="logo">

                          </g>

                          <path id="connection" d="M32.096,30.055l12,0l-16,25.989l4,-21.989l-12,0l16,-26.016l-4,22.016Z"/>

                          <g id="radio-check">

                          </g>

                          <g id="eye-slash">

                          </g>

                          <g id="eye">

                          </g>

                          <g id="toggle-off">

                          </g>

                          <g id="shredder">

                          </g>

                          <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]">

                          </g>

                          <g id="react">

                          </g>

                          <g id="check-selected">

                          </g>

                          <g id="turn-off">

                          </g>

                          <g id="code-block">

                          </g>

                          <g id="user">

                          </g>

                          <g id="coffee-bean">

                          </g>

                          <g id="coffee-beans">

                          <g id="coffee-bean1" serif:id="coffee-bean">

                          </g>

                          </g>

                          <g id="coffee-bean-filled">

                          </g>

                          <g id="coffee-beans-filled">

                          <g id="coffee-bean2" serif:id="coffee-bean">

                          </g>

                          </g>

                          <g id="clipboard">

                          </g>

                          <g id="clipboard-paste">

                          </g>

                          <g id="clipboard-copy">

                          </g>

                          <g id="Layer1">

                          </g>

                          </g>

                          </svg>
                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Integrations</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Integrations</span></div>
                            <div class="panelDesc">Connect your form to other apps</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li><a class="navLink vfsettingslink" data-id="5" id="quickembed-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-embbed panelIcon" name="embed">
                          <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512"  xml:space="preserve">
                            <g>
                              <path class="st0" d="M153.527,138.934c-0.29,0-0.581,0.088-0.826,0.258L0.641,242.995C0.238,243.27,0,243.721,0,244.213v27.921
                                c0,0.484,0.238,0.943,0.641,1.21l152.06,103.811c0.246,0.17,0.536,0.258,0.826,0.258c0.238,0,0.468-0.064,0.686-0.169
                                c0.484-0.258,0.782-0.758,0.782-1.306v-44.478c0-0.476-0.238-0.936-0.641-1.202L48.769,258.166l105.585-72.068
                                c0.403-0.282,0.641-0.734,0.641-1.226V140.41c0-0.548-0.298-1.049-0.782-1.299C153.995,138.991,153.765,138.934,153.527,138.934z"
                                />
                              <path class="st0" d="M511.358,242.995l-152.06-103.803c-0.246-0.169-0.536-0.258-0.827-0.258c-0.238,0-0.467,0.056-0.685,0.177
                                c-0.484,0.25-0.782,0.751-0.782,1.299v44.478c0,0.484,0.238,0.936,0.641,1.21l105.586,72.068l-105.586,72.092
                                c-0.403,0.266-0.641,0.725-0.641,1.217v44.462c0,0.548,0.298,1.049,0.782,1.306c0.218,0.105,0.448,0.169,0.685,0.169
                                c0.291,0,0.581-0.088,0.827-0.258l152.06-103.811c0.404-0.267,0.642-0.726,0.642-1.21v-27.921
                                C512,243.721,511.762,243.27,511.358,242.995z"/>
                              <path class="st0" d="M325.507,114.594h-42.502c-0.629,0-1.186,0.395-1.387,0.984l-96.517,279.885
                                c-0.153,0.443-0.08,0.943,0.194,1.322c0.278,0.387,0.722,0.621,1.198,0.621h42.506c0.625,0,1.182-0.395,1.387-0.992l96.513-279.868
                                c0.153-0.452,0.081-0.952-0.193-1.339C326.427,114.828,325.982,114.594,325.507,114.594z"/>
                            </g>
                          </svg>
                        </span></div>

                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Quick Embed</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Quick Embed</span></div>
                            <div class="panelDesc">Add your form to your page</div>
                          </div>
                        </div>


                      </div>
                    </div>
                  </a>
                </li>

                <li><a class="navLink vfsettingslink" data-id="6" id="security-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-puzzle panelIcon" name="puzzle">
                          
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4472 1.10557C12.1657 0.964809 11.8343 0.964809 11.5528 1.10557L3.55279 5.10557C3.214 5.27496 3 5.62123 3 6V12C3 14.6622 3.86054 16.8913 5.40294 18.7161C6.92926 20.5218 9.08471 21.8878 11.6214 22.9255C11.864 23.0248 12.136 23.0248 12.3786 22.9255C14.9153 21.8878 17.0707 20.5218 18.5971 18.7161C20.1395 16.8913 21 14.6622 21 12V6C21 5.62123 20.786 5.27496 20.4472 5.10557L12.4472 1.10557ZM5 12V6.61803L12 3.11803L19 6.61803V12C19 14.1925 18.305 15.9635 17.0696 17.425C15.8861 18.8252 14.1721 19.9803 12 20.9156C9.82786 19.9803 8.11391 18.8252 6.93039 17.425C5.69502 15.9635 5 14.1925 5 12ZM16.7572 9.65323C17.1179 9.23507 17.0714 8.60361 16.6532 8.24284C16.2351 7.88207 15.6036 7.9286 15.2428 8.34677L10.7627 13.5396L8.70022 11.5168C8.30592 11.1301 7.67279 11.1362 7.28607 11.5305C6.89935 11.9248 6.90549 12.5579 7.29978 12.9446L10.1233 15.7139C10.3206 15.9074 10.5891 16.0106 10.8651 15.9991C11.1412 15.9876 11.4002 15.8624 11.5807 15.6532L16.7572 9.65323Z"/>
                          </svg>

                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Security</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Security</span></div>
                            <div class="panelDesc">Secure your form</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>

                <li><a class="navLink vfsettingslink" data-id="7" style="display:none;" id="payment-link" href="javascript:void(0)">
                    <div class="activeBorderRemove">
                      <div class="cardvf">
                        <div class="card-leftSide"><span class="ji ji-puzzle panelIcon" name="puzzle">
                          
                        <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 32 32" xml:space="preserve">

                          <path class="puchipuchi_een" d="M1,24c0,1.1,0.9,2,2,2h26c1.1,0,2-0.9,2-2V12H1V24z M4,19h12c0.552,0,1,0.448,1,1s-0.448,1-1,1H4
                            c-0.552,0-1-0.448-1-1S3.448,19,4,19z M4,22h5c0.552,0,1,0.448,1,1s-0.448,1-1,1H4c-0.552,0-1-0.448-1-1S3.448,22,4,22z M31,8v1H1V8
                            c0-1.1,0.9-2,2-2h26C30.1,6,31,6.9,31,8z"/>
                          </svg>

                        </span></div>
                        <div class="card-contentWrapper">
                          <div class="tablet-content hideOnMobile hideOnDesktop">Payment</div>
                          <div class="card-content">
                            <div class="panelHeader"><span class="panelHeader-subtext">Payment</span></div>
                            <div class="panelDesc">Collect Payment from your form</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>


              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="stageContainer branding21" id="maincontsetting" role="main">
        <div class="stageScroller" style="display: block;">
          <div class="modules modal">
            <div class="modules-mainsection">
              <div class="modules-content properties">
                <div>
                  <div id="app_wizards" class="moodular platformV4 formsettingsV4 properties">
                    <div class="">
                      <div class="tabContent">
                        <div style="overflow-y: auto; max-height: 130px;">
                          <div class="modules-V4">


                            <div class="modules-contentvf" data-id="1">
                            
                              <div data-sc="panelHeader" class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings"
                                    class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.5699 18.5001V14.6001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.5699 7.45V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.57 12.65C17.0059 12.65 18.17 11.4859 18.17 10.05C18.17 8.61401 17.0059 7.44995 15.57 7.44995C14.134 7.44995 12.97 8.61401 12.97 10.05C12.97 11.4859 14.134 12.65 15.57 12.65Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.43005 18.5V16.55" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.43005 9.4V5.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.42996 16.5501C9.8659 16.5501 11.03 15.386 11.03 13.9501C11.03 12.5142 9.8659 11.3501 8.42996 11.3501C6.99402 11.3501 5.82996 12.5142 5.82996 13.9501C5.82996 15.386 6.99402 16.5501 8.42996 16.5501Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span
                                    class="panelHeader-text panelHeader-title">Form Settings</span><span
                                    class="panelHeader-text panelHeader-subtitle">Customize form status and
                                    properties</span></div>
                              </div>

                              <div class="mainCard" style="padding: 0px;">
                                <div class="line">
                                  <div class="column one one">
                                    <div style="padding: 25px;">
                                      <div data-element-id="title" class=" form-group line u-tooltipTrigger"
                                        aria-label="Title" role="group">
                                        
                                        <div class="column twelve twelve"><label for="title">Title</label></div>
                                        <div class="column twelve twelve">
                                          <p>Enter a name for your form</p><input elementlabel="[object Object]"
                                            id="title" name="title" type="text" class="inpt injectCSSPrevention vform-input-title"
                                            aria-label="" value="<?php echo esc_html_e($vfm_formname,'vform'); ?>">
                                        </div>

                                        <div class="column twelve twelve" style="display: inline-block;margin-top: 20px;"><label for="title">Description</label></div>
                                        <div class="column twelve twelve">
                                          <p><i class="fa fa-lightbulb" aria-hidden="true"></i> This will help you remember Which type of form it is.</p>
                                          <textarea class="inpt " name="formdescription"><?php echo esc_html_e($vfm_formdescription,'vform'); ?></textarea>
                                        </div>


                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="line">
                                  <hr
                                    style="background-color: rgb(236, 233, 230); height: 1px; border: 0px; margin: 0px;">
                                  <div class="column one one">
                                    <div data-element-id="status" class=" form-group line u-tooltipTrigger"
                                      role="group">
                                      <div class="column twelve twelve">
                                        <p></p>
                                        <div>
                                          <div class="line">
                                            <div>
                                              <div class="form-group line">
                                                <div class="column twelve twelve"><label
                                                    for="formSettingsFormStatus">Form Status</label></div>
                                                <div class="column twelve twelve">
                                                  <p>Enable Disable your form now</p>
                                                  <div class="m-dropdownWrapper"><select id="formSettingsFormStatus"
                                                      class="m-dropdown" aria-label="">
                                                      <option value="true" <?php echo $vfm_status=='true'?'selected="selected"':''; ?>>Enabled</option>
                                                      <option value="false" <?php echo $vfm_status=='false'?'selected="selected"':''; ?>>Disabled</option>
                                                    </select><span class="m-dropdownMask"></span></div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="2">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                  <svg style="fill: #fff;" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                  <g>
                                    <path class="st0" d="M510.746,110.361c-2.128-10.754-6.926-20.918-13.926-29.463c-1.422-1.794-2.909-3.39-4.535-5.009
                                      c-12.454-12.52-29.778-19.701-47.531-19.701H67.244c-17.951,0-34.834,7-47.539,19.708c-1.608,1.604-3.099,3.216-4.575,5.067
                                      c-6.97,8.509-11.747,18.659-13.824,29.428C0.438,114.62,0,119.002,0,123.435v265.137c0,9.224,1.874,18.206,5.589,26.745
                                      c3.215,7.583,8.093,14.772,14.112,20.788c1.516,1.509,3.022,2.901,4.63,4.258c12.034,9.966,27.272,15.45,42.913,15.45h377.51
                                      c15.742,0,30.965-5.505,42.967-15.56c1.604-1.298,3.091-2.661,4.578-4.148c5.818-5.812,10.442-12.49,13.766-19.854l0.438-1.05
                                      c3.646-8.377,5.497-17.33,5.497-26.628V123.435C512,119.06,511.578,114.649,510.746,110.361z M34.823,99.104
                                      c0.951-1.392,2.165-2.821,3.714-4.382c7.689-7.685,17.886-11.914,28.706-11.914h377.51c10.915,0,21.115,4.236,28.719,11.929
                                      c1.313,1.327,2.567,2.8,3.661,4.272l2.887,3.88l-201.5,175.616c-6.212,5.446-14.21,8.443-22.523,8.443
                                      c-8.231,0-16.222-2.99-22.508-8.436L32.19,102.939L34.823,99.104z M26.755,390.913c-0.109-0.722-0.134-1.524-0.134-2.341V128.925
                                      l156.37,136.411L28.199,400.297L26.755,390.913z M464.899,423.84c-6.052,3.492-13.022,5.344-20.145,5.344H67.244
                                      c-7.127,0-14.094-1.852-20.142-5.344l-6.328-3.668l159.936-139.379l17.528,15.246c10.514,9.128,23.922,14.16,37.761,14.16
                                      c13.89,0,27.32-5.032,37.827-14.16l17.521-15.253L471.228,420.18L464.899,423.84z M485.372,388.572
                                      c0,0.803-0.015,1.597-0.116,2.304l-1.386,9.472L329.012,265.409l156.36-136.418V388.572z"></path>
                                  </g>
                                  </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Emails</span><span class="panelHeader-text panelHeader-subtitle">Send autoresponders and notifications</span></div>

                                <button id="createnotifibtn" class="createnotifibtn">Create Notification</button>

                              </div>
                              
                              <div class="vform-notifications-general">

                             


                           

                               




                                  <h3>Notifications</h3>

                                  <input type="hidden" name="vf_formid" value="<?php echo $id; ?>" id="vfromid">
                                  <?php

                                      $frmid = sanitize_text_field($id);

                                      $form_id = intval($frmid); // Assuming formid is an integer
                                      $query = "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid = %d ORDER BY id DESC";
                                      $frmiddata = $wpdb->get_results($wpdb->prepare($query, $form_id), OBJECT);

                                      // $frmiddata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_notifications  WHERE formid='".$frmid."' ORDER BY id DESC", OBJECT );

                                      if(count($frmiddata)==0){
                                        echo '<button id="createnotifibtn" class="createnotifibtn">Create Notification</button>';
                                      }

                                      foreach ( $frmiddata as $keyedt=>$valueview ) {

                                          $vfid = $valueview->id;
                                          $actname = $valueview->action_name;
                                          $sendemail = $valueview->send_to_email;
                                          $fromname = $valueview->from_name;
                                          $fromemail = $valueview->from_email;
                                          $subject = $valueview->subject;
                                          $message = $valueview->message;
                                          $replyto = $valueview->reply_to;
                                          $mode = $valueview->mode;
                                          $dropdown = $valueview->dropdown;
                                  
                                  ?>

                                    <div id="frm_form_action_2439" class="widget makenotitogglehome frm_form_action_settings frm_single_email_settings <?php echo $dropdown =='1' ? 'open': '' ; ?> ">
                                      <form action="javascript:void(0)" class="vf_notiform" data-id="<?php echo $vfid; ?>">
                                        <input type="hidden" name="notifiid" value="<?php echo $vfid; ?>">

                                        <input type="hidden" name="vf_dropdown" class="vf_dropdown" value="<?php echo $dropdown; ?>">

                                        <div class="widget-top">
                                            <div class="widget-title-action">
                                                <button type="button" class="widget-action makenotitoggle">
                                                  <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#0F0F0F"/>
                                                  </svg>
                                                </button>
                                            </div>
                                            <span class="frm_email_icons alignright">
                                                <a href="javascript:void(0)" class="frm_save_form" title="Save">
                                                  <svg width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#000000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg> 
                                                  </a>
                                                <a href="javascript:void(0)" data-removeid="frm_form_action_2439" class="frm_remove_form"
                                                    data-frmverify="Delete this form action?" data-frmverify-btn="frm-button-red" title="Delete">
                                                      <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg> 
                                                  </a>

                                                <label class="switch frm_toggle_block">
                                                    <input type="checkbox" class="checkbox" name="vf_mode" value="1" <?php echo $mode =='1' ? 'checked': '' ; ?> >
                                                    <div class="slider"></div>
                                                </label>
                                            </span>
                                            <div class="widget-title">
                                                <h4>
                                                    <span class="frm_form_action_icon frm-outer-circle ">
                                                      <svg  class="vfrmsvg" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                                                      </svg> 
                                                    </span>
                                                  <span class="sndeml"><?php echo $actname; ?></span> 
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="widget-inside frminsidetiggle" style="<?php echo $dropdown =='1' ? 'display:block;': '' ; ?> position:relative;">

                                            <div style="display:none;" class="vfoptnfield">
                                              <ul id="vf_insidefields" class="vf_insidefields-tabs ">
                                                <li class="vf_insidefields-tabs active">
                                                  <a href="javascript:void(0)" id="vf_insidefields_tab">
                                                    Fields			</a>
                                                </li>
                                                <li class="vf_insidefields-tabs">
                                                  <a href="javascript:void(0)" id="vf_insideadv_tab">
                                                    Advanced			</a>
                                                </li>
                                              </ul>
                                              <ul class="makesmarttagpos"></ul>
                                            </div>

                                            <div class="frm_grid_container frm_no_p_margin">
                                                <p class="frm6 frm_form_field">
                                                    <label for="action_post_title_2439" class="frm_help" >
                                                        Action Name </label>
                                                    <input type="text" name="action_name" value="<?php echo $actname; ?>"
                                                        class="large-text  vf_actionname" >
                                                </p>
                                            </div>

                                            <p class="frm_has_shortcodes frm_to_row frm_email_row">
                                                <label for="email_to_2439" class="frm_help" >
                                                Send To Email Address </label>
                                                <span class="frm-with-right-icon">
                                                <svg fill="#000000" data-toppos="158" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg>  
                                                <input type="text" name="email_to" value="<?php echo $sendemail; ?>"
                                                        class="frm_not_email_to frm_email_blur large-text  frm_help" id="email_to_2439">

                                                    <div style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                                    </div>
                                                </span>
                                            </p>



                                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                                                <label for="from_2439" class="frm_help" >
                                                    From Name </label>

                                                <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="230" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg> 
                                                <input type="text" name="from_name" value="<?php echo $fromname; ?>" class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439" ></span>
                                            </p>


                                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                                                <label for="from_2439" class="frm_help" >
                                                    From Email </label>

                                                <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="304" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg> 
                                                <input type="email" name="from_email" value="<?php echo $fromemail; ?>" class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439" ></span>
                                            </p>

                                            <p class="frm_has_shortcodes frm_from_row frm_email_row">
                                                <label for="from_2439" class="frm_help" >
                                                    Reply-To </label>

                                                <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="378" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg> 
                                                <input type="email" name="replyto" value="<?php echo $replyto; ?>" class="frm_not_email_to frm_email_blur large-text  frm_help" id="from_2439" ></span>
                                            </p>


                                            <p class="frm_has_shortcodes">
                                                <label for="email_subject_2439" class="frm_help">
                                                Email Subject </label>
                                                <span class="frm-with-right-icon"><svg fill="#000000" data-toppos="430" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg> 
                                                
                                                <input type="text" name="email_subject"
                                                        class="frm_not_email_subject large-text  frm_help" title="" id="email_subject_2439" value="<?php echo $subject; ?>"></span>
                                            </p>

                                            <p class="frm_has_shortcodes">
                                                <label for="email_message_2439">
                                                    Message </label>
                                            </p>
                                            <div id="wp-email_message_2439-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                                            <svg fill="#000000" data-toppos="439" class="frm-show-box" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/><path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/><path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/></svg>

                                                <textarea id="vform-panel-field-notifications-1-message" name="email_message" rows="6" placeholder="" class="inpt"><?php echo $message; ?></textarea>

                                            </div>



                                            <div style="clear:both;"></div>
                                        </div>
                                      </form>
                                    </div>

                                  <?php } ?>





                                      <select style="display:none;" id="vform-notification_enable" name="settings[notification_enable]" class="">
                                        <option value="1" <?php echo $vf_notifito == 1 ? 'selected="selected"': ''; ?>>On</option>
                                        <option value="0" <?php echo $vf_notifito == 0 ? 'selected="selected"': ''; ?>>Off</option>
                                      </select>

                                      <div id="notificationstatus" style="display:none;">

                                          <div id="vform-panel-field-notifications-1-email-wrap" class="vform-panel-field email-recipient vform-panel-field-text">
                                            <label for="vform-panel-field-notifications-1-email">Send To Email Address
                                              <a  class="toggle-smart-tag-display" data-type="fields" data-fields="toemail">
                                                <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display">
                                                <li class="heading">Available Fields</li>
                                              </ul>

                                              </label>
                                              <input type="text" id="vform-panel-field-notifications-1-email" name="settings[notifications][1][email]" value="<?php echo esc_html_e($vf_sendto,'vform'); ?>" placeholder="" class="inpt">
                                          </div>
                                          <div id="vform-panel-field-notifications-1-subject-wrap" class="vform-panel-field  vform-panel-field-text">
                                            <label for="vform-panel-field-notifications-1-subject">Email Subject
                                              <a  class="toggle-smart-tag-display" data-type="all" data-fields="subject">
                                                <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display" data-fields="subject">
                                                <li class="heading">Available Fields</li>
                                              </ul>

                                            </label>
                                            <input type="text" id="vform-panel-field-notifications-1-subject" name="settings[notifications][1][subject]" value="<?php echo esc_html_e($vf_emailsubject,'vform'); ?>" placeholder="" class="inpt">
                                          </div>
                                          <div id="vform-panel-field-notifications-1-sender_name-wrap" class="vform-panel-field  vform-panel-field-text">
                                            <label for="vform-panel-field-notifications-1-sender_name">From Name
                                              <a  class="toggle-smart-tag-display" data-type="fields" data-fields="name">
                                                <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display" data-fields="name">
                                                <li class="heading">Available Fields</li>
                                              </ul>
                                            </label>
                                            <input type="text" id="vform-panel-field-notifications-1-sender_name" name="settings[notifications][1][sender_name]" value='<?php echo esc_html_e($vf_fromname,'vform'); ?>' placeholder='' class="inpt">
                                          </div>
                                          <div id="vform-panel-field-notifications-1-sender_address-wrap" class="vform-panel-field  vform-panel-field-text">
                                            <label for="vform-panel-field-notifications-1-sender_address">From Email
                                              <a  class="toggle-smart-tag-display" data-type="fields" data-fields="fromemail">
                                                <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display" data-fields="fromemail">
                                                <li class="heading">Available Fields</li>
                                              </ul>
                                            </label>
                                            <input type="text" id="vform-panel-field-notifications-1-sender_address" name="settings[notifications][1][sender_address]" value="<?php echo esc_html_e($vf_fromemail,'vform'); ?>" placeholder="" class="inpt">
                                          </div>
                                          <div id="vform-panel-field-notifications-1-replyto-wrap" class="vform-panel-field  vform-panel-field-text">
                                            <label for="vform-panel-field-notifications-1-replyto">Reply-To
                                              <a  class="toggle-smart-tag-display" data-type="fields" data-fields="replaytoemail">
                                                <i class="fa fa-tags"></i>
                                                <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display" data-fields="replaytoemail">
                                                <li class="heading">Available Fields</li>
                                              </ul>
                                            </label>
                                            <input type="text" id="vform-panel-field-notifications-1-replyto" name="settings[notifications][1][replyto]" value='<?php echo esc_html_e($vf_replyto,'vform'); ?>' placeholder="" class="inpt">
                                          </div>
                                          <div id="vform-panel-field-notifications-1-message-wrap" class="vform-panel-field email-msg vform-panel-field-textarea">
                                            <label for="vform-panel-field-notifications-1-message">Message
                                              <a  class="toggle-smart-tag-display" data-type="all" data-fields="message">
                                                <i class="fa fa-tags"></i> <span>Show Smart Tags</span>
                                              </a>
                                              <ul class="smart-tags-list-display" data-fields="message">
                                                <li class="heading">Available Fields</li>
                                              </ul>
                                            </label>
                                            <textarea id="vform-panel-field-notifications-1-message" name="settings[notifications][1][message]" rows="6" placeholder="" class="inpt"><?php echo esc_html_e($vf_message,'vform'); ?></textarea>
                                            <p class="note">To display all form fields, use the <code>{all_fields}</code> Smart Tag.</p>
                                            <p class="note">To send this form fields to your wordpress admin email, use the <code>{admin_email}</code> Smart Tag.</p>
                                            <p class="note">Or you can simply type email address where you send the form fields, Example: <code>xyz@gmail.com</code>.</p>
                                            <!-- <p class="note">Note: Please make sure your name_id, email_id is correct<code>{name_id="--"}, {email_id="--"}</code>.</p> -->
                                            <p>Note: Use <code>info@<?php echo substr(get_site_url(),8); ?></code> in 'From' Address to prevent from email going to spam.</p>
                                          </div>

                                      </div>


                                  </div>

                               </div>

                            <div class="modules-contentvf" data-id="3">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                  <span data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.8179 4.54512L13.6275 4.27845C12.8298 3.16176 11.1702 3.16176 10.3725 4.27845L10.1821 4.54512C9.76092 5.13471 9.05384 5.45043 8.33373 5.37041L7.48471 5.27608C6.21088 5.13454 5.13454 6.21088 5.27608 7.48471L5.37041 8.33373C5.45043 9.05384 5.13471 9.76092 4.54512 10.1821L4.27845 10.3725C3.16176 11.1702 3.16176 12.8298 4.27845 13.6275L4.54512 13.8179C5.13471 14.2391 5.45043 14.9462 5.37041 15.6663L5.27608 16.5153C5.13454 17.7891 6.21088 18.8655 7.48471 18.7239L8.33373 18.6296C9.05384 18.5496 9.76092 18.8653 10.1821 19.4549L10.3725 19.7215C11.1702 20.8382 12.8298 20.8382 13.6275 19.7215L13.8179 19.4549C14.2391 18.8653 14.9462 18.5496 15.6663 18.6296L16.5153 18.7239C17.7891 18.8655 18.8655 17.7891 18.7239 16.5153L18.6296 15.6663C18.5496 14.9462 18.8653 14.2391 19.4549 13.8179L19.7215 13.6275C20.8382 12.8298 20.8382 11.1702 19.7215 10.3725L19.4549 10.1821C18.8653 9.76092 18.5496 9.05384 18.6296 8.33373L18.7239 7.48471C18.8655 6.21088 17.7891 5.13454 16.5153 5.27608L15.6663 5.37041C14.9462 5.45043 14.2391 5.13471 13.8179 4.54512Z" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9 12L10.8189 13.8189V13.8189C10.9189 13.9189 11.0811 13.9189 11.1811 13.8189V13.8189L15 10" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                  </span></div>
                                <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Thank you page</span><span class="panelHeader-text panelHeader-subtitle">Show page after submission</span></div>

                              </div>

                              <div class="vform-confirmations-general">
                                  <h3>Confirmations</h3>
                                    <div class="vform-builder-settings-block-content">

                                      <div id="vform-panel-field-confirmations-1-type-wrap" class="vform-panel-field vform-panel-field-confirmations-type-wrap vform-panel-field-select">
                                        <label for="vform-panel-field-confirmations-1-type">Confirmation Type</label>
                                        <select id="vform-panel-field-confirmations-1-type" name="settingsconfirmations" class="vform-panel-field-confirmations-type">
                                          <option value="message" <?php echo $vfm_confimation=='message' ? 'selected="selected"':''; ?>>Message</option>
                                          <option value="page" <?php echo $vfm_confimation=='page' ? 'selected="selected"':''; ?>>Show Page</option>
                                          <option value="redirect" <?php echo $vfm_confimation=='redirect' ? 'selected="selected"':''; ?>>Go to URL (Redirect)</option>

                                          <option value="redirect_2" <?php echo $vfm_confimation=='redirect_2' ? 'selected="selected"':''; ?>>User Details On Page (Redirect) **New**</option>
                                        </select>
                                      </div>
                                      <div id="vform-panel-field-confirmations-1-message-wrap" class="vform-panel-field  vform-panel-field-textarea" style="">

                                      <div class="wp-core-ui wp-editor-wrap tmce-active" id="vform-panel-field1" <?php echo $vfm_confimation!='message' ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-message">Confirmation Message</label>
                                        <?php
                                        if($vfm_confimation=='message'){
                                          $vfm_formmsg = stripslashes($vfm_confimation_value);
                                          $vfm_vl = html_entity_decode($vfm_formmsg);
                                        }
                                         $contentvformeditor=$vfm_vl; 
                                         wp_editor( $contentvformeditor , 'vformtextarea', $settings = array('textarea_name'=>'myvformtextarea','editor_height' => 100) ); ?>
                                      </div>

                                      <div id="vform-panel-field2" class="vform-panel-field  vform-panel-field-select" <?php echo $vfm_confimation!='page' ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-page">Confirmation Page</label>
                                        <select id="vform-panel-field-confirmations-1-page" name="settings[confirmations][1][page]" class="vform-panel-field-confirmations-page">

                                            <?php
                                              
                                              $mypages = get_pages( array(
                                                    'sort_column' => 'post_date',
                                                    'sort_order' => 'desc'
                                                ) );

                                                foreach( $mypages as $page )
                                                {
                                                    $title = $page->post_title;
                                                    $slug = $page->post_name;

                                                    $selected = '';
                                                    if($vfm_confimation_value==$slug){
                                                      $selected = 'selected="selected"';
                                                    }
                                                    echo "<option ".$selected." value='".esc_html($slug)."'>".esc_html($title)."</option>";
                                                }
                                            ?>


                                        </select>
                                      </div>
                                      <?php
                                        if($vfm_confimation=='redirect' || $vfm_confimation=='redirect_2'){
                                          $vfm_vl3 = $vfm_confimation_value;
                                        }
                                      ?>
                                      <div id="vform-panel-field3" class="vform-panel-field  vform-panel-field-text" <?php echo ($vfm_confimation!='redirect' && $vfm_confimation!='redirect_2') ? 'style="display:none;"':''; ?>>
                                        <label for="vform-panel-field-confirmations-1-redirect">Confirmation Redirect URL</label>
                                        <input type="text" id="vform-panel-field-confirmations-1-redirect" name="settings[confirmations][1][redirect]" value="<?php echo esc_html_e($vfm_vl3,'vform'); ?>" placeholder="Example: https://example.com/newpage" class="inpt vform-panel-field-confirmations-redirect">
                                      </div>

                                    </div>
                                </div>
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="4">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                  <div data-sc="panelHeader-iconWrapper" class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                    <span style="fill:#fff;" data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">

                                      <rect id="Icons" x="-448" y="-128" width="1280" height="800" style="fill:none;"></rect>

                                      <g id="Icons1" serif:id="Icons">

                                      <g id="Strike">

                                      </g>

                                      <g id="H1">

                                      </g>

                                      <g id="H2">

                                      </g>

                                      <g id="H3">

                                      </g>

                                      <g id="list-ul">

                                      </g>

                                      <g id="hamburger-1">

                                      </g>

                                      <g id="hamburger-2">

                                      </g>

                                      <g id="list-ol">

                                      </g>

                                      <g id="list-task">

                                      </g>

                                      <g id="trash">

                                      </g>

                                      <g id="vertical-menu">

                                      </g>

                                      <g id="horizontal-menu">

                                      </g>

                                      <g id="sidebar-2">

                                      </g>

                                      <g id="Pen">

                                      </g>

                                      <g id="Pen1" serif:id="Pen">

                                      </g>

                                      <g id="clock">

                                      </g>

                                      <g id="external-link">

                                      </g>

                                      <g id="hr">

                                      </g>

                                      <g id="info">

                                      </g>

                                      <g id="warning">

                                      </g>

                                      <g id="plus-circle">

                                      </g>

                                      <g id="minus-circle">

                                      </g>

                                      <path id="caret-left" d="M-45.457,32.027l24.07,-24.07l3.009,3.008l-21.062,21.062l21.062,21.062l-3.009,3.009l-24.07,-24.071Z" style="fill-rule:nonzero;"></path>

                                      <g id="vue">

                                      </g>

                                      <g id="cog">

                                      </g>

                                      <g id="logo">

                                      </g>

                                      <path id="connection" d="M32.096,30.055l12,0l-16,25.989l4,-21.989l-12,0l16,-26.016l-4,22.016Z"></path>

                                      <g id="radio-check">

                                      </g>

                                      <g id="eye-slash">

                                      </g>

                                      <g id="eye">

                                      </g>

                                      <g id="toggle-off">

                                      </g>

                                      <g id="shredder">

                                      </g>

                                      <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]">

                                      </g>

                                      <g id="react">

                                      </g>

                                      <g id="check-selected">

                                      </g>

                                      <g id="turn-off">

                                      </g>

                                      <g id="code-block">

                                      </g>

                                      <g id="user">

                                      </g>

                                      <g id="coffee-bean">

                                      </g>

                                      <g id="coffee-beans">

                                      <g id="coffee-bean1" serif:id="coffee-bean">

                                      </g>

                                      </g>

                                      <g id="coffee-bean-filled">

                                      </g>

                                      <g id="coffee-beans-filled">

                                      <g id="coffee-bean2" serif:id="coffee-bean">

                                      </g>

                                      </g>

                                      <g id="clipboard">

                                      </g>

                                      <g id="clipboard-paste">

                                      </g>

                                      <g id="clipboard-copy">

                                      </g>

                                      <g id="Layer1">

                                      </g>

                                      </g>

                                      </svg>
                                    </span></div>
                                  <div data-sc="panelHeader-content" class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Integrations</span><span class="panelHeader-text panelHeader-subtitle">Connect your form to other apps</span></div>
                              </div>

                              <div class="vform-integration-general">
                                      <br>
                                      <br>
                                <label for="">Which integration do you want?</label>
                                <input type="text" placeholder="Type name here" name="integrationrequest" id="integrationrequest">
                                <a href="javascript:void(0)" id="iwantintegration">Send</a>
                                <br>
                                <p class="thankssubm">Thanks your submission is received!</p>
                              </div>

                            </div>

                            <div class="modules-contentvf" data-id="5">

                              <div class="sc-ciFQTS kPhSib panelHeader">
                                  <div class="sc-bzPmhk fpsmLJ panelHeader-iconWrapper">
                                    <span style="fill:#fff;" data-icon-name="settings" class="panelHeader-icon panelHeader-icon-orange settings ji-settings">
                                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                      <g>
                                        <path class="st0" d="M153.527,138.934c-0.29,0-0.581,0.088-0.826,0.258L0.641,242.995C0.238,243.27,0,243.721,0,244.213v27.921
                                          c0,0.484,0.238,0.943,0.641,1.21l152.06,103.811c0.246,0.17,0.536,0.258,0.826,0.258c0.238,0,0.468-0.064,0.686-0.169
                                          c0.484-0.258,0.782-0.758,0.782-1.306v-44.478c0-0.476-0.238-0.936-0.641-1.202L48.769,258.166l105.585-72.068
                                          c0.403-0.282,0.641-0.734,0.641-1.226V140.41c0-0.548-0.298-1.049-0.782-1.299C153.995,138.991,153.765,138.934,153.527,138.934z"></path>
                                        <path class="st0" d="M511.358,242.995l-152.06-103.803c-0.246-0.169-0.536-0.258-0.827-0.258c-0.238,0-0.467,0.056-0.685,0.177
                                          c-0.484,0.25-0.782,0.751-0.782,1.299v44.478c0,0.484,0.238,0.936,0.641,1.21l105.586,72.068l-105.586,72.092
                                          c-0.403,0.266-0.641,0.725-0.641,1.217v44.462c0,0.548,0.298,1.049,0.782,1.306c0.218,0.105,0.448,0.169,0.685,0.169
                                          c0.291,0,0.581-0.088,0.827-0.258l152.06-103.811c0.404-0.267,0.642-0.726,0.642-1.21v-27.921
                                          C512,243.721,511.762,243.27,511.358,242.995z"></path>
                                        <path class="st0" d="M325.507,114.594h-42.502c-0.629,0-1.186,0.395-1.387,0.984l-96.517,279.885
                                          c-0.153,0.443-0.08,0.943,0.194,1.322c0.278,0.387,0.722,0.621,1.198,0.621h42.506c0.625,0,1.182-0.395,1.387-0.992l96.513-279.868
                                          c0.153-0.452,0.081-0.952-0.193-1.339C326.427,114.828,325.982,114.594,325.507,114.594z"></path>
                                      </g>
                                    </svg>
                                    </span></div>
                                  <div class="sc-kHdrYz cBVZrC panelHeader-content"><span class="panelHeader-text panelHeader-title">Quick embed</span><span class="panelHeader-text panelHeader-subtitle">Add your form to your page</span></div>
                              </div>

                              <div class="vform-embed-general">
                                <div class="linkBox flxp">
                                  
                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                      d="M17.959 6.04a3.714 3.714 0 0 1 0 5.253l-1.334 1.334a1 1 0 0 0 1.415 1.414l1.333-1.334a5.714 5.714 0 1 0-8.08-8.08L9.958 5.96a1 1 0 1 0 1.414 1.414l1.333-1.333a3.714 3.714 0 0 1 5.253 0Zm-10 10a1 1 0 0 1 0-1.414l6.667-6.667a1 1 0 1 1 1.414 1.414L9.374 16.04a1 1 0 0 1-1.415 0ZM6.04 12.707a3.714 3.714 0 0 0 5.252 5.252l1.334-1.333a1 1 0 1 1 1.414 1.414l-1.333 1.333a5.714 5.714 0 1 1-8.081-8.08l1.333-1.334a1 1 0 1 1 1.414 1.414L6.04 12.707Z"
                                      clip-rule="evenodd"></path>
                                  </svg>

                                  <div class="test_linkItself linkItself flw">
                                    [vform id="<?php // echo $_REQUEST['id']; ?>"]
                                  </div> -->

                                      <div class="shrtcod">
                                        <h3>Shortcode For Form <a href="https://wordpress.com/support/wordpress-editor/blocks/shortcode-block/" target="_blank"><svg class="adjstsvg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" viewBox="0 0 30 30"><path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z"></path></svg></a></h3>
                                        <input type="text" class="vformembed" id="vformembed" value="[vform id=<?php echo $id; ?>]" readonly style="user-select: none; cursor: not-allowed;">
                                        <button type="submit" class="button" id="copyembed">Copy</button>
                                    </div>

                                      <br>
                                      <div class="shrtcod">
                                          <h3>Shortcode For User Detail on page <a href="javascript:void(0)" id="userpagehint"><svg class="adjstsvg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" viewBox="0 0 30 30"><path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16,21h-2v-7h2V21z M15,11.5 c-0.828,0-1.5-0.672-1.5-1.5s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S15.828,11.5,15,11.5z"></path></svg></a></h3>
                                        <input type="text" class="vformembed" id="vformembed2" value="[vform_userdetails]" readonly style="user-select: none; cursor: not-allowed;">
                                        <button type="submit" class="button" id="copyembed2">Copy</button>
                                      </div>

                                  <script>

                                    document.getElementById("copyembed").addEventListener("click", function() {
                                            var input = document.getElementById('vformembed');
                                            input.select();  // Select the text in the input field
                                            document.execCommand("copy");  // Copy the selected text
                                        });

                                        
                                    document.getElementById("copyembed2").addEventListener("click", function() {
                                            var input = document.getElementById('vformembed2');
                                            input.select();  // Select the text in the input field
                                            document.execCommand("copy");  // Copy the selected text
                                        });

                                  </script>
                                  

                                  
                                </div>
                              </div>
                                        
                            </div>

                            
                            <div class="modules-contentvf" data-id="6">

                            <?php
                            
                            $id = intval($id); // Assuming id is an integer
                            $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
                            $vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


                            // $vfsec = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id = '{$id}'", OBJECT );
                            foreach ( $vfsec as $key1=>$val1 ) {
                              $sectype = $val1->security_type==null ? '1': $val1->security_type;
                              $key1 = $val1->rec_site_key==null ? '': $val1->rec_site_key;
                              $key2 = $val1->rec_secret_key==null ? '': $val1->rec_secret_key;
                              $key11 = $val1->hcap_site_key==null ? '': $val1->hcap_site_key;
                              $key22 = $val1->hcap_secret_key==null ? '': $val1->hcap_secret_key;
                            }
                              ?>

                                <div>
                                  <ul class="secure-ul">
                                    <li class="<?php echo $sectype=='1' || null ? 'active': ''; ?> fr" data-id="1">
                                      <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/g-cap.png">
                                      reCAPTCHA
                                    </li>
                                    <li class="sec <?php echo $sectype=='2' ? 'active': ''; ?>" data-id="2">
                                      <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/h-cap.png">
                                      hcaptcha
                                    </li>
                                  </ul>
                                </div>

                                <!-- recaptcha -->
                                <div class="g-recapcont">
                                  
                                  
                                  
                                    <div class="grec-description" <?php echo $sectype=='1' || null ? 'style="display:block;"': 'style="display:none;"'; ?> >
                                        <p class="re-main">reCAPTCHA Settings</p>
                                        <p>VForms integrates with reCAPTCHA, a complimentary CAPTCHA service that employs an advanced risk analysis engine and adaptive challenges to prevent automated software from engaging in abusive activities on your site. These settings are required only if you decide to use the reCAPTCHA field. <a href="https://www.google.com/recaptcha/admin/create" target="_blank">Get your reCAPTCHA Keys.</a>
                                        </p>

                                        <p style="color:red;">Note: Please use v2 site and secret key ("I'm not a robot" Checkbox)</p>

                                        <div class="re-form">
                                          <label for="">Site Key</label>
                                          <input type="text" id="rec_site_key" value="<?php echo $key1; ?>">
                                        </div>

                                        <div class="re-form">
                                          <label for="">Secret Key</label>
                                          <input type="password" id="rec_secret_key" value="<?php echo $key2; ?>">
                                        </div>
                                    </div>



                                      <div class="hrec-description" <?php echo $sectype=='2' ? 'style="display:block;"': 'style="display:none;"'; ?> >
                                        <p class="re-main">hCaptcha Settings</p>
                                        <p>VForms integrates with hCaptcha, a complimentary CAPTCHA service that employs an advanced risk analysis engine and adaptive challenges to prevent automated software from engaging in abusive activities on your site. These settings are required only if you decide to use the hCaptcha field. <a href="https://dashboard.hcaptcha.com/sites/new" target="_blank">Get your hCaptcha Keys.</a>
                                        </p>

                                        <div class="re-form">
                                          <label for="">Site Key</label>
                                          <input type="text" id="hcap_site_key" value="<?php echo $key11; ?>">
                                        </div>

                                        <div class="re-form">
                                          <label for="">Secret Key</label>
                                          <input type="password" id="hcap_secret_key" value="<?php echo $key22; ?>">
                                        </div>
                                      </div>


                                        
                                          <input type="hidden" name="whichsecurity" value="<?php echo $sectype; ?>">
                                        <button class="g-saveform">Save Settings</button>
                                </div>

                            </div>




                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>