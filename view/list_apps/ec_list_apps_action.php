<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_check_capp_enable() {
	$nonce = sanitize_text_field( $_POST['ec_check_capp_enable_nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'ec-check-capp-enable-nonce' ) ) {
		wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
	} else {
		if ( current_user_can( 'administrator' ) ) {
			$appname = stripslashes( sanitize_text_field( $_POST['app_name'] ) );
            if ( get_option( 'ecsl_application_details' ) ) {
                $ec_saved_oauth_apps = maybe_unserialize( get_option( 'ecsl_application_details' ) );
                $update_app_name = 'ec_app_credentials_' . $appname;
                if ( ! empty( $ec_saved_oauth_apps[ $appname ]['clientid'] ) && ! empty( $ec_saved_oauth_apps[ $appname ]['clientsecret'] ) ) {
                    update_option( $update_app_name, 1 );
                    wp_send_json( array( 'status' => 'true' ) );
                } else {
                    update_option( $update_app_name, 0 );
                    wp_send_json( array( 'status' => 'false' ) );
                }
            } else {
                wp_send_json( array( 'status' => 'false' ) );
            }
		}
	}
}

function ecsl_app_enable() {
	$nonce = sanitize_text_field( $_POST['ec_app_enable_nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'ec-app-enable-nonce' ) ) {
		wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
	} else {
		if ( current_user_can( 'administrator' ) ) {
			$enable_app = sanitize_text_field( $_POST['enabled'] );
			if ( $enable_app == 'true' ) {
				update_option( 'ecsl_' . sanitize_text_field( $_POST['app_name'] ) . '_enable', 1 );
                wp_send_json( array( 'status' => 'enable' ) );
			} elseif ( $enable_app == 'false' ) {
				update_option( 'ecsl_' . sanitize_text_field( $_POST['app_name'] ) . '_enable', 0 );
                wp_send_json( array( 'status' => 'disable' ) );
			}
		}
	}
}

function ecsl_app_details_update() {
	$nonce = sanitize_text_field( $_POST['ec_app_details_update_nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'ec-app-details-update-nonce' ) ) {
		wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
	} else {
		if ( current_user_can( 'administrator' ) ) {
			$appname  = stripslashes( sanitize_text_field( $_POST['app_name'] ) );
            if($_POST['perform_action'] === "delete"){
                $ec_saved_oauth_apps = maybe_unserialize( get_option( 'ecsl_application_details' ) );
                foreach ( $ec_saved_oauth_apps as $key => $app ) {
                    if ( $appname == $key ) {
                        unset( $ec_saved_oauth_apps[ $key ] );
                    }
                }
                if ( ! empty( $ec_saved_oauth_apps ) ) {
                    update_option( 'ecsl_application_details', maybe_serialize( $ec_saved_oauth_apps ) );
                } else {
                    delete_option( 'ecsl_application_details' );
                }
                wp_send_json( array( 'status' => $status ) );
            }
            elseif($_POST['perform_action'] === "update"){
                $clientid     = stripslashes( sanitize_text_field( $_POST['app_id'] ) );
                $clientsecret = stripslashes( sanitize_text_field( $_POST['app_secret'] ) );
                $scope        = stripslashes( sanitize_text_field( $_POST['app_scope'] ) );
                if ( get_option( 'ecsl_application_details' ) ) {
                    $ec_saved_oauth_apps = maybe_unserialize( get_option( 'ecsl_application_details' ) );
                } else {
                    $ec_saved_oauth_apps = array();
                }
                $newapp = array();
                foreach ( $ec_saved_oauth_apps as $key => $currentapp ) {
                    if ( $appname == $key ) {
                        $newapp = $currentapp;
                        break;
                    }
                }
                $newapp['clientid']     = $clientid;
                $newapp['clientsecret'] = $clientsecret;
                $newapp['scope']        = $scope;
                $ec_saved_oauth_apps[ $appname ] = $newapp;
                update_option( 'ecsl_application_details', maybe_serialize( $ec_saved_oauth_apps ) );
                update_option( 'ecsl_application_verify', 1 );
            }
		}
	}
}

function ecsl_load_instructions() {
	$nonce = sanitize_text_field( $_POST['ec_load_instructions_nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'ec-load-instructions-nonce' ) ) {
		wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
	} else {
		if ( current_user_can( 'administrator' ) ) {
			$social_app   = sanitize_text_field( $_POST['app_name'] );
			$ec_saved_oauth_apps     = maybe_unserialize( get_option( 'ecsl_application_details' ) ); 
			if ( $ec_saved_oauth_apps != '' ) {
				if ( ! isset( $ec_saved_oauth_apps[ $social_app ]['clientid'] ) ) {
					$instructions .= '##';
				} else {
					$instructions .= $ec_saved_oauth_apps[ $social_app ]['clientid'] . '##';
				}
				if ( ! isset( $ec_saved_oauth_apps[ $social_app ]['clientsecret'] ) ) {
					$instructions .= '##';
				} else {
					$instructions .= $ec_saved_oauth_apps[ $social_app ]['clientsecret'] . '##';
				}
                if ( ! isset( $ec_saved_oauth_apps[ sanitize_text_field( $_POST['app_name'] ) ]['scope'] ) ) {
                    $instructions .= '##';
                } else {
                    $instructions .= $ec_saved_oauth_apps[ $social_app ]['scope'] . '##';
                }
			} else {
				$instructions .= '######';
			}
			$name = plugin_dir_path( dirname( __DIR__ ) );
			$name = substr( $name, 0, strlen( $name ) - 1 ) . '//oauth_apps//' . $social_app . '.php';
			require $name;
			$ec_application = 'ecsl_' . $social_app;
			$social_app = new $ec_application();
			$instructions .= $social_app->instructions;
			wp_send_json( $instructions );
		}
	}
}

function ecsl_rearrange_apps() {
	$nonce = sanitize_text_field( $_POST['ec_rearrange_apps_nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'ec-rearrange-apps-nonce' ) ) {
		wp_die( '<strong>ERROR</strong>: Nonce verification failure <br/>Please Go back and Refresh the page and try again.' );
	} else {
		if ( current_user_can( 'administrator' ) ) {
			$app_sequence = array_map( 'sanitize_text_field', $_POST['sequence'] );
			$activated_oauth_apps      = '';
			$flag         = 0;
			foreach ( $app_sequence as $app_position ) {
				if ( $flag == 0 ) {
					$activated_oauth_apps = $app_position;
					$flag++;
				} else {
					$activated_oauth_apps .= '||' . $app_position;
				}
			}
			update_option( 'ecsl_apps', $activated_oauth_apps );
		}
	}
}
