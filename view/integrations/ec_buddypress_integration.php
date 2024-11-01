<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_buddypress_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th colspan=3><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress-logo.png' );?> height=40px><span class="ec_premium_span">Premium</span><br/>BuddyPress Integration</th>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'BuddyPress Attribute Mapping' ); ?></b></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td colspan=3>
                    <fieldset>
                        <table style="width:50%; text-align:center">
                            <tr>
                                <th colspan=2><label>BuddyPress Attribute Mapping</label><span class="ec_premium_span">Premium</span></th>
                            </tr>
                            <tr>
                                <td><label>Select Application</label></td>
                                <td><select disabled><option value="">Select Application</option></select></td>
                            </tr>
                            <tr>
                                <td><label>Name</label></td>
                                <td><select disabled><option value="">Select Attribute</option></select></td>
                            </tr>
                            <tr>
                                <td><label>Email</label></td>
                                <td><select disabled><option value="">Select Attribute</option></select></td>
                            </tr>
                            <tr>
                                <td><input type="submit" disabled value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></td>
                                <td><input type="submit" disabled value="<?php echo esc_attr(  'Clear' ); ?>"  class="button button-primary button-large" /></td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'BuddyPress Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Registration Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_before_registration.png' );?>" width=180 height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Account Details' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_before_account.png' );?> width=180 height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_after_registration.png' );?> width=180 height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3 style="text-align:center"><br/><input disabled type="submit" name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></th>
            </tr>
        </tbody>
    </table>
    <?php
}
