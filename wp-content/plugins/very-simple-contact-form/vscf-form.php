<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// contact form
$email_form = '<form id="vscf" class="'.$form_class.'" method="post">
	<div class="form-group vscf-name-group">
		<label for="vscf_name" class="'.(($hide_labels == 'yes') ? "vscf-hide" : "vscf-label").'">'.esc_attr($name_label).' </label>
		<input type="text" name="vscf_name" id="vscf_name" '.(isset($error_class['form_name']) ? ' class="form-control vscf-error"' : ' class="form-control"').' placeholder="'.esc_attr($name_placeholder).'" value="'.esc_attr($form_data['form_name']).'" maxlength="'.$input_max_length.'" aria-required="true" />
		'.(isset($error_class['form_name']) ? '<label for="vscf_name" class="vscf-label vscf-error" >'.esc_attr($error_name_label).'</label>' : '').(isset($error_class['form_name_bad_words']) ? '<label for="vscf_name" class="vscf-label vscf-error" >'.esc_attr($error_bad_words_label).'</label>' : '').'
	</div>
	<div class="form-group vscf-email-group">
		<label for="vscf_email" class="'.(($hide_labels == 'yes') ? "vscf-hide" : "vscf-label").'">'.esc_attr($email_label).' </label>
		<input type="email" name="vscf_email" id="vscf_email" '.(isset($error_class['form_email']) ? ' class="form-control vscf-error"' : ' class="form-control"').' placeholder="'.esc_attr($email_placeholder).'" value="'.esc_attr($form_data['form_email']).'" maxlength="'.$input_max_length.'" aria-required="true" />
		'.(isset($error_class['form_email']) ? '<label for="vscf_email" class="vscf-label vscf-error" >'.esc_attr($error_email_label).'</label>' : '').(isset($error_class['form_email_bad_words']) ? '<label for="vscf_email" class="vscf-label vscf-error" >'.esc_attr($error_bad_words_label).'</label>' : '').'
	</div>
	'. (($disable_subject != 'yes') ? '
		<div class="form-group vscf-subject-group">
			<label for="vscf_subject" class="'.(($hide_labels == 'yes') ? "vscf-hide" : "vscf-label").'">'.esc_attr($subject_label).' </label>
			<input type="text" name="vscf_subject" id="vscf_subject" '. (isset($error_class['form_subject']) ? ' class="form-control vscf-error"' : ' class="form-control"').' placeholder="'.esc_attr($subject_placeholder).'" value="'.esc_attr($form_data['form_subject']).'" maxlength="'.$input_max_length.'" aria-required="true" />
			'.(isset($error_class['form_subject']) ? '<label for="vscf_subject" class="vscf-label vscf-error" >'.esc_attr($error_subject_label).'</label>' : '').(isset($error_class['form_subject_bad_words']) ? '<label for="vscf_subject" class="vscf-label vscf-error" >'.esc_attr($error_bad_words_label).'</label>' : '').'
		</div>
	' : '') .'
	'. (($disable_sum != 'yes') ? '
		<div class="form-group vscf-sum-group">
			<label for="vscf_sum" class="'.(($hide_labels == 'yes') ? "vscf-hide" : "vscf-label").'">'.$vscf_rand_one.' + '.$vscf_rand_two.' =</label>
			<input type="text" name="vscf_sum" id="vscf_sum" '.(isset($error_class['form_sum']) ? ' class="form-control vscf-error"' : ' class="form-control"').' placeholder="'.esc_attr($sum_placeholder).'" value="'.esc_attr($form_data['form_sum']).'" maxlength="'.$input_max_length.'" aria-required="true" />
			<input type="hidden" name="vscf_sum_hidden" id="vscf_sum_hidden" value="'.esc_attr($hidden_value).'" />
			'.(isset($error_class['form_sum']) ? '<label for="vscf_sum" class="vscf-label vscf-error" >'.esc_attr($error_sum_label).'</label>' : '') .'
		</div>	
	' : '') .'
	<div class="form-group vscf-hide">
		<label for="vscf_first_name">'.esc_attr__( 'Please ignore this field', 'very-simple-contact-form' ).'</label>
		<input type="text" name="vscf_first_name" id="vscf_first_name" class="form-control" tabindex="-1" value="'.esc_attr($form_data['form_first_name']).'" maxlength="'.$input_max_length.'" />
	</div>
	<div class="form-group vscf-hide">
		<label for="vscf_last_name">'.esc_attr__( 'Please ignore this field', 'very-simple-contact-form' ).'</label>
		<input type="text" name="vscf_last_name" id="vscf_last_name" class="form-control" tabindex="-1" value="'.esc_attr($form_data['form_last_name']).'" maxlength="'.$input_max_length.'" />
	</div>
	<div class="form-group vscf-message-group">
		<label for="vscf_message" class="'.(($hide_labels == 'yes') ? "vscf-hide" : "vscf-label").'">'.esc_attr($message_label).' </label>
		<textarea name="vscf_message" id="vscf_message" rows="10" '.((isset($error_class['form_message']) || isset($error_class['form_links'])) ? ' class="form-control vscf-error"' : ' class="form-control"').' placeholder="'.esc_attr($message_placeholder).'" maxlength="'.$textarea_max_length.'" aria-required="true">'.esc_textarea($form_data['form_message']).'</textarea>
		'.((isset($error_class['form_message']) || isset($error_class['form_links'])) ? '<label for="vscf_message" class="vscf-label vscf-error">'.(isset($error_class['form_links']) ? esc_attr($error_links_label) : esc_attr($error_message_label)).'</label>' : '').(isset($error_class['form_message_bad_words']) ? '<label for="vscf_message" class="vscf-label vscf-error" >'.esc_attr($error_bad_words_label).'</label>' : '').'
	</div>
	<div class="form-group vscf-display-none">
		<input type="hidden" name="vscf_token" id="vscf_token" class="form-control" value="'.esc_attr($vscf_token_field).'" />
	</div>
	'. (($disable_privacy != 'yes') ? '
		<div class="form-group vscf-privacy-group">
			<input type="hidden" name="vscf_privacy" id="vscf_privacy_hidden" value="no" />
			<input type="checkbox" name="vscf_privacy" id="vscf_privacy" class="custom-control-input" value="yes" '.checked( esc_attr($form_data['form_privacy']), "yes", false ).' />
			<label for="vscf_privacy">'.esc_attr($privacy_label).'</label>
			'.(isset($error_class['form_privacy']) ? '<label for="vscf_privacy" class="vscf-label vscf-error" >'.esc_attr($error_privacy_label).'</label>' : '') .'
		</div>
	' : '') .'
	<div class="form-group vscf-display-none">
		'.$vscf_nonce_field.'
	</div>
	<div class="form-group vscf-submit-group">
		<button type="submit" name="'.$submit_name_id.'" id="'.$submit_name_id.'" class="btn btn-primary">'.esc_attr($submit_label).'</button>
	</div>
	'. (($display_errors == 'yes') ?
	((isset($error_class['form_first_name']) || isset($error_class['form_last_name'])) ? '<p class="vscf-error" >'.esc_attr__( 'Error: hidden field', 'very-simple-contact-form' ).'</p>' : '').
	(isset($error_class['form_token']) ? '<p class="vscf-error" >'.esc_attr__( 'Error: time token field', 'very-simple-contact-form' ).'</p>' : '').
	(isset($error_class['form_nonce']) ? '<p class="vscf-error" >'.esc_attr__( 'Error: nonce field', 'very-simple-contact-form' ).'</p>' : '')
	: '') .'
</form>';
