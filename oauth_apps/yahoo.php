<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_yahoo {

	public $app_color = '#402bbd';
	public $login_url = 'https://api.login.yahoo.com/oauth2/request_auth?client_id=##client_id##&redirect_uri=##redirect_uri##&response_type=code&language=en-us';
	public $access_token_url = 'https://api.login.yahoo.com/oauth2/get_token';
	public $profile_url = 'https://api.login.yahoo.com/openid/v1/userinfo';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"https://developer.yahoo.com\" target=\"_blank\">https://developer.yahoo.com</a> Sign in with your yahoo account and click on <b>Apps</b> from the menubar.
							   ##On the page, Click on the <strong>Create an App</strong> button.
							   ##Enter <strong>Application Name, Description, Homepage URL</strong> and <code><b>" . ecsl_get_redirect_uri( 'yahoo' ) . "</b></code> as <b>Redirect URI(s)</b> and click on <b>Create App</b>.
							   ##Copy the <b>Client ID</b> and <b>Client Secret</b> from this page and Paste them into the fields above.
							   ##Enter <b>read</b> in <b>Scope</b>.
							   ##Click on the <b>Save & Test Application</b> button.
							   ##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$appuserdetails = array(
			'first_name'       	  => isset( $ec_profile_output['given_name'] ) ? $ec_profile_output['given_name'] : '',
			'last_name'        	  => isset( $ec_profile_output['family_name'] ) ? $ec_profile_output['family_name'] : '',
			'email'            	  => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        	  => isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '',
			'user_picture'     	  => isset( $ec_profile_output['picture'] ) ? $ec_profile_output['picture'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['sub'] ) ? $ec_profile_output['sub'] : '',
			'gender'		   	  => isset( $ec_profile_output['gender'] ) ? $ec_profile_output['gender'] : '',
		);
		return $appuserdetails;
	}
}
