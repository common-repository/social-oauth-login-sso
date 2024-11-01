<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_hubspot_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/hubspot-logo.png' );?> width=60px height=60px><span class="ec_premium_span">Premium</span><br/>Hubspot Integration</th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Add user\'s to Hubspot Contact List when user is registered using OAuth Social Login' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Enable Hubspot Integration' ); ?></label><br/><br/>
                    <label>
                        <?php echo esc_attr( 'Hubspot Key' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter the APP Key"/>
                    </label>
                </fieldset>
                </td>
            </tr>
            <tr>
                <th style="text-align:center"><br/><input type="submit" disabled name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></th>
            </tr>
        </tbody>
    </table>
    <?php
}
