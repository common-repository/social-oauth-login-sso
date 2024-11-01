<?php

function ecsl_shortcode_display(){
    ecsl_load_login_script_shrtcode();
    ?>
	<div class="elite_main_block">
        <h4><?php echo esc_attr( 'The Elite OAuth social login Shortcodes insert login buttons into the needed page or post\'s content, depending on where you want the buttons to appear.
            For instance, the following shortcode would include active login buttons in the body of a post or page: [ec_oauth_login]'); ?>
        </h4>
        <h3><?php echo esc_attr('Default Login Shortcode'); ?></h3>
        <b><code>[ec_oauth_login]</code></b><br/>
        <?php echo esc_attr('The same settings you have selected will be used to display OAuth Social Login Icons.'); ?><br/>
        <?php echo esc_attr('For example, if Discord, Facebook, and LinkedIn are activated with the application background theme and the button with text style, the output will be as follows.');?> 
        <center>
        <a style="margin-top: 5px !important;width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important" class="ec_btn ec_btn-block ec_btn-social ec_btn-discord ec_btn-custom-dec login-button elite_button_noeffect"> <img style="padding-top:0px !important;margin-top: 0" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/discord/discord.png' ); ?>">Login with Discord</a>
        <a style="margin-top: 5px !important;width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important" class="ec_btn ec_btn-block ec_btn-social ec_btn-facebook ec_btn-custom-dec login-button elite_button_noeffect"> <img style="padding-top:0px !important;margin-top: 0" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook.png' ); ?>">Login with Facebook</a>
        <a style="margin-top: 5px !important;width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important" class="ec_btn ec_btn-block ec_btn-social ec_btn-linkedin ec_btn-custom-dec login-button elite_button_noeffect"> <img style="padding-top:0px !important;margin-top: 0" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/linkedin/linkedin.png' ); ?>">Login with Linkedin</a>
        </center>
        <br/><hr>
        <h1 style="text-align:center"><?php echo esc_attr('Shortcodes Using Attributes'); ?><span class="ec_premium_span">Premium</span></h1>
        <p><?php echo esc_attr('To create a layout for your login buttons that is specifically customised for your needs, you may add several variables. Some examples are shared below:'); ?></p>
        <h3>Example 1<span class="ec_premium_span">Premium</span></h3><b><?php echo esc_attr('Setting Button Theme as White Background and button curve as 20');?><code>[ec_oauth_login]</code></b>
        <center>
        <a style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn ec_btn-block ec_btn-social ec_btn-discord-white ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:0px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/discord/discord_white.png' ); ?>">Login with Discord</a>
        <a style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn ec_btn-block ec_btn-social ec_btn-facebook-white ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:0px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white.png' ); ?>">Login with Facebook</a>
        <a style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: 200px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn ec_btn-block ec_btn-social ec_btn-linkedin-white ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:0px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/linkedin/linkedin_white.png' ); ?>">Login with Linkedin</a>
        </center>
        <br/>
        <h3>Example 2<span class="ec_premium_span">Premium</span></h3><b><?php echo esc_attr('Setting Button Theme as Dual Color Background, color1=194ABD, color2=3EB863 button height as 40');?><code>[ec_oauth_login button_theme="smart" smart1_color="194ABD" smart2_color="3EB863" button_height="40"]</code></b>
        <center>
        <a style="color:#ffffff;background:linear-gradient(90deg,#194ABD,#3EB863); margin-top: 5px !important; width: 200px !important;padding-top:11px !important;padding-bottom:11px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn_smart ec_btn-block ec_btn-social ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:5px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/discord/discord_icon.png' ); ?>">Login with Discord</a>
        <a style="color:#ffffff;background:linear-gradient(90deg,#194ABD,#3EB863); margin-top: 5px !important; width: 200px !important;padding-top:11px !important;padding-bottom:11px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn_smart ec_btn-block ec_btn-social ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:5px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_icon.png' ); ?>">Login with Facebook</a>
        <a style="color:#ffffff;background:linear-gradient(90deg,#194ABD,#3EB863); margin-top: 5px !important; width: 200px !important;padding-top:11px !important;padding-bottom:11px !important;margin-bottom: 5px !important;border-radius: 20px !important;" class="ec_btn_smart ec_btn-block ec_btn-social ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:5px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/linkedin/linkedin_icon.png' ); ?>">Login with Linkedin</a>
        </center>
        <br/>
        <h3>Example 3<span class="ec_premium_span">Premium</span></h3><b><?php echo esc_attr('Setting Button Theme as Application Hover, Effects as Hover Effect, Application View as Horizontal');?><code>[ec_oauth_login button_theme="hover" hover_effect="hover" app_view="horizontal"]</code></b><br/>
        <center>
        <a id="elite_hover_button_discord" style="border: 1px solid black; color: black; background: white; margin-top: 5px !important; width: 200px !important; padding-top: 11px !important; padding-bottom: 11px !important; margin-bottom: 15px !important; border-radius: 20px !important;" class="ec_hover_button_div ec_btn ec_btn-block-inline ec_btn-social ec_btn-discord-hov ec_btn-custom-dec login-button elite_button_hover" onmouseover="elite_hover_active('discord' , 'longbutton' , '#404eed')" onmouseout="elite_hover_deactive('discord' , 'longbutton' , '#404eed')"> <img decoding="async" id="elite_hover_button_icon_discord" style="margin-top: 0px; padding-top: 5px !important; color: rgb(64, 78, 237);" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/discord/discord_white_icon.png' ); ?>">Login with Discord</a>
        <a id="elite_hover_button_facebook" style="border: 1px solid black; color: black; background: white; margin-top: 5px !important; width: 200px !important; padding-top: 11px !important; padding-bottom: 11px !important; margin-bottom: 15px !important; border-radius: 20px !important;" class="ec_hover_button_div ec_btn ec_btn-block-inline ec_btn-social ec_btn-facebook-hov ec_btn-custom-dec login-button elite_button_hover" onmouseover="elite_hover_active('facebook' , 'longbutton' , '#1877F2')" onmouseout="elite_hover_deactive('facebook' , 'longbutton' , '#1877F2')"> <img decoding="async" id="elite_hover_button_icon_facebook" style="margin-top: 0px; padding-top: 5px !important; color: rgb(24, 119, 242);" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white_icon.png' ); ?>">Login with Facebook</a>
        <a id="elite_hover_button_linkedin" style="border: 1px solid black; color: black; background: white; margin-top: 5px !important; width: 200px !important; padding-top: 11px !important; padding-bottom: 11px !important; margin-bottom: 15px !important; border-radius: 20px !important;" class="ec_hover_button_div ec_btn ec_btn-block-inline ec_btn-social ec_btn-linkedin-hov ec_btn-custom-dec login-button elite_button_hover" onmouseover="elite_hover_active('linkedin' , 'longbutton' , '#0a66c2')" onmouseout="elite_hover_deactive('linkedin' , 'longbutton' , '#0a66c2')"> <img decoding="async" id="elite_hover_button_icon_linkedin" style="margin-top: 0px; padding-top: 5px !important; color: rgb(10, 102, 194);" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/linkedin/linkedin_white_icon.png' ); ?>">Login with Linkedin</a>
        </center>
        <br/>
        <h3>Example 4<span class="ec_premium_span">Premium</span></h3><b><?php echo esc_attr('Setting Button Style as icon, Button Theme as White Background, Effects as Hover Effect, space as 5, curve as 10 and applications as Discord, Google, LinkedIn, Amazon, Facebook');?><code>[ec_oauth_login button_shape="icon" button_theme="white" hover_effect="hover" button_space="5" button_curve="10" active_app="discord,google,linkedin,amazon,facebook"]</code></b><br/>
        <center>
        <a onclick="eliteloginuser('discord')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/discord/discord_white_icon.png' ); ?>" class="ec_default_icon_preview elite_button_hover_i" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
        <a onclick="eliteloginuser('google')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/google/google_white_icon.png' ); ?>" class="ec_default_icon_preview elite_button_hover_i" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
        <a onclick="eliteloginuser('linkedin')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/linkedin/linkedin_white_icon.png' ); ?>" class="ec_default_icon_preview elite_button_hover_i" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
        <a onclick="eliteloginuser('amazon')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/amazon/amazon_white_icon.png' ); ?>" class="ec_default_icon_preview elite_button_hover_i" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
        <a onclick="eliteloginuser('facebook')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white_icon.png' ); ?>" class="ec_default_icon_preview elite_button_hover_i" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
        </center>
        <br/><hr>
        <h1 style="text-align:center"><?php echo esc_attr('Available Attributes for Shortcodes'); ?><span class="ec_premium_span">Premium</span></h1>
        <div style="width:100%; display:inline-block">
            <div style="float:left; width:50%">
                <table class="ec_shortcode_table">
                    <tr><th colspan="2" style="align-content: center"><?php echo esc_attr( ( 'Available values for attributes' ) ); ?></th></tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_theme' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'default, white, hover, smart, custom' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_shape' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'longbutton, icon' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_space' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value between 0 to 60' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_width' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value between 140 to 400' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_height' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value between 35 to 70' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_curve' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value between 0 to 30' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_size' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value between 20 to 60' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'hover_effect' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'none, hover' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'app_count' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any value for number of buttons in one row' ) ); ?></td>
                    </tr>
                </table>
            </div>
            <div style="float:left; width:50%">
                <table class="ec_shortcode_table">
                    <tr><th colspan="2" style="align-content: center"><?php echo esc_attr( ( 'Available values for attributes' ) ); ?></th></tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'custom_color' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Enter color code for example \'46ADC2\'' ) ); ?></td>
                    </tr>    
                    <tr>
                        <td><b><?php echo esc_attr( ( 'smart1_color' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Enter color code for example \'194ABD\'' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'smart2_color' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Enter color code for example \'3EB863\'' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'button_text' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Display text before Application Name' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'text_above_button' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Enter custom heading' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'text_color' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Any color for custom heading like FF6378' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'app_view' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'none, horizontal' ) ); ?></td>
                    </tr>
                    <tr>
                        <td><b><?php echo esc_attr( ( 'active_app' ) ); ?></b></td>
                        <td><?php echo esc_attr( ( 'Enter Application Name \',\' seprated like: discord,facebook,google' ) ); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br/><br/>
        <hr/>
        <h3><?php echo esc_attr('Using Shortcode in PHP file'); ?></h3>
        <b><?php echo esc_attr('You can use your desired Shortcode like this: '); ?><code>&lt;&#63;php echo do_shortcode('[ec_oauth_login]') &#63;&gt;</code></b><br/>
	</div>
    <?php
}

function ecsl_load_login_script_shrtcode() {
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
    </script>
    <?php
}
