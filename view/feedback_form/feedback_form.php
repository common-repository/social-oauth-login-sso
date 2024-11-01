<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_display_feedback_form() {
	if ( isset( $_SERVER['PHP_SELF'] ) && 'plugins.php' !== basename( sanitize_text_field( wp_unslash( $_SERVER['PHP_SELF'] ) ) ) ) {
		return;
	}
	wp_enqueue_script( 'utils' );
	wp_enqueue_style( 'ecsl_feedback_form_style', esc_url( ECSL_PLUGIN_URL . 'includes/css/ec_feedback_form.css' ), array(), false );
	?>
	<div id="ecsl_feedback_modal" class="ecsl_modal" style="width:90%; margin-left:12%; margin-top:5%; text-align:center;">
		<div class="ecsl_modal-content" style="width:50%">
			<h3 style="margin: 2%; text-align:center;"><b><?php esc_html_e( 'Please share your feedback', 'social-oauth-login-sso' ); ?></b><span class="ecsl_close" style="cursor: pointer">&times;</span>
			</h3>
			<hr style="width:75%;">			
			<form name="f" method="post" action="" id="ecsl_feedback">
				<input type="hidden" name="save_settings" value="ecsl_feedback"/>
                <input type="hidden" name="ecsl_feedback_values_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ecsl-feedback-values-nonce' ) ); ?>"/>
				<div>
					<p style="margin:2%">
					<h4 style="margin: 2%;  text-align:center;"><?php esc_html_e( 'Please share your thoughts with us so we can improve our plugin.', 'social-oauth-login-sso' ); ?><br></h4>
					<div id="ecsl_rating" style="text-align:center">
						<input type="radio" name="feedback_rating" class="ecsl-feedback-radio" id="angry" value="1" />
						<label for="angry"><img class="ecsl_sm" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/angry.webp' ); ?>" />
						</label>
						<input type="radio" name="feedback_rating" class="ecsl-feedback-radio" id="sad" value="2" />
						<label for="sad"><img class="ecsl_sm" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/sad.webp' ); ?>" />
						</label>
						<input type="radio" name="feedback_rating" class="ecsl-feedback-radio" id="neutral" value="3" />
						<label for="neutral"><img class="ecsl_sm" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/normal.webp' ); ?>" />
						</label>
						<input type="radio" name="feedback_rating" class="ecsl-feedback-radio" id="smile" value="4" />
						<label for="smile">
							<img class="ecsl_sm" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/smile.webp' ); ?>" />
						</label>
						<input type="radio" name="feedback_rating" class="ecsl-feedback-radio" id="happy" value="5" checked />
						<label for="happy"><img class="ecsl_sm" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/happy.webp' ); ?>" />
						</label>
						<div id="ecsl_outer_border" style="visibility:visible"><span id="result"><?php esc_html_e( 'We appreciate your support of our efforts.', 'social-oauth-login-sso' ); ?></span></div>
					</div><br>
					<hr style="width:75%;">
					<?php
					$user  = wp_get_current_user();
                    $email = $user->user_email;
					?>
					<div class="ecsl-radio-email" style="text-align:center;">
						<div class="ecsl_feedback_email" style="display:inline-block; width:60%;">
							<input type="email" id="feedback_customer_email" name="feedback_customer_email" placeholder="<?php esc_attr_e( 'Please enter your email address', 'social-oauth-login-sso' ); ?>" required value="<?php echo esc_attr( $email ); ?>" readonly="readonly" />
							<input type="radio" name="edit" id="edit" onclick="ecsl_edit_email()" value="" />
							<label for="edit"><img class="ecsl_editable" src="<?php echo esc_url( ECSL_PLUGIN_URL . 'includes/images/edit-icon.webp' ); ?>" />
							</label>
						</div>
						<br><br>
						<textarea id="customer_feedback" name="customer_feedback" rows="4" style="width: 60%" placeholder="<?php esc_attr_e( 'Tell us what happened!', 'social-oauth-login-sso' ); ?>"></textarea>
						<br><br>
						<input type="checkbox" name="ecsl_customer_followup" value="reply" checked />
						<?php esc_html_e( 'A representative of Elite Contrivers will contact you at the email address you provided above.', 'social-oauth-login-sso' ); ?>
					</div>
					<br>
					<div style="text-align: center;margin-bottom: 2%">
						<input type="submit" name="elite_feedback_submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Send', 'social-oauth-login-sso' ); ?>" />
						<span width="30%">&nbsp;&nbsp;</span>
						<input type="submit" name="elite_feedback_submit" class="button button-primary button-large" value="<?php esc_attr_e( 'Skip', 'social-oauth-login-sso' ); ?>" />
					</div>
				</div>				
			</form>
		</div>
	</div>
	<script>
		jQuery('a[aria-label="Deactivate OAuth Social Login - SSO by Elite Contrivers"]').click(function() {
			var ecsl_modal = document.getElementById('ecsl_feedback_modal');
			var span = document.getElementsByClassName("ecsl_close")[0];
			ecsl_modal.style.display = "block";
			document.querySelector("#customer_feedback").focus();
			span.onclick = function () {
				ecsl_modal.style.display = "none";
				jQuery('#ecsl_feedback_form_close').submit();
			};
			window.onclick = function (event) {
				if (event.target === ecsl_modal) {
					ecsl_modal.style.display = "none";
				}
			};
			return false;
		});
		const INPUTS = document.querySelectorAll('#ecsl_rating input');
		INPUTS.forEach(el => el.addEventListener('click', (e) => ecsl_change_rating(e)));
		function ecsl_edit_email(){
			document.querySelector('#feedback_customer_email').removeAttribute('readonly');
			document.querySelector('#feedback_customer_email').focus();
			return false;
		}
		function ecsl_change_rating(e) {
			document.querySelector('#ecsl_outer_border').style.visibility="visible";
			var result = '<?php esc_html_e( 'We appreciate your support of our efforts.', 'social-oauth-login-sso' ); ?>';
			switch(e.target.value){
				case '1':	result = '<?php esc_html_e( 'Not satisfied with our plugin? Please let us know what went wrong.', 'social-oauth-login-sso' ); ?>';
					break;
				case '2':	result = '<?php esc_html_e( 'Exist any problems? If you let us know, we\'ll correct it right away.', 'social-oauth-login-sso' ); ?>';
					break;
				case '3':	result = '<?php esc_html_e( 'Please let us know if you require any assistance.', 'social-oauth-login-sso' ); ?>';
					break;
				case '4':	result = '<?php esc_html_e( 'We\'re glad that you are happy with our plugin', 'social-oauth-login-sso' ); ?>';
					break;
				case '5':	result = '<?php esc_html_e( 'We appreciate your support of our efforts.', 'social-oauth-login-sso' ); ?>';
					break;
			}
			document.querySelector('#result').innerHTML = result;
		}
	</script><?php
}
