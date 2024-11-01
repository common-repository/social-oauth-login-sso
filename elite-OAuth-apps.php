<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_show_oauth_apps($atts = ""){
    $html                       = '';
    $ec_button_shape            = esc_attr(get_option( 'elite_button_shape' ) );
    $ec_button_space            = esc_attr( get_option( 'elite_button_space' ) );
    $ec_button_width            = esc_attr( get_option( 'elite_button_width' ) );
    $ec_button_height           = esc_attr( get_option( 'elite_button_height' ) );
    $ec_button_size             = esc_attr( get_option( 'elite_button_size' ) );
    $ec_button_custom_color     = esc_attr( get_option( 'elite_button_custom_color' ) );
    $ec_button_s1_color         = esc_attr( get_option( 'elite_button_s1_color' ) );
    $ec_button_s2_color         = esc_attr( get_option( 'elite_button_s2_color' ) );
    $ec_button_theme            = esc_attr( get_option( 'elite_button_theme' ) );
    $ec_button_text             = esc_attr( get_option( 'elite_button_text' ) );
    $ec_button_curve            = esc_attr( get_option( 'elite_button_curve' ) );
    $active_oauth_apps          = get_option('ecsl_discord_enable') | get_option('ecsl_twitter_enable') | get_option('ecsl_facebook_enable') | get_option('ecsl_google_enable') | get_option('ecsl_linkedin_enable') | get_option('ecsl_amazon_enable') | get_option('ecsl_yahoo_enable') | get_option('ecsl_vkontakte_enable');
    $ec_text_color              = esc_attr( get_option( 'elite_text_color' ) );
    $ec_text_above_button       = esc_html( get_option( 'elite_text_above_button' ) );
    if ( $active_oauth_apps) {
        $oauth_apps = explode( '||', get_option('ecsl_apps') );
        ecsl_load_login_script();
        $html .= "<div class='ec_center'><p style='color:#" . $ec_text_color . ";'> $ec_text_above_button</p><center>";
        $count = -1;
        foreach ( $oauth_apps as $ec_app ) {
            if ( get_option( 'ecsl_' . $ec_app . '_enable' ) ) {
                $dir = dirname( __FILE__ );
                require_once $dir . '/oauth_apps/' . $ec_app . '.php';
                $ec_appname = 'ecsl_' . $ec_app;
                $social_app = new $ec_appname();
                $app_color = $social_app->app_color;
                $icon = $ec_app;
                if ( $ec_button_theme == 'default' ) {
                    if ( $ec_button_shape == 'longbutton' ) {
                        $html .= '<a style="margin-top: 5px !important; width: ' . $ec_button_width . 'px !important;padding-top:' . ( $ec_button_height - 29 ) . 'px !important;padding-bottom:' . ( $ec_button_height - 29 ) . 'px !important;margin-bottom: ' . $ec_button_space . 'px !important;border-radius: ' . $ec_button_curve . 'px !important;"
                            class="ec_btn ec_btn-block ec_btn-social ec_btn-' . $icon . ' ec_btn-custom-dec login-button " onClick="eliteloginuser(\'' . $ec_app . '\')"> <img style="padding-top:' . ( $ec_button_height - 35 ) . 'px !important; margin-top: 0;" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '.png', __FILE__ ).'" />'. $ec_button_text . ' ' . ucfirst( $ec_app ) .'</a>';
                    } else {
                        $html .= '<a onClick="eliteloginuser(\'' . $ec_app . '\')" ><img src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_icon.png', __FILE__ ).'" class="ec_default_icon_preview" ';
                        $html .= 'style="margin: 5px 0px 5px 0px !important; background:'.$app_color.' !important; border-radius: '.$ec_button_curve.'px !important; cursor: pointer; height: '.$ec_button_size.'px !important; width: '.$ec_button_size.'px !important; margin-right: '.$ec_button_space.'px !important;" /></a>';
                    }
                } 
                elseif ( $ec_button_theme == 'white' ) {
                    if ( $ec_button_shape == 'longbutton' ) {
                        $html .= '<a style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: ' . $ec_button_width . 'px !important;
                        padding-top:' . ( $ec_button_height - 29 ) . 'px !important;padding-bottom:' . ( $ec_button_height - 29 ) . 'px !important;margin-bottom: ' . ( $ec_button_space ) . 'px !important;border-radius: ' . $ec_button_curve . 'px !important;"
                            class="ec_btn ec_btn-block ec_btn-social ec_btn-' . $icon . '-white ec_btn-custom-dec login-button" onClick="eliteloginuser(\'' . $ec_app . '\')"> <img style="padding-top:' . ( $ec_button_height - 35 ) . 'px !important; margin-top: 0;" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_white.png', __FILE__ ).'" />'. $ec_button_text . ' ' . ucfirst( $ec_app ) .'</a>';
                    } else {
                        $html .= '<a onClick="eliteloginuser(\'' . $ec_app . '\')" ><img src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_white_icon.png', __FILE__ ).'" class="ec_default_icon_preview" ';
                        $html .= 'style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: '.$ec_button_curve.'px !important; cursor: pointer; height: '.$ec_button_size.'px !important; width: '.$ec_button_size.'px !important; margin-right: '.$ec_button_space.'px !important;" /></a>';
                    }
                } 
                elseif ( $ec_button_theme == 'hover' ) {
                    if ( $ec_button_shape == 'longbutton' ) {
                        $html .= '<a id="elite_hover_button_' . $icon . '" style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: ' . $ec_button_width . 'px !important;
                        padding-top:' . ( $ec_button_height - 29 ) . 'px !important;padding-bottom:' . ( $ec_button_height - 29 ) . 'px !important;margin-bottom: ' . ( $ec_button_space ) . 'px !important;border-radius: ' . $ec_button_curve . 'px !important;"
                            class="ec_hover_button_div ec_btn ec_btn-block ec_btn-social ec_btn-' . $icon . '-hov ec_btn-custom-dec login-button" onmouseover="elite_hover_active(\'' . $ec_app . '\' , \'' . $ec_button_shape . '\' , \'' . $app_color . '\')" onmouseout="elite_hover_deactive(\'' . $ec_app . '\' , \'' . $ec_button_shape . '\' , \'' . $app_color . '\')" onClick="eliteloginuser(\'' . $ec_app . '\')"> <img id="elite_hover_button_icon_' . $icon . '" style="padding-top:' . ( $ec_button_height - 35 ) . 'px !important; margin-top: 0;" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_white_icon.png', __FILE__ ).'" />'. $ec_button_text . ' ' . ucfirst( $ec_app ) .'</a>';
                    } else {
                        $html .= '<a onmouseover="elite_hover_active(\'' . $ec_app . '\' , \'' . $ec_button_shape . '\' , \'' . $app_color . '\')" onmouseout="elite_hover_deactive(\'' . $ec_app . '\' , \'' . $ec_button_shape . '\' , \'' . $app_color . '\')" onClick="eliteloginuser(\'' . $ec_app . '\')" ><img id="elite_hover_small_icon_' . $icon . '" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_white_icon.png', __FILE__ ).'" class="ec_default_icon_preview" ';
                        $html .= 'style="border: solid 1px black; padding:7px 0px 1px 0px; box-sizing:initial; margin: 10px 0px 10px 0px !important; background:white !important; border-radius: '.$ec_button_curve.'px !important; cursor: pointer; height: '.$ec_button_size.'px !important; width: '.$ec_button_size.'px !important; margin-right: '.$ec_button_space.'px !important;" /></a>';
                    }
                } 
                elseif ( $ec_button_theme == 'smart' ) {
                    if ( $ec_button_shape == 'longbutton' ) {
                        $html .= '<a style="color:#ffffff;background:linear-gradient(90deg,#'.$ec_button_s1_color.',#'.$ec_button_s2_color.'); margin-top: 5px !important; width: ' . $ec_button_width . 'px !important;
                        padding-top:' . ( $ec_button_height - 29 ) . 'px !important;padding-bottom:' . ( $ec_button_height - 29 ) . 'px !important;margin-bottom: ' . ( $ec_button_space ) . 'px !important;border-radius: ' . $ec_button_curve . 'px !important;"
                            class="ec_btn_smart ec_btn-block ec_btn-social ec_btn-custom-dec login-button" onClick="eliteloginuser(\'' . $ec_app . '\')"> <img style="padding-top:' . ( $ec_button_height - 35 ) . 'px !important; margin-top: 0;" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_icon.png', __FILE__ ).'" />'. $ec_button_text . ' ' . ucfirst( $ec_app ) .'</a>';
                    } 
                    else {
                        $html .= '<a onClick="eliteloginuser(\'' . $ec_app . '\')" ><img src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_icon.png', __FILE__ ).'" ';
                        $html .= 'style="background:linear-gradient(90deg,#'.$ec_button_s1_color.',#'.$ec_button_s2_color.'); margin: 5px 0px 5px 0px !important; color:white; border-radius: '.$ec_button_curve.'px !important; cursor: pointer; height: '.$ec_button_size.'px !important; width: '.$ec_button_size.'px !important; margin-right: '.$ec_button_space.'px !important;" /></a>';
                    }
                }
                elseif ( $ec_button_theme == 'custom' ) {
                    if ( $ec_button_shape == 'longbutton' ) {
                        $html .= '<a style="margin-top: 5px !important;color:white; width: ' . $ec_button_width . 'px !important;padding-top:' . ( $ec_button_height - 29 ) . 'px !important;padding-bottom:' . ( $ec_button_height - 29 ) . 'px !important;margin-bottom: ' . $ec_button_space . 'px !important;border-radius: ' . $ec_button_curve . 'px !important; background:#'.$ec_button_custom_color.'!important"
                            class="ec_btn ec_btn-block ec_btn-social ec_btn-ec_button_theme ec_btn-custom-dec login-button" onClick="eliteloginuser(\'' . $ec_app . '\')"> <img style="padding-top:' . ( $ec_button_height - 35 ) . 'px !important; margin-top: 0;" src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_icon.png', __FILE__ ).'" />'. $ec_button_text . ' ' . ucfirst( $ec_app ) .'</a>';
                    } else {
                        $html .= '<a onClick="eliteloginuser(\'' . $ec_app . '\')" ><img src="'.plugins_url( 'includes/images/social_images/' . $ec_app . '/' . $ec_app . '_icon.png', __FILE__ ).'" class="ec_default_icon_preview" ';
                        $html .= 'style="margin: 5px 0px 5px 0px !important; background:#' . $ec_button_custom_color . ' !important; border-radius: '.$ec_button_curve.'px !important; cursor: pointer; height: '.$ec_button_size.'px !important; width: '.$ec_button_size.'px !important; margin-right: '.$ec_button_space.'px !important;" /></a>';
                    }
                }
            }
        }
        $html .= '</center></div><br/>';
    } else {
        $html .= '<div>No OAuth apps are configured.</div>';
    }
    return $html;
}

function ecsl_load_login_script() {
    wp_enqueue_style( 'ec_wp_bootstrap_social', plugins_url( 'includes/css/bootstrap-social.css', __FILE__ ), false );
    wp_enqueue_style( 'ec-wp-bootstrap-main', plugins_url( 'includes/css/bootstrap.min-preview.css', __FILE__ ), false );
    wp_enqueue_script( 'ec-js-script', plugins_url( 'includes/js/ec_login_handle.js', __FILE__ ), array( 'jquery' ) );
    ?>
    <script type="text/javascript">
        function elite_hover_active(app_name, button_shape, color){
            var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_icon.png';
			if(button_shape == 'longbutton'){
				var ec_button = "elite_hover_button_".concat(app_name);
				var ec_button_icon = "elite_hover_button_icon_".concat(app_name);
				document.getElementById(ec_button).style.borderColor= color;
				document.getElementById(ec_button).style.background = color;
				document.getElementById(ec_button).style.color= 'white';
				document.getElementById(ec_button_icon).style.color= 'white';
				document.getElementById(ec_button_icon).src = img;
			} 
            else {
				var ec_button_small = "elite_hover_small_icon_".concat(app_name);
				document.getElementById(ec_button_small).style.background = color;
				document.getElementById(ec_button_small).style.color = 'white';
				document.getElementById(ec_button_small).style.borderColor = color;
				document.getElementById(ec_button_small).src = img;	
			}
        }

        function elite_hover_deactive(app_name, button_shape, color){
			var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_white_icon.png';
			if(button_shape == 'longbutton'){
				var ec_button = "elite_hover_button_".concat(app_name);
				var ec_button_icon = "elite_hover_button_icon_".concat(app_name);
				document.getElementById(ec_button).style.borderColor= 'black';
				document.getElementById(ec_button).style.background = 'white';
				document.getElementById(ec_button).style.color= 'black';
				document.getElementById(ec_button_icon).style.color= color;
				document.getElementById(ec_button_icon).src = img;
			}else {
				var ec_button_small = "elite_hover_small_icon_".concat(app_name);
				document.getElementById(ec_button_small).style.background = 'white';
				document.getElementById(ec_button_small).style.color = color;
				document.getElementById(ec_button_small).style.borderColor = 'black';
				document.getElementById(ec_button_small).src = img;
			}
		}

        function eliteloginuser(app_name) {
            <?php
            if ( isset( $_SERVER['HTTPS'] ) && ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {
                $http = 'https://';
            } else {
                $http = 'http://';
            }
            ?>
            var site_url = '<?php echo esc_url( site_url() ); ?>';
            var request_uri = '<?php echo esc_url(sanitize_url( $_SERVER['REQUEST_URI'] )); ?>';
            var http = '<?php echo esc_attr( $http ); ?>';
            var http_host = '<?php echo esc_url(sanitize_url( $_SERVER['HTTP_HOST'] )); ?>';
            var wp_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-login-validate-nonce' ) ); ?>';
            if ( request_uri.indexOf('wp-login.php') !=-1){
                var final_redirect_url = site_url + '/?ec_login_validate=oauthapp&ec_login_nonce=' + wp_nonce + '&app_name=';
            }else {
                var final_redirect_url = http + http_host + request_uri;
                if(final_redirect_url.indexOf('?') != -1)
                final_redirect_url = final_redirect_url +'&ec_login_validate=oauthapp&ec_login_nonce=' + wp_nonce + '&app_name=';
                else
                final_redirect_url = final_redirect_url +'?ec_login_validate=oauthapp&ec_login_nonce=' + wp_nonce + '&app_name=';
            }
            window.location.href = final_redirect_url + app_name;
        }
    </script>
    <?php
}
