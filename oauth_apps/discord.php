<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_discord {

	public $app_color = '#404eed';
	public $login_url = 'https://discordapp.com/api/oauth2/authorize?response_type=code&client_id=##client_id##&scope=##scope##&redirect_uri=##redirect_uri##';
	public $access_token_url = 'https://discordapp.com/api/oauth2/token';
	public $profile_url = 'https://discordapp.com/api/v6/users/@me?access_token=##access_token##';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to <a href=\"https://discordapp.com/developers\" target=\"_blank\">https://discordapp.com/developers/applications</a> and sign in with your discordapp developer account.
								##Click on the <strong>New Application</strong> button and enter a <strong>Name</strong> for your app. Check the <b>Developer Terms of Service</b> and Click on Create.
								##Select <strong>OAuth2</strong> form the left panel.</li><li>Click on <b>Add redirect</b> and Enter <code><b>" . ecsl_get_redirect_uri( 'discord' ) . "</b></code> 
								##Click on <b>Reset Secret</b> and copy the Client Id and Client Secret and Paste them into the above Fields.
								##Enter <b>identify+email</b> as Scope.
								##Click on the <b>Save & Test Application</b> button.
								##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$user_name = $first_name = $last_name = '';
		if ( isset( $ec_profile_output['username'] ) ) {
			$user_name  = isset( $ec_profile_output['username'] ) ? $ec_profile_output['username'] : '';
			$name  = explode( ' ', $user_name );
			$first_name = isset( $name[0] ) ? $name[0] : '';
			$last_name  = isset( $name[1] ) ? $name[1] : '';
		}
		$appuserdetails = array(
			'first_name'       => $first_name,
			'last_name'        => $last_name,
			'email'            => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        => $user_name,
			'user_picture'     => isset( $ec_profile_output['avatar'] ) ? 'https://cdn.discordapp.com/avatars/' . $ec_profile_output['id'] . '/' . $ec_profile_output['avatar'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['id'] ) ? $ec_profile_output['id'] : '',
		);
		return $appuserdetails;
	}
}
