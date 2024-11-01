<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_list_apps() {
	?>
	<div class="ec_search_app">
		<label class="ec_search_text">Search Applications</label>
		<input type="text" id="ec_search_apps" />
	</div>
	<table>
		<tr>
			<td>
				<?php
				$activated_oauth_apps = get_option( 'ecsl_apps' );
				$activated_oauth_apps = explode( '||', $activated_oauth_apps );
				?>
				<div id="ec_notice_bar"><label id="ec_notice_bar_message"></label></div>
				<div id="ec_notice_bar_top"><label id="ec_notice_bar_message_top"></label></div>
				<div class="ec_sort_apps" id="ec_move">
					<?php
					foreach ( $activated_oauth_apps as $apps ) {
						if ( get_option( 'ecsl_' . $apps . '_enable' ) == 1 ) 
							$checked = 'checked';
						else 
							$checked = '';
						if($apps == 'google')
							$blcolor    = '#0086f9';
						else{
							$dir = dirname( dirname( dirname( __FILE__ ) ) );
							require $dir . '/oauth_apps/' . $apps . '.php';
							$ec_appname = 'ecsl_' . $apps;
							$social_app = new $ec_appname();
							$blcolor    = $social_app->app_color;
						}
						?>
						<div class="ec_sort_apps_div ec_hover_div" data-provider="<?php echo esc_attr( $apps ); ?>" id="<?php echo esc_attr( $apps ); ?>" style="background-color:<?php echo esc_attr( $blcolor ); ?>">
							<div class="ec_sort_apps_i_div ec_sort_apps_open_settings_div" title="Click to set up <?php echo esc_attr( ucfirst($apps) ); ?>" style="cursor: pointer; background-color:<?php echo esc_attr( $blcolor ); ?>;">
							<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/'.$apps.'/'.$apps.'.png' );?>" height="45" alt="<?php echo esc_html($apps) ?>">
							<h2><?php echo esc_html(ucfirst($apps)) ?></h2>
							</div>
							<div>
								<div style="display: inline-block; padding-left: 3%; text-align: left;width: 75%;position: absolute;font-size: 13px;">
									<?php if ( $checked != 'checked' ) {?>
										<span id="<?php echo 'ec_app_enable_show_'.esc_html($apps) ?>" style="color:orange" class="ec_app_name_card">Disabled</span>
										<?php } 
										else{?>
										<span id="<?php echo 'ec_app_enable_show_'.esc_html($apps) ?>" class="ec_app_name_card">Enabled</span>
										<?php } ?>
								</div>
								<div style="text-align: left; width: 25%; float: right; display: inline-block; padding-bottom:4px">
									<label class="ec_input_wrapper">
										<input type="checkbox" <?php echo esc_attr( $checked ); ?> value="1" onclick='enable_default_app("<?php echo esc_attr( $apps ); ?>")' id='ec_app_<?php echo esc_attr( $apps ); ?>'>
										<svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
											<path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
										</svg>
										<svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
											<path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
										</svg>
									</label>

								</div>
							</div>
							<div title="Change Position" id="ec_move_<?php echo esc_attr( $apps ); ?>" class="ec_sort_apps_move"></div>
						</div>
						<?php
					}
					?>
				</div>
				<br/>
			</td>
		</tr>
		<tr>
			<td>
				<?php
				$selected_applications_premium = get_option( 'ecsl_premium_apps' );
				?>
				<div class="ec_sort_apps">
					<?php
					foreach ( $selected_applications_premium as $app_name=>$ec_pre_app_color ) {
						?>
						<div class="ec_sort_apps_div" id="<?php echo esc_attr( $app_name ); ?>" style="background-color:<?php echo esc_attr( $ec_pre_app_color ); ?>">
							<div class="ec_sort_apps_i_div">
							<span class="wdp-ribbon wdp-ribbon-two">Premium</span>
							<img src= "<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/social_images/premium_apps/'.$app_name.'.png' );?>" height="45" alt="<?php echo esc_html($app_name) ?>">
							<h2><?php echo esc_html(ucfirst($app_name)) ?></h2>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</td>
		</tr>
	</table>
	<script>
		jQuery(document).ready(function(){
			jQuery("#ec_search_apps").on("input", function(){
				var input_app_name = jQuery("#ec_search_apps").val();
				jQuery('.ec_sort_apps_div').each(function () {
					var app = jQuery(this).attr('id');
					if(app.includes(input_app_name) == false){
						jQuery('#'.concat(app)).hide();
					}
					else
						jQuery('#'.concat(app)).show();
        		});
			});
		});
		function enable_default_app(app_name) {
			var a = document.getElementById('ec_app_'.concat(app_name));
			ecsl_enable_app(a,app_name);
		}
		function ecsl_enable_app(a,app_name) {
			if (a.checked == true) {
				var ec_check_capp_enable_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-check-capp-enable-nonce' ) ); ?>';
				jQuery.ajax({
					url: "<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>", 
					method: "POST", 
					dataType: 'json',
					data: {
						action: 'ec_check_capp_enable',
						app_name: app_name,
						'ec_check_capp_enable_nonce': ec_check_capp_enable_nonce,
					},
					success: function (result) {
						if (result.status === "true") {
							ecsl_enable_disable_app(app_name,a.checked,'');
						} 
						else {
							jQuery("#ec_app_".concat(app_name)).prop('checked', false);
							ecsl_display_notice('success','Please set custom app for '.concat(app_name));
							ecsl_set_values_popup(app_name);
						}
					}
				});
			} 
			else {
				ecsl_enable_disable_app(app_name,a.checked,'');
			}
		}

		function ecsl_enable_disable_app(app_name, checked, top){
			var ec_app_enable_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-app-enable-nonce' ) ); ?>';
			jQuery.ajax({
				type: 'POST',
				url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
				data: {
					'ec_app_enable_nonce': ec_app_enable_nonce,
					action: 'ec_app_enable',
					app_name: app_name,
					enabled: checked,
				},
				success: function (data) {
					if(data.status === "enable"){
						jQuery("#ec_app_enable_show_".concat(app_name)).text("Enabled");
						jQuery("#ec_app_enable_show_".concat(app_name)).css('color', '#46E246');
						jQuery("#ec_app_".concat(app_name)).prop('checked', true);
						if(top == 'top')
							ecsl_display_notice_top('success',app_name.charAt(0).toUpperCase()+app_name.substr(1)+' is activated sucessfully');
						else
							ecsl_display_notice('success',app_name.charAt(0).toUpperCase()+app_name.substr(1)+' is activated sucessfully');
					}
					else if(data.status === "disable"){
						jQuery("#ec_app_enable_show_".concat(app_name)).text("Disabled");
						jQuery("#ec_app_enable_show_".concat(app_name)).css('color', 'orange');
						jQuery("#ec_app_".concat(app_name)).prop('checked', false);
						if(top == 'top')
							ecsl_display_notice_top('success',app_name.charAt(0).toUpperCase()+app_name.substr(1)+' is deactivated sucessfully');
						else
							ecsl_display_notice('success',app_name.charAt(0).toUpperCase()+app_name.substr(1)+' is deactivated sucessfully');
					}
				},
				error: function (data) {
				}
			});
		}

		function ecsl_open_verify_window(app_name){
			window.open('<?php echo esc_url( home_url() ); ?>' + '/?ec_login_validate=oauthapp&app_name='+app_name+'&ec_login_nonce='+'<?php echo esc_attr( wp_create_nonce( 'ec-login-validate-nonce' ) ); ?>', "", "width=1000, height=1000");
		}

		function ecsl_display_notice(msg_type,message) {
			jQuery('#ec_notice_bar_message').text(message);
			if(msg_type=='error')
				jQuery('#ec_notice_bar').css("background-color","#c02f2f");
			else
				jQuery('#ec_notice_bar').css("background-color","#4CAF50");
			var x = document.getElementById("ec_notice_bar");
			x.className = "show";
			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
		}
		function ecsl_display_notice_top(msg_type,message) {
			jQuery('#ec_notice_bar_message_top').text(message);
			if(msg_type=='error')
				jQuery('#ec_notice_bar_top').css("background-color","#c02f2f");
			else
				jQuery('#ec_notice_bar_top').css("background-color","#4CAF50");
			var x = document.getElementById("ec_notice_bar_top");
			x.className = "show";
			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);
		}

		jQuery(function() {
			var popup =
				'<div class="ec_popup" popup-name="ec_popup_apps_details" border="1" id = "ec_app_div" style="display:none; float: left; width: 100%; overflow: hidden">' +
						'<div id="ec_wait_image_fade"></div>'+
						'<div id="ec_wait_image"><img height="35" src="<?php echo esc_url( ECSL_PLUGIN_URL.'/includes/images/wait.gif' ); ?>" /></div>'+
						'<div class="ec_popup_content">'+
							'<div style="margin-bottom: 10px"><center><h1 style="display: inline" id="ec_app_name"></h1></center></div>'+
							'<div style="display: inline" id="ec_actual_app_name" class="ec_actual_app_name">' +
								'<div style="width: 100%">'+
									'<div style="padding: 2% 5% 2% 5%;">'+
										'<div style="overflow: auto">' +
											'<div style="float: left; width: 20%"><b>Application ID</b></div>'+
											'<div style="float: right; width: 80%"><input placeholder="Enter App ID" id="ec_app_id" type="text" style="width: 98%"></div>'+
										'</div>'+
										'<div style="overflow: auto;margin-top: 10px;">'+
											'<div style="float: left; width: 20%"><b>Application Secret</b></div>'+
											'<div style="float: right; width: 80%"><input placeholder="Enter App Secret" id="ec_app_secret" type="text" style="width: 98%"> </div>'+
										'</div>'+
										'<div style="overflow: auto;margin-top: 10px;">'+
											'<div style="float: left; width: 20%"><b>Scope</b></div>'+
											'<div style="float: right; width: 80%"><input placeholder="Enter App Scope" id="ec_app_scope" type="text" style="width: 98%"> </div>'+
										'</div>'+
										'<div style="margin-top: 10px">'+
											'<center>' +
												'<input type="button" value="Save & Test Application" class="button button-primary button-large ec_save_fields_settings">' +
												'&nbsp;&nbsp;<input type="button" value="Clear Fields" class="button button-primary button-large ec_clear_fields_settings">'+
											'</center>'+
										'</div>'+
										'<div style="margin-top: 10px;">'+
											'<center>' +
											'<p style="margin-bottom:auto">Facing any configuration issues? Contact Us, Just drop an email at <a href="mailto:info@elitecontrivers.com">info@elitecontrivers.com</a> for help.</p>' +
											'</center>'+
										'</div>'+
										'<div style="margin-top: 10px;">'+
											'<center>' +
											'<p style="margin-bottom:auto">Do you want to display OAuth social login icons on any particular form/theme? Go to <a style="cursor: pointer" href="<?php echo esc_url( add_query_arg( array( 'tab' => 'settings', 'sub_tab' => 'shortcodes' ), sanitize_url( $_SERVER['REQUEST_URI'] ) ) ); ?>">Shortcode Tab</a> .</p>' +
											'</center>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div id="ec_application_instructions" style="background-color: wheat; display: block; height: auto; overflow-y: auto">'+
								'<div><center><h3 id="ec_app_instructions"></h3><h4 id="ec_ssl_notice" style="color:red;margin-top: 0px;margin-bottom: 7px;"></h4></center></div>'+
								'<ol id="ec_app_instructions_step"></ol>'+
								'<div style="padding: 0px 10px 10px 10px;" id="ec_app_instructions_permalink"><strong style=\'color: red;font-weight: bold\'><br>You have selected plain permalink and <label id="ec_permalink_error" style="display:contents"></label> does not support it.</strong><br><br> Please change the permalink to continue further.Follow the steps given below:<br>1. Go to settings from the left panel and select the permalinks option.<br>2. Plain permalink is selected ,so please select any other permalink and click on save button.<br> <strong class=\'ec_note_display\' style=\'color: red;font-weight: bold\'> When you will change the permalink ,then you have to re-configure the already set up custom apps because that will change the redirect URL.</strong></div>'+
							'</div>'+
							'<a class="ec_close_button" popup-close="ec_popup_apps_details" href="javascript:void(0)">Close</a>'+
						'</div>'+
					'</div>';
			jQuery(popup).insertAfter("#ec-main-container");

			jQuery('[popup-close]').on('click', function() {
				var popup_name = jQuery(this).attr('popup-close');
				jQuery('[popup-name="' + popup_name + '"]').fadeOut(300);
			});

			jQuery(document).click(function(e){
				if(jQuery(e.target).attr("id") == 'ec_app_div') {
					jQuery('#ec_app_div').fadeOut(300);
				}
			});

			jQuery('.ec_save_fields_settings').click(function () {
				let app_name = jQuery(".ec_actual_app_name").attr("id");
				let app_id = jQuery(".ec_actual_app_name").find("#ec_app_id").val();
				let app_secret = jQuery(".ec_actual_app_name").find("#ec_app_secret").val();
				let app_scope = jQuery(".ec_actual_app_name").find("#ec_app_scope").val();
				if(app_id=="" || app_secret=="") {
					ecsl_display_notice('error','Please enter and save App Id and App secret');
				}
				else {
					var ec_app_details_update_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-app-details-update-nonce' ) ); ?>';
					var a=document.getElementById('ec_app_'.concat(app_name));
					jQuery.ajax({
						type: 'POST',
						url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
						data: {
							'ec_app_details_update_nonce': ec_app_details_update_nonce,
							action: 'ec_app_details_update',
							'perform_action': 'update',
							app_name: app_name,
							app_id: app_id,
							app_secret: app_secret,
							app_scope: app_scope,
						},
						success: function (data) {
							ecsl_enable_disable_app(app_name, 'true','');
							ecsl_display_notice('success','App credentials has been saved sucessfully.');
							ecsl_open_verify_window(app_name);
						},
						error: function (data) {
						}
					});
				}
			});

			jQuery('.ec_clear_fields_settings').on('click',function () {
				let app_name = jQuery(".ec_actual_app_name").attr("id");
				var ec_app_details_update_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-app-details-update-nonce' ) ); ?>';
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
					data: {
						'ec_app_details_update_nonce': ec_app_details_update_nonce,
						action: 'ec_app_details_update',
						'perform_action': 'delete',
						app_name: app_name,
					},
					success: function (data) {
						jQuery("#ec_app_id").val('');
						jQuery("#ec_app_secret").val('');
						jQuery("#ec_app_scope").val('');
						ecsl_enable_disable_app(app_name, 'false','');
					},
					error: function (data) {
					}
				});
			});
		});

		jQuery(".ec_sort_apps_open_settings_div").click(function () {
			let app_name = jQuery(this).parents(".ec_sort_apps_div").attr("id");
			ecsl_set_values_popup(app_name);
		});

		function ecsl_set_values_popup(application_name) {
			document.getElementById('ec_wait_image').style.display = 'block';
			document.getElementById('ec_wait_image_fade').style.display = 'block';
			jQuery('#ec_app_id').val('');
			jQuery('#ec_app_secret').val('');
			jQuery('#ec_app_scope').val('');
			jQuery("#ec_app_instructions_step").text('');
			jQuery( "#ec_app_name").text('');
			jQuery("#ec_app_instructions_permalink").hide();
			jQuery( "#ec_app_instructions").text('');
			jQuery('#ec_application_instructions').show();
			
			if(application_name == 'facebook' ||  application_name == 'google'||  application_name == 'discord') {
				jQuery("#ec_ssl_notice").text("SSL certificate is required to set up " + application_name.charAt(0).toUpperCase() + application_name.substr(1) + " Application");
				jQuery("#ec_ssl_notice").show();
			}
			else {
				jQuery("#ec_ssl_notice").hide();
			}
			if(application_name != null) {
				jQuery( "#ec_app_name").text(application_name.charAt(0).toUpperCase()+application_name.substr(1)+" App Settings");
				jQuery( ".ec_actual_app_name").attr('id',application_name);
				jQuery( "#ec_app_instructions").text("Instructions to configure "+application_name.charAt(0).toUpperCase()+application_name.substr(1));
				var ec_load_instructions_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-load-instructions-nonce' ) ); ?>';
				jQuery.ajax({
					type: 'POST',
					url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
					data: {
						'ec_load_instructions_nonce': ec_load_instructions_nonce,
						action:'ec_load_instructions',
						app_name:application_name,
					},
					success: function(data) {
						jQuery("#ec_app_instructions_step").text('');
						var ins = data.split("##");
						jQuery( "#ec_app_id").val(ins[0]);
						jQuery( "#ec_app_secret").val(ins[1]);
						jQuery( "#ec_app_scope").val(ins[2]);
						if(ins.length==7) {
							jQuery("#ec_app_instructions_permalink").show();
							jQuery("#ec_permalink_error").text(application_name.charAt(0).toUpperCase()+application_name.substr(1));;
						}
						else {
							jQuery("#ec_app_instructions_permalink").hide();
							for (i = 3; i < ins.length; i++)
								jQuery("#ec_app_instructions_step").append('<li>' + ins[i] + '</li>');
							jQuery("#ec_app_instructions_step").append('<label class="ec_note_display" style="cursor: auto">If you want to display OAuth Application icons on your login panel then use shortcode <b>[ec_oauth_login]</b> to display apps</label>');
						}
						document.getElementById('ec_wait_image').style.display = 'none';
						document.getElementById('ec_wait_image_fade').style.display = 'none';
					},
					error: function (data){}
				});
				jQuery( "#ec_app_div" ).show();
			}
		}

		var ec_rearrange_apps_nonce = '<?php echo esc_attr( wp_create_nonce( 'ec-rearrange-apps-nonce' ) ); ?>';
		jQuery( function() {
			jQuery( "#ec_move" ).disableSelection();
			jQuery( ".ec_sort_apps" ).sortable({
				handle: '.ec_sort_apps_move',
				items: '.ec_sort_apps_div',
				tolerance: "pointer",
				zIndex: 9999,
				stop: function (event, ui)
				{
					ui.item.find('.ec_sort_message').remove();
					var $apps = jQuery('.ec_sort_apps .ec_sort_apps_div'),
						appList = [];
					for (var i = 0; i < $apps.length; i++) {
						appList.push($apps.eq(i).data('provider'));
					}
					var $message_show = jQuery('<div class="ec_sort_message">' + <?php wp_json_encode( 'Saving Order' ); ?> + '</div>').appendTo(ui.item);
					jQuery.ajax({
						type: 'post',
						dataType: 'json',
						url: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
						data: {
							'ec_rearrange_apps_nonce': ec_rearrange_apps_nonce,
							'action': 'ec_rearrange_apps',
							'sequence': appList
						},
						error: function () {
							ecsl_display_notice('error','Saving failed');
							setTimeout(function () {
								$message_show.fadeOut(200, function () {
									$message_show.remove();
								});
							}, 500);
						},
						success: function () {
							ecsl_display_notice('success','Position Saved');
							setTimeout(function () {
								$message_show.fadeOut(200, function () {
									$message_show.remove();
								});
							}, 500);
						}
					});
				}
			});
		} );
	</script>
	<?php
}
