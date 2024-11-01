<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_woocommerce_integration_settings(){
    ?>
    <table class="elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th colspan=3><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce-logo.png' );?> height=40px><span class="ec_premium_span">Premium</span><br/>WooCommerce Integration</th>
            </tr>
            <tr>
                <td colspan=3>
                    <fieldset>
                    <label><b><?php echo esc_attr( 'Pre-Filled Woocommerce Checkout Fields' ); ?></b></label><span class="ec_premium_span">Premium</span><br/><br/> 
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Synchronize WooCommerce checkout fields' ); ?></label><br/><br/>
                    <label><?php echo esc_attr( 'The above feature will auto fill the First Name, Last Name, & Email of user in the Checkout Fields' ); ?></label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'Woocommerce Login Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Login Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_before_login.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Default Login Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_default_login.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Login Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_after_login.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'Woocommerce Registration Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Registration Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_before_registration.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Default Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_default_registration.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_after_registration.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <fieldset>
                        <h3><b><?php echo esc_attr( 'Woocommerce Checkout Display Options' ); ?></b><span class="ec_premium_span">Premium</span></h3>
                    </fieldset>
                </th>
            </tr>
            <tr>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Checkout Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_before_checkout.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Checkout Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce/woocommerce_after_checkout.png' );?> width=180px height=250px >
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
