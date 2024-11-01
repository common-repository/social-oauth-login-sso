<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_memberpress_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th colspan=3><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/memberpress-logo.png' );?> height=40px><span class="ec_premium_span">Premium</span><br/>MemberPress Integration</th>
            </tr>
            <tr>
                <td colspan=3>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Assign MemberPress Roles for Users' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label>
                        <?php echo esc_attr( 'Assign MemberPress Role' ); ?>
                        <select disabled><option value="">Select MemberPress Role</option></select>
                    </label><br/><br/>
                    <input type="checkbox" disabled />
                    <label>
                        <?php echo esc_attr( 'User Choice Role' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter page link to select memberpress Role"/>
                    </label><br/><br/>
                    <label><?php echo esc_attr( 'The above feature will assign chosen MemberPress Role to new registered user\'s' ); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'MemberPress Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Login Form' ); ?></label><br/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Account' ); ?></label><br/>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After SignUp Form' ); ?></label><br/>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3 style="text-align:center"><br/><input type="submit" disabled name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></th>
            </tr>
        </tbody>
    </table>
    <?php
}
