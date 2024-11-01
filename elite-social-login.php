<?php

/**
 * Plugin Name: OAuth Social Login - SSO by Elite Contrivers
 * Plugin URI: https://www.elitecontrivers.com/
 * Description: Allow your users to register & login with Oauth applications like Discord, Facebook, Google.
 * Version: 1.0.5
 * Requires PHP: 5.4
 * Author: Elite Contrivers
 * Text Domain: elite-social-login
 * Author URI: https://www.elitecontrivers.com/
 * License: GPL2
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

 define( 'ECSL_SOCIAL_LOGIN_VERSION', '1.0.5' );
 define( 'ECSL_PLUGIN_URL', esc_url( plugin_dir_url( __FILE__ ) ) );
 require 'elite-main-page.php';
 require 'view/list_apps/ec_list_apps_action.php';
 require 'elite_save_settings.php';
 require 'elite_validate_login.php';
 require 'elite-OAuth-apps.php';
 require 'view/feedback_form/feedback_form.php';

 class elite_social_settings {
    function __construct() {
        add_action( 'admin_menu', array( $this, 'elite_social_menu' ) );
        add_action( 'admin_init', 'elite_save_values' );
        add_action( 'init', 'ecsl_login_app_check' );
        add_action( 'wp_ajax_ec_check_capp_enable', 'ecsl_check_capp_enable' );
        add_action( 'wp_ajax_ec_app_enable', 'ecsl_app_enable' );
        add_action( 'wp_ajax_ec_app_details_update', 'ecsl_app_details_update' );
        add_action( 'wp_ajax_ec_load_instructions', 'ecsl_load_instructions' );
        add_action( 'wp_ajax_ec_rearrange_apps', 'ecsl_rearrange_apps' );
        add_action( 'admin_enqueue_scripts', array( $this, 'ecsl_admin_plugin_script' ) );
        add_action( 'wp_login', 'ecsl_redirect_link', 11, 2 );
        if ( get_option( 'ecsl_logout_redirection_enable' ) == 1 ) {
            add_filter( 'logout_url', 'ecsl_redirect_logout_link', 0, 1 );
        }
        if ( get_option( 'ecsl_default_login_form' ) == '1' ) {
			add_action( 'login_form', array( $this, 'ecsl_oauth_add_login_buttons' ) );
		}
        if ( get_option( 'ecsl_default_registration_form' ) == '1' ) {
			add_action( 'register_form', array( $this, 'ecsl_oauth_add_login_buttons' ) );
		}
        if(get_option('ecsl_set_user_picture')) {
            add_filter( 'get_avatar', 'elite_oauth_custom_avatar' , 15, 5 );
            add_filter( 'get_avatar_url', 'elite_oauth_custom_avatar_url' , 15, 3);
        }
        add_option('elite_button_theme','default');
        add_option('elite_button_shape','longbutton');
        add_option('elite_button_effect','noeffect');
        add_option('elite_button_space','5');
        add_option('elite_button_width','200');
        add_option('elite_button_height', '35');
        add_option('elite_button_curve','10');
        add_option('elite_button_size','35');
        add_option('elite_button_s1_color','194ABD');
        add_option('elite_button_s2_color','3EB863');
        add_option('elite_button_custom_color','46ADC2');
        add_option('elite_text_color','FF6378');
        add_option('elite_text_above_button','Connect with:');
        add_option('elite_button_text','Login with');
        add_option('ecsl_logout_display_text','Howdy, ##username## |');
        add_option('ecsl_logout_display','Logout?');
        add_option('ecsl_login_redirect','homepage');
        add_option('ecsl_user_role_mapping','subscriber');
        add_option('ecsl_set_user_picture','1');
        add_option('ecsl_default_login_form','1');
        add_option('ecsl_default_registration_form','1');
        add_option('ecsl_deactivate_form_submit', '1' );
        add_shortcode( 'ec_oauth_login', array( $this, 'ecsl_oauth_login_shortcode' ) );
        add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'ecsl_add_setting_links' ) );
        add_action( 'admin_footer', array( $this, 'ecsl_feedback_form' ) );
        register_activation_hook( __FILE__, array( $this, 'ecsl_activate_plugin' ) );
		register_deactivation_hook( __FILE__, array( $this, 'ecsl_deactivate_plugin' ) );
        if(count(explode("||",get_option('ecsl_apps'))) !== 8)
            update_option('ecsl_apps','discord||facebook||google||twitter||linkedin||amazon||yahoo||vkontakte');
        $ecsl_premium_apps = array(
            'apple' => '#000000',
            'google one tap' => '#0086f9',
            'fitbit' => '#000000', 
            'github' => '#000000', 
            'naver' => '#00c73c', 
            'slack' => '#481449',
            'paypal' => '#014ea0', 
            'stackexchange' => '#232629',
            'livejournal' => '#16539a', 
            'foursquare' => '#f94877', 
            'line' => '#00b300', 
            'wordpress' => '#207195', 
            'tiktok' => '#000000', 
            'stackoverflow' => '#000000', 
            'dropbox' => '#005ef7', 
            'twitch' => '#9146ff', 
            'mailru' => '#014b88', 
            'reddit' => '#f74300', 
            'tumblr' => '#375672', 
            'odnoklassniki' => '#ef8e1d', 
            'gitlab' => '#000000', 
            'hubspot' => '#ef7120', 
            'windowslive' => '#000000', 
            'disqus' => '#2d9af7', 
            'spotify' => '#1dd05d', 
            'yandex' => '#de251f',
            'teamsnap' => '#f75901', 
            'snapchat' => '#f7f400', 
            'flickr' => '#5f6368', 
            'kakao' => '#ffca28', 
            'dribble' => '#e76691', 
        );
        update_option("ecsl_premium_apps",$ecsl_premium_apps);
    }

    function elite_social_menu() {
        $page = add_menu_page('Elite Contrivers  ' . __( 'OAuth Social Login', 'ec_social_settings' ), 'Elite OAuth Social Login', 'administrator', 'ec_social_settings', 'ecsl_social_register', plugin_dir_url( __FILE__ ) . 'includes/images/elite_menu_logo.png');
        wp_enqueue_style( 'elite-style-header', plugins_url( 'includes/css/ec_header.css?version=' . ECSL_SOCIAL_LOGIN_VERSION, __FILE__ ), false );
    }

    function ecsl_admin_plugin_script(){
        wp_enqueue_script( 'jquery-ui-sortable', plugin_dir_path( dirname(dirname( __DIR__ )) ).'/wp-includes/js/jquery/ui/sortable.js' );
        wp_enqueue_script( 'ec_admin_color_script', plugins_url( 'includes/jscolor/jscolor.js', __FILE__ ) );
        wp_enqueue_style( 'ec_wp_bootstrap_social', plugins_url( 'includes/css/bootstrap-social.css', __FILE__ ), false );
        wp_enqueue_style( 'ec-wp-bootstrap-main', plugins_url( 'includes/css/bootstrap.min-preview.css', __FILE__ ), false );
    }

    function ecsl_add_setting_links($actions){
        $url = esc_url(add_query_arg('page','ec_social_settings',get_admin_url() . 'admin.php'));
		$new_link  = "<a href='$url'>Configure</a>";
		array_push( $actions, $new_link );
		return array_reverse( $actions );
    }

    function ecsl_oauth_add_login_buttons(){
        if ( ! is_user_logged_in() ){
            $html         = ecsl_show_oauth_apps();
            $html        .= '<br/>';
            $allowed_html = array(
                'div' => array(
                    'class' => array(),
                ),
                'p'   => array( 'style' => array() ),
                'a'   => array(
                    'class'       => array(),
                    'rel'         => array(),
                    'style'       => array(),
                    'onclick'     => array(),
                    'onmouseover' => array(),
                    'onmouseout'  => array(),
                    'id'          => array(),
                ),
                'img' => array(
                    'class' => array(),
                    'style' => array(),
                    'src'   => array(),
                    'id'    => array(),
                ),
            );
            echo wp_kses( $html, $allowed_html );
        }
        else {
			$active_user = wp_get_current_user();
            $ec_logout_name = str_replace( '##username##', $active_user->display_name, esc_attr( get_option( 'ecsl_logout_display_text' ) ) );
            $ec_active_username = $ec_logout_name;
            $ecsl_logout_display = esc_attr( get_option( 'ecsl_logout_display' ) );
            ?>
            <div><?php echo esc_attr( $ec_active_username ); ?> <a href="<?php echo esc_url( wp_logout_url( site_url() ) ); ?>" title="<?php echo esc_attr( 'Logout' ); ?>"><?php echo esc_attr( $ecsl_logout_display ); ?></a></div>
            <?php
		}
    }

    function ecsl_oauth_login_shortcode($atts){
        if ( ! is_user_logged_in() ){
            $html = ecsl_show_oauth_apps($atts);
        }
        else {
            $active_user = wp_get_current_user();
            $ec_logout_name = str_replace( '##username##', $active_user->display_name, esc_attr( get_option( 'ecsl_logout_display_text' ) ) );
            $ec_active_username = $ec_logout_name;
            $ecsl_logout_display = esc_attr( get_option( 'ecsl_logout_display' ) );
            $html = '<div>'. esc_attr( $ec_active_username ).' <a href="'. esc_url( wp_logout_url( site_url() ) ) .'" title="'. esc_attr( 'Logout' ) .'">'. esc_attr( $ecsl_logout_display ) .'</a></div>';
		}
		return $html;
    }

    function ecsl_activate_plugin() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ec_oauth_login_users';
        if ( $wpdb->get_var( $wpdb->prepare( 'show tables like %s', $table_name ) ) != $table_name ) {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name ( id mediumint(9) NOT NULL AUTO_INCREMENT, linked_oauth_app varchar(55) NOT NULL, user_email varchar(55) NOT NULL, user_id BIGINT(20) NOT NULL, oauth_identity VARCHAR(100) NOT NULL, timestamp datetime DEFAULT '0000-00-00 00:00:00' NOT NULL, PRIMARY KEY  (id) ) $charset_collate;";
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta( $sql );
        }
        if(get_option('ecsl_activation_mail') == ''){
            $email = esc_html( get_option('admin_email') );
            $product_name = "OAuth Social Login";
            $access_token_url = 'https://www.elitecontrivers.com/contact-us/';
            $ec_post_data = 'ec_new_installation="true"&cutomer_email='.$email.'&product_name='.$product_name;
            $args   = array(
                'method'      => 'POST',
                'body'        => $ec_post_data,
                'timeout'     => '5',
                'redirection' => '5',
                'httpversion' => '1.0',
                'blocking'    => true,
            );
            wp_remote_post( $access_token_url, $args );
            update_option('ecsl_activation_mail','sent_mail');
        }
    }

    function ecsl_deactivate_plugin() {
        delete_option('elite_button_theme');
        delete_option('elite_button_shape');
        delete_option('elite_button_effect','noeffect');
        delete_option('elite_button_space','5');
        delete_option('elite_button_width','200');
        delete_option('elite_button_height', '35');
        delete_option('elite_button_curve','10');
        delete_option('elite_button_size','35');
        delete_option('elite_button_s1_color','194ABD');
        delete_option('elite_button_s2_color','3EB863');
        delete_option('elite_button_custom_color','46ADC2');
        delete_option('elite_text_color','FF6378');
        delete_option('elite_text_above_button','Connect with:');
        delete_option('elite_button_text','Login with');
        delete_option('ecsl_logout_display_text','Howdy, ##username## |');
        delete_option('ecsl_logout_display','Logout?');
        delete_option('ecsl_login_redirect','homepage');
        delete_option('ecsl_user_role_mapping','subscriber');
        delete_option('ecsl_set_user_picture','1');
        delete_option('ecsl_default_login_form','1');
        delete_option('ecsl_default_registration_form','1');
    }

    function ecsl_feedback_form() {
		if ( get_option('ecsl_deactivate_form_submit' ) ) {
            ecsl_display_feedback_form();
		}
	}
}

 new elite_social_settings();
 
