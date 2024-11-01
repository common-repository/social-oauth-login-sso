<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'delete_user', 'ecsl_delete_oauth_account_linking');

function ecsl_delete_oauth_account_linking($user_id){
	global $wpdb;
    $result = $wpdb->get_var($wpdb->prepare("DELETE from ".$wpdb->prefix."ec_oauth_login_users where user_id = %s ",$user_id));
    if($result === false)
		wp_die('Error while deleting user. Please try again.');
}

function ecsl_login_app_check(){
    if ( isset( $_REQUEST['ec_login_validate'] ) and strpos( sanitize_text_field( $_REQUEST['ec_login_validate'] ), 'oauthapp' ) !== false ) {
		if ( isset( $_REQUEST['ec_login_nonce'] ) ) {
			$nonce = sanitize_text_field( $_REQUEST['ec_login_nonce'] );
			if ( ! wp_verify_nonce( $nonce, 'ec-login-validate-nonce' ) ) {
				wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
			} else {
				$appname = sanitize_text_field( $_REQUEST['app_name'] );
				$ec_saved_oauth_apps = ecsl_get_app_details($appname);
				$client_id = $ec_saved_oauth_apps['client_id'];
				$scope = $ec_saved_oauth_apps['scope'];
				$ec_redirect_uri = ecsl_get_redirect_uri( $appname );
				ecsl_start_session();
				$_SESSION['appname'] = $appname;
				require 'oauth_apps/' . $appname . '.php';
                $ec_appname = 'ecsl_' . $appname;
                $oauth_app = new $ec_appname();
				$redirect_url = $oauth_app->login_url;
				$ec_replace = array("##client_id##","##scope##","##redirect_uri##");
				$ec_values = array($client_id,$scope,$ec_redirect_uri);
				$redirect_url = str_replace($ec_replace,$ec_values,$redirect_url);
				header( 'Location:' . $redirect_url );
				exit();
			}
		}
	}
    elseif ( strpos( sanitize_url( $_SERVER['REQUEST_URI'] ), 'ec_oauth_callback' ) !== false ) {
		ecsl_handle_login_oauth_callback();
	}
}

function ecsl_start_session() {
	if ( ! session_id() ) 
		session_start();
}

function ecsl_get_app_details($appname){
	$app_details = [];
	$ec_saved_oauth_apps = maybe_unserialize( get_option( 'ecsl_application_details' ) );
	$app_details['client_id'] = $ec_saved_oauth_apps[$appname]['clientid'];
	$app_details['client_secret'] = $ec_saved_oauth_apps[$appname]['clientsecret'];
	$app_details['scope'] = $ec_saved_oauth_apps[$appname]['scope'];
	return $app_details;
}

function ecsl_get_redirect_uri($appname){
    $ec_get_redirect_uri = '';
    if ( get_option( 'permalink_structure' ) ) {
        $ec_get_redirect_uri = site_url() . '/ec_oauth_callback/' . $appname;
    } else {
        if ( $appname == 'vkontakte' ) {
            $ec_get_redirect_uri = site_url();
        } 
        elseif ( $appname == 'linkedin' ) {
            $ec_get_redirect_uri = site_url() . '/?ec_oauth_callback/' . $appname;
        }
        else {
            $ec_get_redirect_uri = site_url() . '/?ec_oauth_callback=' . $appname;
        }       
    }
    return $ec_get_redirect_uri;
}

function ecsl_handle_login_oauth_callback(){
	if ( is_user_logged_in() && get_option( 'ecsl_application_verify' ) != 1 ) {
		return;
	}
	$appname = '';
	ecsl_start_session();
	if ( isset( $_SESSION['appname'] ) ) {
		$appname = sanitize_text_field($_SESSION['appname']);
	} 
    elseif ( strpos( sanitize_url($_SERVER['REQUEST_URI']), 'ec_oauth_callback' ) !== false ) {
		$applications = array("facebook", "google", "discord", "twitter", "linkedin", "amazon", "yahoo", "vkontakte");
		$ec_url_app = explode('?',explode('ec_oauth_callback/',sanitize_url($_SERVER['REQUEST_URI']))[1])[0];
		$ec_url_app2 = explode('?',explode('ec_oauth_callback=',sanitize_url($_SERVER['REQUEST_URI']))[1])[0];
		if(in_array($ec_url_app,$applications)){
			$appname = $ec_url_app;
		}
		else if(in_array($ec_url_app2,$applications)){
			$appname = $ec_url_app2;
		}
	} 
	else {
		return;
	}
	$code = ecsl_oauth_code_validate();
	$ec_redirect_uri = ecsl_get_redirect_uri( $appname );
	$ec_saved_oauth_apps = ecsl_get_app_details($appname);
	$client_id = $ec_saved_oauth_apps['client_id'];
	$client_secret = $ec_saved_oauth_apps['client_secret'];
	$scope = $ec_saved_oauth_apps['scope'];
	require 'oauth_apps/' . $appname . '.php';
	$ec_appname = 'ecsl_' . $appname;
	$oauth_app = new $ec_appname();
	$ec_access_token_uri = $oauth_app->access_token_url;
	$ec_post_data = 'client_id=' . $client_id . '&redirect_uri=' . $ec_redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code;
	if($appname!='facebook')
		$ec_post_data .='&grant_type=authorization_code';
	if($appname=='vkontakte')
		$ec_post_data .='&v=5.131';
	if($appname=='twitter'){
		$ec_post_data = array(
			'client_id'             => $client_id,
			'client_secret'         => $client_secret,
			'grant_type'            => 'authorization_code',
			'redirect_uri'          => $ec_redirect_uri,
			'code'                  => $code,
			'code_verifier'         => 'challenge',
			'code_challenge_method' => 'plain',
		);
	}
	$ec_access_token_output = ecsl_validate_oauth_access_token( $ec_post_data, $ec_access_token_uri, $appname );
	$ec_access_token = isset( $ec_access_token_output['access_token'] ) ? $ec_access_token_output['access_token'] : '';
	ecsl_start_session();
	$ec_profile_url = str_replace("##access_token##",$ec_access_token,$oauth_app->profile_url);
	if($appname=='vkontakte'){
		$uid = isset( $ec_access_token_output['user_id'] ) ? $ec_access_token_output['user_id'] : '';
		$ec_profile_url =str_replace("##uids##",$uid,$ec_profile_url);
	}
	$ec_profile_output = ecsl_get_oauth_user_data( $ec_access_token, $ec_profile_url, $appname );
	if($appname=='vkontakte'){
		$ec_profile_output['email'] = isset( $ec_access_token_output['email']) ? $ec_access_token_output['email'] : '';
		$ec_profile_output['id'] = isset( $ec_access_token_output['user_id'] ) ? $ec_access_token_output['user_id'] : '';
	}
	if ( is_user_logged_in() && get_option( 'ecsl_application_verify' ) == 1 ) {
		ecsl_application_verify_success( $ec_profile_output );
	}
	$appuserdetails = $oauth_app->ecsl_get_oauth_token_details($ec_profile_output);
	ecsl_extract_user_details( $appuserdetails, $appname );
}

function ecsl_oauth_code_validate() {
	if (isset($_REQUEST['code'])) {
        $code = sanitize_text_field($_REQUEST['code']);
		return $code;
	} 
    else if (array_key_exists('error', $_REQUEST)) {  
		if ( is_user_logged_in() && get_option( 'ecsl_application_verify' ) == 1 ) {
			update_option( 'ecsl_application_verify', 0 );
			echo esc_html('<div style="color: lightcoral;background-color: #365b6d;padding: 10px;margin-bottom: 10px;text-align: center;border: 1px solid #E6B3B2;font-size: x-large;">TEST VERIFICATION FAILED</div>
					<div style="color: lightcoral;font-size: larger;">Code Validation Failed <br/></div>');
			exit();
		} 
        else {
			echo esc_attr(sanitize_text_field($_REQUEST['error_description'])) . "<br>"; 
			wp_die( 'To log in, permit access to your OAuth application profile. For a return to the website, click <a href=' . esc_url( get_site_url() ) . '>here</a>' );
			exit();
		}
	}
}

function ecsl_validate_oauth_access_token( $ec_post_data, $ec_access_token_uri, $appname ) {
	if($appname == "twitter"){
		$ec_grant_type = base64_encode( $ec_post_data['client_id'] . ':' . $ec_post_data['client_secret'] );
		$ecsl_curl    = curl_init();
		curl_setopt( $ecsl_curl, CURLOPT_URL, $ec_access_token_uri );
		curl_setopt( $ecsl_curl, CURLOPT_POSTFIELDS, http_build_query( $ec_post_data ) );
		curl_setopt( $ecsl_curl, CURLOPT_RETURNTRANSFER, 1 );
		$headers   = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Authorization: Basic ' . $ec_grant_type;
		curl_setopt( $ecsl_curl, CURLOPT_HTTPHEADER, $headers );
		$ec_access_token_output = json_decode( curl_exec( $ecsl_curl ), true );
		if ( curl_errno( $ecsl_curl ) ) {
			echo 'Error:' . esc_attr( curl_error( $ecsl_curl ) );
		}
		curl_close( $ecsl_curl );
	}
	else{
		$headers = '';
		if ( $appname != 'facebook') {
			$headers = array( 'Content-Type' => 'application/x-www-form-urlencoded' );
		}
		$args   = array(
			'method'      => 'POST',
			'body'        => $ec_post_data,
			'timeout'     => '5',
			'redirection' => '5',
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => $headers,
		);
		$result = wp_remote_post( $ec_access_token_uri, $args );
		if ( is_wp_error( $result ) ) {
			update_option( 'ecsl_application_verify', 0 );
			echo esc_attr( $result['body'] );
			echo esc_html('<div style="color: lightcoral;background-color: #365b6d;padding: 10px;margin-bottom: 10px;text-align: center;border: 1px solid #E6B3B2;font-size: x-large;">ACCESS TOKEN ERROR</div>
						<div style="color: lightcoral;font-size: larger;">Error in Fetching Access Token <br/>');
						print_r(esc_attr( $result['body'])); 
				echo esc_html('</div>');
			exit();
		}
		$ec_access_token_output = json_decode( $result['body'], true );
		if ( ( array_key_exists( 'error', $ec_access_token_output ) ) || array_key_exists( 'error_message', $ec_access_token_output ) ) {
			if ( is_user_logged_in() && get_option( 'ecsl_application_verify' ) == 1 ) {
				update_option( 'ecsl_application_verify', 0 );
				
				echo esc_html('<div style="color: lightcoral;background-color: #365b6d;padding: 10px;margin-bottom: 10px;text-align: center;border: 1px solid #E6B3B2;font-size: x-large;">TEST VERIFICATION FAILED</div>
						<div style="color: lightcoral;font-size: larger;">Error - Incorrect Client Secret<br/>');
						print_r(esc_attr( $ec_access_token_output)); 
				echo esc_html('</div>');
				exit();
			}
		}
	}
	return $ec_access_token_output;
}

function ecsl_get_oauth_user_data( $ec_access_token, $ec_profile_url, $app_name ) {
	$headers = ( 'Authorization:Bearer ' . $ec_access_token );
	$args = array(
		'timeout'     => 120,
		'redirection' => 5,
		'httpversion' => '1.1',
		'headers'     => $headers,
	);
	$result = wp_remote_get( $ec_profile_url, $args );
	if ( is_wp_error( $result ) ) {
		update_option( 'ecsl_application_verify', 0 );
		echo esc_html('<div style="color: lightcoral;background-color: #365b6d;padding: 10px;margin-bottom: 10px;text-align: center;border: 1px solid #E6B3B2;font-size: x-large;">ERROR</div>
				<div style="color: lightcoral;font-size: larger;">Error in Fetching Details From Access Token <br/>');
				print_r(esc_attr( $result['body'])); 
		echo esc_html('</div>');
		exit();
	}
	$ec_profile_output = json_decode( $result['body'], true );
	return $ec_profile_output;
}

function ecsl_application_verify_success( $ec_profile_output ) {
	update_option( 'ecsl_application_verify', 0 );
	$print        = '<div style="color: lightgreen;background-color: #365b6d;padding: 10px;margin-bottom: 10px;text-align: center;font-size: x-large;">Application Verified Successfully</div>';
	$print       .= ecsl_userdata_append( $ec_profile_output );
	$allowed_html = array(
		'div'    => array( 'style' => array() ),
		'img'    => array(
			'style' => array(),
			'src'   => array(),
		),
		'table'  => array( 'border' => array() ),
		'tbody'  => array(),
		'tr'     => array(),
		'td'     => array(),
		'strong' => array(),
	);
	echo wp_kses( $print, $allowed_html );
	exit();
}

function ecsl_userdata_append( $arr ) {
	$str = "<table border='1'><tbody>";
	foreach ( $arr as $key => $val ) {
		$str .= '<tr>';
		$str .= "<td>$key</td>";
		$str .= '<td>';
		if ( is_array( $val ) ) {
			if ( ! empty( $val ) ) {
				$str .= ecsl_userdata_append( $val );
			}
		} else {
			$str .= "<strong>$val</strong>";
		}
		$str .= '</td></tr>';
	}
	$str .= '</tbody></table>';

	return $str;
}

function ecsl_extract_user_details( $appuserdetails, $appname ) {
	$oauth_identifier_id   = isset( $appuserdetails['oauth_identifier_id'] ) ? $appuserdetails['oauth_identifier_id'] : '';
	$user_picture     = isset( $appuserdetails['user_picture'] ) ? $appuserdetails['user_picture'] : '';
	$user_email       = sanitize_email( isset( $appuserdetails['email'] ) ? $appuserdetails['email'] : '' );
	global $wpdb;
	$user_id_oauth_identity = $wpdb->get_var( $wpdb->prepare( 'SELECT user_id FROM ' . $wpdb->prefix . 'ec_oauth_login_users where linked_oauth_app = %s AND oauth_identity = %s', array( $appname, $oauth_identifier_id ) ) );
	$user_id_email = $wpdb->get_var( $wpdb->prepare( 'SELECT user_id FROM ' . $wpdb->prefix . 'ec_oauth_login_users where user_email = %s', $user_email ) );
	if ( empty( $user_email ) ) {
		$existing_email_user_id = null;
	} else {
		$existing_email_user_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->users where user_email = %s", $user_email ) );
	}
	$user_session_values = array(
		'username'        => isset($appuserdetails['user_name']) ? $appuserdetails['user_name'] : '',
		'user_email'      => isset($appuserdetails['email']) ? $appuserdetails['email'] : '',
		'user_full_name'  => isset($appuserdetails['user_full_name']) ? $appuserdetails['user_full_name'] : '',
		'first_name'      => isset($appuserdetails['first_name']) ? $appuserdetails['first_name'] : '',
		'last_name'       => isset($appuserdetails['last_name']) ? $appuserdetails['last_name'] : '',
		'user_url'        => isset($appuserdetails['user_url']) ? $appuserdetails['user_url'] : '',
		'user_picture'    => isset($appuserdetails['user_picture']) ? $appuserdetails['user_picture'] : '',
		'app_name' 		  => $appname,
		'oauth_identifier_id'  => isset($appuserdetails['oauth_identifier_id']) ? $appuserdetails['oauth_identifier_id'] : '',
	);
	ecsl_set_session_values( $user_session_values );
	if ( ( isset( $user_id_oauth_identity ) ) || ( isset( $user_id_email ) ) || ( isset( $existing_email_user_id ) ) ) {
		if ( isset( $user_id_oauth_identity ) ){
			ecsl_oauth_login_users( $user_id_oauth_identity, $user_picture );
		}
		if ( ( ! isset( $user_id_oauth_identity ) ) && ( isset( $user_id_email ) ) ) {
			ecsl_insert_user_details( $appname, $user_email, $user_id_email, $oauth_identifier_id );
			ecsl_oauth_login_users( $user_id_email, $user_picture );
		}
		elseif ( isset( $existing_email_user_id ) ) {
			$user    = get_user_by( 'id', $existing_email_user_id );
			$user_id = $user->ID;
			ecsl_insert_user_details( $appname, $user_email, $user_id, $oauth_identifier_id );
			ecsl_oauth_login_users( $user_id, $user_picture );
		}
	}
	ecsl_new_user_creation( $appuserdetails, $appname );
}

function ecsl_insert_user_details( $oauth_app, $user_email, $user_id, $oauth_app_identity ) {
	if ( ! empty( $oauth_app ) && ! empty( $user_email ) && ! empty( $user_id ) && ! empty( $oauth_app_identity ) ) {
		$date = date( 'Y-m-d H:i:s' );
		global $wpdb;
		$table_name = $wpdb->prefix . 'ec_oauth_login_users';
		$result = $wpdb->insert(
			$table_name,
			array(
				'linked_oauth_app' => $oauth_app,
				'user_email'       => $user_email,
				'user_id'          => $user_id,
				'oauth_identity'   => $oauth_app_identity,
				'timestamp'        => $date,
			),
			array(
				'%s',
				'%s',
				'%d',
				'%s',
				'%s',
			)
		);
		if ( $result === false ) {
			wp_die( 'Error: User detail entry in OAuth table.' );
		}
	}
}

function ecsl_oauth_login_users( $user_id, $user_picture ) {
	if ( get_option( 'ecsl_set_user_picture' ) && isset( $user_picture ) ) {
		update_user_meta( $user_id, 'elite_user_avatar', $user_picture );
		update_user_meta( $user_id, 'profile_photo', $user_picture);
	}
	$user = get_user_by( 'id', $user_id );
	do_action( 'wp_login', $user->user_login, $user );
	exit();
}

function ecsl_new_user_creation( $user_val, $appname ) {
	$first_name       = isset( $user_val['first_name'] ) ? $user_val['first_name'] : '';
	$last_name        = isset( $user_val['last_name'] ) ? $user_val['last_name'] : '';
	$user_url         = isset( $user_val['user_url'] ) ? $user_val['user_url'] : '';
	$email            = isset( $user_val['email'] ) ? $user_val['email'] : '';
	$user_name        = isset( $user_val['user_name'] ) ? $user_val['user_name'] : '';
	$user_picture     = isset( $user_val['user_picture'] ) ? $user_val['user_picture'] : '';
	$oauth_identifier_id   = isset( $user_val['oauth_identifier_id'] ) ? $user_val['oauth_identifier_id'] : '';

	$user_name = str_replace( ' ', '-', $user_name );
	$user_name = sanitize_user( $user_name, true );
	if ( $user_name == '-' || $user_name == '' ) {
		$splitemail = explode( '@', $email );
		$user_name  = $splitemail[0];
	}
	if ( isset( $first_name ) && isset( $last_name ) ) {
		if ( strcmp( $first_name, $last_name ) != 0 ) {
			$user_full_name = $first_name . ' ' . $last_name;
		} else {
			$user_full_name = $first_name;
		}
	} elseif ( isset( $first_name ) ) {
		$user_full_name = $first_name;
	} else {
		$user_full_name = $user_name;
	}
	if ( empty( $email ) && empty( $user_name ) ) {
		wp_die( 'No profile data is returned from application. Please gice access to your OAuth provider.' );
	}
	$email = str_replace( ' ', '', $email );
	global $wpdb;
	$existing_user = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->users where user_login = %s", $user_name ) );
	if ( isset( $existing_user ) ) {
		$temp_email       = explode( '@', $email );
		$user_name         = $temp_email[0];
		$existing_user = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->users where user_login = %s", $user_name ) );
		$i                 = 1;
		while ( ! empty( $existing_user ) ) {
			$uname             = $user_name . '_' . $i;
			$existing_user = $wpdb->get_var( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users where user_login = %s', $uname ) );
			$i++;
			if ( empty( $existing_user ) ) {
				$user_name = $uname;
			}
		}
		if ( isset( $existing_user ) ) {
			echo esc_attr('Error: Existing Username please try again.');
			exit();
		}
	}

	$random_password  = wp_generate_password( 10, false );
	$userdata = array(
		'user_login'   => $user_name,
		'user_email'   => $email,
		'user_pass'    => $random_password,
		'display_name' => $user_full_name,
		'first_name'   => $first_name,
		'last_name'    => $last_name,
		'user_url'     => $user_url,
	);
	$user_id  = wp_insert_user( $userdata );

	if ( is_wp_error( $user_id ) ) {
		print_r( $user_id );
		wp_die( 'Error: User cannot be created please try again.' );
	}
	ecsl_set_user_role( $user_id );
	ecsl_insert_user_details( $appname, $email, $user_id, $oauth_identifier_id );
	$appuserdetails = array(
		'username'        	   => $user_name,
		'user_email'      	   => $email,
		'user_full_name'  	   => $user_full_name,
		'first_name'      	   => $first_name,
		'last_name'       	   => $last_name,
		'user_url'        	   => $user_url,
		'user_picture'    	   => $user_picture,
		'app_name' 	   => $appname,
		'oauth_identifier_id'  => $oauth_identifier_id,
	);
	ecsl_set_session_values( $appuserdetails );
	ecsl_oauth_login_users( $user_id, $user_picture );
}

function ecsl_set_user_role( $user_id ) {
	$user = get_user_by( 'ID', $user_id );
	$user->set_role( get_option( 'ecsl_user_role_mapping' ) );
}

function ecsl_redirect_link( $username = '', $user = null ) {
	ecsl_start_session();
	if ( is_string( $username ) && $username && is_object( $user ) && ! empty( $user->ID ) && ( $user_id = $user->ID ) && isset( $_SESSION['ec_oauth_login'] ) && $_SESSION['ec_oauth_login'] ) {
		wp_set_auth_cookie( $user_id, true );
		$redirect_url = ecsl_get_the_redirect_url();
		wp_safe_redirect( $redirect_url );
		exit();
	}
}

function ecsl_get_the_redirect_url() {
	$red_after_login = get_option( 'ecsl_login_redirect' );
	$set_redirect_url = site_url();
	if ( $red_after_login == 'custom' ) {
		$set_redirect_url = get_option( 'ecsl_login_redirect_url' );
	}
	return $set_redirect_url;
}

function ecsl_set_session_values( $appuserdetails ) {
	ecsl_start_session();
	$_SESSION['ec_oauth_login']  = true;
	$_SESSION['username']        = isset( $appuserdetails['username'] ) ? $appuserdetails['username'] : '';
	$_SESSION['user_email']      = isset( $appuserdetails['user_email'] ) ? $appuserdetails['user_email'] : '';
	$_SESSION['user_full_name']  = isset( $appuserdetails['user_full_name'] ) ? $appuserdetails['user_full_name'] : '';
	$_SESSION['first_name']      = isset( $appuserdetails['first_name'] ) ? $appuserdetails['first_name'] : '';
	$_SESSION['last_name']       = isset( $appuserdetails['last_name'] ) ? $appuserdetails['last_name'] : '';
	$_SESSION['user_url']        = isset( $appuserdetails['user_url'] ) ? $appuserdetails['user_url'] : '';
	$_SESSION['user_picture']    = isset( $appuserdetails['user_picture'] ) ? $appuserdetails['user_picture'] : '';
	$_SESSION['app_name'] 		 = isset( $appuserdetails['app_name'] ) ? $appuserdetails['app_name'] : '';
	$_SESSION['oauth_identifier_id']  = isset( $appuserdetails['oauth_identifier_id'] ) ? $appuserdetails['oauth_identifier_id'] : '';
}

function ecsl_redirect_logout_link( $logout_url ) {
	if ( get_option( 'ecsl_logout_redirection_enable' ) ) {
		$ec_logout_check = get_option( 'ecsl_logout_redirect' );
		$ec_logout_url           = site_url();
		if ( $ec_logout_check == 'homepage' ) {
			$ec_logout_url = $logout_url . '&redirect_to=' . home_url();
		} elseif ( $ec_logout_check == 'custom' ) {
			$ec_logout_url =  $logout_url . '&redirect_to=' . (null !== get_option('ecsl_logout_redirect_url') ? get_option('ecsl_logout_redirect_url') : site_url());
		}
		return $ec_logout_url;
	} else {
		return $logout_url;
	}

}

function ecsl_display_notification($msg_type,$message) {
	update_option('ecsl_notice_message',$message);
	update_option('ecsl_notice_message_status',$msg_type);
	add_action( 'admin_notices', 'ecsl_display_notifications' );
}

function ecsl_display_notifications() {
    ?>
	<div id="ec_notification_bar"><label id="ec_notification_bar_message"></label></div>
	<style>
		#ec_notification_bar{
			margin-left: -20px;
			width: 100%;
			color: #fff;
			font-size:16px;
			padding: 10px 0px;
			position: fixed;
			z-index:1;
			text-align: center;
		}
	</style>
    <script>
        var message = '<?php echo esc_attr(get_option('ecsl_notice_message')) ?>';
		var msg_type = '<?php echo esc_attr(get_option('ecsl_notice_message_status')) ?>';
		jQuery('#ec_notification_bar_message').text(message);
        if(msg_type=='error')
        	jQuery('#ec_notification_bar').css("background-color","#c02f2f");
        else
        	jQuery('#ec_notification_bar').css("background-color","#4CAF50");
        var x = document.getElementById("ec_notification_bar");
        x.className = "show";
        setTimeout(function(){ 
			jQuery('#ec_notification_bar').remove();
		}, 4000);
    </script>
    <?php
}

function elite_oauth_custom_avatar( $avatar, $mixed, $size, $default, $alt = '' ) {
	$current_user = null;
	if ( is_numeric( $mixed ) AND $mixed > 0 ) {
		$current_user = $mixed;
	} elseif ( is_object( $mixed ) AND property_exists( $mixed, 'user_id' ) AND is_numeric( $mixed->user_id ) ) {
		$current_user = $mixed->user_id;
	}
	if (  !empty( $current_user ) ) {
		$user_meta_thumbnail = get_user_meta($current_user, 'elite_user_avatar', true);
		$user_meta_name = get_user_meta($current_user, 'user_name', true); 
		$user_picture = (!empty($user_meta_thumbnail) ? $user_meta_thumbnail : '');
		if ($user_picture !== false AND strlen(trim($user_picture)) > 0) {
			return '<img alt="' . $user_meta_name . '" src="' . $user_picture . '" class="avatar apsl-avatar-social-login avatar-' . $size . ' photo" height="' . $size . '" width="' . $size . '" />';
		}
	}
	return $avatar;
}

function elite_oauth_custom_avatar_url( $url, $id_or_email, $args = null ) {
	$current_user = null;
	if ( is_numeric( $id_or_email ) AND $id_or_email > 0 ) {
		$current_user = $id_or_email;
	} elseif ( is_object( $id_or_email ) AND property_exists( $id_or_email, 'user_id' ) AND is_numeric( $id_or_email->user_id ) ) {
		$current_user = $id_or_email->user_id;
	} 
	if (  !empty( $current_user ) ) {
		$user_meta_thumbnail = get_user_meta($current_user, 'elite_user_avatar', true);
		$user_picture = (!empty($user_meta_thumbnail) ? $user_meta_thumbnail : $url);
		return $user_picture;
	}
	return $url;
}
