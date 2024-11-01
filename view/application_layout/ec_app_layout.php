<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_buttons_layout(){
	?>
	<form id="elite_preview_buttons" name="elite_preview_buttons" method="post" action="">
		<input type="hidden" name="save_settings" value="elite_save_app_buttons" />
		<input type="hidden" name="elite_save_app_buttons_nonce" value="<?php echo esc_attr( wp_create_nonce( 'elite-save-app-buttons-nonce' ) ); ?>"/>
		<table style="text-align:center" class="elite_main_block ec_table_app_preview">
			<tr>
				<td>
					<label class="elite_heading"><?php echo esc_attr( 'Step 1: Select Theme' ); ?></label>
				</td>
				<td>
					<label class="elite_heading"><?php echo esc_attr( 'Step 2: Select Style' ); ?></label>
				</td>
				<td>
					<label class="elite_heading"><?php echo esc_attr( 'Step 3: Set Space & Size' ); ?></label>
				</td>
				<td>
					<label class="elite_heading"><?php echo esc_attr( 'Virtual Activated Applications Buttons Preview' ); ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<input type="radio" style="display:none" name="elite_button_theme" value="default" onclick="elite_button_virtual_preview()"
							<?php checked( get_option( 'elite_button_theme' ) == 'default' ); ?> />
							<a style="margin-top: 5px !important;width: 160px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important" class="ec_btn ec_btn-block ec_btn-social ec_btn-facebook ec_btn-custom-dec login-button elite_button_noeffect"> <img style="padding-top:0px !important;margin-top: 0" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook.png')?>">Login with Facebook</a>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" style="display:none" name="elite_button_shape" value="icon" onclick="icon_type_update();elite_button_virtual_preview()" <?php checked( get_option( 'elite_button_shape' ) == 'icon' ); ?> />
						<a onclick="eliteloginuser('facebook')"><img decoding="async" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white_icon.png' ); ?>" style="border: solid 1px black; margin: 5px 0px 5px 0px !important; background:white !important; border-radius: 10px !important; cursor: pointer; height: 35px !important; width: 35px !important; margin-right: 5px !important;"></a>
					</label>
				</td>
				<td>
					<?php echo esc_attr( 'Space: ' ); ?><input style="width: 40px;" class="elite_input_text" id="elite_button_space" name="elite_button_space" type="text" value="<?php echo esc_attr( get_option( 'elite_button_space' ) ); ?>"/>
					<input id="elite_space_add" type="button" value="+" onmouseup="elite_button_virtual_preview()" />
					<input id="elite_space_subtract" type="button" value="-" onmouseup="elite_button_virtual_preview()" />
				</td>
				<td rowspan=7 style="border: solid 1px; max-width:300px">
					<center>
						<div class="elite_virtual_app">
							<?php
							$activated_oauth_apps   = get_option( 'ecsl_apps' );
							$activated_oauth_apps   = explode( '||', $activated_oauth_apps );
							$count_app = 0;
							foreach ( $activated_oauth_apps as $active_app ) {
								if ( get_option( 'ecsl_' . $active_app . '_enable' ) == 1 ) {
									$dir = dirname( dirname(dirname(__FILE__ )));
									require $dir . '/oauth_apps/' . $active_app . '.php';
									$ec_appname = 'ecsl_' . $active_app;
									$social_app = new $ec_appname();
									$app_color = $social_app->app_color;
									$icon = $active_app;
									$count_app++;
									if($count_app == 1){
										?>
										<p class="ec_connect_text" id="ec_text_above_button" style="margin-bottom:17px;color:#<?php echo esc_attr( get_option( 'elite_text_color' ) ); ?>"><?php echo esc_attr( get_option( 'elite_text_above_button' ) ); ?></p>
										<?php
									}
									?>
									<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_icon.png' );?>" class="ec_default_icon_preview" id="ec_default_icon_preview_<?php echo esc_attr( $active_app ); ?>" style="background:<?php echo esc_attr( $app_color ); ?>;text-align:center;margin-top:5px;color: #FFFFFF" >
									<a id="ec_default_preview_<?php echo esc_attr( $active_app ); ?>" class="ec_btn ec_btn-block elite_default_theme ec_btn-social ec_btn-custom-size ec_login_button ec_btn-<?php echo esc_attr( $icon ); ?> "><img class="ec_oauth_logo"; src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'.png' );?>" />
										<label><span id="ec_button_text_update_<?php echo esc_attr( $active_app ); ?>"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo " ".esc_attr( ucfirst($active_app) ); ?></label> 
									</a>

									<img class="ec_white_icon_preview" id="ec_white_icon_preview_<?php echo esc_attr( $active_app ); ?>"  style="text-align:center;margin-top:5px;" src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_white_icon.png' );?>">
									<a id="ec_white_preview_<?php echo esc_attr( $active_app ); ?>" class="ec_btn ec_btn-block ec_white_preview ec_btn-social ec_btn-custom-size "> <img class="ec_oauth_logo"; src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_white.png' );?>" >
										<label><span id="ec_white_button_text_update_<?php echo esc_attr( $active_app ); ?>"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo " ".esc_attr( ucfirst($active_app) ); ?></label> 
									</a>

									<div style="display:inline-block" onmouseover="elite_hover_active('<?php echo esc_attr( $app_color ); ?>','<?php echo esc_attr( $active_app ); ?>')" onmouseout="elite_hover_deactive('<?php echo esc_attr( $app_color ); ?>','<?php echo esc_attr( $active_app ); ?>')">
										<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_white_icon.png' );?>" class="elite_hover_small_icon" id="elite_hover_small_icon_<?php echo esc_attr( $active_app ); ?>"   style="color:<?php echo esc_attr( $app_color ); ?>;text-align:center;margin-top:5px;"/>
										<a id="elite_hover_button_<?php echo esc_attr( $active_app ); ?>" class="ec_btn ec_btn-block elite_hover_button ec_btn-social ec_btn-custom-size "> <img class="ec_oauth_logo"; src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_white_icon.png' );?>" id="elite_hover_button_icon_<?php echo esc_attr( $active_app ); ?>"/>
											<label><span id="ec_hover_button_text_update_<?php echo esc_attr( $active_app ); ?>"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo " ".esc_attr( ucfirst($active_app) ); ?></label> 
										</a>
									</div>

									<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_icon.png' );?>" class="elite_dual_smart_icon" id="elite_dual_smart_icon_<?php echo esc_attr( $active_app ); ?>"  style="background:linear-gradient(90deg,#<?php echo esc_attr( get_option( 'elite_button_s1_color' ) ); ?>,#<?php echo esc_attr( get_option( 'elite_button_s2_color' ) ); ?>);text-align:center;margin-top:5px;color:#FFFFFF"/>
									<a class=" ec_btn-block ec_btn-social ec_btn-custom-size elite_dual_smart ec_btn-social ec_btn-custom-size " style="background:linear-gradient(90deg,#<?php echo esc_attr( get_option( 'elite_button_s1_color' ) ); ?>,#<?php echo esc_attr( get_option( 'elite_button_s2_color' ) ); ?>);text-align:center;margin-top:5px;"> <img class="ec_oauth_logo"; src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_icon.png' );?>" style="color:#FFFFFF"/>
										<label><span id="ec_smart_button_text_update_<?php echo esc_attr( $active_app ); ?>"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo " ".esc_attr( ucfirst($active_app) ); ?></label> 
									</a>

									<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_icon.png' );?>" class="elite_single_color__icon" id="elite_single_color__icon_<?php echo esc_attr( $active_app ); ?>"  style="color:#ffffff;text-align:center;margin-top:5px;"/>
									<a id="elite_single_color_<?php echo esc_attr( $active_app ); ?>" class="ec_btn ec_btn-block elite_single_color ec_btn-social ec_btn-custom-size " style="color: #FFFFFF"> <img class="ec_oauth_logo"; src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$active_app.'/'.$active_app.'_icon.png' );?>" />
										<label><span id="ec_single_button_text_update_<?php echo esc_attr( $active_app ); ?>"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo " ".esc_attr( ucfirst($active_app) ); ?></label> 
									</a>
									<?php
								}
							}
							if ( $count_app == 0 ) {
								?>
								<p>No activated applications were found. <br/>Please configure applications from <a href="<?php echo esc_url( site_url() ).'/wp-admin/admin.php?page=ec_social_settings'; ?>">here</a> to get the virtual preview.</p>
								<?php
							}
							?>
						</div>
					</center>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<input type="radio" style="display:none" name="elite_button_theme" value="white" onclick="elite_button_virtual_preview()"
							<?php checked( get_option( 'elite_button_theme' ) == 'white' ); ?> />
							<a style="border: solid 1px; border-color:#000000; color:#000000;background:#ffffff; margin-top: 5px !important; width: 160px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important;" class="ec_btn ec_btn-block ec_btn-social ec_btn-facebook-white ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:0px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white.png')?>">Login with Facebook</a>
					</label>
				</td>
				<td>
					<label>
						<input type="radio" style="display:none" id="elite_button_with_text" name="elite_button_shape" value="longbutton" onclick="icon_type_update();elite_button_virtual_preview()" <?php checked( get_option( 'elite_button_shape' ) == 'longbutton' ); ?> />
							<a style="margin-top: 5px !important;width: 140px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important" class="ec_btn ec_btn-block ec_btn-social ec_btn-facebook ec_btn-custom-dec login-button elite_button_noeffect"> <img style="padding-top:0px !important;margin-top: 0" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook.png')?>" >Button with Text</a>
					</label>
				</td>
				<td>
					<div id="icon_button_size">
						<?php echo esc_attr( 'Size:' ); ?><input style="width: 40px;" class="elite_input_text" id="ec_button_size" name="elite_button_size" type="text" value="<?php echo esc_attr( get_option( 'elite_button_size' ) ); ?>">
						<input id="elite_size_add" type="button" value="+" onmouseup="elite_button_virtual_preview()" />
						<input id="elite_size_subtract" type="button" value="-" onmouseup="elite_button_virtual_preview()" />
					</div>
					<div id="button_with_text_width">
						<?php echo esc_attr( 'Width: ' ); ?><input style="width: 40px;" class="elite_input_text" id="ec_button_width" name="elite_button_width" type="text" value="<?php echo esc_attr( get_option( 'elite_button_width' ) ); ?>" >
						<input id="elite_width_add" type="button" value="+" onmouseup="elite_button_virtual_preview()" >
						<input id="elite_width_subtract" type="button" value="-" onmouseup="elite_button_virtual_preview()" >
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<input type="radio" style="display:none" name="elite_button_theme" value="hover" onclick="elite_button_virtual_preview()"
							<?php checked( get_option( 'elite_button_theme' ) == 'hover' ); ?> />
						<div style="display:inline-block" onmouseover="elite_hover_active_button('#1877F2','facebook')" onmouseout="elite_hover_deactive_button('#1877F2','facebook')">
							<a id="elite_hover_button_facebook_button" class="ec_btn ec_btn-block ec_btn-social ec_btn-custom-size " style="border: 1px solid black; background: white; color: black; margin-top: 0px; width: 160px; padding-top: 6px; padding-bottom: 6px; margin-bottom: 0px; border-radius: 10px;"> 
								<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_white_icon.png' );?>" id="elite_hover_button_icon_facebook_button" style="padding-top: 0px; color: rgb(24, 119, 242);" />
								<label><span id="ec_hover_button_text_update_facebook"><?php echo esc_html( get_option( 'elite_button_text' ) );?> </span> <?php echo esc_attr(" Facebook") ?></label>
							</a>
						</div>
					</label>
				</td>
				<td>
					<label class="elite_heading"><?php echo esc_attr( 'Effects' ); ?><span class="ec_premium_span">Premium</span></label>
				</td>
				<td>
					<div>
						<?php echo esc_attr( 'Curve: ' ); ?><input style="width: 40px;" class="elite_input_text" id="elite_button_curve" name="elite_button_curve" type="text" value="<?php echo esc_attr( get_option( 'elite_button_curve' ) ); ?>" />
						<input id="elite_boundary_add" type="button" value="+" onmouseup="elite_button_virtual_preview()" />
						<input id="elite_boundary_subtract" type="button" value="-" onmouseup="elite_button_virtual_preview()" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<input type="radio" style="display:none" name="elite_button_theme" value="smart" onclick="elite_button_virtual_preview()"
							<?php checked( get_option( 'elite_button_theme' ) == 'smart' ); ?> />
							<a style="color:#ffffff;background:linear-gradient(90deg,#194ABD,#3EB863); margin-top: 5px !important; width: 160px !important;padding-top:6px !important;padding-bottom:6px !important;margin-bottom: 5px !important;border-radius: 10px !important;" class="ec_btn_smart ec_btn-block ec_btn-social ec_btn-custom-dec login-button elite_button_noeffect"> <img decoding="async" style="padding-top:0px !important; margin-top: 0;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_icon.png' ); ?>">Login with Facebook</a>
					</label>
					
				</td>
				<td>
					<label><?php echo esc_attr( 'No Effect' ) ; ?>
						<input type="radio" name="elite_button_effect" onclick="icon_type_update();elite_button_virtual_preview()" <?php checked( get_option( 'elite_button_effect' ) == 'noeffect' ); ?>/>
					</label>
				</td>
				<td>
					<div id="button_with_text_height">
						<?php echo esc_attr( 'Height: ' ); ?><input style="width: 40px;" class="elite_input_text" id="ec_button_height" name="elite_button_height" type="text" value="<?php echo esc_attr( get_option( 'elite_button_height' ) ); ?>" >
						<input id="elite_height_add" type="button" value="+" onmouseup="elite_button_virtual_preview()" >
						<input id="elite_height_subtract" type="button" value="-" onmouseup="elite_button_virtual_preview()" >
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<input id="elite_button_s1_color" style="width:66px;margin-bottom: 5px;display: inline-block;" name="elite_button_s1_color"  class="color" value="<?php echo esc_attr( get_option( 'elite_button_s1_color' ) ); ?>" onchange="elite_button_virtual_preview()" />
					<input id="elite_button_s2_color" style="width:66px;margin-bottom: 5px;" name="elite_button_s2_color"  class="color" value="<?php echo esc_attr( get_option( 'elite_button_s2_color' ) ); ?>" onchange="elite_button_virtual_preview()" />
				</td>
				<td>
					<label><?php echo esc_attr( 'Hover Effect' ); ?>
						<input type="radio" name="elite_button_effect" value="hover" onclick="icon_type_update();elite_button_virtual_preview()" />
					</label>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
				<label>
					<input type="radio" style="display:none" name="elite_button_theme" value="custom" onclick="elite_button_virtual_preview()"
						<?php checked( get_option( 'elite_button_theme' ) == 'custom' ); ?> />
						<a style="color: rgb(255, 255, 255); margin-top: -15px; width: 160px; padding-top: 6px; padding-bottom: 6px; margin-bottom: 0px; border-radius: 10px; background: rgb(70, 173, 194);" class="ec_btn ec_btn-block ec_btn-social ec_btn-custom-size"> <img decoding="async" style="padding-top:0px;" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/facebook/facebook_icon.png' ); ?>">Login with Facebook</a>
				</label>
				</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<input id="elite_button_custom_color" style="width:160px;margin-bottom: 5px;" name="elite_button_custom_color"  class="color" value="<?php echo esc_attr( get_option( 'elite_button_custom_color' ) ); ?>" onchange="elite_button_virtual_preview()" >
				</td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<table class="elite_main_block">
			<tr>
				<td colspan=2>
					<label class="elite_heading"><?php echo esc_attr( 'Text For Application Buttons & Icons' ); ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php echo esc_attr( 'Select color for text appearing above application buttons:' ); ?></label>
				</td>
				<td>
					<input id="ec_text_above_button_update_color" name="elite_text_color"  class="color" onchange="ecsl_text_above_button_update()" value="<?php echo esc_attr( get_option( 'elite_text_color' ) ); ?>" >
				</td>
			</tr>
			<tr>
				<td>
					<label><?php echo esc_attr( 'Enter text to display above application buttons:' ); ?></label>
				</td>
				<td>
					<input id="ec_text_above_button_update_input" type="text" oninput="ecsl_text_above_button_update()" name="elite_text_above_button" value="<?php echo esc_attr( get_option( 'elite_text_above_button' ) ); ?>" />
				</td>
			</tr>
			<tr id="button_with_text_detail">
				<td>
					<label><?php echo esc_attr('Display text before Application Name:' ); ?></label>
				</td>
				<td>
					<input id="ec_button_text_update_input" type="text" oninput="ecsl_button_text_update()" name="elite_button_text" value="<?php echo esc_attr( get_option( 'elite_button_text' ) ); ?>"/>
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<label class="elite_heading"><?php echo esc_attr( 'Text to display for logged in user' ); ?></label>
				</td>
			</tr>
			<tr>
				<td>
					<label><?php echo esc_attr( 'Text to display before the logout link. Use ##username## to display current username:' ); ?></label>
				</td>
				<td>
					<input type="text" name="ecsl_logout_display_text"  value="<?php echo esc_attr( get_option( 'ecsl_logout_display_text' ) ); ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label><?php echo esc_attr( 'Enter text to display as logout link:' ); ?></label>
				</td>
				<td>
					<input type="text" name="ecsl_logout_display" value="<?php echo esc_attr( get_option( 'ecsl_logout_display' ) ); ?>"  />
				</td>
			</tr>
			<tr>
				<td colspan =2>
				<center><input type="submit" name="submit" value="<?php echo esc_attr( 'Save' ); ?>" class="button button-primary button-large" /></center>
				</td>
			</tr>
		</table>
	</form>
	<script>
		function ecsl_button_text_update(){
			var val = jQuery('#ec_button_text_update_input').val();
			var apps;
			apps='<?php echo esc_attr( get_option( 'ecsl_apps' ) ); ?>';
			apps=apps.split('||');
			for(i=0;i<apps.length;i++){
				jQuery('#ec_button_text_update_'+apps[i]).text(val);
				jQuery('#ec_white_button_text_update_'+apps[i]).text(val);
				jQuery('#ec_hover_button_text_update_'+apps[i]).text(val);
				jQuery('#ec_smart_button_text_update_'+apps[i]).text(val);
				jQuery('#ec_single_button_text_update_'+apps[i]).text(val);
			}
		}

		function ecsl_text_above_button_update(){
			var val = jQuery('#ec_text_above_button_update_input').val();
			var col = jQuery('#ec_text_above_button_update_color').val();
			jQuery('#ec_text_above_button').text(val);
			jQuery('#ec_text_above_button').css("color", "#"+col);
		}

		function elite_hover_active(color,app_name){
			var checked_value =jQuery('input[name=elite_button_shape]:checked', '#elite_preview_buttons').val();
			var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_icon.png';
			if(checked_value == 'longbutton'){
				var ec_button = "elite_hover_button_".concat(app_name);
				var ec_button_icon = "elite_hover_button_icon_".concat(app_name);
				if(app_name == 'google'){
					document.getElementById(ec_button).style.borderColor= 'linear-gradient(90deg,#e53935,#ffc107,#4caf50,#1976d2)';
					document.getElementById(ec_button).style.background = 'linear-gradient(90deg,#e53935,#ffc107,#4caf50,#1976d2)';
				}
				else{
					document.getElementById(ec_button).style.borderColor= color;
					document.getElementById(ec_button).style.background = color;
				}
				document.getElementById(ec_button_icon).src = img;
				document.getElementById(ec_button).style.color= 'white';
				document.getElementById(ec_button_icon).style.color= 'white';
				
			} else {
				var ec_button_small = "elite_hover_small_icon_".concat(app_name);
				document.getElementById(ec_button_small).style.background = color;
				document.getElementById(ec_button_small).style.color = 'white';
				document.getElementById(ec_button_small).style.borderColor = color;
				document.getElementById(ec_button_small).src = img;
				
			}
		}

		function elite_hover_deactive(color,app_name){
			var checked_value =jQuery('input[name=elite_button_shape]:checked', '#elite_preview_buttons').val();
			var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_white_icon.png';
			if(checked_value == 'longbutton'){
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

		function elite_hover_active_button(color,app_name){
			var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_icon.png';
			var ec_button = "elite_hover_button_facebook_button";
			var ec_button_icon = "elite_hover_button_icon_facebook_button";
				document.getElementById(ec_button).style.borderColor= color;
				document.getElementById(ec_button).style.background = color;
			document.getElementById(ec_button_icon).src = img;
			document.getElementById(ec_button).style.color= 'white';
			document.getElementById(ec_button_icon).style.color= 'white';
		}

		function elite_hover_deactive_button(color,app_name){
			var img='<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/' );?>';
			img = img+app_name+'/'+app_name+'_white_icon.png';
				var ec_button = "elite_hover_button_facebook_button";
				var ec_button_icon = "elite_hover_button_icon_facebook_button";
				document.getElementById(ec_button).style.borderColor= 'black';
				document.getElementById(ec_button).style.background = 'white';
				document.getElementById(ec_button).style.color= 'black';
				document.getElementById(ec_button_icon).style.color= color;
				document.getElementById(ec_button_icon).src = img;
			
		}

		window.onload=icon_type_update();
		function icon_type_update() {
			var ecsl_button_type = document.getElementById('elite_button_with_text').checked;
			if(ecsl_button_type != true) {
				jQuery('#button_with_text_size').hide();
				jQuery('#button_with_text_width').hide();
				jQuery('#button_with_text_height').hide();
				jQuery('#button_with_text_detail').hide();
				jQuery('#long_button_text').hide();
				jQuery('#icon_button_size').show();
			}
			else {
				jQuery('#button_with_text_size').show();
				jQuery('#button_with_text_width').show();
				jQuery('#button_with_text_height').show();
				jQuery('#button_with_text_detail').show();
				jQuery('#long_button_text').show();
				jQuery('#icon_button_size').hide();
			}
		}

		function elite_size_change(e,t,r,a,i){
			var h,s,c=!1,_=a;s=function(){
				"add"==t&&r.value<60?r.value++:"subtract"==t&&r.value>20&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

		function elite_space_change(e,t,r,a,i){
			var h,s,c=!1,_=a;s=function(){
				"add"==t&&r.value<60?r.value++:"subtract"==t&&r.value>0&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

		function elite_width_change(e,t,r,a,i){
			var h,s,c=!1,_=a;s=function(){
				"add"==t&&r.value<400?r.value++:"subtract"==t&&r.value>140&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

		function elite_height_change(e,t,r,a,i){
			var h,s,c=!1,_=a;s=function(){
				"add"==t&&r.value<70?r.value++:"subtract"==t&&r.value>35&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

		function elite_boundary_change(e,t,r,a,i){
			var h,s,c=!1,_=a;s=function(){
				"add"==t&&r.value<30?r.value++:"subtract"==t&&r.value>0&&r.value--,h=setTimeout(s,_),_>20&&(_*=i),c||(document.onmouseup=function(){clearTimeout(h),document.onmouseup=null,c=!1,_=a},c=!0)},e.onmousedown=s}

		elite_size_change(document.getElementById('elite_size_add'), "add", document.getElementById('ec_button_size'), 300, 0.7);
		elite_size_change(document.getElementById('elite_size_subtract'), "subtract", document.getElementById('ec_button_size'), 300, 0.7);

		elite_space_change(document.getElementById('elite_space_add'), "add", document.getElementById('elite_button_space'), 300, 0.7);
		elite_space_change(document.getElementById('elite_space_subtract'), "subtract", document.getElementById('elite_button_space'), 300, 0.7);

		elite_width_change(document.getElementById('elite_width_add'), "add", document.getElementById('ec_button_width'), 300, 0.7);
		elite_width_change(document.getElementById('elite_width_subtract'), "subtract", document.getElementById('ec_button_width'), 300, 0.7);

		elite_height_change(document.getElementById('elite_height_add'), "add", document.getElementById('ec_button_height'), 300, 0.7);
		elite_height_change(document.getElementById('elite_height_subtract'), "subtract", document.getElementById('ec_button_height'), 300, 0.7);

		elite_boundary_change(document.getElementById('elite_boundary_add'), "add", document.getElementById('elite_button_curve'), 300, 0.7);
		elite_boundary_change(document.getElementById('elite_boundary_subtract'), "subtract", document.getElementById('elite_button_curve'), 300, 0.7);

		function setLoginCustomTheme(){return jQuery('input[name=elite_button_theme]:checked', '#elite_preview_buttons').val();}
		function setSizeOfIcons(){
			if((jQuery('input[name=elite_button_shape]:checked', '#elite_preview_buttons').val()) == 'longbutton'){
				return document.getElementById('ec_button_width').value;
			}else{
				return document.getElementById('ec_button_size').value;
			}
		}

		elite_button_virtual_preview();

		function elite_button_virtual_preview(){
			const ec_theme_id = ["ec_default_icon_preview", "elite_default_theme", "ec_white_icon_preview", "ec_white_preview", "elite_hover_small_icon", "elite_hover_button", "elite_dual_smart_icon", "elite_dual_smart", "elite_single_color__icon", "elite_single_color"];
			ec_theme_id.forEach(ecsl_hide_all);
			function ecsl_hide_all(ec_class_name) {
				jQuery("."+ec_class_name).hide();			
			}
			var iconsize =  document.getElementById('ec_button_size').value;
			var space =  document.getElementById('elite_button_space').value;
			var curve =  document.getElementById('elite_button_curve').value;
			var buttonwidth =  document.getElementById('ec_button_width').value;
			var buttonheight =  document.getElementById('ec_button_height').value;
			var buttonstyle =  jQuery('input[name=elite_button_shape]:checked', '#elite_preview_buttons').val();
			var theme =  jQuery('input[name=elite_button_theme]:checked', '#elite_preview_buttons').val();
			var custom_color =  document.getElementById('elite_button_custom_color').value;
			var smart1color =  document.getElementById('elite_button_s1_color').value;
			var smart2color =  document.getElementById('elite_button_s2_color').value;
			var hover =  jQuery('input[name=elite_button_effect]:checked', '#elite_preview_buttons').val();
			
			if(theme == 'default'){
				if(buttonstyle == 'longbutton'){
					jQuery(".elite_default_theme").show();
					var val = "elite_default_theme";
					set_css_button(val,buttonwidth,buttonheight,space,curve,hover);
				}else{
					jQuery(".ec_default_icon_preview").show();
					var val="ec_default_icon_preview";
					set_css_icon(val,iconsize,space,hover,0);
				}
			}
			else if(theme == 'white'){
				if(buttonstyle == 'longbutton'){
					jQuery(".ec_white_preview").show();
					var val = "ec_white_preview";
					set_css_button(val,buttonwidth,buttonheight,space,curve,hover);
					jQuery("."+val).css("border-color", "#000000");
					jQuery("."+val).css("color", "#000000");
					jQuery("."+val).css("background","#ffffff");
					jQuery("."+val).css("border","solid 1px");
				}else{
					jQuery(".ec_white_icon_preview").show();
					var val = "ec_white_icon_preview";
					set_css_icon(val,iconsize,space,hover,1);
				}
			}

			else if(theme == 'hover'){
				if(buttonstyle == 'longbutton'){
					jQuery(".elite_hover_button").show();
					var val = "elite_hover_button";
					set_css_button(val,buttonwidth,buttonheight,space,curve,hover);
					jQuery("."+val).css("margin-top", "0px");
					jQuery("."+val).css("border-color", "#000000");
					jQuery("."+val).css("color", "#000000");
					jQuery("."+val).css("background","#ffffff");
					jQuery("."+val).css("border","solid 1px");
				}else{
					jQuery(".elite_hover_small_icon").show();
					var val = "elite_hover_small_icon";
					set_css_icon(val,iconsize,space,hover,1);
				}
			}

			else if(theme == 'smart'){
				if(buttonstyle == 'longbutton'){
					jQuery(".elite_dual_smart").show();
					var val = "elite_dual_smart";
					set_css_button(val,buttonwidth,buttonheight,space,curve,hover);
					jQuery("."+val).css("color", "#ffffff");
					jQuery("."+val).css("background", "linear-gradient(45deg,#"+smart1color+",#"+smart2color+")");
				}else{
					jQuery(".elite_dual_smart_icon").show();
					var val = "elite_dual_smart_icon";
					set_css_icon(val,iconsize,space,hover,0);
					jQuery("."+val).css("border-style","solid");
					jQuery("."+val).css("border-width","1px");
					jQuery("."+val).css("background", "linear-gradient(90deg,#"+smart1color+",#"+smart2color+")");
				}
			}

			else if(theme == 'custom'){
				if(buttonstyle == 'longbutton'){
					jQuery(".elite_single_color").show();
					var val = "elite_single_color";
					set_css_button(val,buttonwidth,buttonheight,space,curve,hover);
					jQuery("."+val).css("background","#"+custom_color);
				}else{
					jQuery(".elite_single_color__icon").show();
					var val="elite_single_color__icon";
					set_css_icon(val,iconsize,space,hover,0);
					jQuery("."+val).css("background","#"+custom_color);
				}
			}
		}
		
		function set_css_button(val,buttonwidth,height,space,curve,hover){
			jQuery("."+val).css("margin-top", "-15px");
			jQuery("."+val).css("width",(buttonwidth)+"px");
			jQuery("."+val).css("padding-top",(height-29)+"px");
			jQuery("."+val).css("padding-bottom",(height-29)+"px");
			jQuery("."+val).css("margin-bottom",(space-5)+"px");
			jQuery("."+val).css("border-radius",curve+"px");
			jQuery(".ec_oauth_logo").css("padding-top",5+((height-35)/2)+"px");
			jQuery(".ec_oauth_logo").css("width",(25+((height-35)))+"px");
			if(hover == "hover"){
				jQuery("."+val).addClass("elite_button_hover");
			}else {
				jQuery("."+val).removeClass("elite_button_hover");
			}
		}

		function set_css_icon(val,iconsize,space,hover,check){
			var radius = jQuery('#elite_button_curve').val();
			jQuery("."+val).css("borderRadius",radius+"px");
			jQuery("."+val).css("cursor","pointer");
			jQuery("."+val).css({height:iconsize,width:iconsize});
			jQuery("."+val).css("margin-left",(space-5)+"px");
			jQuery("."+val).css("font-size",(iconsize-16)+"px");
			if(hover == 'hover'){
				jQuery("."+val).addClass("elite_button_hover_i");
			}else{
				jQuery("."+val).removeClass("elite_button_hover_i");
			}
			if(check){
				jQuery("."+val).css("border-color","black");
				jQuery("."+val).css("border-style","solid");
				jQuery("."+val).css("border-width","1px");
			}
		}
	</script>
	<?php
}
