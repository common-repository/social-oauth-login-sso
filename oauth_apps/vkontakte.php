<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_vkontakte {

	public $app_color = '#1976d2';
	public $login_url = 'https://oauth.vk.com/authorize?client_id=##client_id##&&scope=##scope##&response_type=code&redirect_uri=##redirect_uri##&v=5.131';
	public $access_token_url = 'https://oauth.vk.com/access_token';
	public $profile_url = 'https://api.vk.com/method/users.get?uids=##uids##&fields=uid,hash,occupation,photos,first_name,last_name,nickname,domain,site,education,relation,timezone,screen_name,sex,bdate,city,country,timezone,photo,lists,contacts,universities,schools,status,about&access_token=##access_token##&v=5.131';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"https://new.vk.com/dev\" target=\"_blank\">https://new.vk.com/dev</a> and sign in with your vkontakte account.
							   ##Go to <strong>My Apps</strong> and click on <strong>Create</strong>.
							   ##Enter app name in <b>Title field</b>, Select <strong>Website</strong> as the <strong>Platform</strong> and enter <b><code>" . get_option( 'siteurl' ) . "</code></b> as <strong>Webite address</strong> and <b><code>" . str_replace( 'https://', '', get_option( 'siteurl' ) ) . "</code></b> as Base domain and click on <b>Connect website</b>.
							   ##Click on <strong>Connect Webite</strong> to create the app.
							   ##You will be required to confirm your request with a code received via Call or SMS.
							   ##Once the application is created, select <strong>Settings</strong> in the left nav.
							   ##Enter the <b><code>" . ecsl_get_redirect_uri( 'vkontakte' ) . "</code></b> as <b>Authorized redirect URI.</b> and click on Save.
							   ##From the top of the same page, copy the <b>Application ID</b> (This is your <b>Client ID </b>) and <b>Secure Key</b> (This is your <b>Client Secret</b>). Paste them into the fields above.
							   ##Click on the <b>Save & Test Application</b> button.
							   ##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";

	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$user_name = $gender = $relationship = '';
		$first_name = isset( $ec_profile_output['response']['0']['first_name'] ) ? $ec_profile_output['response']['0']['first_name'] : '';
		$last_name = isset( $ec_profile_output['response']['0']['last_name'] ) ? $ec_profile_output['response']['0']['last_name'] : '';
		if ( isset( $first_name ) && isset( $last_name ) ) {
			if ( strcmp( $first_name, $last_name ) != 0 ) {
				$user_name = $first_name . '_' . $last_name;
			} else {
				$user_name = $first_name;
			}
		} else {
			$user_name = $first_name;
		}

		if ( isset( $ec_profile_output['response']['0']['sex'] ) ) {
			if ( $ec_profile_output['response']['0']['sex'] == '2' ) {
				$gender = 'male';
			} else {
				$gender = 'female';
			}
		}
		if ( isset( $profile_json_output['response']['0']['relation'] ) ) {
			if ( $profile_json_output['response']['0']['relation'] == '1' )
				$relationship = 'single';
			elseif ( $profile_json_output['response']['0']['relation'] == '2' )
				$relationship = 'In relationship';
			elseif ( $profile_json_output['response']['0']['relation'] == '3' )
				$relationship = 'engaged';
			elseif ( $profile_json_output['response']['0']['relation'] == '4' )
				$relationship = 'married';
			elseif ( $profile_json_output['response']['0']['relation'] == '5' )
				$relationship = 'In a civil union';
			elseif ( $profile_json_output['response']['0']['relation'] == '6' )
				$relationship = 'In love';
			elseif ( $profile_json_output['response']['0']['relation'] == '7' )
				$relationship = 'Its complecated';
			elseif ( $profile_json_output['response']['0']['relation'] == '8' )
				$relationship = 'Actively searching';
		}
		$appuserdetails = array(
			'first_name'       	  => $first_name,
			'last_name'        	  => $last_name,
			'email'            	  => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        	  => $user_name,
			'gender'			  => $gender,
			'birth_date'		  => isset( $profile_json_output['response']['0']['bdate'] ) ? $profile_json_output['response']['0']['bdate'] : '',
			'location_city'		  => isset( $profile_json_output['response']['0']['city']['title'] ) ? $profile_json_output['response']['0']['city']['title'] : '',
			'location_country'	  => isset( $profile_json_output['response']['0']['country']['title'] ) ? $profile_json_output['response']['0']['country']['title'] : '',
			'contact_no'		  => isset( $profile_json_output['response']['0']['home_phone'] ) ? $profile_json_output['response']['0']['home_phone'] : '',
			'website'			  => isset( $profile_json_output['response']['0']['site'] ) ? $profile_json_output['response']['0']['site'] : '',
			'about_me'			  => isset( $profile_json_output['response']['0']['about'] ) ? $profile_json_output['response']['0']['about'] : '',
			'company_name'		  => isset( $profile_json_output['response']['0']['occupation']['name'] ) ? $profile_json_output['response']['0']['occupation']['name'] : '',
			'user_picture'     	  => isset( $ec_profile_output['response']['0']['photo'] ) ? $ec_profile_output['response']['0']['photo'] : '',
			'relationship'		  => $relationship,
			'university_name'	  => isset( $profile_json_output['response']['0']['universities']['0']['name'] ) ? $profile_json_output['response']['0']['universities']['0']['name'] : '',
			'field_of_study'	  => isset( $profile_json_output['response']['0']['universities']['0']['chair_name'] ) ? $profile_json_output['response']['0']['universities']['0']['chair_name'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['id'] ) ? $ec_profile_output['id'] : '',
			'user_url'			  => isset( $ec_profile_output['response']['0']['url'] ) ? $ec_profile_output['response']['0']['url'] : '',
		);
		return $appuserdetails;
	}
}
