<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// form time token
$vscf_token_field = base64_encode( time() );

// form sum
$vscf_rand_one = vscf_random_number_one();
$vscf_rand_two = vscf_random_number_two();
$vscf_rand_salt = mt_rand();
$hidden_value = base64_encode($vscf_rand_one.$vscf_rand_salt.$vscf_rand_two);

// site name
$blog_name = htmlspecialchars_decode(get_bloginfo('name'), ENT_QUOTES);

// admin email address
$email_admin = get_option('admin_email');

// from email header
$from_header = vscf_from_header();

// get attributes
$email_attribute = $vscf_atts['email_to'];
$from_header_attribute = $vscf_atts['from_header'];
$subject_attribute = $vscf_atts['subject'];
$subject_auto_reply_attribute = $vscf_atts['subject_auto_reply'];

// get custom settings from settings page
$email_settings_page = get_option('vscf-setting-22');
$disable_mail_to_admin = get_option('vscf-setting-28');
$auto_reply = get_option('vscf-setting-3');
$subject_settings_page = get_option('vscf-setting-35');
$subject_auto_reply_settings_page = get_option('vscf-setting-15');
$list_submissions = get_option('vscf-setting-2');
$hide_labels = get_option('vscf-setting-27');
$disable_subject = get_option('vscf-setting-23');
$disable_sum = get_option('vscf-setting-24');
$allowed_links = get_option('vscf-setting-25');
$bad_words_string = get_option('vscf-setting-29');
$bad_words_ignore_submission = get_option('vscf-setting-30');
$input_max = get_option('vscf-setting-32');
$textarea_max = get_option('vscf-setting-33');
$disable_privacy = get_option('vscf-setting-4');
$disable_ip_address = get_option('vscf-setting-19');
$form_anchor = get_option('vscf-setting-21');
$display_errors = get_option('vscf-setting-34');

// get custom labels from settings page
$name_label = get_option('vscf-setting-5');
$email_label = get_option('vscf-setting-6');
$subject_label = get_option('vscf-setting-7');
$message_label = get_option('vscf-setting-9');
$privacy_label = get_option('vscf-setting-18');
$submit_label = get_option('vscf-setting-10');
$error_name_label = get_option('vscf-setting-11');
$error_email_label = get_option('vscf-setting-13');
$error_subject_label = get_option('vscf-setting-20');
$error_sum_label = get_option('vscf-setting-26');
$error_message_label = get_option('vscf-setting-12');
$error_links_label = get_option('vscf-setting-8');
$error_bad_words_label = get_option('vscf-setting-31');
$error_privacy_label = get_option('vscf-setting-14');

// get custom messages from settings page
$thank_you_message = get_option('vscf-setting-16');
$auto_reply_message = get_option('vscf-setting-17');

// name label
$value = $name_label;
if (empty($vscf_atts['label_name'])) {
	if (empty($value)) {
		$name_label = __( 'Name', 'very-simple-contact-form' );
	} else {
		$name_label = $value;
	}
} else {
	$name_label = $vscf_atts['label_name'];
}

// email label
$value = $email_label;
if (empty($vscf_atts['label_email'])) {
	if (empty($value)) {
		$email_label = __( 'Email', 'very-simple-contact-form' );
	} else {
		$email_label = $value;
	}
} else {
	$email_label = $vscf_atts['label_email'];
}

// subject label
$value = $subject_label;
if (empty($vscf_atts['label_subject'])) {
	if (empty($value)) {
		$subject_label = __( 'Subject', 'very-simple-contact-form' );
	} else {
		$subject_label = $value;
	}
} else {
	$subject_label = $vscf_atts['label_subject'];
}

// message label
$value = $message_label;
if (empty($vscf_atts['label_message'])) {
	if (empty($value)) {
		$message_label = __( 'Message', 'very-simple-contact-form' );
	} else {
		$message_label = $value;
	}
} else {
	$message_label = $vscf_atts['label_message'];
}

// privacy label
$value = $privacy_label;
if (empty($vscf_atts['label_privacy'])) {
	if (empty($value)) {
		$privacy_label = __( 'I consent to having this website collect my personal data via this form.', 'very-simple-contact-form' );
	} else {
		$privacy_label = $value;
	}
} else {
	$privacy_label = $vscf_atts['label_privacy'];
}

// submit label
$value = $submit_label;
if (empty($vscf_atts['label_submit'])) {
	if (empty($value)) {
		$submit_label = __( 'Submit', 'very-simple-contact-form' );
	} else {
		$submit_label = $value;
	}
} else {
	$submit_label = $vscf_atts['label_submit'];
}

// name placeholder
if (!empty($vscf_atts['placeholder_name'])) {
	$name_placeholder = $vscf_atts['placeholder_name'];
} else {
	if ($hide_labels == 'yes') {
		$name_placeholder = $name_label;
	} else {
		$name_placeholder = '';
	}
}

// email placeholder
if (!empty($vscf_atts['placeholder_email'])) {
	$email_placeholder = $vscf_atts['placeholder_email'];
} else {
	if ($hide_labels == 'yes') {
		$email_placeholder = $email_label;
	} else {
		$email_placeholder = '';
	}
}

// subject placeholder
if (!empty($vscf_atts['placeholder_subject'])) {
	$subject_placeholder = $vscf_atts['placeholder_subject'];
} else {
	if ($hide_labels == 'yes') {
		$subject_placeholder = $subject_label;
	} else {
		$subject_placeholder = '';
	}
}

// sum placeholder
if ($hide_labels == 'yes') {
	$sum_placeholder = $vscf_rand_one.' + '.$vscf_rand_two.' =';
} else {
	$sum_placeholder = '';
}

// message placeholder
if (!empty($vscf_atts['placeholder_message'])) {
	$message_placeholder = $vscf_atts['placeholder_message'];
} else {
	if ($hide_labels == 'yes') {
		$message_placeholder = $message_label;
	} else {
		$message_placeholder = '';
	}
}

// error name label
$value = $error_name_label;
if (empty($vscf_atts['error_name'])) {
	if (empty($value)) {
		$error_name_label = __( 'Please enter at least 2 characters', 'very-simple-contact-form' );
	} else {
		$error_name_label = $value;
	}
} else {
	$error_name_label = $vscf_atts['error_name'];
}

// error email label
$value = $error_email_label;
if (empty($vscf_atts['error_email'])) {
	if (empty($value)) {
		$error_email_label = __( 'Please enter a valid email', 'very-simple-contact-form' );
	} else {
		$error_email_label = $value;
	}
} else {
	$error_email_label = $vscf_atts['error_email'];
}

// error subject label
$value = $error_subject_label;
if (empty($vscf_atts['error_subject'])) {
	if (empty($value)) {
		$error_subject_label = __( 'Please enter at least 2 characters', 'very-simple-contact-form' );
	} else {
		$error_subject_label = $value;
	}
} else {
	$error_subject_label = $vscf_atts['error_subject'];
}

// error sum label
$value = $error_sum_label;
if (empty($vscf_atts['error_sum'])) {
	if (empty($value)) {
		$error_sum_label = __( 'Please enter the correct result', 'very-simple-contact-form' );
	} else {
		$error_sum_label = $value;
	}
} else {
	$error_sum_label = $vscf_atts['error_sum'];
}

// error message label
$value = $error_message_label;
if (empty($vscf_atts['error_message'])) {
	if (empty($value)) {
		$error_message_label = __( 'Please enter at least 10 characters', 'very-simple-contact-form' );
	} else {
		$error_message_label = $value;
	}
} else {
	$error_message_label = $vscf_atts['error_message'];
}

// error links label
$value = $error_links_label;
if (empty($vscf_atts['error_links'])) {
	if (empty($value)) {
		$error_links_label = __( 'Please reduce number of links', 'very-simple-contact-form' );
	} else {
		$error_links_label = $value;
	}
} else {
	$error_links_label = $vscf_atts['error_links'];
}

// error bad words label
$value = $error_bad_words_label;
if (empty($vscf_atts['error_bad_words'])) {
	if (empty($value)) {
		$error_bad_words_label = __( 'Please remove bad words', 'very-simple-contact-form' );
	} else {
		$error_bad_words_label = $value;
	}
} else {
	$error_bad_words_label = $vscf_atts['error_bad_words'];
}

// error privacy label
$value = $error_privacy_label;
if (empty($vscf_atts['error_privacy'])) {
	if (empty($value)) {
		$error_privacy_label = __( 'Please give your consent', 'very-simple-contact-form' );
	} else {
		$error_privacy_label = $value;
	}
} else {
	$error_privacy_label = $vscf_atts['error_privacy'];
}

// thank you message
$value = $thank_you_message;
if (empty($vscf_atts['thank_you_message'])) {
	if (empty($value)) {
		$thank_you_message = __( 'Thank you! You will receive a response as soon as possible.', 'very-simple-contact-form' );
	} else {
		$thank_you_message = $value;
	}
} else {
	$thank_you_message = $vscf_atts['thank_you_message'];
}

// auto-reply message
$value = $auto_reply_message;
if (empty($vscf_atts['auto_reply_message'])) {
	if (empty($value)) {
		$auto_reply_message = __( 'Thank you! You will receive a response as soon as possible.', 'very-simple-contact-form' );
	} else {
		$auto_reply_message = $value;
	}
} else {
	$auto_reply_message = $vscf_atts['auto_reply_message'];
}

// max length attribute
if ( !empty($input_max) ) {
	$input_max_length = $input_max;
} else {
	$input_max_length = 100;
}
if ( !empty($textarea_max) ) {
	$textarea_max_length = $textarea_max;
} else {
	$textarea_max_length = 10000;
}

// strip whitespace from bad words string
$bad_words_list = str_replace(' ', '', $bad_words_string);

// form anchor
if ($form_anchor == 'yes') {
	$anchor_begin = '<div id="vscf-anchor">';
	$anchor_end = '</div>';
} else {
	$anchor_begin = '';
	$anchor_end = '';
}
