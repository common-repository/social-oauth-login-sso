<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_mailerlite_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/mailerlite-logo.png' );?> height=40px><span class="ec_premium_span">Premium</span><br/>MailerLite Integration</th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Add Subscribers in MailerLite Subscriber List' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <label>
                        <?php echo esc_attr( 'API Key' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter your API Key"/>
                    </label><br/><br/>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Require User\'s Consent' ); ?></label><br/><br/>
                    <label><?php echo esc_attr( 'The above feature will add user as a subscriber in Mailerlight List when user is registered using OAuth Social Login' ); ?></label>
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
