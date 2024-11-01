<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class ecsl_facebook {

	public $app_color = '#1877F2';
	public $login_url = 'https://www.facebook.com/v16.0/dialog/oauth?client_id=##client_id##&state=1328974&response_type=code&sdk=php-sdk-5.7.0&redirect_uri=##redirect_uri##&scope=##scope##';
	public $access_token_url = 'https://graph.facebook.com/v16.0/oauth/access_token';
	public $profile_url = 'https://graph.facebook.com/me?fields=id,name,about,link,email,first_name,last_name,picture.width(720).height(720)&access_token=##access_token##';
	public $instructions;
	public function __construct() {
		$this->instructions = "Go to Facebook developers console <a href=\"https://developers.facebook.com/apps/\" target=\"_blank\">https://developers.facebook.com/apps/</a>. Login with your facebook developer account.
                                ##Click on Create App. Select <b>Set up Facebook Login</b> and click on Next.
								##In Platform options select <b>Website</b> and under Are you building a game? select <b>No, I'm not building a game</b> and click on <b>Next</b>.
                                ##Enter <b>App Name</b>, and <b>App Contact Email</b> and click on <b>Create App</b> button and complete the Security Check.
                                ##In the left Panel click on <b>Settings</b> and select <b>Basic</b>.
                                ##Enter <code>" . sanitize_url( $_SERVER['HTTP_HOST'] ) . "</code> in <b>App Domain</b> and your <b>Privacy Policy URL</b> & <b>Terms of Service URL</b> in respective sections.
                                ##Under <b>User Data Deletion</b> section enter the link of your <b>Data Deletion Page</b> from where users can delete their user accounts on your site.
                                ##Upload App Icon and select <b>Category</b> of your website. Then click on <b>Save Changes</b>. 
                                ##Copy <b>App ID</b> and <b>App Secret</b> and paste them into the fields above and <b>email, public_profile</b> in scope.
								##Go back to developer app In the Left panel, Click on <b>Products</b>, In Facebook Login section click on <b>Configure</b> and select <b>Settings</b> option. 
                                ##Scroll down and in <b>Valid OAuth Redirect URIs</b> add <code>" . ecsl_get_redirect_uri( 'facebook' ) . "</code> and click on <b>Save Changes</b> button. 
                                ##In the Left panel scroll down and click on <b>Go live</b>. In <b>Facebook Login</b> section click on <b>Review</b> button.
								##In <b>Authentication and account creation</b> section click on <b>Edit</b> and click on <b>Add</b> button in email section.
								##Last click on <b>Save & Test Application</b> button.
								##If you are facing any issues drop a mail on info@elitecontrivers.com for technical assistance.";
	}

	function ecsl_get_oauth_token_details($ec_profile_output) {
		$appuserdetails = array(
			'first_name'       => isset( $ec_profile_output['first_name'] ) ? $ec_profile_output['first_name'] : '',
			'last_name'        => isset( $ec_profile_output['last_name'] ) ? $ec_profile_output['last_name'] : '',
			'email'            => isset( $ec_profile_output['email'] ) ? $ec_profile_output['email'] : '',
			'user_name'        => isset( $ec_profile_output['name'] ) ? $ec_profile_output['name'] : '',
			'user_picture'     => isset( $ec_profile_output['picture']['data']['url'] ) ? $ec_profile_output['picture']['data']['url'] : '',
			'oauth_identifier_id' => isset( $ec_profile_output['id'] ) ? $ec_profile_output['id'] : '',
		);
		return $appuserdetails;
	}
}
