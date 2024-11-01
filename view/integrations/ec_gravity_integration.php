<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_gravity_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/gravity-logo.png' );?> width=60px height=60px><span class="ec_premium_span">Premium</span><br/>Gravity Form Integration</th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Map the returned attributed from Social OAuth providers into Gravity form' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Enable Gravity Form Integration' ); ?></label><br/><br/>
                    <label>
                        <?php echo esc_attr( 'Form ID' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter the Gravity Form ID"/>
                    </label><br/><br/>
                    <label>
                        <?php echo esc_attr( 'Form Page URL' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter the URL of the Form Page"/>
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
