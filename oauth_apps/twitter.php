<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_twitter {

	public $app_color = '#000000';
	public $login_url = 'https://twitter.com/i/oauth2/authorize?response_type=code&client_id=##client_id##&redirect_uri=##redirect_uri##&scope=##scope##&state=state&code_challenge=challenge&code_challenge_method=plain';
	public $access_token_url = 'https://api.twitter.com/2/oauth2/token';
	public $profile_url = 'https://api.twitter.com/2/users/me';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"https://developer.twitter.com/en/portal/projects-and-apps\" target=\"_blank\">https://developer.twitter.com/en/portal/projects-and-apps</a> and sign in with your Twitter developer account.
								##Click on the <strong>+Add Project</strong> button and enter <strong>Project Name</strong> and click on <strong>Next</strong>. 
								##Select a <strong>Use case</strong> and click on <strong>Next</strong>, Enter <strong>Project description</strong> and click on <strong>Next</strong>
								##Now Enter <strong>App name</strong> and click on <strong>Next</strong> and click on <strong>App settings</strong> on bottom right.
								##Scroll down under \"User authentication settings\" section click on <strong>Set up</strong>
								##Enable the toggle for <strong>Request email from users</strong> and select \"Type of app\" as <strong>Native App</strong>
								##Under \"App info\" section enter \"Callback URI\" as <code><b>" . ecsl_get_redirect_uri( 'twitter' ) . "</b></code>
								##Enter <stromg>Website URL, Terms of service, & Privacy policy</strong> and then click on <strong>Save</strong> 
								##Under your\"App name\" click on <strong>Keys & Token</strong> and scroll down to \"OAuth 2.0 Client ID and Client Secret\" Section and copy the Client Id and Client Secret and Paste them into the above Fields.
								##Enter <b>tweet.read+users.read+offline.access</b> as Scope.
								##Click on the <b>Save & Test Application</b> button.
								##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$user_name = $first_name = $last_name = '';
		if ( isset( $ec_profile_output['data']['name'] ) ) {
			$name  = isset( $ec_profile_output['data']['name'] ) ? $ec_profile_output['data']['name'] : '';
			$name  = explode( ' ', $name );
			$first_name = isset( $name[0] ) ? $name[0] : '';
			$last_name  = isset( $name[1] ) ? $name[1] : '';
		}
		$appuserdetails = array(
			'first_name'       => $first_name,
			'last_name'        => $last_name,
			'email'            => isset( $ec_profile_output['data']['email'] ) ? $ec_profile_output['data']['email'] : '',
			'user_name'        => isset( $ec_profile_output['data']['username'] ) ? $ec_profile_output['data']['username'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['data']['id'] ) ? $ec_profile_output['data']['id'] : '',
		);
		return $appuserdetails;
	}
}
