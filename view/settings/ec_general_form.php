<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_general_settings(){
    ?>
    <form id="ec_redirect_url" name="redirect" method="post" action="">
		<input type="hidden" name="save_settings" value="ec_general_values" />
		<input type="hidden" name="ec_general_values_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ec-general-values-nonce' ) ); ?>"/>
        <table class=" elite_main_block ec_table_border">
            <tbody>
                <tr>
                    <th>Display Picture</th>
                    <td>
                        <fieldset>
                            <input type="checkbox" name="ecsl_set_user_picture" value="1"
                                    <?php checked( get_option( 'ecsl_set_user_picture' ) == 1 ); ?> />
                            <label><?php echo esc_attr( 'Enable Display Picture to set when user registers' ); ?></label>
                        </fieldset>
                        <p>Enable this to set social profile picture if returned from any OAuth provider.</p><br/>
                    </td>
                </tr>
                <tr>
                    <th>GDPR<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable GDPR to get users\' permission' ); ?></label><br/>
                            <table class="ec_table_border" style="width:100%">
                                <tr>
                                    <td><label><?php echo esc_attr('Enter the consent notice' ); ?></label></td>
                                    <td><input disabled type="text" style="width:100%" placeholder="I agree to the terms and conditions" /></td>
                                </tr>
                                <tr>
                                    <td><label><?php echo esc_attr('Enter the URL for the privacy declarations' ); ?></label></td>
                                    <td><input disabled type="text" style="width:100%" placeholder="https://www.mypolicyurl.com" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Admin Approval <br/>For New Registered User(s)<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Admin Approval For New Registered User(s)' ); ?></label>
                        </fieldset>
                        <p>Enabling this option will limit newly registered members' access. When a user is created using OAuth provider, they cannot access the website unless the admin grants them access by activating their accounts.</p>
                    </td>
                </tr>
                <tr>
                    <th>Account Linking <br/>For Existing User(s)<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Account Linking For Existing User(s)' ); ?></label>
                        </fieldset>
                        <p>Enabling this option, the user can connect their various OAuth Social profiles.</p>
                    </td>
                </tr>
                <tr>
                    <th>Password Reset Link<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Send Password Reset Link to New Registered User(s)' ); ?></label>
                        </fieldset>
                        <p>Enable this option to send reset password link of WordPress credentaisl for the users who register's with OAuth Social profiles.</p>
                    </td>
                </tr>
                <tr>
                    <th>Disable Admin Bar<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                        <br/><input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Disable Admin Bar' ); ?></label><br/><br/>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Email Notification to User<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Email Notification For New Registered User' ); ?></label><br/><br/>
                            <input disabled type="text" style="width:90%" placeholder="Enter Subject" /><br/><br/>
                            <?php
                                wp_editor( '', 'ec_send_email_user' ,array("media_buttons"=>FALSE,'quicktags' => false,"editor_height"=>100));
                            ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th>Email Notification to Admin<br/><span class="ec_premium_span">Premium</span></th>
                    <td>
                        <fieldset>
                            <input type="checkbox" disabled />
                            <label><?php echo esc_attr( 'Enable Email Notification For Admin' ); ?></label><br/><br/>
                            <input disabled type="text" style="width:90%" placeholder="Enter Subject" /><br/><br/>
                            <input disabled type="text" style="width:90%" placeholder="Enter Email of Admin(s) seprated by semicolon(;) like admin1@gmail.com;admin2@gmail.com" /><br/><br/>
                            <?php
                                wp_editor( '', 'ec_send_email_user' ,array("media_buttons"=>FALSE,'quicktags' => false,"editor_height"=>100));
                            ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td style="text-align:center"><input type="submit" name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></td>
                </tr>
            </tbody>
        </table>
	</form>
    <?php
}
