<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_redirect_url(){
    ?>
    <form id="ec_redirect_url" name="redirect" method="post" action="">
		<input type="hidden" name="save_settings" value="ec_redirect_url_values" />
		<input type="hidden" name="ecsl_redirect_url_values_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ec-redirect-url-values-nonce' ) ); ?>"/>
        <table class=" elite_main_block ec_table_border">
            <tbody>
                <tr>
                    <th>Redirection After Login</th>
                    <td>
                    <fieldset>
                            <input type="radio" name="ecsl_login_redirect" value="homepage" onclick="ecsl_login_redirect_check();"
                                <?php checked( get_option( 'ecsl_login_redirect' ) == 'homepage' ); ?> />
                            <label><?php echo esc_attr( 'Home Page'); ?></label>
                            <span class="ec_notice"><?php echo esc_url( site_url() ); ?></span><br/>
                            <input type="radio" id="ecsl_login_redirect_custom_url" name="ecsl_login_redirect" value="custom" onclick="ecsl_login_redirect_check()"
                                <?php checked( get_option( 'ecsl_login_redirect' ) == 'custom' ); ?> />
                            <label><?php echo esc_attr('Custom URL' ); ?></label>
                            <input type="text"  id="ecsl_login_redirect_url_id" name="ecsl_login_redirect_url" value="<?php echo esc_url( get_option( 'ecsl_login_redirect_url' ) ); ?>" />
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Redirection After Logout</th>
                    <td>
                        <fieldset>
                            <input type="checkbox" name="ecsl_logout_redirection_enable" value="1"
                                        <?php checked( get_option( 'ecsl_logout_redirection_enable' ) == 1 ); ?> />
                            <label><?php echo esc_attr( 'Enable Logout Redirection' ); ?></label><br/><br/>
                            <input type="radio" name="ecsl_logout_redirect" value="homepage" onclick="ecsl_logout_redirect_check();"
                                <?php checked( get_option( 'ecsl_logout_redirect' ) == 'homepage' ); ?> />
                            <label><?php echo esc_attr( 'Home Page'); ?></label>
                            <span class="ec_notice"><?php echo esc_url( site_url() ); ?></span><br/>
                            <input type="radio" id="ecsl_logout_redirect_custom_url" name="ecsl_logout_redirect" value="custom" onclick="ecsl_logout_redirect_check()"
                                <?php checked( get_option( 'ecsl_logout_redirect' ) == 'custom' ); ?> />
                            <label><?php echo esc_attr( 'Custom URL' ); ?></label>
                            <input type="text"  id="ecsl_logout_redirect_url" name="ecsl_logout_redirect_url" value="<?php echo esc_url( get_option( 'ecsl_logout_redirect_url' ) ); ?>" />
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Redirection After Registration <br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Login Redirection after Registration' ); ?></label><br/><br/>
                            <input type="radio" value="homepage" disabled/>
                            <label><?php echo esc_attr( 'Homepage' ); ?></label>
                            <span class="ec_notice"><?php echo esc_url( site_url() ); ?></span><br/>
                            <input type="radio" value="custom" disabled/>
                            <label><?php echo esc_attr('Custom URL' ); ?></label>
                            <input type="text" disabled />
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>WordPress Role Mapping</th>
                    <td>
                        <fieldset>
                            <label><?php echo esc_attr( 'Select Role' ); ?></label>
                            <select name="ecsl_user_role_mapping"> 
                            <?php
                                if ( get_option( 'ecsl_user_role_mapping' ) ) {
                                    $default_role = get_option( 'ecsl_user_role_mapping' );
                                } else {
                                    $default_role = get_option( 'default_role' );
                                }
                                wp_dropdown_roles( $default_role );
                            ?>
                            </select>
                        </fieldset>
                        <p>Assign this role to any user who registers using OAuth Social Login by using role mapping. The user will be given a role on the website based on the role mapping.</p>
                    </td>
                </tr>
                <tr>
                    <th>Restrict New User Registration <br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Disable Registration for new user\'s' ); ?></label><br/>
                        </fieldset>
                        <p>Users won't be able to register if Disable Registration for new user\'s is checked. Users with existing accounts will be able to log in.<br/> Only when people register via OAuth Applications does this setting apply. Users enrolling using the standard WordPress registration form won't be affected by this.</p>
                    </td>
                </tr>
                <tr>
                    <th>Restrict Registration for Specific Pages<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Restrict Registration for Specific Pages' ); ?></label><br/><br/>
                            <textarea rows="2" cols="90" disabled="" placeholder="Enter URL of Restricted Page(s) seprated by semicolon(;) like www.abc.com;www.pqr.com;www.xyz.com"></textarea>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Send Activation Link To User's<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                        <br/><input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Send Activation Link To User\'s' ); ?></label><br/><br/>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Domain Restriction<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                    <fieldset>
                            <table class="ec_table_border">
                                <tr>
                                    <td>
                                        <input type="radio" disabled />
                                        <label><?php echo esc_attr( 'Restricted Domain(s)'); ?></label>
                                    </td>
                                    <td>
                                        <textarea rows="2" cols="70" disabled="" placeholder="Enter domain names seprated by semicolon(;) like abc.com;gmail.com;yahoo.com"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" disabled />
                                        <label><?php echo esc_attr( 'Allowed Domain(s)'); ?></label>
                                    </td>
                                    <td>
                                        <textarea rows="2" cols="70" disabled="" placeholder="Enter domain names seprated by semicolon(;) like abc.com;gmail.com;yahoo.com"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td style="text-align:center"><input type="submit" name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></td>
                </tr>
            </tbody>
        </table>
		<script>
			function ecsl_login_redirect_check() {
                if(document.getElementById('ecsl_login_redirect_custom_url').checked)
				{
					document.getElementById('ecsl_login_redirect_url_id').setAttribute("required", "");
				}
				else {
					document.getElementById('ecsl_login_redirect_url_id').removeAttribute("required", "");
				}
			}

			function ecsl_logout_redirect_check() {
                if(document.getElementById('ecsl_logout_redirect_custom_url').checked)
				{
					document.getElementById('ecsl_logout_redirect_url').setAttribute("required", "");
				}
				else
				{
					document.getElementById('ecsl_logout_redirect_url').removeAttribute("required", "");
				}
			}
		</script>
	</form>
    <?php
}
