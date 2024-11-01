<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_display_forms(){
    ?>
    <form id="ec_display_form" name="redirect" method="post" action="">
		<input type="hidden" name="save_settings" value="ec_display_form_values" />
		<input type="hidden" name="ec_display_form_values_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ec-display-form-values-nonce' ) ); ?>"/>
        <table class=" elite_main_block ec_table_border">
            <tbody>
                <tr>
                    <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress-logo-blue.png' );?> height=40px><br/>WP Default Login form</th>
                    <td>
                        <fieldset>
                        <input type="checkbox" name="ecsl_default_login_form" value="1"
                            <?php checked( get_option( 'ecsl_default_login_form' ) == '1' ); ?> />
                        <label><?php echo esc_attr( 'Default Login Form' ); ?></label><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/default_login_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                        <input type="checkbox" disabled />
                        <label><?php echo esc_attr( 'Above Login Form' ); ?></label><span class="ec_premium_span">Premium</span><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/above_login_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                        <input type="checkbox" disabled />
                        <label><?php echo esc_attr( 'Below Login Form' ); ?></label><span class="ec_premium_span">Premium</span><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/below_login_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress-logo-blue.png' );?> height=40px><br/>WP Default Registration form</th>
                    <td>
                        <fieldset>
                        <input type="checkbox" name="ecsl_default_registration_form" value="1"
                            <?php checked( get_option( 'ecsl_default_registration_form' ) == '1' ); ?> />
                        <label><?php echo esc_attr( 'Default Registration Form' ); ?></label><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/default_registration_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                        <input type="checkbox" disabled />
                        <label><?php echo esc_attr( 'Above Registration Form' ); ?></label><span class="ec_premium_span">Premium</span><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/above_registration_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                        <input type="checkbox" disabled />
                        <label><?php echo esc_attr( 'Below Registration Form' ); ?></label><span class="ec_premium_span">Premium</span><br/>
                        <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/wordpress/below_registration_buttons.png' );?> height=250px>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td colspan=3 style="text-align:center;"><input style="width:20%" type="submit" name="submit" value="<?php echo esc_attr(  'Save' ); ?>"  class="button button-primary button-large" /></td>
                </tr>
            </tbody>
        </table>
    </form>
    <br/><hr/><br/>
    <h2 style="text-align:center">Popular plugin Display Options Integration <span class="ec_premium_span">Premium</span></h2>
    <table class=" elite_main_block ec_table_border">
        <tbody>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress-logo.png' );?> height=40px><br/>BuddyPress / BuddyBoss<br/><span class="ec_premium_span">Premium</span></th>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Registration Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_before_registration.png' );?>" width="180px" height="250px">
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Account Details' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_before_account.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress/buddypress_after_registration.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro-logo.png' );?> height=40px><br/>Paid Membership Pro<br/><span class="ec_premium_span">Premium</span></th>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Membership Level' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_level_cost.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Username' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_username.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Account Information' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro/pmpro_after_account_info.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce-logo.png' );?> height=40px><br/>Woocommerce Login<br/><span class="ec_premium_span">Premium</span></th>
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
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce-logo.png' );?> height=40px><br/>Woocommerce Registration<br/><span class="ec_premium_span">Premium</span></th>
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
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce-logo.png' );?> height=40px><br/>Woocommerce Checkout<br/><span class="ec_premium_span">Premium</span></th>
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
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate-logo.png' );?> height=40px><br/>Ultimate Member Login<br/><span class="ec_premium_span">Premium</span></th>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Login Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_before_login.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Default Login Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_after_login.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Login Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_after_login_form.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate-logo.png' );?> height=40px><br/>Ultimate Member Registration<br/><span class="ec_premium_span">Premium</span></th>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Before Registration Form' ); ?></label><br/>
                    <img src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_before_registration.png' );?>" width=180px height=250px>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'Default Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_after_registration.png' );?> width=180px height=250px >
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                    <input type="checkbox" disabled />
                    <label><?php echo esc_attr( 'After Registration Form' ); ?></label><br/>
                    <img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/ultimate_member/ultimate_memb_after_registration_form.png' );?> width=180px height=250px>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/memberpress-logo.png' );?> height=40px><br/>MemberPress<br/><span class="ec_premium_span">Premium</span></th>
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
        </tbody>
    </table>
	<?php
}

