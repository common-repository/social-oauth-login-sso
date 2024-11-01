<?php

function ecsl_license_show(){
    wp_enqueue_style( 'elite-style-license', ECSL_PLUGIN_URL.'includes/css/ec_license.css?version=' . ECSL_SOCIAL_LOGIN_VERSION, __FILE__, false );

    $ec_check = '
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
          <g id="1387d83e997b6367c4b5c211e15559b8">
            <path id="fe1f8306c6f43f39ceff3a68bab46acd" d="M7 12.2857L11.4742 15.0677C11.5426 15.1103 11.6323 15.0936 11.6809 15.0293L17 8" stroke="#00D3BA" stroke-width="2" stroke-linecap="round"></path>
          </g>
        </svg>
    ';

	$ec_cross = '
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
          <g id="bb49a1baa8f2b053c609302287f4c5cb">
            <g id="2c67efdbf97e2a5d9233fce69c6c90ce">
              <path id="0a218d13db926129cd6c078df4b7e91c" d="M8 8L16 16" stroke="#FF6060" stroke-width="2" stroke-linecap="round"></path>
              <path id="659efa9552d3f2b3706cd5cc59cad8c9" d="M16 8L8 16" stroke="#FF6060" stroke-width="2" stroke-linecap="round"></path>
            </g>
          </g>
        </svg>
    ';

	$ec_info = '
        <svg width="8" height="8" viewBox="0 0 18 18" fill="none">
            <circle id="a89fc99c6ce659f06983e2283c1865f1" cx="9" cy="9" r="7" stroke="rgb(99 102 241)" stroke-width="4"></circle>
        </svg>
    ';
    $allowed_html = array(
		'svg'    => array(
            'width' => array(),
            'height' => array(),
            'viewbox' => true,
            'fill' => array(),
		),
        'circle' => array(
            'id'    => array(),
            'cx'    => array(),
            'cy'    => array(),
            'r'    => array(),
            'stroke'    => array(),
            'stroke-width'    => array(),
        ),
        'path' => array(
            'id'    => array(),
            'd'    => array(),
            'stroke'    => array(),
            'stroke-width'    => array(),
            'stroke-linecap'    => array(),
        ),
        'g'   => array(
            'id'    => array(),
        ),

	);
    ?>
    <div class="ec_pricing_page ec_mt_4 ec_bg_white">
        <div class="ec_switch_box">
            <div class="ec_switch_wrapper">
                <a id="ec_main_pricing" class="ec_switch_item ec_switch_active">Licensing Plans</a>
                <a id="ec_addon_pricing"  class="ec_switch_item">Premium Addons</a>
            </div>    
        </div>
        <div>
            <section id="ec_main_plan_section">
                <div class="ec_rounded_b_lg">
                    <table class="ec_pricing_table">
                        <thead class="ex_text_xs ec_text_gray_700 ec_bg_gray_50">
                            <tr class="even:ec_bg_slate_300">
                                <th rowspan=2 scope="col" style="font-size:large" class="ec_py_3 ec_px_6">
                                    Features
                                </th>
                                <th scope="col" class="ec_pricing_table_block">
                                    <div style="text-align:center">
                                        <h5 style="margin-top :0px; margin-bottom:2px">Basic Plan</h5>
                                        <h1 class="ec_m_0"><span id="ec_basic_disc"> $19<span></h1>
                                    </div>
                                </th>
                                <th scope="col" class="ec_pricing_table_block">
                                <div style="text-align:center">
                                        <h5 style="margin-top :0px; margin-bottom:2px">Standard Plan</h5>
                                        <h1 class="ec_m_0"><span id="ec_standard_disc"> $49<span></h1>
                                    </div> 
                                </th>
                                <th scope="col" class="ec_pricing_table_block">
                                <div style="text-align:center">
                                        <h5 style="margin-top :0px; margin-bottom:2px">Premium Plan</h5>
                                        <h1 class="ec_m_0"><span id="ec_premium_disc"> $99<span></h1>
                                    </div> 
                                </th>
                            </tr>
                            <tr class="even:ec_bg_slate_300">
                                <th scope="col" class="ec_pricing_table_block">
                                    <div style="text-align:center">
                                        <select id="ec_basic_plan">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </th>
                                <th scope="col" class="ec_pricing_table_block">
                                    <div style="text-align:center">
                                        <select id="ec_standard_plan">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </th>
                                <th scope="col" class="ec_pricing_table_block">
                                    <div style="text-align:center">
                                        <select id="ec_premium_plan">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>                       
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>38 OAuth / OpenID Providers</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>White Background Theme</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Application Hover Theme</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Hover Login Buttons</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>GDPR</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Redirection After Registration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Restrict New User Registration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Display Login Options</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo esc_attr('13 Login / Registration options'); ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                <span><?php echo esc_attr('29 Login / Registration options'); ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                <span><?php echo esc_attr('29 Login / Registration options'); ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Shortcode With Attributes</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Google One Tap</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Domain Restriction</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Restrict Specific Page Registration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Admin Approval For New Registration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Account Link / Unlink</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Email Notifications</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Password Reset Link</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Disable Admin Bar</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Send Activation Link To User</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>WooCommerce Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>BuddyPress Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>MemberPress Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Paid Membership Pro Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>MailChimp Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Discord Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Gravity Form Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Mailerlite Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr class="ec_bg_white border-b">
                                <th scope="row" class="ec_px_6 ">
                                    <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Hubspot Integration</span>
                                </th>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_cross,$allowed_html) ?></span>
                                </td>
                                <td class="ec_license_text_center ec_px_6">
                                    <span><?php echo wp_kses($ec_check,$allowed_html) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><a class="ec_license_button primary" href="https://www.elitecontrivers.com/contact-us/" target="_blank">Contact us to Upgrade</a></td>
                                <td><a class="ec_license_button primary" href="https://www.elitecontrivers.com/contact-us/" target="_blank">Contact us to Upgrade</a></td>
                                <td><a class="ec_license_button primary" href="https://www.elitecontrivers.com/contact-us/" target="_blank">Contact us to Upgrade</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>        
            </section>
            <section id="ec_addon_plan_section" style="display: none;">
                <div class="ec_addon_section">
                    <div class="ec_addon_card">
                        <div class="ec_flex_height">
                            <img width="50" height="50" style="backgroud:#FFFFFF" src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/discord.png' );?>" />
                            <span class="ec_addon_price_tag">$99</span>
                            <p class="ec_mt_6 ec_bold_font_lic">Basic Discord Integration</p>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Manage your users and limit user logins and registrations according to whether the user is currently present into the Discord server or not.</span>
                            </li>   
                        </div>
                        <div class="ec_license_flex ec_mt_4 ec_license_justify_center">
                            <button class="ec_license_button ec_license_inverted" onclick=""> Launching Soon</button>
                        </div>
                    </div>
                    <div class="ec_addon_card">
                        <div class="ec_flex_height">
                        <img width="50" height="50" style="backgroud:#FFFFFF" src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/discord.png' );?>" />
                            <span class="ec_addon_price_tag">$149</span>
                            <p class="ec_mt_6 ec_bold_font_lic">Advance Discord Integration</p>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Manage your users and limit user logins and registrations according to whether the user is currently present into the Discord server or not.</span>
                            </li>   
                        </div>
                        <div class="ec_license_flex ec_mt_4 ec_license_justify_center">
                            <button class="ec_license_button ec_license_inverted" onclick=""> Launching Soon</button>
                        </div>
                    </div>
                    <div class="ec_addon_card">
                        <div class="ec_flex_height">
                        <img width="50" height="50" style="backgroud:#FFFFFF" src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/mailchimp.png' );?>" />
                            <span class="ec_addon_price_tag">$29</span>
                            <p class="ec_mt_6 ec_bold_font_lic">MailChimp Integration</p>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>When a person registers using OAuth Social Login, the user is automatically registered as a subscriber to a mailing list in MailChimp. For that user, the Mailing List also records their first name, last name, and email. There is an option to obtain a csv file containing a list of all WordPress users' email addresses.</span>
                            </li>   
                        </div>
                        <div class="ec_license_flex ec_mt_4 ec_license_justify_center">
                            <button class="ec_license_button ec_license_inverted" onclick=""> Launching Soon</button>
                        </div>
                    </div>
                    <div class="ec_addon_card">
                        <div class="ec_flex_height">
                        <img width="50" height="50" style="backgroud:#FFFFFF" src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/hubspot.png' );?>" />
                            <span class="ec_addon_price_tag">$99</span>
                            <p class="ec_mt_6 ec_bold_font_lic">Hubspot Integration</p>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>When a person registers using OAuth Social Login, the user is automatically added to Hubspot Contact List.</span>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>User activities on the website can be tracked.</span>
                            </li>   
                        </div>
                        <div class="ec_license_flex ec_mt_4 ec_license_justify_center">
                            <button class="ec_license_button ec_license_inverted" onclick=""> Launching Soon</button>
                        </div>
                    </div>
                    <div class="ec_addon_card">
                        <div class="ec_flex_height">
                        <img width="50" height="50" style="backgroud:#FFFFFF" src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/registration_form.png' );?>" />
                            <span class="ec_addon_price_tag">$79</span>
                            <p class="ec_mt_6 ec_bold_font_lic">Custom Registration Form</p>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Create your own Registration Form.</span><br/>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Integrate with OAuth Social Registration flow.</span>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Use as a Seprate Registration Form.</span>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Users can select roles at the time of Registration. Example Student/Teacher Role.</span>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Support input type like text, Dropdown, Checkbox, Date, Radio Buttons.</span>
                            </li>
                            <li class="ec_feature_snippet">
                                <span class="ec_mt_1"><?php echo wp_kses($ec_info,$allowed_html) ?>Support all WordPress Themes.</span>
                            </li>   
                        </div>
                        <div class="ec_license_flex ec_mt_4 ec_license_justify_center">
                            <button class="ec_license_button ec_license_inverted" onclick=""> Launching Soon</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <br/>
    <div class="ec_pricing_policy_layout">
        <h3>Methods of Payment Accepted:</h3><hr>
        <div class="ec_payment_methord">
            <div class="ec_payment_deck">
                <div class="ec_payment_card">
                    <div class="ec_payment_card_header">
                        <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/card.png', __FILE__ ) ?>" style="size: landscape;width: 100px;
                            height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                    </div>
                    <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                    <div class="ec_payment_card_body">
                        <p>The licence will be automatically created if payment is made with a credit card or international debit card.</p>
                    </div>
                </div>
                <div class="ec_payment_card">
                    <div class="ec_payment_card_header">
                        <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/paypal.png', __FILE__ ) ?>" style="size: landscape;width: 100px;
                            height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                    </div>
                    <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                    <div class="ec_payment_card_body">
                        <p>To make a PayPal payment, enter the following PayPal ID.</p><p><i><b style="color:#1261d8">info@elitecontrivers.com</b></i></p>
                    </div>
                </div>
                <div class="ec_payment_card">
                    <div class="ec_payment_card_header">
                        <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/license/netbanking.png', __FILE__ ) ?>" style="size: landscape;width: 100px;
                            height: 27px; margin-bottom: 4px;margin-top: 4px;opacity: 1;padding-left: 8px;">
                    </div>
                    <hr style=" margin-left: -26px; margin-right: -26px;border-top: 4px solid #fff;">
                    <div class="ec_payment_card_body">
                        <p>Contact us at <i><b style="color:#1261d8">info@elitecontrivers.com</b></i> if you want our bank information if you want to pay via net banking.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec_payment_note">
            <p><b>Note :</b>Please let us know as soon as you have completed your payment using PayPal or Net Banking so we can verify and update your licence.</p>
            <p>To learn more about payment options, email us at <a href="mailto:info@elitecontrivers.com">info@elitecontrivers.com</a> </p>
        </div>
    
        <h3>Return Policy</h3>
        Your utmost satisfaction with your purchase is our goal. At Elite Contrivers, Only under the following conditions will the customer be eligible to make a claim:
        <p>
            <ol>
                <li>If the premium plugin you bought is not performing as promised and you have tried to contact our support team to resolve any problems but were unsuccessful.</li>
                <li>If the refund request was made by the client within 7 days of the date of the original purchase.</li>
            </ol>
        </p>
        In all of the following cases, the customer is not qualified for a refund:
        <p>
            <ol>
            <li>The Plugin is not being used in line with Elite Contriver's instructions.</li>
            <li>The Plugin defect has been caused by any of Customer's malfunctioning equipment or Customer provided Plugin.</li>
            <li>The Plugin has been modified by the Customer without Elite Contrivers' clear written consent.</li>
            <li>Because of client environment modifications, Plugin is not functioning.</li>
            <li>Combined the Plugin with other products.</li>
            <li>After making the purchase, the customer no longer needs the Plugin or his or her needs have changed in favour of the services.</li>
            <li>When the customer willingly bought the Plugin after trying the Elite Contrivers team's demo or trial.</li>
            </ol>
            If a refund is given, the plugin license will be cancelled immediately and the customer must stop using the plugin and return it to Elite Contrivers as soon as possible after receiving the receipt of refund. Elite Contrivers expressly disclaims any warranty regarding the Plugin's uninterrupted or error-free operation as well as the ability to be fixed for all of its flaws.<br>
            Please email us at <a href="mailto:info@elitecontrivers.com">info@elitecontrivers.com</a> for any queries regarding the return policy.
        </p>
    </div>
    <script>
        jQuery(document).ready(function($){
            const ec_addon_tab = document.getElementById("ec_addon_pricing");
            const ec_pricing_tab = document.getElementById("ec_main_pricing");
            ec_addon_tab.addEventListener("click", function() {
                jQuery(ec_addon_tab).addClass('ec_switch_active');
                jQuery(ec_pricing_tab).removeClass('ec_switch_active');
                jQuery('#ec_main_plan_section').hide();
                jQuery('#ec_addon_plan_section').show();
            });
            ec_pricing_tab.addEventListener("click", function() {
                jQuery(ec_pricing_tab).addClass('ec_switch_active');
                jQuery(ec_addon_tab).removeClass('ec_switch_active');
                jQuery('#ec_main_plan_section').show();
                jQuery('#ec_addon_plan_section').hide();
            });
            jQuery('#ec_basic_plan').on('change', function () {
                if(this.value === "1"){
                    jQuery('#ec_basic_disc').html(' $19');
                }
                if(this.value === "2"){
                    jQuery('#ec_basic_disc').html(' $35');
                }
                if(this.value === "3"){
                    jQuery('#ec_basic_disc').html(' $49');
                }
                if(this.value === "5"){
                    jQuery('#ec_basic_disc').html(' $59');
                }
                if(this.value === "10"){
                    jQuery('#ec_basic_disc').html(' $99');
                }
            });

            jQuery('#ec_standard_plan').on('change', function () {
                if(this.value === "1"){
                    jQuery('#ec_standard_disc').html(' $49');
                }
                if(this.value === "2"){
                    jQuery('#ec_standard_disc').html(' $89');
                }
                if(this.value === "3"){
                    jQuery('#ec_standard_disc').html(' $129');
                }
                if(this.value === "5"){
                    jQuery('#ec_standard_disc').html(' $149');
                }
                if(this.value === "10"){
                    jQuery('#ec_standard_disc').html(' $249');
                }
            });

            jQuery('#ec_premium_plan').on('change', function () {
                if(this.value === "1"){
                    jQuery('#ec_premium_disc').html(' $99');
                }
                if(this.value === "2"){
                    jQuery('#ec_premium_disc').html(' $189');
                }
                if(this.value === "3"){
                    jQuery('#ec_premium_disc').html(' $249');
                }
                if(this.value === "5"){
                    jQuery('#ec_premium_disc').html(' $299');
                }
                if(this.value === "10"){
                    jQuery('#ec_premium_disc').html(' $499');
                }
            });
        });
    </script>
    <?php
}
