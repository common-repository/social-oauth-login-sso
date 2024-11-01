<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function elite_save_values(){
    $get_value = isset( $_POST['save_settings'] ) ? sanitize_text_field( $_POST['save_settings'] ) : '';
    switch($get_value){
        case 'elite_save_app_buttons':
            $nonce = sanitize_text_field( $_POST['elite_save_app_buttons_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'elite-save-app-buttons-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
            } else {
                if ( current_user_can( 'administrator' ) ) {
                    update_option( 'elite_button_shape', isset( $_POST['elite_button_shape'] ) ? sanitize_text_field( $_POST['elite_button_shape'] ) : '' );
                    update_option( 'elite_button_theme', isset( $_POST['elite_button_theme'] ) ? sanitize_text_field( $_POST['elite_button_theme'] ) : '' );
                    update_option( 'elite_button_custom_color', isset( $_POST['elite_button_custom_color'] ) ? sanitize_text_field( $_POST['elite_button_custom_color'] ) : '' );
                    update_option( 'elite_button_s1_color', isset( $_POST['elite_button_s1_color'] ) ? sanitize_text_field( $_POST['elite_button_s1_color'] ) : '' );
                    update_option( 'elite_button_s2_color', isset( $_POST['elite_button_s2_color'] ) ? sanitize_text_field( $_POST['elite_button_s2_color'] ) : '' );
                    update_option( 'elite_button_space', isset( $_POST['elite_button_space'] ) ? sanitize_text_field( $_POST['elite_button_space'] ) : '' );
                    update_option( 'elite_button_width', isset( $_POST['elite_button_width'] ) ? sanitize_text_field( $_POST['elite_button_width'] ) : '' );
                    update_option( 'elite_button_height', isset( $_POST['elite_button_height'] ) ? sanitize_text_field( $_POST['elite_button_height'] ) : '' );
                    update_option( 'elite_button_curve', isset( $_POST['elite_button_curve'] ) ? sanitize_text_field( $_POST['elite_button_curve'] ) : '' );
                    update_option( 'elite_button_size', isset( $_POST['elite_button_size'] ) ? sanitize_text_field( $_POST['elite_button_size'] ) : '' );
                    update_option( 'elite_text_color', isset( $_POST['elite_text_color'] ) ? sanitize_text_field( $_POST['elite_text_color'] ) : '' );
                    update_option( 'elite_text_above_button', isset( $_POST['elite_text_above_button'] ) ? sanitize_text_field( $_POST['elite_text_above_button'] ) : '' );
                    update_option( 'elite_button_text', isset( $_POST['elite_button_text'] ) ? sanitize_text_field( $_POST['elite_button_text'] ) : '' );
                    update_option( 'ecsl_logout_display_text', isset( $_POST['ecsl_logout_display_text'] ) ? sanitize_text_field( $_POST['ecsl_logout_display_text'] ) : '' );
                    update_option( 'ecsl_logout_display', isset( $_POST['ecsl_logout_display'] ) ? sanitize_text_field( $_POST['ecsl_logout_display'] ) : '' );
                    ecsl_display_notification('success','Settings are updated sucessfully');
                }
            }
        break;
        case 'ec_redirect_url_values':
            $nonce = sanitize_text_field( $_POST['ecsl_redirect_url_values_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'ec-redirect-url-values-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
            } else {
                if ( current_user_can( 'administrator' ) ) {
                    update_option( 'ecsl_logout_redirection_enable', isset( $_POST['ecsl_logout_redirection_enable'] ) ? sanitize_text_field( $_POST['ecsl_logout_redirection_enable'] ) : '0' );
                    update_option( 'ecsl_login_redirect', isset( $_POST['ecsl_login_redirect'] ) ? sanitize_text_field( $_POST['ecsl_login_redirect'] ) : '' );
                    update_option( 'ecsl_logout_redirect', isset( $_POST['ecsl_logout_redirect'] ) ? sanitize_text_field( $_POST['ecsl_logout_redirect'] ) : '' );
                    update_option( 'ecsl_login_redirect_url', isset( $_POST['ecsl_login_redirect_url'] ) ? sanitize_text_field( $_POST['ecsl_login_redirect_url'] ) : '' );
                    update_option( 'ecsl_logout_redirect_url', isset( $_POST['ecsl_logout_redirect_url'] ) ? sanitize_text_field( $_POST['ecsl_logout_redirect_url'] ) : '' );
                    update_option( 'ecsl_user_role_mapping', isset( $_POST['ecsl_user_role_mapping'] ) ? sanitize_text_field( $_POST['ecsl_user_role_mapping'] ) : '' );
                    ecsl_display_notification('success','Settings are updated sucessfully');
                }
            }
        break;
        case 'ec_general_values':
            $nonce = sanitize_text_field( $_POST['ec_general_values_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'ec-general-values-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
            } else {
                if ( current_user_can( 'administrator' ) ) {
                    update_option( 'ecsl_set_user_picture', isset( $_POST['ecsl_set_user_picture'] ) ? sanitize_text_field( $_POST['ecsl_set_user_picture'] ) : '' );
                    ecsl_display_notification('success','Settings are updated sucessfully');
                }
            }
        break;
        case 'ec_display_form_values':
            $nonce = sanitize_text_field( $_POST['ec_display_form_values_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'ec-display-form-values-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
            } else {
                if ( current_user_can( 'administrator' ) ) {
                    update_option( 'ecsl_default_login_form', isset( $_POST['ecsl_default_login_form'] ) ? sanitize_text_field( $_POST['ecsl_default_login_form'] ) : '0' );
                    update_option( 'ecsl_default_registration_form', isset( $_POST['ecsl_default_registration_form'] ) ? sanitize_text_field( $_POST['ecsl_default_registration_form'] ) : '' );
                    ecsl_display_notification('success','Settings are updated sucessfully');
                }
            }
        break;
        case 'ec_send_query_values':
            $nonce = sanitize_text_field( $_POST['ec_send_query_values_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'ec-send-query-values-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please try again.' );
            } else {
                if ( current_user_can( 'administrator' ) ) {
                    $email = sanitize_email( $_POST['customer_email'] );
                    $query = sanitize_text_field( $_POST['customer_query'] );
                    $product_name = "OAuth Social Login Free Version ".ECSL_SOCIAL_LOGIN_VERSION;
                    $access_token_url = 'https://www.elitecontrivers.com/contact-us/';
                    $ec_post_data = 'ec_send_ticket="true"&cutomer_email='.$email.'&cutomer_request_message='.$query.'&product_name='.$product_name;
                    $args   = array(
                        'method'      => 'POST',
                        'body'        => $ec_post_data,
                        'timeout'     => '5',
                        'redirection' => '5',
                        'httpversion' => '1.0',
                        'blocking'    => true,
                    );
                    $result = wp_remote_post( $access_token_url, $args );
                    if ( is_wp_error( $result ) ) {
                        ecsl_display_notification('error','Error occured while submitting the query.');
                    }
                    else{
                        ecsl_display_notification('success','Query submitted, we will contact you shortly.');
                    }
                }
            }
        break;
        case 'ecsl_feedback':
            $nonce = sanitize_text_field( $_POST['ecsl_feedback_values_nonce'] );
            if ( ! wp_verify_nonce( $nonce, 'ecsl-feedback-values-nonce' ) ) {
                wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please try again.' );
            } else {
                $customer_rating = isset( $_POST['feedback_rating'] ) ? sanitize_text_field( $_POST['feedback_rating'] ) : '' ;
                $customer_email = isset( $_POST['feedback_customer_email'] ) ? sanitize_text_field( $_POST['feedback_customer_email'] ) : '' ;
                $customer_feedback = isset( $_POST['customer_feedback'] ) ? sanitize_text_field( $_POST['customer_feedback'] ) : '' ;
                $customer_followup = isset( $_POST['ecsl_customer_followup'] ) ? sanitize_text_field( $_POST['ecsl_customer_followup'] ) : 'Do not Follow up' ;
                $feedback_submit = isset( $_POST['elite_feedback_submit'] ) ? sanitize_text_field( $_POST['elite_feedback_submit'] ) : '' ;
                $product_name = "OAuth Social Login Free Version ".ECSL_SOCIAL_LOGIN_VERSION;
                $access_token_url = 'https://www.elitecontrivers.com/contact-us/';
                $ec_post_data = 'ec_send_feedback="true"&customer_rating='.$customer_rating.'&cutomer_email='.$customer_email.'&cutomer_feedback='.$customer_feedback.'&customer_followup='.$customer_followup.'&feedback_submit='.$feedback_submit.'&product_name='.$product_name;
                $args   = array(
                    'method'      => 'POST',
                    'body'        => $ec_post_data,
                    'timeout'     => '5',
                    'redirection' => '5',
                    'httpversion' => '1.0',
                    'blocking'    => true,
                );
                $result = wp_remote_post( $access_token_url, $args );
                update_option('ecsl_deactivate_form_submit',0);
                deactivate_plugins( '/social-oauth-login-sso/elite-social-login.php' );
            }
        break;
    }
}
