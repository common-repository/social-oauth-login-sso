<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require 'ec_general_form.php';
require 'ec_redirect_form.php';
require 'ec_display_form.php';
require 'ec_shortcode_display.php';

function ecsl_settings_layout(){
    if( isset( $_GET[ 'sub_tab' ]) ) {
		$sub_active_tab = sanitize_text_field($_GET[ 'sub_tab' ]);
        $sub_tabs = array("general_settings", "redirect_register", "display_forms", "shortcodes");
        if(!in_array($sub_active_tab,$sub_tabs)){
            $sub_active_tab = 'general_settings';
        }
	} else {
		$sub_active_tab = 'general_settings';
	}
    ?>
    <div class = "ec_main_container">
        <div class="ec_sub_tab">
            <a class="ec_sub_tab_option <?php echo esc_html($sub_active_tab) == 'general_settings' ? 'ec_sub_tab_option_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'general_settings'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>">General Settings</a>
            <a class="ec_sub_tab_option <?php echo esc_html($sub_active_tab) == 'redirect_register' ? 'ec_sub_tab_option_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'redirect_register'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>">Redirection & Registration</a>
            <a class="ec_sub_tab_option <?php echo esc_html($sub_active_tab) == 'display_forms' ? 'ec_sub_tab_option_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'display_forms'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>">Display Forms</a>
            <a class="ec_sub_tab_option <?php echo esc_html($sub_active_tab) == 'shortcodes' ? 'ec_sub_tab_option_active' : ''; ?>" href="<?php echo esc_url(add_query_arg( array('sub_tab' => 'shortcodes'), sanitize_url($_SERVER['REQUEST_URI'] ))); ?>">Shortcodes</a>
        </div>
        <div class="ec_sub_content" >
            <?php
                if($sub_active_tab == "general_settings"){
                    ecsl_general_settings();
                }
                elseif($sub_active_tab == "redirect_register"){
                    ecsl_redirect_url();
                }
                else if($sub_active_tab == "display_forms"){
                    ecsl_display_forms();
                }
                else if($sub_active_tab == "shortcodes"){
                    ecsl_shortcode_display();
                }
            ?>
        </div>
    </div>
    <?php
}
