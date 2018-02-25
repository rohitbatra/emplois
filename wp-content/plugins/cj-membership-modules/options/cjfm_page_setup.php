<?php
global $cjfm_item_options, $wpdb;

$cjfm_options_table = $wpdb->prefix.'cjfm_options';
$all_options = $wpdb->get_results("SELECT * FROM $cjfm_options_table ORDER BY option_name ASC");
foreach ($all_options as $okey => $oval) {
	$options_array[$oval->option_name] = $oval->option_value;
}


$page_login_urls = ($options_array['page_login'] != '') ? '<a target="_blank" href="'.site_url().'?p='.$options_array['page_login'].'">'.__('View', 'cjfm').'</a> | <a target="_blank" href="'.admin_url('post.php').'?post='.$options_array['page_login'].'&action=edit">'.__('Edit', 'cjfm').'</a>' : '';
$page_register_urls = ($options_array['page_register'] != '') ? '<a target="_blank" href="'.site_url().'?p='.$options_array['page_register'].'">'.__('View', 'cjfm').'</a> | <a target="_blank" href="'.admin_url('post.php').'?post='.$options_array['page_register'].'&action=edit">'.__('Edit', 'cjfm').'</a>' : '';
$page_logout_urls = ($options_array['page_logout'] != '') ? '<a target="_blank" href="'.site_url().'?p='.$options_array['page_logout'].'">'.__('View', 'cjfm').'</a> | <a target="_blank" href="'.admin_url('post.php').'?post='.$options_array['page_logout'].'&action=edit">'.__('Edit', 'cjfm').'</a>' : '';
$page_reset_password_urls = ($options_array['page_reset_password'] != '') ? '<a target="_blank" href="'.site_url().'?p='.$options_array['page_reset_password'].'">'.__('View', 'cjfm').'</a> | <a target="_blank" href="'.admin_url('post.php').'?post='.$options_array['page_reset_password'].'&action=edit">'.__('Edit', 'cjfm').'</a>' : '';
$page_profile_urls = ($options_array['page_profile'] != '') ? '<a target="_blank" href="'.site_url().'?p='.$options_array['page_profile'].'">'.__('View', 'cjfm').'</a> | <a target="_blank" href="'.admin_url('post.php').'?post='.$options_array['page_profile'].'&action=edit">'.__('Edit', 'cjfm').'</a>' : '';

$cjfm_item_options['cjfm_page_setup'] = array(
	array(
		'type' => 'heading',
		'id' => 'page_setup_heading',
		'label' => '',
		'info' => '',
		'suffix' => '',
		'prefix' => '',
		'default' => __('Page Setup', 'cjfm'),
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'info-full',
		'id' => 'page_setup_info',
		'label' => '',
		'info' => '',
		'suffix' => '',
		'prefix' => '',
		'default' => __('Shortcodes have a lot more options, setting up the shortcodes via Shortcode Generator while editing or creating the pages is highly recommended.', 'cjfm'),
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'info',
		'id' => 'auto_page_setup',
		'label' => __('Page Setup (Auto)', 'cjfm'),
		'info' => '',
		'suffix' => '',
		'prefix' => '',
		'default' => '<p><a href="'.cjfm_string(cjfm_callback_url('cjfm_page_setup')).'cjfm_do_action=create_pages" class="btn btn-success btn-small">'.__('Create Pages', 'cjfm').'</a></p><p>'.__('<b>Note:</b> If you have already used the auto page setup, this will remove the previously created pages and create new pages with default setup.', 'cjfm').'</p>',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'page',
		'id' => 'page_login',
		'label' => __('Login Page', 'cjfm'),
		'info' => __('<p>Use Shortcode Generator to insert <b>cjfm_form_login</b> shortcode on this page.</p>', 'cjfm').$page_login_urls,
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'page',
		'id' => 'page_register',
		'label' => __('Register Page', 'cjfm'),
		'info' => __('<p>Use Shortcode Generator to insert <b>cjfm_form_register</b> shortcode on this page.</p>', 'cjfm').$page_register_urls,
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'page',
		'id' => 'page_logout',
		'label' => __('Logout Page', 'cjfm'),
		'info' => __('<p>Use Shortcode Generator to insert <b>cjfm_logout</b> shortcode on this page.</p>', 'cjfm').$page_logout_urls,
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'page',
		'id' => 'page_reset_password',
		'label' => __('Reset Password Page', 'cjfm'),
		'info' => __('<p>Use Shortcode Generator to insert <b>cjfm_form_reset_password</b> shortcode on this page.</p>', 'cjfm').$page_reset_password_urls,
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'page',
		'id' => 'page_profile',
		'label' => __('Profile Page', 'cjfm'),
		'info' => __('<p>Use Shortcode Generator to insert <b>cjfm_user_profile</b> shortcode on this page.</p>', 'cjfm').$page_profile_urls,
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
	array(
		'type' => 'submit',
		'id' => '',
		'label' => __('Save Settings', 'cjfm'),
		'info' => '',
		'suffix' => '',
		'prefix' => '',
		'default' => '',
		'options' => '', // array in case of dropdown, checkbox and radio buttons
	),
);

