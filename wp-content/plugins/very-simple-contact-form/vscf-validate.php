<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// validate name field
$value_name = stripslashes($post_data['form_name']);
if ( !empty($bad_words_list) ) {
	$words = explode(',', $bad_words_list);
	foreach ($words as $word) {
		if ( preg_match("/\b".$word."\b/i", $value_name) ) {
			$bad_words = true;
			$bad_words_name_field = true;
		}
	}
}
if (isset($bad_words_name_field) && ($bad_words_ignore_submission != 'yes')) {
	$error_class['form_name_bad_words'] = true;
	$error = true;
} elseif ( strlen($value_name)<2 ) {
	$error_class['form_name'] = true;
	$error = true;
}
$form_data['form_name'] = $value_name;

// validate email field
$value_email = $post_data['form_email'];
if ( !empty($bad_words_list) ) {
	$words = explode(',', $bad_words_list);
	foreach ($words as $word) {
		if ( preg_match("/\b".$word."\b/i", $value_email) ) {
			$bad_words = true;
			$bad_words_email_field = true;
		}
	}
}
if (isset($bad_words_email_field) && ($bad_words_ignore_submission != 'yes')) {
	$error_class['form_email_bad_words'] = true;
	$error = true;
} elseif ( empty($value_email) ) {
	$error_class['form_email'] = true;
	$error = true;
}
$form_data['form_email'] = $value_email;

// validate subject field
if ($disable_subject != 'yes') {
	$value_subject = stripslashes($post_data['form_subject']);
	if ( !empty($bad_words_list) ) {
		$words = explode(',', $bad_words_list);
		foreach ($words as $word) {
			if ( preg_match("/\b".$word."\b/i", $value_subject) ) {
				$bad_words = true;
				$bad_words_subject_field = true;
			}
		}
	}
	if (isset($bad_words_subject_field) && ($bad_words_ignore_submission != 'yes')) {
		$error_class['form_subject_bad_words'] = true;
		$error = true;
	} elseif ( strlen($value_subject)<2 ) {
		$error_class['form_subject'] = true;
		$error = true;
	}
	$form_data['form_subject'] = $value_subject;
}

// validate sum field
if ($disable_sum != 'yes') {
	$value_sum = $post_data['form_sum'];
	$value_hidden = base64_decode( $post_data['form_sum_hidden'] );
	if ( is_numeric($value_sum) && is_numeric($value_hidden) ) {
		$hidden_one = substr($value_hidden, 0, 1);
		$hidden_two = substr($value_hidden, -1);
	} else {
		$hidden_one = 1;
		$hidden_two = 1;
	}
	$result = $hidden_one + $hidden_two;
	if ( $value_sum != $result ) {
		$error_class['form_sum'] = true;
		$error = true;
	}
	$form_data['form_sum'] = $value_sum;
}

// validate message field
$value_message = stripslashes($post_data['form_message']);
if ($allowed_links == 'allow') {
	 $count = 100;
} elseif ($allowed_links == 'disallow') {
	$count = 0;
} else {
	$count = 1;
}
if ( !empty($bad_words_list) ) {
	$words = explode(',', $bad_words_list);
	foreach ($words as $word) {
		if ( preg_match("/\b".$word."\b/i", $value_message) ) {
			$bad_words = true;
			$bad_words_message_field = true;
		}
	}
}
if (isset($bad_words_message_field) && ($bad_words_ignore_submission != 'yes')) {
	$error_class['form_message_bad_words'] = true;
	$error = true;
} elseif ( strlen($value_message)<10 ) {
	$error_class['form_message'] = true;
	$error = true;
} elseif ( (substr_count($value_message, 'http')>$count) || (substr_count($value_message, 'www')>$count) ) {
	$error_class['form_links'] = true;
	$error = true;
}
$form_data['form_message'] = $value_message;

// validate first honeypot field
$value_first_name = $post_data['form_first_name'];
if ( strlen($value_first_name)>0 ) {
	$error_class['form_first_name'] = true;
	$error = true;
}
$form_data['form_firstname'] = $value_first_name;

// validate second honeypot field
$value_last_name = $post_data['form_last_name'];
if ( strlen($value_last_name)>0 ) {
	$error_class['form_last_name'] = true;
	$error = true;
}
$form_data['form_lastname'] = $value_last_name;

// validate time token field
$value_token = base64_decode( $post_data['form_token'] );
$form_seconds = time() - $value_token;
$minimal_seconds = 3;
if ( is_numeric($value_token) && ( $form_seconds < $minimal_seconds ) ) {
	$error_class['form_token'] = true;
	$error = true;
}
$form_data['form_token'] = $value_token;

// validate privacy field
if ($disable_privacy != 'yes') {
	$value_privacy = $post_data['form_privacy'];
	if ( $value_privacy !=  'yes' ) {
		$error_class['form_privacy'] = true;
		$error = true;
	}
	$form_data['form_privacy'] = $value_privacy;
}

// validate nonce field
$value_nonce = $post_data['form_nonce'];
if ( ! wp_verify_nonce( $value_nonce, 'vscf_nonce_action' ) ) {
	$error_class['form_nonce'] = true;
	$error = true;
}
