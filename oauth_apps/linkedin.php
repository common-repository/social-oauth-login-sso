<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_linkedin {

	public $app_color = '#0a66c2';
	public $login_url = 'https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=##client_id##&redirect_uri=##redirect_uri##&state=fooobar&scope=##scope##';
	public $access_token_url = 'https://www.linkedin.com/oauth/v2/accessToken';
	public $profile_url = 'https://api.linkedin.com/v2/userinfo';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"http://developer.linkedin.com/\" target=\"_blank\">http://developer.linkedin.com/</a> and login with your account and click on <strong>Create Apps</strong>.
		                       ##Enter the App Name, Linkedin page URl or name, Privacy Policy URL, And upload app logo. Check the <b>Legal agreement</b> and click on create app.
							   ##Under <b>Products</b> you can see a section of <b>Sign In with LinkedIn<b/>, click on <b>Request access</b> for the same. Check the <b>API Terms Of Use</b> and click on <b>Request access</b>.
							   ##Go to <b>Auth</b> tab and enter <code><b>" . ecsl_get_redirect_uri( 'linkedin' ) . "</b></code> as <strong>Authorized Redirect URLs </strong>and click on <strong>Update</strong>
							   ##Scroll up to see your <strong>Client ID</strong> and <strong>Client Secret</strong> under the <strong>Application credentials</strong> section, copy these and Paste them into the fields above. 
							   ##Wait till Linkedin approves your permission. 
							   ##Enter <b>openid profile email</b> in <b>Scope</b>.   
							   ##Click on the <b>Save & Test Application</b> button.
							   ##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$user_name = $first_name = $last_name = '';
		if ( isset( $ec_profile_output['name'] ) ) {
			$name  = isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '';
			$name  = explode( ' ', $name );
			$first_name = isset( $name[0] ) ? $name[0] : '';
			$last_name  = isset( $name[1] ) ? $name[1] : '';
		}
		$appuserdetails = array(
			'first_name'       => $first_name,
			'last_name'        => $last_name,
			'email'            => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        => isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '',
			'user_picture'     => isset( $ec_profile_output['picture'] ) ? $ec_profile_output['picture'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['sub'] ) ? $ec_profile_output['sub'] : '',
		);
		return $appuserdetails;
	}
}
