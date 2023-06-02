=== VS Contact Form ===
Contributors: Guido07111975
Version: 13.8
License: GNU General Public License v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires PHP: 5.6
Requires at least: 4.7
Tested up to: 6.1
Stable tag: 13.8
Tags: simple, contact, form, contact form, email


This is a lightweight plugin to create a customized contact form. Add shortcode [contact] on a page or use the widget to display your form.


== Description ==
= About =
This is a lightweight plugin to create a customized contact form.

Add shortcode [contact] on a page or use the widget to display your form.

Form has fields for Name, Email, Subject and Message. It also has a sum to solve (to avoid abuse) and a privacy consent checkbox.

You can personalize your form via the settings page or by adding attributes to the shortcode or the widget.

It's also possible to list form submissions in your dashboard.

= How to use =
After installation add shortcode [contact] on a page or use the widget to display your form.

= Settings page =
You can personalize your form via the settings page. This page is located at Settings > VS Contact Form.

Settings and labels can be overridden when using the relevant (shortcode) attributes below.

This can be useful when having multiple contact forms on your website.

= Shortcode attributes =
You can also personalize your form by adding attributes to the shortcode mentioned above. Attributes will override the settings page.

Misc:

* Add custom CSS class to form: `class="your-class-here"`
* Change default email address: `email_to="your-email-here"`
* Send to multiple email addresses (max 5): `email_to="first-email-here, second-email-here"`
* Change "From" email header: `from_header="your-email-here"`
* Change subject in email to admin: `subject="your subject here"`
* Change subject in auto-reply email to sender: `subject_auto_reply="your subject here"`

Field labels:

* Name: `label_name="your label here"`
* Email: `label_email="your label here"`
* Subject: `label_subject="your label here"`
* Message: `label_message="your label here"`
* Privacy consent: `label_privacy="your label here"`
* Submit: `label_submit="your label here"`

Field placeholders:

* Name: `placeholder_name="your placeholder here"`
* Email: `placeholder_email="your placeholder here"`
* Subject: `placeholder_subject="your placeholder here"`
* Message: `placeholder_message="your placeholder here"`

Field error labels:

* Name: `error_name="your label here"`
* Email: `error_email="your label here"`
* Subject: `error_subject="your label here"`
* Sum: `error_sum="your label here"`
* Message: `error_message="your label here"`
* Links: `error_links="your label here"`
* Bad words: `error_bad_words="your label here"`
* Privacy consent: `error_privacy="your label here"`

Messages:

* Displayed when sending succeeds: `thank_you_message="your message here"`
* Displayed in the auto-reply email to sender: `auto_reply_message="your message here"`

Examples:

* One attribute: `[contact email_to="your-email-here"]`
* Multiple attributes: `[contact email_to="your-email-here" subject="your subject here" label_submit="your label here"]`

= Widget attributes =
The widget supports the same attributes. Don't add the main shortcode tag or the brackets.

Examples:

* One attribute: `email_to="your-email-here"`
* Multiple attributes: `email_to="your-email-here" subject="your subject here" label_submit="your label here"

= List form submissions in dashboard =
You can activate the listing of form submissions in your dashboard via the settings page.

After activation you will notice a new menu item called "Submissions".

= SMTP =
SMTP (Simple Mail Transfer Protocol) is an internet standard for sending emails.

WordPress supports the PHP `mail()` function by default, but when using SMTP there's less chance your form submissions are being marked as spam.

You must install an additional plugin for this, such as [WP mail SMTP](https://wordpress.org/plugins/wp-mail-smtp/).

= Uninstall =
If you uninstall plugin via dashboard all form submissions and settings will be removed from database.

All posts of the (custom) post type "submission" will be removed.

You can avoid this via the settings page.

= Question? =
Please take a look at the FAQ section.

= Translation =
Not included but plugin supports WordPress language packs.

More [translations](https://translate.wordpress.org/projects/wp-plugins/very-simple-contact-form) are very welcome!

The translation folder inside this plugin is redundant but kept for reference.

= Credits =
Without the WordPress codex and help from the WordPress community I was not able to develop this plugin, so: thank you!

Enjoy!


== Installation ==
Please check Description section for installation info.


== Frequently Asked Questions ==
= About the FAQ =
The FAQ are updated regularly to include support for newly added or changed plugin features.

= How do I set plugin language? =
Plugin will use the website language, set in Settings > General.

If plugin isn't translated into this language, language fallback will be English.

= What is the default admin email address? =
By default form submissions will be send to the email address set in Settings > General.

You can change this via the settings page or by using an attribute.

= Why is the "from" email address not from sender? =
I have used a default so called "From" email header to avoid form submissions being marked as spam.

Best practice is using a "From" email header (an email address) that ends with your website domain.

The default "From" email header starts with "wordpress" and ends with your website domain.

You can change this by using an attribute.

Your reply to sender will use another email header, called "Reply-To", which is the email address that sender has filled in.

= Can I display multiple forms on the same page? =
Do not add multiple shortcodes on the same page. This might cause a conflict.

But you can display a form by using the shortcode and a form by using the widget, on the same page.

= Can I add extra fields to form? =
If you want extra fields you should use another contact form plugin, such as [WPForms](https://wordpress.org/plugins/wpforms-lite/).

= Why does form submission fail? =
An error message is displayed if plugin was unable to send form.

Your hosting provider might have disabled the mail function of your server. Please contact them for info.

If they advice you to install a SMTP plugin, please check the "SMTP" section above.

In case you're using a SMTP plugin, check the settings page of that plugin for mistakes. Most SMTP plugins have a test module, you can test the mail function by sending a test mail.

= Why am I not receiving form submissions? =
* Please also check the junk/spam folder of your mailbox
* Check installation info above and check shortcode (attributes) for mistakes
* Check the settings page, maybe you have disabled email to admin
* In case you're using a SMTP plugin, check the settings page of that plugin for mistakes
* Most SMTP plugins have a test module, you can test the mail function by sending a test mail
* Install another contact form plugin to determine whether it's caused by VS Contact Form or not

= Does this plugin have anti-spam features? =
Of course, the default WordPress validating, sanitizing and escaping functions are included.

Form has a sum to solve and you can limit the number of links in Message field.

And form contains hidden honeypot fields and a hidden time trap.

= Does this plugin meet the conditions of the GDPR? =
The General Data Protection Regulation (GDPR) is a regulation in EU law on data protection and privacy for all individuals within the European Union.

I did my best to meet the conditions of the GDPR:

* Form has a privacy consent checkbox
* You can disable collection of IP address
* Form submissions are safely stored in database, similar to how the default posts and pages are stored
* You can easily delete form submissions

= Does this plugin have its own block? =
Plugin doesn't have its own block in the editor and there are no plans to add this anytime soon.

= No Semantic versioning? =
Version number doesn't give you info about the type of update (major, minor, patch). You should check changelog for that.

= How can I make a donation? =
You like my plugin and you're willing to make a donation? Thanks, I really appreciate that! There's a PayPal donate link at my website.

= Other question or comment? =
Please open a topic in plugin forum.


== Changelog ==
= Version 13.8 =
* New: set different subject for email to admin and auto-reply email to sender
* Added attribute "subject_auto_reply"

= Version 13.7 =
* Email subject and submission title: re-added subject that sender has filled in

= Version 13.6 =
* Removed prefix attribute of the email subject
* Set your email subject via the settings page or by using an attribute
* Subject that sender has filled in is listed in email content
* Updated settings page

= Version 13.5 =
* Textual changes
* Minor changes in code

= Version 13.4 =
* Minor changes in code

= Version 13.3 =
* Fix: bad words filter

= Version 13.2 =
* New: bad words filter
* Disallow bad words in form submissions
* New: set maxlength for input and textarea
* Minor changes in code

= Version 13.1 =
* Minor changes in code

= Version 13.0 =
* Fix: nonce

= Version 12.9 =
* Fix: nonce

For all versions please check file changelog.


== Screenshots ==
1. Form (GeneratePress theme)
2. Form (GeneratePress theme)
3. Widget form (GeneratePress theme)
4. Widget (dashboard)
5. Settings page (dashboard)
6. Settings page (dashboard)
7. Settings page (dashboard)
8. Settings page (dashboard)
9. Settings page (dashboard)
10. Submissions (dashboard)