<?php

require_once plugin_dir_path(__FILE__) . 'api.php';

class mksense_admin_app_page {
	function __construct() {
		$this->init_localization();
		mksense_api::init_mksense_api();
	}

	private $localization;

	private function init_localization() {
		$this->localization = array(
			// TODO: Nikita Check that text domain should be ths same as slug after we host this plugin on wordpress.org (wordpress.org/plugins/<slug>)
			'logoDescription' => __('One step - accessible', 'make-sense'),
			'setupMenuItem' => __('Setup', 'make-sense'),
			'generalMenuItem' => __('General', 'make-sense'),
			'dashboardMenuItem' => __('Dashboard', 'make-sense'),
			'welcomeBody' => __('Welcome...', 'make-sense'),
			'menuPosition' => __('Choose menu position:', 'make-sense'),
			'loadingMessage' => __('Loading...', 'make-sense'),
			'configuration' => __('Accessibility Menu Configuration', 'make-sense'),
			'mkOn' => __('Enable Make-Sense on your site', 'make-sense'),
			'statement' => __('Accessibility Statement:', 'make-sense'),
			'changeStatementFirstPart' => __('Change default Accessibility Statement by including information about your company:', 'make-sense'),
			'supportEmail' => __('Support Email', 'make-sense'),
			'email' => __('Email address', 'make-sense'),
			'supportContactName' => __('Support Contact Name', 'make-sense'),
			'contactName' => __('Contact Name', 'make-sense'),
			'supportPhoneLabel' => __('Support Phone Number', 'make-sense'),
			'phonePlaceholder' => __('Phone number', 'make-sense'),
			'customStatementURL' => __('Custom Statement URL', 'make-sense'),
			'statementURL' => __('Statement URL', 'make-sense'),
			'selectLanguagesLabel' => __('Select availible languages for Make-Sense accessibility menu:', 'make-sense'),
			'selectLanguages' => __('Select languages', 'make-sense'),
			'english' => __('English', 'make-sense'),
			'russian' => __('Russian', 'make-sense'),
			'hebrew' => __('Hebrew', 'make-sense'),
			'spanish' => __('Spanish', 'make-sense'),
			'licenseHeader' => __('License information', 'make-sense'),
			'licensePlanLabel' => __('Current License plan: ', 'make-sense'),
			'licensePlanDescriptionPrefix' => __('Your current License plan is ', 'make-sense'),
			'licensePlan' => __('"Audit"', 'make-sense'),
			'licensePlanDescriptionPostfix' => __(". On this plan you are limited to one domain and 100 pages. You don't have an access to Accessibility patch	editor,	technical support and archive storage. To get them and other benefits you can upgrade to other ", 'make-sense'),
			'accessibilityPackages' => __('Other Accessibility Packages.', 'make-sense'),
			'termsOfUse' => __('Terms of Use', 'make-sense'),
			'privacyPolicy' => __('Privacy Policy', 'make-sense'),
			'dashboardHeader' => __('Dashboard view', 'make-sense'),
			'save' => __('Save', 'make-sense'),
			'menuPositionLabel' => __('Accessibility menu on your site will be shown in', 'make-sense'),
			'corner' => __('corner', 'make-sense'),
			'enablePlugin' => __('Make-Sense plugin will run on your site', 'make-sense'),
			'disablePlugin' => __('Make-Sense plugin will be disabled on your site', 'make-sense'),
			'registration_step_label_welcome' => __('Welcome', 'make-sense'),
			'registration_step_label_register' => __('Register', 'make-sense'),
			'registration_step_label_completed' => __('Completed', 'make-sense'),
			'registration_placeholder_first_name' => __('First name', 'make-sense'),
			'registration_placeholder_last_name' => __('Last name', 'make-sense'),
			'registration_placeholder_email' => __('Email', 'make-sense'),
			'registration_placeholder_phone' => __('Phone', 'make-sense'),
			'registration_placeholder_company' => __('Company name', 'make-sense'),
			'registration_placeholder_domain' => __('Domain', 'make-sense'),
			'registration_placeholder_existing_domain' => __('Select existing domain', 'make-sense'),
			'registration_social_label' => __('Social login','make-sense'),
			'registration_choose_suggestion' => __('OR', 'make-sense'),
			'registration_placeholder_new_domain' => __('Add new domain', 'make-sense'),
			'registration_button_next' => __('Next', 'make-sense'),
			'registration_button_prev' => __('Previous', 'make-sense'),
			'registration_button_confirm' => __('Confirm', 'make-sense'),
			'registration_select_or_new_domain_message' => __('To continue please select an existing domain or add a new one', 'make-sense'),
			'registration_button_continue' => __('Continue', 'make-sense'),
			'registration_button_dashboard' => __('Go to the dashboard', 'make-sense'),
			'registration_step_welcome_intro' => __('To begin using Make-Sense for WP on your site, please sign in with your Google or Facebook account below. Make-Sense will not have access to your third-party settings or profile; we just ask you to sign in to verify your identity.', 'make-sense'),
			'registration_step_register_new_intro' => __('Please fill in the fields below with your company name, phone number, and domain name. The domain name should match the website where your plugin will be installed. Please verify the accuracy of the domain that you enter before submitting, as this cannot easily be changed later, although you can add more domains in the future.' , 'make-sense'),
			'registration_step_register_comeback_intro' => __('Welcome back!!!

Please select one of registered domains or type new one to add', 'make-sense'),
'registration_step_register_comeback_intro_no_domain' => __('Welcome back!!!

To continue please specify the domain', 'make-sense'),
			'registration_step_authenticate_provider_google' => __('Google', 'make-sense'),
			'registration_step_authenticate_provider_facebook' => __('Facebook', 'make-sense'),
			'registration_progress_msg' => __('Processing request, this should take couple of seconds

Thank you for your patience.', 'make-sense'),
			'registration_completed_msg' => __('Congratulations! You may now begin using the Make-Sense for WP plugin on your website. You will now have access to your dashboard, which will populate with data and site details once you start using the plugin. Please allow 24-48 hours for the dashboard to begin to populate after the plugin is enabled.

First, go to Make-Sense for WP in your WP dashboard menu, then go to General. You’ll need to check a box to enable the plugin on your site. In the settings, you’ll also be able to modify the placement of the menu on the browser window, set menu languages and update your digital accessibility statement.
			
The plugin addresses compliance issues that can be fixed automatically by implementing an overlay on your site. Automatic updates and the Make-Sense menu will be viewable on the browser side for your users.', 'make-sense'),
			'phoneformat_validation' => __('Wrong phone format'),
			'phone_validation_title' => __('Please use international phone number format', 'make-sense'),
			'phone_validation_country_code' => __('Country code with leading "+"', 'make-sense'),
			'phone_validation_national_dest_code' => __('National destination code', 'make-sense'),
			'phone_validation_subscriber_number' => __('Subscriber number', 'make-sense'),
			'phone_validation_exmaple' => __('Example', 'make-sense'),
			'required_validation' => __('This field is required', 'make-sense'),
			'whitespace_validation' => __('Incorrect value', 'make-sense'),
			'unable_to_check_validation' => __('Unable to check', 'make-sense'),
			'error_title' => __('Error', 'make-sense'),
			'error_title_registration_failed' => __('Registration failed', 'make-sense'),
			'back_office_users_feature' => __('Back-office users', 'make-sense'),
			'changeStatementSecondPart' => __('Or specify a URL to your custom Accessibility Statement:', 'make-sense'),
			'package' => __('package', 'make-sense'),
			'user' => __('user', 'make-sense'),
			'users' => __('users', 'make-sense'),
			'checkmark' => __('Checkmark', 'make-sense'),
			'domains_pages_feature' => __('Domains/Up to Pages', 'make-sense'),
			'information_certified_feature' => __('ISO 27001 Security Information certified', 'make-sense'),
			'wcag_compliance_feature' => __('WCAG 2.0 AA and WCAG 2.1 compliance', 'make-sense'),
			'accessibility_menu_feature' => __('End-user accessibility menu', 'make-sense'),
			'online_dashboard_feature' => __('Online dashboard', 'make-sense'),
			'patch_editor_feature' => __('Accessibility patch editor', 'make-sense'),
			'storage_feature' => __('Archive storage: 1 month', 'make-sense'),
			'technical_support_feature' => __('Technical support', 'make-sense'),
			'unique_user_support_feature' => __('Unique user support: 25 per second', 'make-sense'),
			'top_left' => __('Top-Left', 'make-sense'),
			'top_right' => __('Top-Right', 'make-sense'),
			'bottom_left' => __('Bottom-Left', 'make-sense'),
			'bottom_right' => __('Bottom-Right', 'make-sense'),
			'none' => __('none', 'make-sense'),
			'zero' => __('zero', 'make-sense'),
			'authentificationTitle' => __('Your token is expired. Please re-login.', 'make-sense')
		);
	}

	function mksense_options_page() {
		echo '<div class="wrap" id="mksense-plugin-admin-panel"><mk-marketplace-app-root></mk-marketplace-app-root></div>';
	}

	function register_mksense_page(){
		add_menu_page( 
			'Make-Sense', 
			'Make-Sense', 
			'manage_options', 
			'make-sense', 
			array($this, 'mksense_options_page'), 
			'dashicons-mksense-menu');
		global $submenu;
		if (mksense_api::get_mksense_user_data()) {
			$submenu['make-sense'][] = array($this->localization['generalMenuItem'], 'manage_options', admin_url('admin.php?page=make-sense#/general'));
			$submenu['make-sense'][] = array('
				<span class="mksense-dashboard-link">'.$this->localization['dashboardMenuItem'].'</span>', 
				'manage_options', 
				admin_url('admin.php?page=make-sense#/dashboard'));
		} else {
			$submenu['make-sense'][] = array($this->localization['setupMenuItem'], 'manage_options', admin_url('admin.php?page=make-sense#/setup'));
		}
	}

	function mksense_Enqueue_Admin_Scripts($hook) {
		wp_enqueue_style( 'mksense-menu-styles-css', plugins_url('menu.css', __FILE__), null, null );

		if ( $hook != 'toplevel_page_make-sense' ) {
			return;
		}

		wp_enqueue_script('mksense-plugin', plugins_url('mksense-plugin.js', __FILE__), null, '1.0', true);
		wp_localize_script('mksense-plugin', 'mkVars', $this->localization);

		wp_add_inline_script('mksense-plugin', 
			'var mksenseGlobalSettings = { baseApiUrl: "'.rest_url('/make-sense').'",
				baseStaticUrl: "'.plugins_url('../images/', __FILE__ ).'",
				wpNonce: "'.wp_create_nonce('wp_rest').'",
				token: "'.mksense_api::encode_URI_component(mksense_api::get_mksense_token()).'", 
				strategy: "'.mksense_api::get_mksense_auth_strategy().'", 
				userData: "'.mksense_api::encode_URI_component(mksense_api::get_mksense_user_data()).'" };', 
			null, null);
			
		wp_enqueue_style( 'mksense-styles-css', plugins_url('theme.css', __FILE__), null, null );
	}

	function register_mksense_menu() {
		add_action( 'admin_menu', array( $this, 'register_mksense_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mksense_Enqueue_Admin_Scripts' ) );
	}
}