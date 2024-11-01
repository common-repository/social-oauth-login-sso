<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_pmpro_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th colspan=3><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro-logo.png' );?> height=40px><span class="ec_premium_span">Premium</span><br/>Paid Membership Pro Integration</th>
            </tr>
            <tr>
                <td colspan=3>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Paid Membership Levels for Users' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label>
                        <?php echo esc_attr( 'Assign Default Level' ); ?>
                        <select disabled><option value="">Select Membership Level</option></select>
                    </label><br/><br/>
                    <input type="checkbox" disabled />
                    <label>
                        <?php echo esc_attr( 'User Choice Level' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter page link to select membership level"/>
                    </label><br/><br/>
                    <label><?php echo esc_attr( 'The above feature will assign chosen Membership to new registered user\'s' ); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'Paid Membership Pro Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Membership Level' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_level_cost.png' );?>" width=180 height="250px">
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Username' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_username.png' );?> width=180 height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Account Information' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_account_info.png' );?> width=180 height=250px>
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
