<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_discord_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/discord-logo.png' );?> width=60px height=60px><span class="ec_premium_span">Premium</span><br/>Discord Integration</th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Restrict your WordPress users to Login/Register if not present in Discord Server' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Enable User Restriction' ); ?></label><br/><br/>
                    <label>
                        <?php echo esc_attr( 'Guild ID' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter your Guild ID of Discord Server"/>
                    </label><br/><br/>
                    <label>
                        <?php echo esc_attr( 'Bot Token Key' ); ?>
                        <input type="text" style="width:40%" disabled placeholder="Enter your Bot Token Key of Discord Server"/>
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
