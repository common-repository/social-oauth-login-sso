<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require 'ec_woocommerce_integration.php';
require 'ec_buddypress_integration.php';
require 'ec_memberpress_integration.php';
require 'ec_pmpro_integration.php';
require 'ec_mailchimp_integration.php';
require 'ec_discord_integration.php';
require 'ec_gravity_integration.php';
require 'ec_mailerlite_integration.php';
require 'ec_hubspot_integration.php';

function ecsl_integrations_layout(){
    if( isset( $_GET[ 'sub_tab' ]) ) {
		$sub_active_tab = sanitize_text_field($_GET[ 'sub_tab' ]);
        $sub_tabs = array("woocommerce_integration", "buddypress_integration", "memberpress_integration", "pmpro_integration","mailchimp_integration","discord_integration","gravity_integration","github_integration","mailerlite_integration","activechampain_integration","hubspot_integration");
        if(!in_array($sub_active_tab,$sub_tabs)){
            $sub_active_tab = 'woocommerce_integration';
        }
	} else {
		$sub_active_tab = 'woocommerce_integration';
	}
    ?>
    <div style="width:100%" class = "ec_main_container">
        <div class="ec_sub_tab_integration" style="width:10%; float:left">
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'woocommerce_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'woocommerce_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/woocommerce-logo.png' );?> class="ec_integration_logo" /><br/>WooCommerce</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'buddypress_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'buddypress_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/buddypress-logo.png' );?> class="ec_integration_logo" /><br/>BuddyPress</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'memberpress_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'memberpress_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/memberpress-logo.png' );?> class="ec_integration_logo" /><br/>MemberPress</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'pmpro_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'pmpro_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/pmpro-logo.png' );?> class="ec_integration_logo" /><br/>PMPRO</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'mailchimp_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'mailchimp_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/mailchimp-logo.png' );?> class="ec_integration_logo" /><br/>MailChimp</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'discord_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'discord_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img style="height:40px" src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/discord-logo.png' );?> class="ec_integration_logo" /><br/>Discord</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'gravity_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'gravity_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img style="height:40px" src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/gravity-logo.png' );?> class="ec_integration_logo" /><br/>Gravity_Form</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'mailerlite_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'mailerlite_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/mailerlite-logo.png' );?> class="ec_integration_logo" /><br/>Mailerlite</a><br/>
            <a class="ec_sub_tab_option ec_integration_tab <?php echo esc_html($sub_active_tab) == 'hubspot_integration' ? 'ec_sub_tab_integartion_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'hubspot_integration'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>"><img src=<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/login_images/hubspot-logo.png' );?> class="ec_integration_logo" /><br/>HubSpot</a>
        </div>
        <div class="ec_sub_content" style="width:85%; float:left">
            <?php
                if($sub_active_tab == "woocommerce_integration"){
                    ecsl_woocommerce_integration_settings();
                }
                elseif($sub_active_tab == "buddypress_integration"){
                    ecsl_buddypress_integration_settings();
                }
                else if($sub_active_tab == "memberpress_integration"){
                    ecsl_memberpress_integration_settings();
                }
                else if($sub_active_tab == "pmpro_integration"){
                    ecsl_pmpro_integration_settings();
                }
                else if($sub_active_tab == "mailchimp_integration"){
                    ecsl_mailchimp_integration_settings();
                }
                else if($sub_active_tab == "discord_integration"){
                    ecsl_discord_integration_settings();
                }
                else if($sub_active_tab == "gravity_integration"){
                    ecsl_gravity_integration_settings();
                }
                else if($sub_active_tab == "mailerlite_integration"){
                    ecsl_mailerlite_integration_settings();
                }
                else if($sub_active_tab == "hubspot_integration"){
                    ecsl_hubspot_integration_settings();
                }
            ?>
        </div>
    </div>
    <?php
}
