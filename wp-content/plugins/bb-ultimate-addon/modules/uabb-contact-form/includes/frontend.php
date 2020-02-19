<?php
/**
 *  UABB Contact Form Module front-end file
 *
 *  @package UABB Contact Form Module
 */

/**
 * Function that adds async attribute
 *
 * @since 1.22.0
 * @method  uabb_add_async_attribute for the enqueued `uabb-g-recaptcha` script
 * @param string $tag    Script tag.
 * @param string $handle Registered script handle.
 */
add_filter(
	'script_loader_tag',
	function( $tag, $handle ) {
		if ( ( 'uabb-g-recaptcha' !== $handle ) || ( 'uabb-g-recaptcha' === $handle && strpos( $tag, 'uabb-g-recaptcha-api' ) !== false ) ) {
			return $tag;
		}
		return str_replace( ' src', ' id="uabb-g-recaptcha-api" async="async" defer="defer" src', $tag );
	},
	10,
	2
);

?>

<?php
	$count         = 0;
	$name_class    = '';
	$email_class   = '';
	$subject_class = '';
	$phone_class   = '';
	$msg_class     = '';
	$message       = __( 'Please accept the Terms and Conditions to proceed.', 'uabb' );

if ( 'show' === $settings->name_toggle && '50' === $settings->name_width ) {
	$count      = ++$count;
	$name_class = ' uabb-name-inline uabb-inline-group';
	if ( 0 === $count % 2 ) {
		$name_class .= ' uabb-io-padding-left';
	} else {
		$name_class .= ' uabb-io-padding-right';
	}
}

if ( 'show' === $settings->email_toggle && '50' === $settings->email_width ) {
	$count       = ++$count;
	$email_class = ' uabb-email-inline uabb-inline-group';
	if ( 0 === $count % 2 ) {
		$email_class .= ' uabb-io-padding-left';
	} else {
		$email_class .= ' uabb-io-padding-right';
	}
}

if ( 'show' === $settings->subject_toggle && '50' === $settings->subject_width ) {
	$count         = ++$count;
	$subject_class = ' uabb-subject-inline uabb-inline-group';
	if ( 0 === $count % 2 ) {
		$subject_class .= ' uabb-io-padding-left';
	} else {
		$subject_class .= ' uabb-io-padding-right';
	}
}

if ( 'show' === $settings->phone_toggle && '50' === $settings->phone_width ) {
	$count       = ++$count;
	$phone_class = ' uabb-phone-inline uabb-inline-group';
	if ( 0 === $count % 2 ) {
		$phone_class .= ' uabb-io-padding-left';
	} else {
		$phone_class .= ' uabb-io-padding-right';
	}
}

if ( 'show' === $settings->msg_toggle && '50' === $settings->msg_width ) {
	$count     = ++$count;
	$msg_class = ' uabb-message-inline uabb-inline-group';
	if ( 0 === $count % 2 ) {
		$msg_class .= ' uabb-io-padding-left';
	} else {
		$msg_class .= ' uabb-io-padding-right';
	}
}
?>

<form class="uabb-module-content uabb-contact-form <?php echo 'uabb-form-' . esc_attr( $settings->form_style ); ?>"
	<?php
	if ( isset( $module->template_id ) ) {
		echo 'data-template-id="' . esc_attr( $module->template_id ) . '" data-template-node-id="' . esc_attr( $module->template_node_id ) . '"';}
	?>
	data-nonce=<?php echo wp_kses_post( wp_create_nonce( 'uabb-cf-nonce' ) ); ?>
>
	<div class="uabb-input-group-wrap">
	<?php if ( 'show' === $settings->name_toggle ) : ?>
	<div class="uabb-input-group uabb-name <?php echo esc_attr( $name_class ); ?>">
		<?php if ( 'style1' === $settings->form_style && 'yes' === $settings->enable_label ) { ?>
		<label for="uabb-name"><?php echo wp_kses_post( $settings->name_label ); ?></label>
		<?php } ?>
		<div class="uabb-form-outter">
			<input type="text" name="uabb-name" value=""
			<?php
			if ( 'yes' === $settings->enable_placeholder ) {
				?>
				placeholder="<?php echo esc_attr( $settings->name_placeholder ); ?>" <?php } ?>/>
			<div class="uabb-form-error-message uabb-form-error-message-required"></div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( 'show' === $settings->email_toggle ) : ?>
	<div class="uabb-input-group uabb-email <?php echo esc_attr( $email_class ); ?>">
		<?php if ( 'style1' === $settings->form_style && 'yes' === $settings->enable_label ) { ?>
		<label for="uabb-email"><?php echo wp_kses_post( $settings->email_label ); ?></label>
		<?php } ?>
		<div class="uabb-form-outter">
			<input type="email" name="uabb-email" value=""
			<?php
			if ( 'yes' === $settings->enable_placeholder ) {
				?>
				placeholder="<?php echo esc_attr( $settings->email_placeholder ); ?>"<?php } ?>/>
			<div class="uabb-form-error-message uabb-form-error-message-required"><span><?php esc_html_e( 'Invalid Email', 'uabb' ); ?></span></div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( 'show' === $settings->subject_toggle ) : ?>
	<div class="uabb-input-group uabb-subject <?php echo esc_attr( $subject_class ); ?>">
		<?php if ( 'style1' === $settings->form_style && 'yes' === $settings->enable_label ) { ?>
		<label for="uabb-subject"><?php echo wp_kses_post( $settings->subject_label ); ?></label>
		<?php } ?>
		<div class="uabb-form-outter">
			<input type="text" name="uabb-subject" value=""
			<?php
			if ( 'yes' === $settings->enable_placeholder ) {
				?>
				placeholder="<?php echo esc_attr( $settings->subject_placeholder ); ?>"<?php } ?>/>
			<div class="uabb-form-error-message uabb-form-error-message-required"></div>
		</div>
	</div>
	<?php endif; ?>


	<?php if ( 'show' === $settings->phone_toggle ) : ?>
	<div class="uabb-input-group uabb-phone <?php echo esc_attr( $phone_class ); ?>">
		<?php if ( 'style1' === $settings->form_style && 'yes' === $settings->enable_label ) { ?>
		<label for="uabb-phone"><?php echo wp_kses_post( $settings->phone_label ); ?></label>
		<?php } ?>
		<div class="uabb-form-outter">
			<input type="tel" name="uabb-phone" value=""
			<?php
			if ( 'yes' === $settings->enable_placeholder ) {
				?>
				placeholder="<?php echo esc_attr( $settings->phone_placeholder ); ?>"<?php } ?> />
			<div class="uabb-form-error-message uabb-form-error-message-required"><span><?php esc_html_e( 'Invalid Number', 'uabb' ); ?></span></div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( 'show' === $settings->msg_toggle ) : ?>
	<div class="uabb-input-group uabb-message <?php echo esc_attr( $msg_class ); ?>">
		<?php if ( 'style1' === $settings->form_style && 'yes' === $settings->enable_label ) { ?>
		<label for="uabb-message"><?php echo wp_kses_post( $settings->msg_label ); ?></label>
		<?php } ?>
		<div class="uabb-form-outter-textarea">
			<textarea name="uabb-message"
			<?php
			if ( 'yes' === $settings->enable_placeholder ) {
				?>
				placeholder="<?php echo esc_attr( $settings->msg_placeholder ); ?>"<?php } ?>></textarea>
			<div class="uabb-form-error-message uabb-form-error-message-required"></div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( 'show' === $settings->terms_checkbox ) : ?>
		<div class="uabb-input-group uabb-terms-checkbox">
			<?php if ( isset( $settings->terms_text ) && ! empty( $settings->terms_text ) ) : ?>
				<div class="uabb-terms-text"><?php echo wp_kses_post( $settings->terms_text ); ?></div>
			<?php endif; ?>
			<div class="uabb-form-outter">
				<label class="uabb-terms-label" for="uabb-terms-checkbox-<?php echo esc_attr( $id ); ?>">
					<input type="checkbox" class="checkbox-inline" id="uabb-terms-checkbox-<?php echo esc_attr( $id ); ?>" name="uabb-terms-checkbox" value="1" />
					<span class="checkbox-label">
						<?php echo wp_kses_post( $settings->terms_checkbox_text ); ?>
					</span>
				</label>
			</div>
			<label class="uabb-contact-error"><?php echo wp_kses_post( apply_filters( 'uabb_contact_form_error_message', $message ) ); ?></label>
		</div>
	<?php endif; ?>

	<?php
	if ( 'show' === $settings->uabb_recaptcha_toggle && ( isset( $settings->uabb_recaptcha_site_key ) && ! empty( $settings->uabb_recaptcha_site_key ) ) ) :
		?>
	<div class="uabb-input-group uabb-recaptcha">
		<span class="uabb-contact-error"><?php esc_html_e( 'Please check the captcha to verify you are not a robot.', 'uabb' ); ?></span>
		<div id="<?php echo esc_attr( $id ); ?>-uabb-grecaptcha" class="uabb-grecaptcha" data-sitekey="<?php echo esc_attr( $settings->uabb_recaptcha_site_key ); ?>" data-theme="<?php echo esc_attr( $settings->uabb_recaptcha_theme ); ?>"></div>
	</div>
	<?php endif; ?>

	</div>

	<div class="uabb-submit-btn">
		<div class="uabb-contact-form-button" data-wait-text="<?php echo esc_attr( $settings->btn_processing_text ); ?>">
			<button type="submit" class="uabb-contact-form-submit">
			<?php
			if ( isset( $settings->btn_icon ) && isset( $settings->btn_icon_position ) ) {

				echo ( '' !== $settings->btn_icon && 'before' === $settings->btn_icon_position ) ? '<i class="' . esc_attr( $settings->btn_icon ) . ' uabb-contact-form-submit-button-icon "></i>' : ''; }
			?>
			<span class="uabb-contact-form-button-text"><?php echo wp_kses_post( $settings->btn_text ); ?></span>
			<?php
			if ( isset( $settings->btn_icon ) && isset( $settings->btn_icon_position ) ) {
				echo ( '' !== $settings->btn_icon && 'after' === $settings->btn_icon_position ) ? '<i class="' . esc_attr( $settings->btn_icon ) . ' uabb-contact-form-submit-button-icon"></i>' : ''; }
			?>
</button>
		</div>
	</div>
	<?php if ( 'redirect' === $settings->success_action ) : ?>
		<input type="text" value="<?php echo esc_url( $settings->success_url ); ?>" style="display: none;" class="uabb-success-url">
	<?php elseif ( 'none' === $settings->success_action ) : ?>
		<span class="uabb-success-none" style="display:none;"><?php echo wp_kses_post( $settings->email_sccess ); ?></span>
	<?php endif; ?>
	<span class="uabb-send-error" style="display:none;"><?php echo wp_kses_post( $settings->email_error ); ?></span>

</form>
<?php if ( 'show_message' === $settings->success_action ) : ?>
	<span class="uabb-success-msg uabb-text-editor" style="display:none;"><?php echo wp_kses_post( $settings->success_message ); ?></span>
<?php endif; ?>
