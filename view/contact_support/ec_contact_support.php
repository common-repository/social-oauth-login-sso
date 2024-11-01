<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ecsl_get_support(){
	?>
	<div class="ec_support_form">
		<center>
		<br/>
		<img width=230px src="<?php echo esc_url( ECSL_PLUGIN_URL.'includes/images/support.png' );?>"/>
		<h3>Get Free Technical Support 24X7</h3>
		<form method="post">
			<input type="hidden" name="save_settings" value="ec_send_query_values" />
			<input type="hidden" name="ec_send_query_values_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ec-send-query-values-nonce' ) ); ?>"/>
			<b><label style="float:left">Enter Email ID:</label></b><br/>
			<input style="width:100%" type="text" id="customer_email" name="customer_email" placeholder="Enter your email"/><br/><br/>
			<b><label style="float:left">Enter Message:</label></b><br/>
			<textarea class="ec_cust_query"   id="customer_query" name="customer_query" placeholder="Enter your query"></textarea><br/>
			<input style="width:50%" type="submit" name="submit" value="<?php echo esc_attr(  'Submit' ); ?>"  class="button button-primary button-large" />
		</form>
		<p>Need any help in setting up the plugin? <br/> OR <br/>Looking for custom features in the plugin, just drop an email with your requirments at 
			<a style="font-weight:700" href="mailto:info@elitecontrivers.com">info@elitecontrivers.com</a>.
		</p>
		</center>
	</div>
	<?php
}
