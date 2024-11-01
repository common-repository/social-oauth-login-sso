<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_google {

	public $app_color = '#DB4437';
	public $login_url = 'https://accounts.google.com/o/oauth2/auth?redirect_uri=##redirect_uri##&response_type=code&client_id=##client_id##&scope=##scope##&access_type=offline';
	public $access_token_url = 'https://accounts.google.com/o/oauth2/token';
	public $profile_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=##access_token##';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to Google developers accont <a href=\"https://console.developers.google.com/project/\" target=\"_blank\">console.developers.google.com</a>.
                                ##After sign-in, click on <b>Create project</b>, enter a name for the project, and optionally, edit the provided Project ID. Click <b>Create</b>.
                                ##In Left side Menu click on <b>≡</b> bar button and go to <b>APIs & Services</b> -> <b>OAuth consent screen</b>.
                                ##Select <b>External</b> as user type and click on <b>Create</b>.
                                ##Enter <b>App Name</b> and <b>User support Email</b> and then scroll down to add Authorized domain as <code>" . sanitize_url( $_SERVER['HTTP_HOST'] ) . "</code> 
								##Enter <b>Developer contact email</b> and click on <b>Save and Continue</b>. 
                                ##On the Scopes screen click on <b>Add or Remove Scopes</b>. Check <b>.../auth/userinfo.email</b> and <b>.../auth/userinfo.profile</b>. Scroll down and click on <b>Update</b> again Scroll down and click on <b>Save and Continue</b>.
                                ##In the Left side Menu, Click on <b>Credentials</b> then click on <b>Create Credential</b> from dropdown select <b>Oauth client ID</b>. 
                                ##In <b>Application Type</b> drop down, Select <b>Web Application</b>. Enter <b>Name</b> and scroll down to add <code>" . ecsl_get_redirect_uri( 'google' ) . "</code> in <b>Authorized Redirect URL<b/>, and click on <b>Create</b>. 
                                ##Copy <b>Client ID and Client Secret</b> and paste it on the above field <b>Application ID and Application Secret</b>, Click on <b>Save & Test Configuration</b>.
                                ##Click on Left side Menu and go to <b>APIs & Services</b> -> <b>OAuth consent screen</b>. Under Publishing Status Click on <b>Publish App</b> and <b>Confirm</b>. 
                                ##Enter <b>email+profile</b> in <b>Scope</b>.
								##Click on the <b>Save & Test Application</b> button.
								##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$appuserdetails = array(
			'first_name'       => isset( $ec_profile_output['given_name'] ) ? $ec_profile_output['given_name'] : '',
			'last_name'        => isset( $ec_profile_output['family_name'] ) ? $ec_profile_output['family_name'] : '',
			'email'            => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        => isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '',
			'user_picture'     => isset( $ec_profile_output['picture'] ) ? $ec_profile_output['picture'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['id'] ) ? $ec_profile_output['id'] : '',
			'user_url'		   => isset( $ec_profile_output['link'] ) ? $ec_profile_output['link'] : '',
		);
		return $appuserdetails;
	}
}
