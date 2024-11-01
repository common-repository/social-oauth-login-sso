<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require 'view/contact_support/ec_contact_support.php';
require 'view/list_apps/ec_list_apps.php';
require 'view/application_layout/ec_app_layout.php';
require 'view/settings/ec_settings.php';
require 'view/license_plan/license_plan.php';
require 'view/integrations/ec_integrations.php';

ob_start();

function ecsl_social_register(){
    if( isset( $_GET[ 'tab' ]) ) {
		$active_tab = sanitize_text_field($_GET[ 'tab' ]);
	} else {
		$active_tab = 'apps';
	}
    $req_url = sanitize_url($_SERVER['REQUEST_URI']);
    if($active_tab !=='settings' || $active_tab !== "integrations"){
        if(strpos( sanitize_url( $_SERVER['REQUEST_URI'] ), 'sub_tab' ) !== false){
            $req_url = explode('&sub_tab',$req_url)[0];
        }
    }
    ?>
    <div id="ec-admin">
        <div class="ec-admin-header">
            <h1>
                <a href="https://www.elitecontrivers.com/" target="_blank">
                    <img src="<?php echo esc_url(plugin_dir_url( __FILE__ )) . 'includes/images/elite_logo.png' ?>" width="50" height="75" alt="Elite OAuth Social Login">Elite Social OAuth SSO</a>
            </h1>
            <a class="ec-admin-header-nav" href="https://doc.elitecontrivers.com/wordpress-oauth-social-login/" target="_blank">Documenation</a>
            <a class="ec-admin-header-nav" href="mailto:info@elitecontrivers.com">24X7 Support</a>
        </div>
        <div id="tab">
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab <?php echo esc_html($active_tab) == 'apps' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('tab' => 'apps'), $req_url )); ?>">Social Applications</a>
                <a class="nav-tab <?php echo esc_html($active_tab) == 'layout' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('tab' => 'layout'), $req_url )); ?>">Application Buttons</a>
                <a class="nav-tab <?php echo esc_html($active_tab) == 'settings' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('tab' => 'settings'), $req_url )); ?>">Settings</a>
                <a class="ec_premium_tab <?php echo esc_html($active_tab) == 'licensing' ? 'ec_premium_tab_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('tab' => 'licensing'), $req_url )); ?>">Premium Plans</a>
                <a class="nav-tab <?php echo esc_html($active_tab) == 'integrations' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('tab' => 'integrations'), $req_url )); ?>">Popular Plugins Integration</a>
            </h2>
        </div>
        <div style="width: 100%;margin-top: 13px;" id="ec-main-container">
            <div class="ec_main_content" style="width: 75%; float: left;" >
                <?php 
                    if($active_tab == "apps"){
                        ecsl_list_apps();
                    }
                    else if($active_tab == "layout"){
                        ecsl_buttons_layout();
                    }
                    else if($active_tab == "settings"){
                        ecsl_settings_layout();
                    }
                    else if($active_tab == "licensing"){
                        ecsl_license_show();
                    }
                    elseif($active_tab == "integrations"){
                        ecsl_integrations_layout();
                    }
                ?>
            </div>
            <div style="width: 24%; display: inline-block;" >
                <?php ecsl_get_support(); ?>
            </div>
        </div>
    </div>
    <?php
}
