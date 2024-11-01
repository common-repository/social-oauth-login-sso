<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_amazon {

	public $app_color = '#131A22';
	public $login_url = 'https://www.amazon.com/ap/oa?client_id=##client_id##&scope=##scope##&redirect_uri=##redirect_uri##&response_type=code';
	public $access_token_url = 'https://api.amazon.com/auth/o2/token';
	public $profile_url = 'https://api.amazon.com/user/profile?access_token=##access_token##';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"http://login.amazon.com\" target=\"_blank\">http://login.amazon.com</a> and sign in with your amazon developer account.
		                       ##On the developer homepage, in the upper right corner, click <strong>Developer Console</strong>.
							   ##On the Developer Console homepage, click <strong>Login with Amazon</strong>, Click on the <strong>Create a New Security Profile</strong> button and enter a <strong>Name, Description, and Privacy Notice URL</strong> for your app. Click on Save.
							   ##click the configuration icon in the <strong>Manage</strong> column and then click <strong>Web Settings</strong>.
							   ##In the bottom right section click on <b>Edit</b> and Enter <code><b>" . ecsl_get_redirect_uri( 'amazon' ) . "</b></code> in the <strong>Allowed Return URLs</strong> and click on <b>Save</b> button.
							   ##Copy the Client Id and Client Secret and Paste them into the fields above. 
							   ##Enter <b>profile</b> in <b>Scope</b>
							   ##Click on the <b>Save & Test Application</b> button.
							   ##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
        $user_name = $first_name = $last_name = '';
		if ( isset( $ec_profile_output['name'] ) ) {
			$user_name  = isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '';
			$name  = explode( ' ', $user_name );
			$first_name = isset( $name[0] ) ? $name[0] : '';
			$last_name  = isset( $name[1] ) ? $name[1] : '';
		}
		$appuserdetails = array(
			'first_name'       => $first_name,
			'last_name'        => $last_name,
			'email'            => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        => $user_name,
			'oauth_identifier_id' => isset( $ec_profile_output['user_id'] ) ? $ec_profile_output['user_id'] : '',
		);
		return $appuserdetails;
	}
}
